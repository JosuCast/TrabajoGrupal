<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name'])){
   header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?1">

</head>
<body>
<a href="logout.php" id="a" ><img id="salir" src="img/off.png" alt=""></a>
<div class="container">

   <div class="content">
      <h3>Hola, <span>administrador</span></h3>
      <h1>Bienvenido <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>a la vista de control</p>
      <a href="relacionesAdmin.php" class="btn">Relaciones Diplomaticas</a>
      <a href="productosAdmin.php" class="btn">Lista Productos</a>
      <a href="usuariosCrud.php" class="btn">Lista Usuarios</a>
   </div>   

</div>

</body>
</html>