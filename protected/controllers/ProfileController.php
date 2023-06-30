<?php

class ProfileController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'update'),
                'roles' => array('user'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index', array('model' => $model));
    }

    public function actionUpdate() {
        $model = User::model()->findByPk(Yii::app()->user->id);
        $role = $model->role;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->role = $role;
            if ($model->save())
                $this->redirect(array('index'));
        }
        $this->render('update', array('model' => $model));
    }

}
