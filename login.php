<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: /VeterinariaProyecto');
}
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: /VeterinariaProyecto");
  } else {
    $message = 'LOS DATOS INGRESADOS FUERON INCORRECTOS';
  }
}

  ?>
<!DOCTYPE html>
<html>
  <head>
  <!--  
  <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
-->

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>

    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/styles.css" as="style">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">

            <a href="index.php">Inicio</a>
            <a href="signup.php">Registrarte</a>
            <a href="login.php">Iniciar Sesión</a>
          

        </nav>
    </div>


    <section class="imagenn">
        <div class="contenido-imagenn">
            <h2>¿Ya tienes una cuenta?</h2>
            <h3 style="color: white;">Crea una cuenta y registra a tu mascota</h3>
            <p>
            
            <a class="boton" href="signup.php">Registrarte</a>
        </p>
        </div>

    </section>


    <h1>Login</h1>
  

    <?php if(!empty($message)): ?>
      <p> <h3 style="color: red; font-size:2.8rem;"> <?= $message ?></h3></p>
    <?php endif; ?>


    
    <form class="formulario" action="login.php" method="POST">
      <label>Ingresar tu email:</label>
      <p><input class="input-text"  name="email" type="email" placeholder="Enter your email"></p>
      <label>Ingresar tu contraseña:</label>
      <p><input class="input-text"  name="password" type="password" placeholder="Enter your Password"></p>
      <input class="boton" type="submit" value="Iniciar Sesión">
    </form>
    <footer class="footer">

<p>Todos los derecehos reservados. Registro Canino 2022</p>

</footer>

  </body>
</html>
