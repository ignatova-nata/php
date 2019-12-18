<?php
/*Создать функцию по преобразованию нотаций: строка вида 'this_is_string'
преобразуется в 'thisIsString' (CamelCase-нотация)*/
function getCamelCase($some_string) {
  $changeArr = array("_" => " ");
  $changeArr2 = array(" " => "");
  if (!is_string($some_string)) {
    echo "Введите строку <br>";
    return false;
  }
  if (is_string($some_string)) {
    $new_string = lcfirst(
                    strtr(
                      ucwords(
                          strtr($some_string, $changeArr))
                              , $changeArr2));
  } return $new_string;
}
$string = 'this_is_string';
var_dump(getCamelCase($string));

/*Дана строка, содержащая полное имя файла
(например, 'C:\OpenServer\testsite\www\someFile.txt'). Написать функцию,
 которая сможет выделить из подобной строки имя файла без расширения.*/

 $string ='C:\OpenServer\test site\www\someFile.txt';

/*  function getFileName($full_file_name) : string {
    $arr =  explode("\\", $full_file_name);
    $arr2 = explode(".",$arr[count($arr) - 1]);
    return $arr2[0];
  }
 var_dump(getFileName($string));*/

 function getFileName2($full_file_name) : string {
   //$arr2 = explode(".",(explode("\\", $full_file_name)[count(explode("\\", $full_file_name)) - 1]));
   return (explode(".",(explode("\\", $full_file_name)[count(explode("\\", $full_file_name)) - 1])))[0];
 }
var_dump(getFileName2($string));
