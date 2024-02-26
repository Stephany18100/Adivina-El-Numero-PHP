
<!DOCTYPE html>
<html>
<head>
  <!-- Agregar el enlace al CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <title>Juego de adivinar un número</title>
</head>
<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-body">
        <h1 class="card-title text-center">Juego de adivinar un número</h1>
        <p class="card-text text-center">Estoy pensando en un número entre 1 y 10.</p>
        <form method="post">
          <div class="form-group">
            <label for="num">Adivina un número (1-10):</label>
            <input type="number" name="num" id="num" min="1" max="10" autofocus class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" value="Adivinar" class="btn btn-primary mt-3">
          </div>
        </form>

        <?php

      session_start();

      if (!isset($_SESSION['rand_num'])) { //crea un numero aleaotero
        $_SESSION['rand_num'] = rand(1, 10);
        
      }
      echo $_SESSION['rand_num'];
      if (!isset($_SESSION['count'])) {  //inicia el contador de intentos
        $_SESSION['count'] = 0;
      }

      if (isset($_POST['num'])) {  //otener el numero que se ingresa
        $user_num = $_POST['num'];

        if ($user_num == $_SESSION['rand_num']) { //compara el numero con el aleatoreo
          echo "<p class='text-center text-success'>¡Felicidades! Has adivinado el número correctamente en {$_SESSION['count']} intentos.</p>";
          session_destroy();
        } else {
          //pistas
          $_SESSION['count']++;
          if ($user_num < $_SESSION['rand_num']) {
            echo "<p class='text-center text-info'>El número es mayor que $user_num.</p>";
          } else {
            echo "<p class='text-center text-info'>El número es menor que $user_num.</p>";
          }
        }
      }
      ?>
      </div>
    </div>
  </div>
</body>
</html>
