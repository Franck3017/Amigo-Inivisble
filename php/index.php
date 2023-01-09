<?php
  session_start();
  $user = $_POST['username'];
  $mail = $_POST['email'];
  $_SESSION['username'] = $user;
  $_SESSION['email'] = $mail;

  $session_id = session_id();

  if(!isset($user) && !isset($mail)){
    header('Location: ../index.html?error=1');
  }
  // session_destroy();  // Destruye toda la información asociada con la sesión actual. No destruye ninguna de las variables globales asociadas con la sesión, ni destruye la COOKIE de sesión.
  // session_abort();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <!-- <script defer src="../js/dist/confetti.js" type="module"></script> -->
  <script defer src="../js/main.js"></script>
  <title>Bienvenido</title>
</head>
<body>
  <div class="container">
    <main class="main">
      <section>
        <h1 class="title">Bienvenido <?= $_SESSION['username'] ?></h1>
        <p class="description">
          Añade los nombres y correos de los participantes y haz click en enviar regalos.
        </p>
      </section>
      <section class="main-form">
        <form action="arrays/arrays.php" method="POST" id="form">
          <div id="list" class="list">
            <div class="groups">
              <div class="list-group">
                <div class="list-group__name">
                  <label for="name">Nom</label>
                  <input type="text" name="name[]" id="name" class="list__name">
                </div>
                <div class="list-group__email">
                  <label for="email">Correu Electrònic</label>
                  <input type="email" name="mail[]" id="email" class="list__email">
                </div>
                <div class="list-group__trash">
                  <a href="#" id="eliminar" class="btn btn-danger eliminar">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="container-button">
            <a href="#" class="añadir" id="añadir">
              Añadir
            </a>
            <button type="submit" id="send" class="enviar">
              <span>
                Enviar regalos
              </span>
            </button>
          </div>
        </form>
      </section>
    </main>
  </div>
</body>
</html>

