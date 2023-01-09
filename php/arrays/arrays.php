<?php
  require '../proccesa.php';
  $array = [];

  $name = $_POST['name'];
  $mail = $_POST['mail'];

  $respuesta = $_POST;
  
  if(isset($name) && isset($mail)){

    for ($i=0; $i < count($respuesta['name']); $i++) { 
      $tmp = [$respuesta['name'][$i], $respuesta['mail'][$i]];
      array_push($array, $tmp);
    }
  }

  $posibilidades = $array;
  shuffle($posibilidades);

  foreach ($array as $key => $participante){
    
    $sorteado = false;
    
    while(!$sorteado){
      $resultado = rand(0, count($posibilidades) - 1);
      
      if($posibilidades[$resultado][1] != $participante[1]){
        $array[$key]['amigo'] = $posibilidades[$resultado][0];
        unset($posibilidades[$resultado]);
        shuffle($posibilidades);
        $sorteado = true;

      }else if (count($posibilidades) == 1){
        $array[$key]['amigo'] = $array[0]['amigo'];
        $array[0]['amigo'] = $array[$key];
        $sorteado = true;

      }
    }
  }

foreach ($array as $key => $value) {
  $html = '
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Amig@ Invicible</title>
  </head>
  <body>
  <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">
    <img src="https://i.postimg.cc/4NKxhcdJ/image.png" width="1" height="1" alt="" style="color:red;">
  </div>
  <div style="max-width:600px; margin:0 auto;">
    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
      style="margin:auto;">
      <tbody>
        <tr>
          <td style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td style="text-align: center;">
                    <h1>¡Feliz Navidad!</h1>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                    <div class="text">
                      <p>Hola ' . $value[0] . ',</p>
                      <p>Te deseamos una 🎅Fel🎄z Navidad🤶 y un Prospero Año Nuevo 🎁😁</p>
                      <p>Tu amigo secreto es ' . $value['amigo'] . ' !Felices Fiestas!</p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: center;">
                    <div class="text-author">
                      <h3 class="name">El equipo de Secret Santa</h3>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>  
  ';
  $email = $value[1];
  sendEmail($email, $html);
}

?>