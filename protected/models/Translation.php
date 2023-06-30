<?php

/**
 * This is the model class for table "translation".
 *
 * The followings are the available columns in table 'translation':
 * @property integer $id
 * @property string $title
 * @property string $translation_ru
 * @property string $translation_uz
 * @property string $translation_oz
 */
class Translation extends CActiveRecord {

    public function tableName() {
        return 'translation';
    }

    public function rules() {
        return array(
            array('title', 'required'),
            array('title, translation_ru, translation_uz, translation_oz', 'length', 'max' => 255),
            array('id, title, translation_ru, translation_uz, translation_oz', 'safe', 'on' => 'search'),
            //
            array('title', 'unique'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'title' => Yii::t("translation", "title"),
            'translation_ru' => Yii::t("translation", "translation_ru"),
            'translation_uz' => Yii::t("translation", "translation_uz"),
            'translation_oz' => Yii::t("translation", "translation_oz"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('translation_ru', $this->translation_ru, true);
        $criteria->compare('translation_uz', $this->translation_uz, true);
        $criteria->compare('translation_oz', $this->translation_oz, true);

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
        $this->title = Yii::app()->SystemClass->checkUrl($this->title, '_');
        if (empty($this->title)) {
            return FALSE;
        }

        $model = self::model()->findByAttributes(array('title' => $this->title));
        if (!empty($model)) {
            if ($model->id != $this->id) {
                $this->addErrors(array(0 => Yii::t("translation", "such_a_record_exists")));
                return FALSE;
            }
        }

        if (!empty($this->translation_ru)) {
            $this->translation_ru = trim($this->translation_ru);
            $this->translation_ru = CHtml::encode($this->translation_ru);
        }

        if (!empty($this->translation_uz)) {
            $this->translation_uz = trim($this->translation_uz);
            $this->translation_uz = CHtml::encode($this->translation_uz);
        }

        if (!empty($this->translation_oz)) {
            $this->translation_oz = trim($this->translation_oz);
            $this->translation_oz = CHtml::encode($this->translation_oz);
        }
        return parent::beforeSave();
    }

    protected function afterFind() {
        if (!empty($this->title)) {
            $this->title = CHtml::decode($this->title);
        }
        if (!empty($this->translation_ru)) {
            $this->translation_ru = CHtml::decode($this->translation_ru);
        }
        if (!empty($this->translation_uz)) {
            $this->translation_uz = CHtml::decode($this->translation_uz);
        }
        if (!empty($this->translation_oz)) {
            $this->translation_oz = CHtml::decode($this->translation_oz);
        }
        return parent::afterFind();
    }

}
