<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuarioNombre, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO CANINO</title>

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

<?php if(!empty($user)): ?>

    <!-- LA VERSION LOGUEADO-->

    <header style=" color: rgba(61, 105, 202, 0.616); ">
        <h1 class="titulo">REGISTRO CANINO 🐶 </h1>
    </header>
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">

            <a href="index.php">Inicio</a>
            <a href="RegistrarPerro.php">Registro Canino</a>
            <a href="FormConsultarPerro.php">Consulta tu mascota </a>
            <a href="logout.php">Cerrar Sesión</a>

            
            


        </nav>
    </div>


    <section class="imagenn5">
        <div class="contenido-imagenn">
            <h2>Mi Mascota </h2>

            <a class="boton" href="FormConsultarPerro.php">Consulta</a>
        </div>

    </section>


<form class="formulario" action="Registrar_perro.php" method="POST" enctype="multipart/form-data" >
<h4>Registro de Identificación Perruno</h4>
<label>Ingresar Código</label>
<p><Input class="input-text" name = "Codigo" Type Text></p>
<label>Ingresar Nombre</label>
<p><Input class="input-text" name = "Nombre" Type Text></p>
<label>Fecha de Nacimiento</label>
<p><Input class="input-text" name= "FechNac" Type = "Date"></p>
<label>Género</label>
<Input name="Genero" Type = "Radio" Value=1> Macho
<Input name= "Genero" Type = "Radio" Value=0> Hembra</p>
<label>Seleccione Raza</label>
<Select name = "Raza">
<Option value = "Pitbull"> Pitbull
<Option value = "Bulldog"> Bulldog
<Option value = "Shichu"> Shichu
<Option value = "Pequines"> Pequines
<Option value = "San Bernardo"> San Bernardo
<Option value = "Chiguahua"> Chiguahua
<p></Select></p>
<label>Subir Foto</label>
<Input  type = "file" id="Foto" name = "Foto"> <br><br>
<Input class="boton" name= "Registrar" Type = Submit value = "Registrar">
<Input class="boton2" Type = "reset" value = "Cancelar"></p>
</form>

<footer class="footer">

    <p>Todos los derecehos reservados. Registro Canino 2022</p>

</footer>


</body>

<!-- LA VERSION SIN LOGUEARSE-->

<?php else: ?>
    <header style=" color: rgba(61, 105, 202, 0.616); ">
        <h1 class="titulo">REGISTRO CANINO 🐶 </h1>
    </header>
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
            <a class="boton" href="signup.php">Registrate</a>
            <a class="boton" href="login.php">Iniciar Sesión</a>
        </p>
        </div>

    </section>

    <h2>¿POR QUÉ DEBES REGISTRAR TU MASCOTA?</h2>


<div class="servicios1">

    <section class="servicio">
       
        <div class="foto">
         <img src="https://s03.s3c.es/imag/_v0/770x420/8/f/d/600x400_documento-identidad-nacional-dni-mascotas.jpg" alt="YO">
        </div>
        
    </section>

    <p style="text-align:center; font-size: 2.5rem; color:rgba(61, 106, 202, 0.918);">REGISTRATE!!!!!!! <br> además es
        necesario conocer el numero total de perros sin raza, <br>  y los pitbull para realizar un
        seguimiento mas exahustivo</p>

</div>

 <!-- 
   <h1>¿Ya tienes una cuenta?</h1>
 <a href="login.php">Login</a> or
  <a href="signup.php">SignUp</a> -->
  <footer class="footer">

        <p>Todos los derecehos reservados. Registro Canino 2022</p>
    
    </footer>
    </body>
<?php endif; ?>




</html>

 