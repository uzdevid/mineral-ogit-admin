<?php

class TranslitClass extends CApplicationComponent {

    public $latinToCyrillicArray = array(
        "A" => "A",
        "a" => "а",
        "B" => "Б",
        "b" => "б",
        "D" => "Д",
        "d" => "д",
        "E" => "Е",
        "e" => "е",
        "F" => "Ф",
        "f" => "ф",
        "G" => "Г",
        "g" => "г",
        "H" => "Ҳ",
        "h" => "ҳ",
        "I" => "И",
        "i" => "и",
        "J" => "Ж",
        "j" => "ж",
        "K" => "К",
        "k" => "к",
        "L" => "Л",
        "l" => "л",
        "M" => "М",
        "m" => "м",
        "N" => "Н",
        "n" => "н",
        "O" => "О",
        "o" => "о",
        "P" => "П",
        "p" => "п",
        "Q" => "Қ",
        "q" => "қ",
        "R" => "Р",
        "r" => "р",
        "S" => "С",
        "s" => "с",
        "T" => "Т",
        "t" => "т",
        "U" => "У",
        "u" => "у",
        "V" => "В",
        "v" => "в",
        "X" => "Х",
        "x" => "х",
        "Y" => "Й",
        "y" => "й",
        "Z" => "З",
        "z" => "з",
        "Ch" => "Ч",
        "ch" => "ч",
        "Sh" => "Ш",
        "sh" => "ш",
        "ng" => "нг",
    );
    public $latinToCyrillicArray2 = array(
        "Ts" => "Ц",
        "ts" => "ц",
        "Yo" => "Ё",
        "yo" => "ё",
        "Yu" => "Ю",
        "yu" => "ю",
        "Ya" => "Я",
        "ya" => "я",
    );
    public $latinToCyrillicArray3 = array(
        "'" => "ʻ",
        "‘" => "ʻ",
        "’" => "ʼ",
    );
    public $latinToCyrillicArray4 = array(
        "G’" => "Ғ",
        "g’" => "ғ",
        "O’" => "Ў",
        "o’" => "ў",
        "Gʻ" => "Ғ",
        "gʻ" => "ғ",
        "Oʻ" => "Ў",
        "oʻ" => "ў",
        "Gʼ" => "Ғ",
        "gʼ" => "ғ",
        "Oʼ" => "Ў",
        "oʼ" => "ў",
        "ʼ" => "ь",
        "ʼ" => "ъ",
    );
    public $latinToCyrillicArray5 = array(
        "E" => "Э",
        "e" => "э",
    );

    // Функция для конвертирования с латиницы в кирилицу
    public function convert($text, $convert_to_lang = FALSE) {
        $text = trim($text);
        $text_min = substr($text, 0, 1);
        if ($convert_to_lang) {
            $encoding = 'UTF-8';
        } else {
            $encoding = mb_detect_encoding($text_min);
        }


        $array = $this->latinToCyrillicArray;
        $array2 = $this->latinToCyrillicArray2;
        $array3 = $this->latinToCyrillicArray3;
        $array4 = $this->latinToCyrillicArray4;
        $array5 = $this->latinToCyrillicArray5;

        $string = NULL;

        $text = preg_replace("/  +/", " ", $text); // вместо Х поставьте пробел

        if ($encoding == 'ASCII') {
            // ASCII - это латиница на кирилицу    
            $string = strtr($text, $array3);
            $string = strtr($string, $array4);
            $string = strtr($string, $array2);
            $string = strtr($string, $array);
            $string = strtr($string, $array5);
            $vowels = array("ʻ");
            $string = str_replace($vowels, "ъ", $string);
        } else {
            // UTF-8 - это кирилица на латиницу         
            $array = array_flip($array);
            $array2 = array_flip($array2);
            $array3 = array_flip($array3);
            $array4 = array_flip($array4);
            $array5 = array_flip($array5);

            $text = preg_replace('/^(ц)/um', 'с', $text);
            $text = preg_replace('/( ц)/um', ' с', $text);
            $text = preg_replace('/^(е)/um', 'ye', $text);
            $text = preg_replace('/( е)/um', ' ye', $text);

            $text = preg_replace('/^(Ц)/um', 'С', $text);
            $text = preg_replace('/( Ц)/um', ' С', $text);
            $text = preg_replace('/^(Е)/um', 'Ye', $text);
            $text = preg_replace('/( Е)/um', ' Ye', $text);

//            $string = strtr($text, $array3);
            $string = strtr($text, $array4);
            $string = strtr($string, $array2);
            $string = strtr($string, $array);
            $string = strtr($string, $array5);
            $vowels = array("’");
            $string = str_replace($vowels, "", $string);
        }

        return $string;
    }

}
