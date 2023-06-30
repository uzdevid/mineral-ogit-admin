<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title_system
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_oz
 * @property string $url
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property integer $product_count
 * @property integer $views_count
 * @property integer $product_views_count
 * @property string $image
 * @property integer $sort
 * @property string $seo_title_ru
 * @property string $seo_title_uz
 * @property string $seo_title_oz
 * @property string $seo_description_ru
 * @property string $seo_description_uz
 * @property string $seo_description_oz
 * @property string $seo_keywords_ru
 * @property string $seo_keywords_uz
 * @property string $seo_keywords_oz
 * @property integer $category_id
 * @property integer $user_id
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Category[] $categories
 * @property User $user
 * @property Product[] $products
 */
class Category extends CActiveRecord {

    public function tableName() {
        return 'category';
    }

    public function rules() {
        return array(
            array('title_system, url, title_ru', 'required'),
            array('status, product_count, views_count, product_views_count, sort, category_id, user_id, type', 'numerical', 'integerOnly' => true),
            array('title_system, title_ru, title_uz, title_oz, url, seo_title_ru, seo_title_uz, seo_title_oz, seo_description_ru, seo_description_uz, seo_description_oz, seo_keywords_ru, seo_keywords_uz, seo_keywords_oz', 'length', 'max' => 255),
            array('image', 'length', 'max' => 18),
            array('id, title_system, title_ru, title_uz, title_oz, url, create_time, update_time, status, product_count, views_count, product_views_count, image, sort, seo_title_ru, seo_title_uz, seo_title_oz, seo_description_ru, seo_description_uz, seo_description_oz, seo_keywords_ru, seo_keywords_uz, seo_keywords_oz, category_id, user_id, type', 'safe', 'on' => 'search'),
            //
            array('title_system, url', 'unique'),
        );
    }

