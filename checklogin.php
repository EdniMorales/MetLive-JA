<?php
session_start();
?>

<?php

$host_db = "192.168.0.24";
$user_db = "JA";
$pass_db = "some_pass"; 
$db_name = "Usuario";
$tbl_name = "Usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE username = '$username'";

$result = $conexion->query($sql);
 ?>

 <!DOCTYPE html>
<html>
<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>JArmando</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

<div class="container">
            <center>
             <img src="img/metlife_logo.png" border="0" width="300" height="70">
         </center>
        </div>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0000FF;
}

li {
    float: left;
}

li a {
    display: ;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #778899;
}
</style>
</head>
<body>

<?php

if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($password === $row['password']) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! ". $_SESSION['username'];
?>

<ul>
  <li><a href=panel-control.php>Panel de Control</a></li>
  <li><a href="#comentarios">Comentarios</a></li>
  <li><a href="#marketing">Marketing</a></li>
  <li><a href="#ventas">Ventas</a></li>
  <li><a href="#psventas">Ps Ventas</a></li>
</ul>

<?php

 } else { 
   echo "Username o Password estan incorrectos.";
   echo "   Usuario    " . $username;

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>

</body>
</html>