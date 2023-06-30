<?php

class LoginForm extends CFormModel {

    public $username;
    public $password;
    public $rememberMe;
    private $_identity;

    public function rules() {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate', 'on' => 'authorization'),
            //
            array('username', 'numerical'),
            array('username', 'length', 'is' => 9),
            array('password', 'length', 'min' => 6),
        );
    }

    public function attributeLabels() {
        return array(
            'rememberMe' => Yii::t("translation", "remember_me_next_time"),
            'username' => Yii::t("translation", "phone"),
            'password' => Yii::t("translation", "password"),
        );
    }

    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if (!$this->_identity->authenticate())
                $this->addError('password', Yii::t("translation", "username_password_error"));
        }
    }

    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

    protected function beforeValidate() {
        $this->username = preg_replace("/[^0-9]/", '', $this->username);
        return parent::beforeValidate();
    }

}
