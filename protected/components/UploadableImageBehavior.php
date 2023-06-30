<?php

/**
 * @property string $savePath путь к директории, в которой сохраняем файлы
 */
class UploadableImageBehavior extends CActiveRecordBehavior {

    /**
     * @var string название атрибута, хранящего в себе имя файла и файл
     */
    public $attributeName = 'image';

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
    // public $fileTypes = 'doc,docx,xls,xlsx,odt,pdf';
    public $fileTypes = 'jpeg, jpg, png, gif, svg';
    public $allowEmpty = FALSE;
    public $allowThumbnail = FALSE; // Создаем уменьшенную копию фото 
    public $allowResize = FALSE; // Делаем обрезание исходного фото
    public $resizeWidth = 500;
    public $resizeHeight = 500;
    public $thumbnailWidth = 100;
    public $thumbnailHeight = 100;
    public $checkSize = FALSE; // Делаем проверку на загрузку фото
    public $checkSizeWidth = 1200;
    public $checkSizeHeight = 1200;

    /**
     * Шорткат для Yii::getPathOfAlias($this->savePathAlias).DIRECTORY_SEPARATOR.
     * Возвращает путь к директории, в которой будут сохраняться файлы.
     * @return string путь к директории, в которой сохраняем файлы
     */
    public function getSavePath() {
        return Yii::getPathOfAlias($this->savePathAlias) . DIRECTORY_SEPARATOR;
    }

    public function getSavePathThumbnail() {
        return Yii::getPathOfAlias($this->savePathAlias . '.thumbnail') . DIRECTORY_SEPARATOR;
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

    public function beforeValidate($event) {
        if ($this->checkSize) {
            $file = CUploadedFile::getInstance($this->owner, $this->attributeName);
            if ($file === NULL) {
                
            } else {
                $size = getimagesize($file->tempName);
                if ($size[0] == $this->checkSizeWidth && $size[1] == $this->checkSizeHeight) {
                    
                } else {
                    $this->owner->addError($this->attributeName, Yii::t("translation", "the_image_should_be") . ' (' . Yii::t("translation", "width_and_height") . ')' . ': ' . $this->checkSizeWidth . 'x' . $this->checkSizeHeight);
                }
            }
        }
    }

    public function beforeSave($event) {
        $file = CUploadedFile::getInstance($this->owner, $this->attributeName);

        if ($this->owner->isNewRecord) {
            if (!empty($file)) {
                $uniq = uniqid();
                $format = mb_strtolower(preg_replace("/.*?\./", '', $file->name));
                $fileName = $uniq . '.' . $format;
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
                $uniq = uniqid();
                $format = mb_strtolower(preg_replace("/.*?\./", '', $file->name));
                $fileName = $uniq . '.' . $format;
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
        if (isset($fileName)) {
            $source_url = $this->savePath . $fileName;
            Yii::app()->SystemClass->optimizeImage($source_url);
        }

        if ($this->allowResize) {
            if (isset($fileName)) {
                $image = new EasyImage($this->savePath . $fileName);
                $image->resize($this->resizeWidth, $this->resizeHeight);
                $image->thumbOf($this->savePath . $fileName, array('scaleAndCrop' => array('width' => $this->resizeWidth, 'height' => $this->resizeHeight)));
                $image->save($this->savePath . $fileName);
                //
                $source_url = $this->savePath . $fileName;
                Yii::app()->SystemClass->optimizeImage($source_url);
            }
        }

        if ($this->allowThumbnail) {
            if (isset($fileName)) {
                $image = new EasyImage($this->savePath . $fileName);
                $image->resize($this->thumbnailWidth, $this->thumbnailHeight);
                $image->thumbOf($this->savePath . $fileName, array('scaleAndCrop' => array('width' => $this->thumbnailWidth, 'height' => $this->thumbnailHeight)));
                $image->save($this->savePathThumbnail . $fileName);
                //               
                $destination_url = $this->savePathThumbnail . $fileName;
                Yii::app()->SystemClass->optimizeImage($destination_url);
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
            $filePathThumbnail = $this->savePathThumbnail . $model_attribute;
        } else {
            $filePath = $this->savePath . $this->owner->getAttribute($this->attributeName);
            $filePathThumbnail = $this->savePathThumbnail . $this->owner->getAttribute($this->attributeName);
        }
        if ($this->allowThumbnail) {
            if (@is_file($filePathThumbnail))
                @unlink($filePathThumbnail);
        }
        if (@is_file($filePath))
            @unlink($filePath);
    }

}
