<?php
function limitStr($str, $n = 20) {
  $array = explode(' ' , $str);
  $result = ''; // = пустая строка для добавления элементов масива пошагово.
  foreach ($array as $word) {
    $result .= ' ' . $word;
    if(strlen($result) >= $n){
      $string = $result . ' ...';
      break;
    }
    else{
      $string = $result;
    }
  }
  return $string;
}
function debug($arr){
  echo '<pre>' . print_r($arr, true) . '</pre>';
} 

function redirect($str){
    header("Location:" . "$str" );
    exit;
}
    
function splashMessage($error){
        $_SESSION['error'] = $error;
}  

function oldData($oldData){
    $_SESSION['form_data'] = $oldData;
    }



