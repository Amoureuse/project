<?php
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

function redirect($str)
{
    header("Location:" . "$str" );
    exit;
}
    
function splashMessage($data = false, $class = 'info')
{
    if ($data) {
        $_SESSION['error'] = $data;
        $_SESSION['error_class'] = $class;
    } else {
        $message['data'] = $_SESSION['error'];
        $message['class'] = $_SESSION['error_class'];
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
        $oldData = $_SESSION['form_data'];
        $_SESSION['form_data'] = '';
        return $oldData;
    }
}



