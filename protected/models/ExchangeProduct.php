<?php

/**
 * This is the model class for table "exchange_product".
 *
 * The followings are the available columns in table 'exchange_product':
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Exchange[] $exchanges
 * @property User $user
 */
class ExchangeProduct extends CActiveRecord {

    public function tableName() {
        return 'exchange_product';
    }

    public function rules() {
        return array(
            array('title', 'required'),
            array('status, user_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('id, title, status, create_time, update_time, user_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'exchanges' => array(self::HAS_MANY, 'Exchange', 'exchange_product_id'),
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
            'user_id' => Yii::t("translation", "user"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('status', $this->status);
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

    public $list_array = array(
        'title',
    );

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

}
