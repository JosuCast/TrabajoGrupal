<?php
include 'config.php';
include 'verificar.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ingresar</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?2">

</head>
<body>
   
<div class="form-container">

   <form action="verificar.php" method="post">
      <h3>Iniciar Sesión</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="username" name="username" required placeholder="Username">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="Ingresar" class="form-btn">
   </form>

</div>

</body>
</html>