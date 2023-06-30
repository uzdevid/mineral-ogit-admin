<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $phone
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $lang
 * @property string $role
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property string $authorization_time
 * @property string $recover_password
 * @property string $image
 * @property string $organization_image
 * @property string $organization_name
 * @property string $organization_phone_number
 * @property string $inn
 * @property string $mfo
 * @property string $bank_info
 * @property string $organization_about
 *
 * The followings are the available model relations:
 * @property Category[] $categories
 * @property Product[] $products
 * @property Region[] $regions
 */
class User extends CActiveRecord {

    public $new_password;

    public function tableName() {
        return 'user';
    }

    public function rules() {
        return array(
            array('phone, password', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('phone', 'length', 'max' => 9),
            array('password', 'length', 'max' => 60),
            array('name, surname, organization_name, organization_phone_number', 'length', 'max' => 255),
            array('lang', 'length', 'max' => 2),
            array('role, recover_password, inn, mfo, bank_info, organization_about', 'length', 'max' => 45),
            array('image, organization_image', 'length', 'max' => 18),
            array('id, phone, password, name, surname, lang, role, status, create_time, update_time, authorization_time, recover_password, image, organization_image, organization_name, organization_phone_number, inn, mfo, bank_info, organization_about', 'safe', 'on' => 'search'),
            //
            array('phone', 'unique'),
            array('phone', 'numerical'),
            array('phone', 'length', 'is' => 9),
            array('recover_password, new_password', 'length', 'max' => 255),
            array('password, new_password', 'length', 'min' => 6),
        );
    }

    public function relations() {
        return array(
            'categories' => array(self::HAS_MANY, 'Category', 'user_id'),
            'products' => array(self::HAS_MANY, 'Product', 'user_id'),
            'regions' => array(self::HAS_MANY, 'Region', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'phone' => Yii::t("translation", "phone"),
            'password' => Yii::t("translation", "password"),
            'name' => Yii::t("translation", "name"),
            'surname' => Yii::t("translation", "surname"),
            'lang' => Yii::t("translation", "lang"),
            'role' => Yii::t("translation", "role"),
            'status' => Yii::t("translation", "status"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
            'authorization_time' => Yii::t("translation", "authorization_time"),
            'recover_password' => Yii::t("translation", "recover_password"),
            'image' => Yii::t("translation", "image"),
            'organization_image' => Yii::t("translation", "organization_image"),
            'organization_name' => Yii::t("translation", "organization_name"),
            'organization_phone_number' => Yii::t("translation", "organization_phone_number"),
            'inn' => Yii::t("translation", "inn"),
            'mfo' => Yii::t("translation", "mfo"),
            'bank_info' => Yii::t("translation", "bank_info"),
            'organization_about' => Yii::t("translation", "organization_about"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('lang', $this->lang, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('authorization_time', $this->authorization_time, true);
        $criteria->compare('recover_password', $this->recover_password, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('organization_image', $this->organization_image, true);
        $criteria->compare('organization_name', $this->organization_name, true);
        $criteria->compare('organization_phone_number', $this->organization_phone_number, true);
        $criteria->compare('inn', $this->inn, true);
        $criteria->compare('mfo', $this->mfo, true);
        $criteria->compare('bank_info', $this->bank_info, true);
        $criteria->compare('organization_about', $this->organization_about, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /* ====== ( ===== ) ===== */

    public $list_array = array(
        'phone',
        'name',
        'surname',
        'organization_name',
        'organization_phone_number',
        'inn',
        'mfo',
        'bank_info',
        'organization_about'
    );

    public function defaultScope() {
        return array(
            'order' => 'id DESC',
        );
    }

    protected function beforeSave() {
        $this->phone = preg_replace("/[^0-9]/", '', $this->phone);
        if ($this->isNewRecord) {
            $this->update_time = $this->create_time = date("Y-m-d H:i:s");
            $this->lang = Yii::app()->language;
        } else {
            $this->update_time = date("Y-m-d H:i:s");
            if ($this->scenario == 'password') {
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            }
            if (!empty($this->new_password)) {
                $this->password = password_hash($this->new_password, PASSWORD_DEFAULT);
            }
        }
        foreach ($this->list_array as $value) {
            if (!empty($this->$value)) {
                $this->$value = CHtml::encode($this->$value);
            }
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

    public function listLang() {
        return array(
            'uz' => 'uz',
            'oz' => 'oz',
            'ru' => 'ru',
        );
    }

    public function getFIO() {
        if (!empty($this->surname) || !empty($this->name)) {
            $text = $this->surname . ' ' . $this->name;
        } else {
            $text = $this->phone;
        }
        return $text;
    }

    public function listRole() {
        return array(
            'user' => Yii::t("translation", "user"),
            'administrator' => Yii::t("translation", "administrator"),
        );
    }

    public function getNameRole() {
        $list = array(
            'user' => Yii::t("translation", "user"),
            'administrator' => Yii::t("translation", "administrator"),
        );
        return $list[$this->role];
    }

    public function getLinkImage() {
        $link = NULL;
        if (!empty($this->image)) {
            $link = Yii::app()->request->baseUrl . '/upload_files/' . $this->tableName() . '/' . $this->image;
            $image = CHtml::image($link, $this->image);
            $link = CHtml::link($image, $link);
        }

        return $link;
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

    public function getFirstLetter() {
        $text = '';
        if (!empty($this->surname) || !empty($this->name)) {
            $text = mb_strtoupper(mb_substr($this->surname, 0, 1)) . mb_strtoupper(mb_substr($this->name, 0, 1));
        }
        return $text;
    }

    public function listRegion() {
        $criteria = new CDbCriteria;
        switch (Yii::app()->language) {
            case 'uz':
                $criteria->order = 'title ASC';
                break;
            case 'ru':
                $criteria->order = 'title_ru ASC';
                break;
            case 'oz':
                $criteria->order = 'title_uz ASC';
                break;
            default:
                $criteria->order = 'title ASC';
                break;
        }
        $models = Region::model()->findAll($criteria);
        switch (Yii::app()->language) {
            case 'uz':
                return CHtml::listData($models, 'id', 'title');
                break;
            case 'ru':
                return CHtml::listData($models, 'id', 'title_ru');
                break;
            case 'oz':
                return CHtml::listData($models, 'id', 'title_uz');
                break;
            default:
                return CHtml::listData($models, 'id', 'title');
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
                        $name = $region->title;
                        break;
                    case 'ru':
                        $name = $region->title_ru;
                        break;
                    case 'oz':
                        $name = $region->title_uz;
                        break;
                    default:
                        $name = $region->title;
                        break;
                }
            }
        }
        return $name;
    }

    protected function beforeDelete() {
        return parent::beforeDelete();
    }

    public function behaviors() {
        return array(
            'uploadableFile' => array(
                'class' => 'application.components.UploadableImageBehavior',
                'savePathAlias' => 'webroot.upload_files.' . $this->tableName(),
                'allowEmpty' => TRUE,
                'allowResize' => TRUE,
                'resizeWidth' => 160,
                'resizeHeight' => 160,
            )
        );
    }

    public function getImageLink() {
        $link = NULL;
        if (!empty($this->image)) {
            $link = Yii::app()->params['url'] . '/upload_files/' . $this->tableName() . '/' . $this->image;
        }
        return $link;
    }

}
