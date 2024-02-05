<?php
include "../../modelo/modelo_1.php";
include "../sesion.php";
$i=new cita();
$retorno=$i -> activacion_inactivacion_cita ($_POST);

if ($retorno==1 and $_SESSION['rol']=='residente')
{
    header('Location: registro_cita_usuario.php');
    exit();
}
else if ($retorno==1 and $_SESSION['rol']=='administrador')
{
    header('Location: panel_citas.php');
    exit();
}
else if ($retorno==1 and $_SESSION['rol']=='vigilante')
{
    header('Location: registro_cita_usuario.php');
    exit();
}
else 
{
    echo $retorno;
}

?>