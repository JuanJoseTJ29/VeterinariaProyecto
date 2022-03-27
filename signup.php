<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['usuarioNombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (usuarioNombre,email, password) VALUES (:usuarioNombre, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuarioNombre', $_POST['usuarioNombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Cuenta creada con éxito';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <!--
    <meta charset="utf-8">
    <title>Signup</title>
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
  <header style=" color: rgba(61, 105, 202, 0.616); ">
        <h1 class="titulo">REGISTRO CANINO 🐶 </h1>
    </header>
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">

            <a href="index.php">Inicio</a>
            <a href="signup.php">Registrarte</a>
            <a href="login.php">Iniciar sesión</a>
          

        </nav>
    </div>


    <section class="imagenn">
        <div class="contenido-imagenn">
            <h2>¿Ya tienes una cuenta?</h2>
            <h3 style="color: white;">Crea una cuenta y registra a tu mascota</h3>
            <p>
            
            <a class="boton" href="login.php">Iniciar Sesión</a>
        </p>
        </div>

    </section>



  <?php if(!empty($message)): ?>
      <p><h3 style="color: rgb(61, 106, 202); font-size:2.8rem;"> <?= $message ?></h3></p>
    <?php endif; ?>

  <h1>Registro</h1>
  

  <form class="formulario" action="signup.php" method="POST">
    <label>Ingresa tu usuario:</label>
      <p><input class="input-text" name="usuarioNombre" type="text" placeholder="Ingresa tu usuario"></p>
      <label>Ingresa tu email:</label>
      <p><input class="input-text" name="email" type="email" placeholder="Ingresa tu email"></p>
      <label>Ingresa tu contraseña:</label>
      <p><input class="input-text"  name="password" id="password" pattern= "([A-Za-z]+[0-9]{0,2}[#$%&/]{0,2}){4,}"  title="Usa mas de 8 caracteres" type="password" placeholder="Enter your Password"></p>
      <input class="boton" type="submit" value="Registrar">

    </form>

    <footer class="footer">                         

<p>Todos los derecehos reservados. Registro Canino 2022</p>

</footer>

  </body>
</html>