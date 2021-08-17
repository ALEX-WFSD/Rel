<?php
header("Access-Control-Allow-Origin: *");
$correoI = $_REQUEST["correoI"];
$contrasenaI = $_REQUEST["contrasenaI"];

$sql = "SELECT * FROM tblUsuario WHERE usuCorreo = '$correoI' ";
require("conexion.php");
 $resultado = mysqli_query($conexion, $sql);
  if ($registro = mysqli_fetch_assoc($resultado))
  {
      if(password_verify($contrasenaI,$registro["usuContrasena"]))
      {
        $retorno = array("correo" => $registro["usuCorreo"],
                         "nombre" => $registro["usuNombrer"]);
      }
      else {
        $retorno = array("fallo" => "contrasena");
    }
    
  }
else {
    $retorno = array("fallo" => "usuario");
}
mysqli_close($conexion);
header('Content-type: application/json');
echo json_encode($retorno);








?>