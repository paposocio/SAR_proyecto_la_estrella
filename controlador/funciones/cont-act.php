<?php
include "../../modelo/modelo_1.php";
include "../sesion.php";
$i=new usuario();
$retorno=$i -> actualizar_usuario ($_POST);
if ($retorno==1)
{
    header('Location: consulta_general.php');
    exit();
}
else 
{
    echo $retorno;
}

?>