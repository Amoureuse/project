<?php

function filterUrl($alias = null, $param = null, $id = null)
{
    $urls = [];
    $gets = $_GET;
    if ($param) {
        $gets[$param] = $id;
    }
    foreach ($gets as $key => $val) {
        if ($key != "category/$alias" && $key !='home/search') {
            $urls[] = $key.'='.$val;
        }
    }
    if (isset($gets['home/search'])) {
        $url = "http://myproject/home/search?" . join('&', $urls);
    } else {
        $url = "http://myproject/category/" . $alias. "?" . join('&', $urls);
    }
    
    return $url;
}

function memUrl($data = false)
{
    if ($data) {
        $_SESSION['url'] = $data;
    } else {
        $url = $_SESSION['url'];
        $_SESSION['url'] = '';
        return $url;
    }    
}

function limitStr($str, $n = 20)
{
    $array = explode(' ', $str);
    $result = ''; // = пустая строка для добавления элементов масива пошагово.
    foreach ($array as $word) {
        $result .= ' ' . $word;
        if (strlen($result) >= $n) {
            $string = $result . ' ...';
            break;
        } else {
            $string = $result;
        }
    }
    return $string;
}

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
} 

function redirect($str = false)
{
    if ($str) {
        $redirect = $str;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: $redirect");
    exit;
}
    
function splashMessage($data = false, $class = 'info')
{
    if ($data) {
        $_SESSION['error'] = $data;
        $_SESSION['error_class'] = $class;
    } else {
        $message['data'] = isset($_SESSION['error']) ? $_SESSION['error'] : '';
        $message['class'] = isset($_SESSION['error_class']) ? $_SESSION['error_class'] : '';
        $_SESSION['error'] = '';
        $_SESSION['error_class'] = '';
        return $message;
    }
}

function oldData($data = false)
{
    if ($data) {
        $_SESSION['form_data'] = $data;
    } else {
        $oldData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : '';
        $_SESSION['form_data'] = '';
        return $oldData;
    }
}

function str2url($str)
{
        // переводим в транслит
    $str = rus2translit($str);
        // в нижний регистр
    $str = strtolower($str);
        // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}

function rus2translit($string)
{
    $converter = array(

        'а' => 'a',   'б' => 'b',   'в' => 'v',

        'г' => 'g',   'д' => 'd',   'е' => 'e',

        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

        'и' => 'i',   'й' => 'y',   'к' => 'k',

        'л' => 'l',   'м' => 'm',   'н' => 'n',

        'о' => 'o',   'п' => 'p',   'р' => 'r',

        'с' => 's',   'т' => 't',   'у' => 'u',

        'ф' => 'f',   'х' => 'h',   'ц' => 'c',

        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',



        'А' => 'A',   'Б' => 'B',   'В' => 'V',

        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

        'И' => 'I',   'Й' => 'Y',   'К' => 'K',

        'Л' => 'L',   'М' => 'M',   'Н' => 'N',

        'О' => 'O',   'П' => 'P',   'Р' => 'R',

        'С' => 'S',   'Т' => 'T',   'У' => 'U',

        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

    );

    return strtr($string, $converter);

}



