<?php
session_start();
include "../includes/funcionFecha.php";
if ($_SESSION['idRol'] != 1) 
	{
		header("location: ../sistema/usuario.php");
	}
include "../conexionBD.php";

$cat = $_GET['categoria'];
//$codigo = $_GET['CODIGO'];
$codigo = $_GET['codigoCat'];
$medida = $_GET['um'];
$nombre = $_GET['descripcion'];
$marca = $_GET['marca'];
$seccion = $_GET['seccion'];
$serie = $_GET['serie'];
$numoriginal = $_GET['numerooriginal'];
$eminima = $_GET['eminima'];
$cantapedir = $_GET['cantapedir'];
$costounitario = $_GET['costounitario'];
$pcutilidad = $_GET['pcutilidad'];
$ventaunitario = $_GET['ventaunitario'];
$pcutilidad2 = $_GET['pcutilidad2'];
$ventaunitario2 = $_GET['ventaunitario2'];
$pcutilidad3 = $_GET['pcutilidad3'];
$ventaunitario3 = $_GET['ventaunitario3'];
$pcutilidad4 = $_GET['pcutilidad4'];
$ventaunitario4 = $_GET['ventaunitario4'];
$einicial = $_GET['einicial'];
$entradas = $_GET['entradas'];
$salidas = $_GET['salidas'];
$costoanterior = $_GET['costoanterior'];
$descuento = $_GET['descuento'];
$sacarsinexistencia = $_GET['sacarsinexistencia'];
$proveedor = $_GET['proveedor'];
$aplicaciones = $_GET['aplicaciones'];


$cod = 0;

if($codigo == " "){
    $codigo = 0;
}

$cod = $codigo + 1;
if ($cod < 10) {
    $cod = strval("0".$cod);
}
if ($cod < 100) {
    $cod = strval("0".$cod);
}

$cod1 = strval($cat);
$cod2 = strval($cod);

$codigo_registrar = $cod1.$cod2;

$query_insert = mysqli_query($connectionTrans, "INSERT INTO `productos` (`IDPRODUCTO`, `CODIGO`, `COD_PROD`,`NOMBRE`, `CATEGORIA`, `SECCION`, `MARCA`, `MEDIDA`, `SERIE`, `NUMEROORIGINAL`, `EMINIMA`, `CANTAPEDIR`, `COSTOUNITARIO`, `PCTUTILIDAD`, `VENTAUNITARIO`, `PCTUTILIDAD2`, `VENTAUNITARIO2`, `PCTUTILIDAD3`, `VENTAUNITARIO3`, `PCTUTILIDAD4`, `VENTAUNITARIO4`, `EINICIAL`, `ENTRADAS`, `SALIDAS`, `COSTOANTERIOR`, `PCTDESCUENTO`, `PROVEEDOR`, `APLICACIONES`, `SACARSINEXITENCIA`, `ESTATUS`) 
                                                VALUES (NULL, '$cod', '$codigo_registrar','$nombre', '$cat', '$seccion', '$marca', '$medida',
                                                '$serie', '$numoriginal', '$eminima', '$cantapedir', '$costounitario',
                                                '$pcutilidad', '$ventaunitario', '$pcutilidad2', '$ventaunitario2', 
                                                '$pcutilidad3', '$ventaunitario3', '$pcutilidad4', '$ventaunitario4', 
                                                '$einicial', '$entradas', '$salidas', '$costoanterior', '$descuento', 
                                                '$proveedor', '$aplicaciones', '$sacarsinexistencia', '1');");
    if($query_insert){
        echo '<script type="text/javascript">
        alert("Registro creado correctamente!");
        self.location = "VistaProductos.php"
        </script>'
        ;
    }else{
        echo '<script type="text/javascript">
        alert("Error al crear el registro!");
        self.location = "VistaProductos.php"
        </script>'
        ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php echo $cat, " ", $codigo_nuevo, " ",$medida, " ",$nombre," ", $marca, " ",$seccion," ", $serie, " ",$numoriginal," ", $eminima, " ",$cantapedir, " ",$costounitario," ",
        $pcutilidad, " ",$ventaunitario, " ",$pcutilidad2, " ",$ventaunitario2, " ",$pcutilidad3," ", $ventaunitario3," ", $pcutilidad4," ", $ventaunitario4," ",
        $einicial," ", $entradas, " ",$salidas," ", $costoanterior," ", $descuento," ", $sacarsinexistencia, " ",$proveedor, " ",$aplicaciones; 
        
        
        ?>
    </p>
</body>
</html>