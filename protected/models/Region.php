<?php

/**
 * This is the model class for table "region".
 *
 * The followings are the available columns in table 'region':
 * @property integer $id
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_oz
 * @property string $create_time
 * @property string $update_time
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property User $user
 */
class Region extends CActiveRecord {

    public function tableName() {
        return 'region';
    }

    public function rules() {
        return array(
            array('title_ru', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('title_ru, title_uz, title_oz', 'length', 'max' => 255),
            array('id, title_ru, title_uz, title_oz, create_time, update_time, user_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'products' => array(self::HAS_MANY, 'Product', 'region_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'title_ru' => Yii::t("translation", "title_ru"),
            'title_uz' => Yii::t("translation", "title_uz"),
            'title_oz' => Yii::t("translation", "title_oz"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
            'user_id' => Yii::t("translation", "user"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title_ru', $this->title_ru, true);
        $criteria->compare('title_uz', $this->title_uz, true);
        $criteria->compare('title_oz', $this->title_oz, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /* ====== ( ===== ) ===== */

    public function defaultScope() {
        return array(
            'order' => 'id DESC',
        );
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->update_time = $this->create_time = date("Y-m-d H:i:s");
        } else {
            $this->update_time = date("Y-m-d H:i:s");
        }
        if (!empty($this->title_ru)) {
            $this->title_ru = trim($this->title_ru);
            $this->title_ru = CHtml::encode($this->title_ru);
        }
        if (!empty($this->title_uz)) {
            $this->title_uz = trim($this->title_uz);
            $this->title_uz = CHtml::encode($this->title_uz);
        }
        if (!empty($this->title_oz)) {
            $this->title_oz = trim($this->title_oz);
            $this->title_oz = CHtml::encode($this->title_oz);
        }
        $this->user_id = Yii::app()->user->id;
        return parent::beforeSave();
    }

    protected function afterFind() {
        if (!empty($this->title_ru)) {
            $this->title_ru = CHtml::decode($this->title_ru);
        }
        if (!empty($this->title_uz)) {
            $this->title_uz = CHtml::decode($this->title_uz);
        }
        if (!empty($this->title_oz)) {
            $this->title_oz = CHtml::decode($this->title_oz);
        }
        return parent::afterFind();
    }

    public static function RegionsList() {
        $models = self::model()->findAll();
        return CHtml::listData($models, 'id', 'translatedTitle');
    }

    public function getTranslatedTitle() {
        switch (Yii::app()->language) {
            case 'oz':
                return $this->title_oz;
            case 'ru':
                return $this->title_ru;
            default:
                return $this->title_uz;
        }
    }

}
