<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <script defer src="../js/main.js"></script>
  <title>Bienvenido</title>
</head>
<body>
  <div class="container">
    <main class="main">
      <section class="main-form">
        <form action="arrays/arrays.php" method="POST" id="form">
          <div id="list">
            <div>
              <a href="#" class="btn btn-primary link" id="link">Añadir</a>
            </div>  
            
            <div class="list-group">
              <div class="list-group__name">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="list__name">
              </div>
              <div class="list-group__email">
                <label for="email">Correu Electrònic</label>
                <input type="email" name="mail" id="email" class="list__email">
              </div>
              <div>
                <a href="#" id="eliminar" class="btn btn-danger eliminar">Eliminar</a>
              </div>
            </div>
        
          </div>
    
          <div>
            <button type="submit" class="btn btn-info">Enivar regalos</button>
          </div>
        </form>
      </section>
    </main>
  </div>
</body>
</html>

