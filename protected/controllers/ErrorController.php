<?php

class ErrorController extends Controller {

    public function actionIndex() {
        if ($error = Yii::app()->errorHandler->error) {
            $this->pageTitle = Yii::t("translation", "error");
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderPartial('index', $error);
        }
    }

}
