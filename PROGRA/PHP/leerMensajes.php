<?php
header("Access-Control-Allow-Origin: *");
$correo = $_REQUEST["correoMensajes"];

$sql = "SELECT * FROM   tblMensajes WHERE menPara = '$correo'";
require ("conexion.php");
$retorno =array();

$resultado =mysqli_query($conexion,$sql);
while ($registro= mysqli_fetch_assoc($resultado)){
    $retorno[] = array("mensaje" => $registro["menMensaje"],
                       "fechahora"=> $registro["menFechaHora"]);
}

mysqli_close($conexion);

header('Content-type: application/json');
echo json_decode($retorno);

?>