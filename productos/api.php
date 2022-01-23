<?php
require 'conexion.php';
    //recibir valores
    $productos=json_decode($_POST['json'],true);
    
    
    foreach($productos as $producto){
        $nombre=$producto['nombre'];
        $cantidad=$producto['cantidad'];
        $precio=$producto['precio'];
        $total=$producto['total'];

        $guardar=mysqli_query($conection, "INSERT INTO `producto` (`nombre`, `cantidad`, `precio`, `total`) 
                                            VALUES ('$nombre', '$cantidad', '$precio', '$total');");
        
    }
?>