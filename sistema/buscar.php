<?php
    include "../conexionBD.php";

    $salida = "";
    $query = "SELECT * FROM `productos`";

    if(isset($_POST['consulta'])){
        $q = ($_POST['consulta']);
        $query = "SELECT COD_PROD, NOMBRE, MARCA, SERIE FROM productos
        WHERE NOMBRE LIKE '%".$q."%' OR MARCA LIKE '%".$q."%' AND
        ESTATUS = 1;";
    }

    $queryb = mysqli_query($connectionTrans, $query);
    $resultado = mysqli_num_rows($queryb);

    

    if ($resultado > 0){
        $salida.="<table class='table table-striped table-bordered table-hover'>
                    <thead>
                        <tr>
                            <td>COD</td>
                            <td>NOMBRE</td>
                            <td>MARCA</td>
                            <td>SERIE</td>
                        </tr>
                    </thead>
                    <tbody>
                ";
        while ($fila = mysqli_fetch_array($queryb)){
    
        $salida.="<tr>
                    <td>".$fila['COD_PROD']."</td>
                    <td>".$fila['NOMBRE']."</td>
                    <td>".$fila['MARCA']."</td>
                    <td>".$fila['SERIE']."</td>
                </tr>";

    }
        $salida.="</tbody></table>";

    }else{
        $saldia.="ningún registro encontrado!";
    }

    echo $salida;


?>