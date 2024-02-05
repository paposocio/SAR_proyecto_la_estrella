<?php
        include "../sesion.php";
?>
<html>
    <head>
    </head>
    <body>
        <?php
            echo "<form hidden name='formulario' action='cont-act_acti_inacti.php' method='post'>";
            echo "<input type='number' value='".(int)$_GET ["a"]."' name='a'>";
            echo "<input type='number' value='".(int)$_GET ["e"]."' name='b'>
            </form> ";
        ?>
    </body>
</html>

    <script>
            window.onload=function(){
                        // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["formulario"].submit();
            }
    </script>