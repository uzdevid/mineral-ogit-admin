<?php

class WebUser extends CWebUser {

    private $_model = null;

    function getRole() {
        if ($user = $this->getModel()) {
            return $user->role;
        }
    }

    function getName() {
        if ($user = $this->getModel()) {
            return $user->FIO;
        }
    }

    private function getModel() {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role, name, surname, phone'));
        }
        return $this->_model;
    }

}
