<?php

  $gifts = ['lapiz', 'movil', 'plantas', 'chocolate','bocata', 'cafe'];
  $random_gifts = array_rand($gifts, 1);
  $array = [];

  $name = $_POST['name'];
  $mail = $_POST['mail'];

  if(isset($name) && isset($mail)){
    array_push($array, $name, $mail, $gifts[$random_gifts]);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>
    Regalos
  </h1>
  <ul>
    <?php foreach($array as $key => $value): ?>
      <li>
        <?= $key . ': ' . $value; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>