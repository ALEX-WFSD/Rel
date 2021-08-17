<?php
    header("Access-Control-Allow-Origin: *");

    $correoM = $_REQUEST["correoM"];
    $mensajeM = $_REQUEST["mensajeM"];
   
    

    require("conexion.php");

    
    $sql = "INSERT INTO tblMensajes VALUES('$correoM','$mensajeM',NOW())";
    mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    
    echo "Mensaje enviado ";
?>