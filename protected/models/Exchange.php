<?php

/**
 * This is the model class for table "exchange".
 *
 * The followings are the available columns in table 'exchange':
 * @property integer $id
 * @property integer $exchange_product_id
 * @property integer $region_id
 * @property double $unit_value
 * @property string $unit
 * @property integer $price_min
 * @property integer $price_max
 * @property string $currency
 * @property integer $status
 * @property string $publish_time
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property ExchangeProduct $exchangeProduct
 * @property Region $region
 */
class Exchange extends CActiveRecord {

    public function tableName() {
        return 'exchange';
    }

    public function rules() {
        return array(
            array('exchange_product_id, region_id, unit_value, unit, price_min, publish_time', 'required'),
            array('exchange_product_id, region_id, price_min, price_max, status', 'numerical', 'integerOnly' => true),
            array('unit_value', 'numerical'),
            array('unit', 'length', 'max' => 45),
            array('currency', 'length', 'max' => 3),
            array('id, exchange_product_id, region_id, unit_value, unit, price_min, price_max, currency, status, publish_time, create_time, update_time', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'exchangeProduct' => array(self::BELONGS_TO, 'ExchangeProduct', 'exchange_product_id'),
            'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'exchange_product_id' => Yii::t("translation", "exchange_product"),
            'region_id' => Yii::t("translation", "region"),
            'unit_value' => Yii::t("translation", "unit_value"),
            'unit' => Yii::t("translation", "unit"),
            'price_min' => Yii::t("translation", "price_min"),
            'price_max' => Yii::t("translation", "price_max"),
            'currency' => Yii::t("translation", "currency"),
            'status' => Yii::t("translation", "status"),
            'publish_time' => Yii::t("translation", "publish_time"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('exchange_product_id', $this->exchange_product_id);
        $criteria->compare('region_id', $this->region_id);
        $criteria->compare('unit_value', $this->unit_value);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('price_min', $this->price_min);
        $criteria->compare('price_max', $this->price_max);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('publish_time', $this->publish_time, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /* ====== ( ===== ) ===== */

    public function getCurrencies() {
        return [
            'UZS' => Yii::t('translation', 'UZS')
        ];
    }

    public function getStatusList() {
        return [
            Yii::t('translation', 'not_sold'),
            Yii::t('translation', 'sold'),
        ];
    }

    protected function beforeSave() {
        $this->publish_time = date('Y-m-d H:i:s', strtotime($this->publish_time));
        if ($this->isNewRecord) {
            $this->update_time = $this->create_time = date("Y-m-d H:i:s");
        } else {
            $this->update_time = date("Y-m-d H:i:s");
        }
        return parent::beforeSave();
    }

    protected function afterFind() {
        $this->publish_time = date('d-m-Y H:i', strtotime($this->publish_time));
        return parent::afterFind();
    }

    public function listExchangeProduct() {
        $models = ExchangeProduct::model()->findAll();
        return CHtml::listData($models, 'id', 'title');
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

    public function listStatus() {
        return array(
            '0' => Yii::t("translation", "inactive"),
            '1' => Yii::t("translation", "active"),
        );
    }

    public function getNameStatus() {
        $list = array(
            '0' => Yii::t("translation", "inactive"),
            '1' => Yii::t("translation", "active"),
        );
        return $list[$this->status];
    }

}
