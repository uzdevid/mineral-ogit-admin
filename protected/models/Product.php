<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property integer $category_id
 * @property string $price_1
 * @property string $price_2
 * @property string $price_3
 * @property string $description
 * @property string $available_1
 * @property string $available_2
 * @property string $available_3
 * @property integer $delivery_type
 * @property integer $location_type_1
 * @property integer $location_type_2
 * @property integer $location_type_3
 * @property integer $production_date_month
 * @property string $production_date_year
 * @property integer $payment_type_1
 * @property integer $payment_type_2
 * @property integer $payment_type_3
 * @property integer $vat
 * @property string $latitude
 * @property string $longitude
 * @property integer $views_count
 * @property integer $user_id
 * @property integer $contact_type
 * @property integer $region_id
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Region $region
 * @property User $user
 */
class Product extends CActiveRecord {

    public function tableName() {
        return 'product';
    }

    public function rules() {
        return array(
            array('title, category_id, user_id, region_id', 'required'),
            array('status, category_id, delivery_type, location_type_1, location_type_2, location_type_3, production_date_month, payment_type_1, payment_type_2, payment_type_3, vat, views_count, user_id, contact_type, region_id, type', 'numerical', 'integerOnly' => true),
            array('title, image1, image2, image3, image4', 'length', 'max' => 255),
            array('price_1, price_2, price_3, available_1, available_2, available_3', 'length', 'max' => 10),
            array('production_date_year', 'length', 'max' => 4),
            array('latitude, longitude', 'length', 'max' => 9),
            array('description', 'safe'),
            array('id, title, status, create_time, update_time, image1, image2, image3, image4, category_id, price_1, price_2, price_3, description, available_1, available_2, available_3, delivery_type, location_type_1, location_type_2, location_type_3, production_date_month, production_date_year, payment_type_1, payment_type_2, payment_type_3, vat, latitude, longitude, views_count, user_id, contact_type, region_id, type', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'title' => Yii::t("translation", "title"),
            'status' => Yii::t("translation", "status"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
            'image1' => Yii::t("translation", "image1"),
            'image2' => Yii::t("translation", "image2"),
            'image3' => Yii::t("translation", "image3"),
            'image4' => Yii::t("translation", "image4"),
            'category_id' => Yii::t("translation", "category"),
            'price_1' => Yii::t("translation", "price_1"),
            'price_2' => Yii::t("translation", "price_2"),
            'price_3' => Yii::t("translation", "price_3"),
            'description' => Yii::t("translation", "description"),
            'available_1' => Yii::t("translation", "available_1"),
            'available_2' => Yii::t("translation", "available_2"),
            'available_3' => Yii::t("translation", "available_3"),
            'delivery_type' => Yii::t("translation", "delivery_type"),
            'location_type_1' => Yii::t("translation", "location_type_1"),
            'location_type_2' => Yii::t("translation", "location_type_2"),
            'location_type_3' => Yii::t("translation", "location_type_3"),
            'production_date_month' => Yii::t("translation", "production_date_month"),
            'production_date_year' => Yii::t("translation", "production_date_year"),
            'payment_type_1' => Yii::t("translation", "payment_type_1"),
            'payment_type_2' => Yii::t("translation", "payment_type_2"),
            'payment_type_3' => Yii::t("translation", "payment_type_3"),
            'vat' => Yii::t("translation", "vat"),
            'latitude' => Yii::t("translation", "latitude"),
            'longitude' => Yii::t("translation", "longitude"),
            'views_count' => Yii::t("translation", "views_count"),
            'user_id' => Yii::t("translation", "user"),
            'contact_type' => Yii::t("translation", "contact_type"),
            'region_id' => Yii::t("translation", "region"),
            'type' => Yii::t("translation", "type"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('image1', $this->image1, true);
        $criteria->compare('image2', $this->image2, true);
        $criteria->compare('image3', $this->image3, true);
        $criteria->compare('image4', $this->image4, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('price_1', $this->price_1, true);
        $criteria->compare('price_2', $this->price_2, true);
        $criteria->compare('price_3', $this->price_3, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('available_1', $this->available_1, true);
        $criteria->compare('available_2', $this->available_2, true);
        $criteria->compare('available_3', $this->available_3, true);
        $criteria->compare('delivery_type', $this->delivery_type);
        $criteria->compare('location_type_1', $this->location_type_1);
        $criteria->compare('location_type_2', $this->location_type_2);
        $criteria->compare('location_type_3', $this->location_type_3);
        $criteria->compare('production_date_month', $this->production_date_month);
        $criteria->compare('production_date_year', $this->production_date_year, true);
        $criteria->compare('payment_type_1', $this->payment_type_1);
        $criteria->compare('payment_type_2', $this->payment_type_2);
        $criteria->compare('payment_type_3', $this->payment_type_3);
        $criteria->compare('vat', $this->vat);
        $criteria->compare('latitude', $this->latitude, true);
        $criteria->compare('longitude', $this->longitude, true);
        $criteria->compare('views_count', $this->views_count);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('contact_type', $this->contact_type);
        $criteria->compare('region_id', $this->region_id);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /* ====== ( ===== ) ===== */

    public $list_array = array(
        'title',
        'price_1',
        'price_2',
        'price_3',
        'description',
        'production_date_month',
        'production_date_year',
        'vat',
        'latitude',
        'longitude',
    );

    public function defaultScope() {
        $order = 'update_time ASC';
        return array(
            'order' => $order,
        );
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->update_time = $this->create_time = date("Y-m-d H:i:s");
        } else {
            $this->update_time = date("Y-m-d H:i:s");
        }
        foreach ($this->list_array as $value) {
            if (!empty($this->$value)) {
                $this->$value = CHtml::encode($this->$value);
            }
        }
        $this->user_id = Yii::app()->user->id;
        if (empty($this->price_1)) {
            $this->price_1 = NULL;
        }
        if (empty($this->price_2)) {
            $this->price_2 = NULL;
        }
        if (empty($this->price_3)) {
            $this->price_3 = NULL;
        }
        if (empty($this->available_1)) {
            $this->available_1 = NULL;
        }
        if (empty($this->available_2)) {
            $this->available_2 = NULL;
        }
        if (empty($this->available_3)) {
            $this->available_3 = NULL;
        }
        if (empty($this->production_date_month)) {
            $this->production_date_month = NULL;
        }
        if (empty($this->production_date_year)) {
            $this->production_date_year = NULL;
        }
        if (empty($this->latitude)) {
            $this->latitude = NULL;
        }
        if (empty($this->longitude)) {
            $this->longitude = NULL;
        }
        return parent::beforeSave();
    }

    protected function afterFind() {
        foreach ($this->list_array as $value) {
            if (!empty($this->$value)) {
                $this->$value = CHtml::decode($this->$value);
            }
        }
        return parent::afterFind();
    }

    public function listStatus() {
        return array(
            '-1' => Yii::t("translation", "ban"),
            '0' => Yii::t("translation", "registration"),
            '1' => Yii::t("translation", "active"),
        );
    }

    public function getNameStatus() {
        $list = array(
            '-2' => Yii::t("translation", "password_recovery"),
            '-1' => Yii::t("translation", "ban"),
            '0' => Yii::t("translation", "registration"),
            '1' => Yii::t("translation", "active"),
        );
        return $list[$this->status];
    }

    public function listType() {
        return array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "product_type_1"),
        );
    }

    public function getNameType() {
        $list = array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "product_type_1"),
        );
        return $list[$this->type];
    }

    public function listRegion() {
        $criteria = new CDbCriteria;
        switch (Yii::app()->language) {
            case 'uz':
                $criteria->order = 'title_uz ASC';
                break;
            case 'ru':
                $criteria->order = 'title_ru ASC';
                break;
            case 'oz':
                $criteria->order = 'title_oz ASC';
                break;
            default:
                $criteria->order = 'title_uz ASC';
                break;
        }
        $models = Region::model()->findAll($criteria);
        switch (Yii::app()->language) {
            case 'uz':
                return CHtml::listData($models, 'id', 'title_uz');
                break;
            case 'ru':
                return CHtml::listData($models, 'id', 'title_ru');
                break;
            case 'oz':
                return CHtml::listData($models, 'id', 'title_oz');
                break;
            default:
                return CHtml::listData($models, 'id', 'title_uz');
                break;
        }
    }

    public function getNameRegion() {
        $name = Yii::t("translation", "undefined");
        if (!empty($this->region_id)) {
            $region = Region::model()->findByPk($this->region_id);
            if (!empty($region)) {
                switch (Yii::app()->language) {
                    case 'uz':
                        $name = $region->title_uz;
                        break;
                    case 'ru':
                        $name = $region->title_ru;
                        break;
                    case 'oz':
                        $name = $region->title_oz;
                        break;
                    default:
                        $name = $region->title_uz;
                        break;
                }
            }
        }
        return $name;
    }

    public function listContactType() {
        return array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "contact_type_1"),
        );
    }

