<?php

ini_set('max_execution_time', '0');
ini_set("memory_limit", "512M");

class DefaultController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'users_synchronization', 'transfer_products'),
                'roles' => array('administrator'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUsers_synchronization() {
        die;
        $criteria = new CDbCriteria();
        $criteria->limit = 1000;
        $users = User::model()->findAll($criteria);

        $phones = [];
        foreach ($users as $user)
            $phones[$user->phone] = $user->phone;

        $criteria = new CDbCriteria();
        $criteria->addNotInCondition('phone', $phones);
//        $criteria->limit = 100;
        $agrozamin_users = AgrozaminUser::model()->findAll($criteria);

        $imported = 0;
        $error = 0;

        foreach ($agrozamin_users as $agrozamin_user) {
            $user = User::model()->findByAttributes(['phone' => $agrozamin_user->phone]);

            if ($user === null) {
                $model = new User;
                $model->email = $agrozamin_user->email;
                $model->password = $agrozamin_user->password;
                $model->role = $agrozamin_user->role;
                $model->status = $agrozamin_user->status;
                $model->name = $agrozamin_user->name;
                $model->surname = $agrozamin_user->surname;
                $model->patronymic = $agrozamin_user->patronymic;
                $model->phone = $agrozamin_user->phone;
                $model->lang = $agrozamin_user->lang;
                $model->recover_password = $agrozamin_user->recover_password;
                $model->image = $agrozamin_user->image;
                $model->birthday = $agrozamin_user->birthday;
                $model->gender = $agrozamin_user->gender;
                $model->token = $agrozamin_user->token;
                $model->inn = $agrozamin_user->inn;
                $model->company_name = $agrozamin_user->company_name;
                $model->region_id = $agrozamin_user->region_id;
                $model->place_id = $agrozamin_user->place_id;
                $model->company_address = $agrozamin_user->company_address;
                $model->mfo = $agrozamin_user->mfo;
                $model->bank_name = $agrozamin_user->bank_name;
                $model->bank_account = $agrozamin_user->bank_account;
                $model->rating = $agrozamin_user->rating;
                $model->admin_password = $agrozamin_user->admin_password;
                $model->registration_user_id = $agrozamin_user->registration_user_id;
                $model->speciality = $agrozamin_user->speciality;
                $model->biography = $agrozamin_user->biography;
                $model->consultant_rating = $agrozamin_user->consultant_rating;

                if ($model->save()) {
                    $this->transferUserImage($agrozamin_user);
                    $imported++;
                } else {
                    $error++;
                }
            }
        }

        Yii::app()->user->setFlash('success', Yii::t('translation', 'successfully synchronized: {importeds}; error: {error}; time: {time}', ['{importeds}' => $imported, '{error}' => $error, '{time}' => date('H:i:s')]));
        $this->redirect(['/admin/default']);
    }

    private function transferUserImage($model) {
        if ($model->image == null)
            return null;

        $path = __DIR__ . "/../../../../../admin.agrozamin.uz/upload_files/user/{$model->image}";
        $to = __DIR__ . "/../../../../upload_files/user/{$model->image}";

        copy($path, $to);
    }

    public function actionTransfer_products() {
        die;
        //21 => 679,
        $ids = [15 => 680];

        $imported = 0;
        $error = 0;

        foreach ($ids as $id => $to) {
            $catalog_ids = [];
            $catalog_ids[$id] = $id;

            $list_catalogs = AgrozaminCatalog::model()->findAllByAttributes(['catalog_id' => $id]);
            foreach ($list_catalogs as $list_catalog) {
                $catalog_ids[$list_catalog->id] = $list_catalog->id;
                $list_sub_catalogs = AgrozaminCatalog::model()->findAllByAttributes(['catalog_id' => $list_catalog->id]);
                foreach ($list_sub_catalogs as $list_sub_catalog) {
                    $catalog_ids[$list_sub_catalog->id] = $list_sub_catalog->id;
                }
            }

            $criteria = new CDbCriteria();
            $criteria->addInCondition('catalog_id', $catalog_ids);
            $agrozamin_products = AgrozaminProduct::model()->findAll($criteria);

            foreach ($agrozamin_products as $agrozamin_product) {
                $user = User::model()->findByAttributes(['phone' => $agrozamin_product->user->phone]);

                if ($user == null) {
                    $error++;
                    continue;
                }

                $product = new Product;
                $product->user_id = $user->id;
                $product->title = $agrozamin_product->title;
                $product->price = $agrozamin_product->price;
                $product->catalog_id = $to;
                $product->unit_id = $agrozamin_product->unit_id;
                $product->payment_type = $agrozamin_product->payment_type;
                $product->delivery_type = $agrozamin_product->delivery_type;
                $product->payment_terms = $agrozamin_product->payment_terms;
                $product->method_use = $agrozamin_product->method_use;
                $product->description = $agrozamin_product->description;
                $product->location = $agrozamin_product->location;
                $product->region = $agrozamin_product->region;
                $product->unit_value = $agrozamin_product->unit_value;
                $product->status = 0;
                $product->residual_status = $agrozamin_product->residual_status;
                $product->registration_user_id = $agrozamin_product->registration_user_id;

                if ($product->save()) {
                    $this->transferProductImages($product, $agrozamin_product->productPhotos);
                    $imported++;
                } else {
                    $error++;
                }
            }
        }

        Yii::app()->user->setFlash('success', Yii::t('translation', 'successfully transfered: {importeds}; error: {error}; time: {time}', ['{importeds}' => $imported, '{error}' => $error, '{time}' => date('H:i:s')]));
        $this->redirect(['/admin/default']);
    }

    private function transferProductImages($product, $images) {
        foreach ($images as $image) {
            if ($image->image == null)
                return null;

            $path = __DIR__ . "/../../../../../admin.agrozamin.uz/upload_files/product_photo/{$image->image}";
            $to = __DIR__ . "/../../../../upload_files/product_photo/{$image->image}";

            if (is_file($path) && copy($path, $to)) {
                $path = __DIR__ . "/../../../../../admin.agrozamin.uz/upload_files/product_photo/thumbnail/{$image->image}";
                $to = __DIR__ . "/../../../../upload_files/product_photo/thumbnail/{$image->image}";

                if (is_file($path))
                    copy($path, $to);

                $product_photo = new ProductPhoto;
                $product_photo->product_id = $product->id;
                $product_photo->image = $image->image;
                $product_photo->save();
            }
        }
    }

}
