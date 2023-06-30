<?php

class SystemClass extends CApplicationComponent {

    public function read_time($text) {
        $content = $text;
        $words_per_minute = "250"; // Время чтения слов в минуту
        $img_per_minute = "12"; // Время чтения изображения в секундах
        $img_numb = preg_match_all('~<img~i', $content, $result_numb); // Плучаем общее количество изображений в тексте
        $text_read = round(count(preg_split('/\s/', $content)) / $words_per_minute, 1); // Получаем общее время чтения текста
        $img_read = floor((count($result_numb[0]) * $img_per_minute) / 60); // Получаем общее время чтения изображений
        $all_read = $img_read + $text_read; // Получаем общее время чтения (текст + изображения)

        return $this->decl_of_numb(round($all_read), array(' минута', ' минуты', ' минут'));
    }

    protected function decl_of_numb($all_numb, $titles) {
        $cases = array(2, 0, 1, 1, 1, 2);
        return $all_numb . " " . $titles[($all_numb % 100 > 4 && $all_numb % 100 < 20) ? 2 : $cases[min($all_numb % 10, 5)]];
    }

    public function read_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function checkUrl($url, $code = '-') {
        $url = (string) $url; // преобразуем в строковое значение
        $url = strip_tags($url); // убираем HTML-теги
        $url = str_replace(array("\n", "\r"), " ", $url); // убираем перевод каретки
        $url = preg_replace("/\s+/", ' ', $url); // удаляем повторяющие пробелы
        $url = trim($url); // убираем пробелы в начале и конце строки
        $url = function_exists('mb_strtolower') ? mb_strtolower($url) : strtolower($url); // переводим строку в нижний регистр (иногда надо задать локаль)

        if ($code == '_') {
            $search = ' ';
            $replace = '_';
            $url = str_replace($search, $replace, $url); // заменяем пробелы знаком минус

            $search = '-';
            $replace = '_';
            $url = str_replace($search, $replace, $url); // заменяем _ знаком минус

            $url = preg_replace('/[^a-z0-9_]/', '', $url); // очищаем строку от недопустимых символов          
        } else {
            $search = ' ';
            $replace = '-';
            $url = str_replace($search, $replace, $url); // заменяем пробелы знаком минус

            $search = '_';
            $replace = '-';
            $url = str_replace($search, $replace, $url); // заменяем _ знаком минус

            $url = preg_replace('/[^a-z0-9-]/', '', $url); // очищаем строку от недопустимых символов            
        }
        // $url = preg_replace("/[^0-9a-z-_ ]/i", "", $url); // был ещё такой вариант

        $url = preg_replace('/(\-){2,}/', '$1', $url);

        return $url;
    }

    // Функция для сжатия изображения под SEO
    public function compressImage($quality = 85, $source, $destination, $width = NULL, $height = NULL) {
        if ($width === NULL && $height === NULL) {
            $command = "convert $source -auto-orient -sampling-factor 4:2:0 -strip -quality $quality -interlace JPEG -colorspace sRGB $destination";
        } else {
            $string = '-resize ' . $width . 'x' . $height;
            $command = "convert $source -auto-orient -sampling-factor 4:2:0 -strip $string -quality $quality -interlace JPEG -colorspace sRGB $destination";
        }
        exec($command, $out, $code);
    }