    public function getNameContactType() {
        $list = array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "contact_type_1"),
        );
        return $list[$this->contact_type];
    }

    public function listUser() {
        $users = User::model()->findAll();
        return CHtml::listData($users, 'id', 'FIO');
    }

    public function listVat() {
        return array(
            '0' => Yii::t("translation", "no_vat"),
            '1' => Yii::t("translation", "yes_vat"),
        );
    }

    public function getNameVat() {
        $list = array(
            '0' => Yii::t("translation", "no_vat"),
            '1' => Yii::t("translation", "yes_vat"),
        );
        return $list[$this->vat];
    }

    public function listPaymentType() {
        return array(
            '0' => Yii::t("translation", "no_payment_type"),
            '1' => Yii::t("translation", "yes_payment_type"),
        );
    }

    public function getNamePaymentType($payment_type) {
        $list = array(
            '0' => Yii::t("translation", "no_payment_type"),
            '1' => Yii::t("translation", "yes_payment_type"),
        );
        return $list[$payment_type];
    }

    public function listCategory() {
        $criteria = new CDbCriteria;
        switch (Yii::app()->language) {
            case 'uz':
                $criteria->order = 'title_uz ASC';
                break;
            case 'ru':
                $criteria->order = 'title_ru ASC';
                break;
            case 'oz':
                $criteria->order = 'title_oz ASC';
                break;
            default:
                $criteria->order = 'title_uz ASC';
                break;
        }
        $models = Category::model()->findAll($criteria);
        switch (Yii::app()->language) {
            case 'uz':
                return CHtml::listData($models, 'id', 'title_uz');
                break;
            case 'ru':
                return CHtml::listData($models, 'id', 'title_ru');
                break;
            case 'oz':
                return CHtml::listData($models, 'id', 'title_oz');
                break;
            default:
                return CHtml::listData($models, 'id', 'title_uz');
                break;
        }
    }

    public function getNameCategory() {
        $name = Yii::t("translation", "undefined");
        if (!empty($this->category_id)) {
            $category = Category::model()->findByPk($this->category_id);
            if (!empty($category)) {
                switch (Yii::app()->language) {
                    case 'uz':
                        $name = $category->title_uz;
                        break;
                    case 'ru':
                        $name = $category->title_ru;
                        break;
                    case 'oz':
                        $name = $category->title_oz;
                        break;
                    default:
                        $name = $category->title_uz;
                        break;
                }
            }
        }
        return $name;
    }

    public function listAvailable() {
        return array(
            '0' => Yii::t("translation", "no_available"),
            '1' => Yii::t("translation", "yes_available"),
        );
    }

    public function getNameAvailable($available) {
        $list = array(
            '0' => Yii::t("translation", "no_available"),
            '1' => Yii::t("translation", "yes_available"),
        );
        return $list[$available];
    }

    public function listDeliveryType() {
        return array(
            '0' => Yii::t("translation", "no_delivery_type"),
            '1' => Yii::t("translation", "yes_delivery_type"),
        );
    }

    public function getNameDeliveryType() {
        $list = array(
            '0' => Yii::t("translation", "no_delivery_type"),
            '1' => Yii::t("translation", "yes_delivery_type"),
        );
        return $list[$this->delivery_type];
    }

    public function listLocationType() {
        return array(
            '0' => Yii::t("translation", "no_location_type"),
            '1' => Yii::t("translation", "yes_location_type"),
        );
    }

    public function getNameLocationType($location_type) {
        $list = array(
            '0' => Yii::t("translation", "no_location_type"),
            '1' => Yii::t("translation", "yes_location_type"),
        );
        return $list[$location_type];
    }

    public static function ProductsList() {
        $models = self::model()->findAllByAttributes(['status' => 1]);
        return CHtml::listData($models, 'id', 'title');
    }

}
