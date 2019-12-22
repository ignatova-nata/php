<?php
$post = $_POST;
//var_dump($post);

$files = $_FILES;
var_dump($files);

/*foreach ($files['picture']['name'] as $key => $value) {
  $file_name[] = $files['picture']['name'][$key];
  $ext[] = pathinfo($files['picture']['name'][$key], PATHINFO_EXTENSION);
}
  var_dump($ext,$file_name);*/

foreach ($files['picture']['name'] as $key => $value) {
  if ($files['picture']['size'][$key] >= 8000)
  {
    $new_name[] = md5($files['picture']['name'][$key]) . "." . pathinfo($files['picture']['name'][$key], PATHINFO_EXTENSION);
  } else  {
    $new_name[] = null;
  }
}
//var_dump($new_name);
foreach ($new_name as $key => $value) {
  if ($new_name[$key] !== null) {
      move_uploaded_file($files['picture']['tmp_name'][$key], "img2/$new_name[$key]");
      echo "файл " . $files['picture']['name'][$key] . " загружен <br>";
    }
}
