<?php

class LoginController extends Controller {

    public function filters() {
        return array(
            'ajaxOnly + ajax',
        );
    }

    public function actionIndex() {

        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->pageTitle = Yii::t("translation", "login");
        $this->renderPartial('index', array('model' => $model));
    }

    public function actionAjax() {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new LoginForm;

            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                if ($model->validate() && $model->login()) {
                    $this->renderPartial('_view');
                }
            }
        }
    }

}
