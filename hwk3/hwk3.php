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
var_dump("Задание 1.", getCamelCase($string));

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
var_dump("Задание 2.", getFileName2($string));

/*Дано два текста. Определите степень совпадения текстов
(придумать алгоритм определения соответствия, использовать 5 балльную шкалу).*/
$text11 = "Кукушка. кукушонку купила капюшонку";
$text22 = "Коко. кокушонку/ :купила, капу, коку";
function textCompare($text1, $text2) {
//сравнение строк
  $percArr = [];
  if (strlen($text1) > strlen($text2)) {
  similar_text($text2, $text1, $comp);
  $percArr[] = $comp;
  } else {
  similar_text($text1, $text2, $comp);
  $percArr[] = $comp;
  };
//  var_dump($percArr);
// сравнение слов в строке
  $arr1 = preg_split("/[\s,!?:;.\/]+/", $text1);
  //var_dump($arr1);
  $arr2 = preg_split("/[\s,!?:;.\/]+/", $text2);
  //var_dump($arr2);
  if(count($arr1) > count($arr2)) {
    $maxCount = count($arr1);
  } else { $maxCount = count($arr2);
  }
  //var_dump($maxCount);
for ($i=0; $i < $maxCount; $i++) {
  if (strlen($arr1[$i]) > strlen($arr2[$i])) {
  similar_text($arr2[$i], $arr1[$i], $comp);
  $percArr[] = $comp;
} else {similar_text($arr1[$i], $arr2[$i], $comp);
  $percArr[] = $comp;
  }
}
  //var_dump($percArr);
  $percAver = array_sum($percArr)/count($percArr);
//  var_dump($percAver);
  // баллы
switch ($percAver) {
    case $percAver < 20:
        $rating = "Соответствие текстов - 1 балл";
        break;
    case $percAver < 40:
        $rating = "Соответствие текстов - 2 балла";
        break;
    case $percAver < 60:
        $rating = "Соответствие текстов - 3 балла";
        break;
    case $percAver < 80:
        $rating = "Соответствие текстов - 4 балла";
        break;
    case $percAver < 100:
        $rating = "Соответствие текстов - 5 баллов";
        break;
    }
    return $rating;
  }
  var_dump("Задание 3. ",textCompare($text11, $text22));
