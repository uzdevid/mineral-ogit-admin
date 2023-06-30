<?php

/**
 * @property string $savePath путь к директории, в которой сохраняем файлы
 */
class UploadableFileBehavior extends CActiveRecordBehavior {

    /**
     * @var string название атрибута, хранящего в себе имя файла и файл
     */
    public $attributeName = 'file';

    /**
     * @var string алиас директории, куда будем сохранять файлы
     */
    public $savePathAlias = 'webroot.upload_files';

    /**
     * @var array сценарии валидации к которым будут добавлены правила валидации
     * загрузки файлов
     */
    public $scenarios = array('insert', 'update');

    /**
     * @var string типы файлов, которые можно загружать (нужно для валидации)
     */
    public $fileTypes = 'doc,docx,xls,xlsx,pdf';
    public $allowEmpty = FALSE;
    public $saveFileName = FALSE;

    /**
     * Шорткат для Yii::getPathOfAlias($this->savePathAlias).DIRECTORY_SEPARATOR.
     * Возвращает путь к директории, в которой будут сохраняться файлы.
     * @return string путь к директории, в которой сохраняем файлы
     */
    public function getSavePath() {
        return Yii::getPathOfAlias($this->savePathAlias) . DIRECTORY_SEPARATOR;
    }

    public function attach($owner) {
        parent::attach($owner);

        if (in_array($owner->scenario, $this->scenarios)) {
            // добавляем валидатор файла            
            if ($owner->scenario === 'insert') {
                $fileValidator = CValidator::createValidator('file', $owner, $this->attributeName, array('types' => $this->fileTypes, 'allowEmpty' => $this->allowEmpty));
            }
            if ($owner->scenario === 'update') {
                $fileValidator = CValidator::createValidator('file', $owner, $this->attributeName, array('types' => $this->fileTypes, 'allowEmpty' => TRUE));
            }
            $owner->validatorList->add($fileValidator);
        }
    }

    public function beforeSave($event) {
        $file = CUploadedFile::getInstance($this->owner, $this->attributeName);

        if ($this->owner->isNewRecord) {
            if (!empty($file)) {
                if ($this->saveFileName) {
                    $fileName = $file->name;
                } else {
                    $uniq = uniqid();
                    $format = mb_strtolower(preg_replace("/.*?\./", '', $file->name));
                    $fileName = $uniq . '.' . $format;
                }
                $this->owner->setAttribute($this->attributeName, $fileName);
                $file->saveAs($this->savePath . $fileName);
            }
        } else {
            $model_name = get_class($this->owner);
            $model = $model_name::model()->findByPk($this->owner->id);
            $attribute = $this->attributeName;
            $model_attribute = $model->$attribute;

            if (!empty($file)) {
                if (!empty($model_attribute)) {
                    $this->deleteFile($model_attribute);
                }
                if ($this->saveFileName) {
                    $fileName = $file->name;
                } else {
                    $uniq = uniqid();
                    $format = mb_strtolower(preg_replace("/.*?\./", '', $file->name));
                    $fileName = $uniq . '.' . $format;
                }
                $this->owner->setAttribute($this->attributeName, $fileName);
                $file->saveAs($this->savePath . $fileName);
            } else {
                if (!empty($model_attribute)) {
                    $this->owner->setAttribute($this->attributeName, $model_attribute);
                    $fileName = $model_attribute;
                } else {
                    $this->owner->setAttribute($this->attributeName, NULL);
                    $fileName = NULL;
                }
            }
        }

        return TRUE;
    }

    public function beforeDelete($event) {
        $this->deleteFile();
    }

    public function deleteFile($model_attribute = NULL) {
        if (!empty($model_attribute)) {
            $filePath = $this->savePath . $model_attribute;
        } else {
            $filePath = $this->savePath . $this->owner->getAttribute($this->attributeName);
        }
        if (@is_file($filePath))
            @unlink($filePath);
    }

}
