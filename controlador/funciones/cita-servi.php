<?php
        include "../sesion.php";
?>
<html>
    <head>
    </head>
    <body> 
        <?php
            $fecha_hora = str_replace('T',' ',($_GET ["fecha_hora"])); 
            echo "<form hidden name='form-servicio-cita' method='post' action='cont-act2.php'>";
            echo "<input type='number' value='".(int)$_GET ["id_user_reserva"]."' name='a'>";
            echo "<input type='text' value='".$fecha_hora."' name='b'>";
            echo "<form  hidden name='form-servicio' method='post' action='cont-act2.php'>";
            echo "<input type='text' value='".$_GET ["name_servicio"]."' name='c'>";
            echo "<input type='text' value='".$_GET ["descrip_servicio"]."' name='d'>
            </form> ";
        ?>
    </body>
</html>

<script>
            window.onload=function(){
                        // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["form-servicio-cita"].submit();
            }
    </script>