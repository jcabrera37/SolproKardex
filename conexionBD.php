<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDatos = "kardexcfg";

    $conection = @mysqli_connect($servidor,$usuario,$clave,$baseDatos);

    if(!$conection){
        echo "Error al conectarse a la base de datos!";
    }else{
        echo"conexion establecida";
    }

?>