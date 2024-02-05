<?php
            include"../../modelo/modelo_1.php";
            include"../sesion.php";
            require_once 'dompdf/autoload.inc.php';
            $objeto=new usuario ($_POST);
            $retorno=$objeto->consultar($_SESSION);

$html ="
<meta charset='utf-8'>
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    text-decoration: none;
} 
body
{
    background-color: #f3ede7;
}
table {
width: 100%;
border: 1px solid #000;
border-collapse: collapse;
caption-side: top;
}
th, td {
width: 25%;
text-align: left;
vertical-align: top;
border: 1px solid #000;
padding: 0.3em;
}
caption {
text-align: center;
color: #fff;
background: #000;
}
th {
background: #ccc;
font-family: 'Courier New', Courier, monospace;font-weight: bolder;font-size:large;
}
td {
background: #f4f4f4;
}
.odd td {
background: #fff;
}

.elements {
width: 30%;
}
.tag {
width: 15%;
}
.purpose {
width: 55%;
}
</style>
<div id='page'>
<table>
<caption>Registros usuarios</caption>
<tr> 
<th scope='col' class='elements'>ID</th> 
<th scope='col' class='elements'>Nombre</th>
<th scope='col' class='elements'>Nombre usuario</th>
<th scope='col' class='elements'>Direccion</th>
<th scope='col' class='elements'>Estado</th>
<th scope='col' class='elements'>Tipo documento</th>
<th scope='col' class='elements'>Numero documento</th>
<th scope='col' class='elements'>Telefono</th>
<th scope='col' class='elements'>Contraseña</th>
<th scope='col' class='elements'>Titulo universitario</th>
<th scope='col' class='elements'>Genero</th>
<th scope='col' class='elements'>Rol usuario</th>
<th scope='col' class='elements'>Fecha de nacimiento</th>
<th scope='col' class='elements'>Correo electronico</th>
<th scope='col' class='elements'>Casa residente</th>
<th scope='col' class='elements'>Porte de armas</th>
<th scope='col' class='elements'>Años de experiencia</th>";           


            foreach ($retorno as $fila)
            {
                $html.="<tr  class='odd'>";

                foreach ($fila as $columna)
                {                
                    if (empty($columna))
                    {
                        $html.="<td style='text-align:center;'>N/A</td>";    
                    }
                    else
                    {
                        $html.="<td>$columna</td>";               
                    }

                }

                $html.="</tr>";
            }
                $html.="</table>";

use Dompdf\Dompdf;
$dompdf= new Dompdf();
$dompdf->loadhtml($html,encoding:'UTF-8');
//cargamos la variable html que contiene el contenido deseado y especificamos que acepte todo tipo de caracteres
$dompdf->setPaper('A1', 'landscape');//opciones para la hoja
$dompdf->render();//renderiza el pdf
$dompdf->stream("usuarios.pdf");
//, array("Attachment" => false)); Esta linea se agrega a la funcion stream para abrir directamente el archivo pdf
?>