    public function relations() {
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'categories' => array(self::HAS_MANY, 'Category', 'category_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'products' => array(self::HAS_MANY, 'Product', 'category_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'title_system' => Yii::t("translation", "title_system"),
            'title_ru' => Yii::t("translation", "title_ru"),
            'title_uz' => Yii::t("translation", "title_uz"),
            'title_oz' => Yii::t("translation", "title_oz"),
            'url' => Yii::t("translation", "url"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
            'status' => Yii::t("translation", "status"),
            'product_count' => Yii::t("translation", "product_count"),
            'views_count' => Yii::t("translation", "views_count"),
            'product_views_count' => Yii::t("translation", "product_views_count"),
            'image' => Yii::t("translation", "image"),
            'sort' => Yii::t("translation", "sort"),
            'seo_title_ru' => Yii::t("translation", "seo_title_ru"),
            'seo_title_uz' => Yii::t("translation", "seo_title_uz"),
            'seo_title_oz' => Yii::t("translation", "seo_title_oz"),
            'seo_description_ru' => Yii::t("translation", "seo_description_ru"),
            'seo_description_uz' => Yii::t("translation", "seo_description_uz"),
            'seo_description_oz' => Yii::t("translation", "seo_description_oz"),
            'seo_keywords_ru' => Yii::t("translation", "seo_keywords_ru"),
            'seo_keywords_uz' => Yii::t("translation", "seo_keywords_uz"),
            'seo_keywords_oz' => Yii::t("translation", "seo_keywords_oz"),
            'category_id' => Yii::t("translation", "category"),
            'user_id' => Yii::t("translation", "user"),
            'type' => Yii::t("translation", "type"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title_system', $this->title_system, true);
        $criteria->compare('title_ru', $this->title_ru, true);
        $criteria->compare('title_uz', $this->title_uz, true);
        $criteria->compare('title_oz', $this->title_oz, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('product_count', $this->product_count);
        $criteria->compare('views_count', $this->views_count);
        $criteria->compare('product_views_count', $this->product_views_count);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('seo_title_ru', $this->seo_title_ru, true);
        $criteria->compare('seo_title_uz', $this->seo_title_uz, true);
        $criteria->compare('seo_title_oz', $this->seo_title_oz, true);
        $criteria->compare('seo_description_ru', $this->seo_description_ru, true);
        $criteria->compare('seo_description_uz', $this->seo_description_uz, true);
        $criteria->compare('seo_description_oz', $this->seo_description_oz, true);
        $criteria->compare('seo_keywords_ru', $this->seo_keywords_ru, true);
        $criteria->compare('seo_keywords_uz', $this->seo_keywords_uz, true);
        $criteria->compare('seo_keywords_oz', $this->seo_keywords_oz, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('user_id', $this->user_id);
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
        'title_system',
        'title_ru',
        'title_uz',
        'title_oz',
        'url',
        'seo_title_ru',
        'seo_title_uz',
        'seo_title_oz',
        'seo_description_ru',
        'seo_description_uz',
        'seo_description_oz',
        'seo_keywords_ru',
        'seo_keywords_uz',
        'seo_keywords_oz',
    );

    public function defaultScope() {
        switch (Yii::app()->language) {
            case 'uz': $name = 'title_uz';
                break;
            case 'ru': $name = 'title_ru';
                break;
            case 'oz': $name = 'title_oz';
                break;
            default: $name = 'title_uz';
                break;
        }
        $order = $name . ' ASC';
        return array(
            'order' => $order,
        );
    }

    protected function beforeSave() {
        $this->url = Yii::app()->SystemClass->checkUrl($this->url);
        if (empty($this->url)) {
            return FALSE;
        }

        $model = self::model()->findByAttributes(array('url' => $this->url));
        if (!empty($model)) {
            if ($model->id != $this->id) {
                $this->addErrors(array(0 => Yii::t("translation", "such_a_record_exists")));
                return FALSE;
            }
        }

        $this->title_system = Yii::app()->SystemClass->checkUrl($this->title_system);
        if (empty($this->title_system)) {
            return FALSE;
        }

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
            '0' => Yii::t("translation", "hide"),
            '1' => Yii::t("translation", "active"),
        );
    }

    public function getNameStatus() {
        $list = array(
            '0' => Yii::t("translation", "hide"),
            '1' => Yii::t("translation", "active"),
        );
        return $list[$this->status];
    }

    public function listType() {
        return array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "category_type_1"),
        );
    }

    public function getNameType() {
        $list = array(
            '0' => Yii::t("translation", "main"),
            '1' => Yii::t("translation", "category_type_1"),
        );
        return $list[$this->type];
    }

    public function getNameCategory() {
        if (!empty($this->category_id)) {
            $category = self::model()->findByPk($this->category_id);
            switch (Yii::app()->language) {
                case 'uz':
                    return $category->title_uz;
                    break;
                case 'ru':
                    return $category->title_ru;
                    break;
                case 'oz':
                    return $category->title_oz;
                    break;
                default:
                    return $category->title_ru;
                    break;
            }
        }
    }

    public function getTree() {
        $criteria = new CDbCriteria;
        $criteria->condition = '`category_id` is NULL AND `status` = 1';
        $models = self::model()->findAll($criteria);
        $array = array();
        foreach ($models as $key => $value) {
            $array[$value->id] = $value->Name;
            $list = $this->getAllParent($value->id);
            foreach ($list as $key => $value) {
                $array[$value->id] = ' --- ' . $value->Name;
                $list = $this->getAllParent($value->id);
                foreach ($list as $key => $value) {
                    $array[$value->id] = ' --- --- ' . $value->Name;
                }
            }
        }
        return $array;
    }

    public function getAllParent($parent_id) {
        $criteria = new CDbCriteria;
        $criteria->condition = '`category_id` = :categoryID AND `status` = 1';
        $criteria->params = array(':categoryID' => $parent_id);
        $models = self::model()->findAll($criteria);
        return $models;
    }

    public function getName() {
        switch (Yii::app()->language) {
            case 'uz':
                return $this->title_uz;
                break;
            case 'ru':
                return $this->title_ru;
                break;
            case 'oz':
                return $this->title_oz;
                break;
            default:
                return $this->title_uz;
                break;
        }
    }

    public function behaviors() {
        return array(
            'uploadableFile' => array(
                'class' => 'application.components.UploadableImageBehavior',
                'savePathAlias' => 'webroot.upload_files.' . $this->tableName(),
                'allowEmpty' => TRUE,
                'allowResize' => TRUE,
                'resizeWidth' => 500,
                'resizeHeight' => 500,
            )
        );
    }

    public function getLinkImage() {
        $link = NULL;
        if (!empty($this->image)) {
            $link = Yii::app()->request->baseUrl . '/upload_files/' . $this->tableName() . '/' . $this->image;
            $image = CHtml::image($link, $this->title);
            $link = CHtml::link($image, $link);
        }

        return $link;
    }

}