    // Функция генерации пароля
    public function generatePassword($length = 6) {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    // Функция для записи в лог
    public function addLog($output, $text = NULL) {
        $file_log = str_replace("protected", "log.txt", Yii::app()->basePath);
        $results = print_r($output, true);
        $current = file_get_contents($file_log);
        $current .= date("d.m.Y H:i:s") . ": ********* \n";
        $current .= $text . ": ********* \n";
        $current .= "$results\n";
        $current .= "********* ********* *********\n";
        file_put_contents($file_log, $current);
    }

    // Функция преобразует байты в читаемый человеком размер файла. Например (2,87 Мб)
    function fileSizeConvert($bytes) {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

    // Функция отправки сообщений в телеграм
    public function sendMessageTelegram($text) {
        $bot_token = Yii::app()->params['bot_token'];
        $chat_id = Yii::app()->params['chat_id'];

        $url = 'https://api.telegram.org/bot' . $bot_token . '/sendMessage';
        $array_request = array(
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'HTML'
        );
        $array_request_json = json_encode($array_request);
        //
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array(
            "Content-type: application/json",
            "charset: UTF-8",
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array_request_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Функция для сжатия изображения под SEO - Optimize image image
     * 
     * https://developers.google.com/speed/docs/insights/OptimizeImages
     * -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB
     *
     * @access public
     * @param string $filePath Path of the file
     * @return string Raw image result from the process
     */
    public function optimizeImage($filePath) {
        $file = pathinfo($filePath);

        if (in_array($file['extension'], ['svg'])) {
            return;
        }
        /**
         * Compress image
         */
        if (class_exists("Imagick")) {
            $imagick = new Imagick();

            $rawImage = file_get_contents($filePath);

            $imagick->readImageBlob($rawImage);
            $imagick->stripImage();

            // Define image
            $width = $imagick->getImageWidth();
            $height = $imagick->getImageHeight();

            // Compress image
            $imagick->setImageCompressionQuality(85);

            $image_types = getimagesize($filePath);

            // Get thumbnail image
            $imagick->thumbnailImage($width, $height);

            // Set image as based its own type
            if ($image_types[2] === IMAGETYPE_JPEG) {
                $imagick->setImageFormat('jpeg');

                $imagick->setSamplingFactors(array('2x2', '1x1', '1x1'));

                $profiles = $imagick->getImageProfiles("icc", true);

                $imagick->stripImage();

                if (!empty($profiles)) {
                    $imagick->profileImage('icc', $profiles['icc']);
                }

                $imagick->setInterlaceScheme(Imagick::INTERLACE_JPEG);
                $imagick->setColorspace(Imagick::COLORSPACE_SRGB);
            } else if ($image_types[2] === IMAGETYPE_PNG) {
                $imagick->setImageFormat('png');
            } else if ($image_types[2] === IMAGETYPE_GIF) {
                $imagick->setImageFormat('gif');
            }

            // Save image
            file_put_contents($filePath, $imagick);

            // Destroy image from memory
            $imagick->destroy();
        } else {
            $info = getimagesize($filePath);
            if ($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($filePath);
                //save file
                //ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file). The default is the default IJG quality value (about 75).
                imagejpeg($image, $filePath, 85);
                //Free up memory
                imagedestroy($image);
            }
        }
    }

    /**
     * Обрезает строку до определённого количества символов не разбивая слова.
     * Поддерживает многобайтовые кодировки.
     * @param string $str строка
     * @param int $length длина, до скольки символов обрезать
     * @param string $postfix постфикс, который добавляется к строке
     * @param string $encoding кодировка, по-умолчанию 'UTF-8'
     * @return string обрезанная строка
     */
    public function mbCutString($str, $length, $postfix = '...', $encoding = 'UTF-8') {
        if (mb_strlen($str, $encoding) <= $length) {
            return $str;
        }

        $tmp = mb_substr($str, 0, $length, $encoding);
        return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
    }

    public function checkRecaptcha($response, $remoteip = NULL) {
        $bool = FALSE;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $array_request = array(
            'secret' => Yii::app()->params['recaptcha_v3']['secret_key'],
            'response' => $response,
            'remoteip' => $remoteip,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array(
            "charset: UTF-8",
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array_request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        if (!empty($server_output)) {
            $array_output = json_decode($server_output, true);
            if (is_array($array_output)) {
                if ($array_output['success'] == 1) {
                    if ($array_output['score'] > Yii::app()->params['recaptcha_v3']['score']) {
                        $bool = TRUE;
                    }
                }
            }
        }
        return $bool;
    }

    public function smsSend($phone, $text) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sms.etc.uz:8084/json2sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "login" => Yii::app()->params['sms']['login'],
            "pwd" => Yii::app()->params['sms']['pass'],
            "CgPN" => Yii::app()->params['sms']['id'],
            "CdPN" => $phone,
            "text" => $text
        ]));
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
    }

    public function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d') {
        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);
        while ($current <= $last) {
            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }
        return $dates;
    }

}
