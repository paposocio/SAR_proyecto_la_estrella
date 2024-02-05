<?php
include "../../modelo/modelo_1.php";
include "../sesion.php";
$i=new servicio();
$retorno=$i -> activacion_inactivacion_servicio ($_POST);


if ($retorno==1 and $_SESSION['rol']=='administrador')
{
    header('Location: panel_servicios.php');
    exit();
}
else 
{
    echo $retorno;
}

?>