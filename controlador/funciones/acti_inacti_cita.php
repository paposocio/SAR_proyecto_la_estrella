<?php
        include "../sesion.php";
?>
<html>
    <head>
    </head>
    <body>
        <?php
            echo "<form hidden name='formulario' action='cont-act_acti_inacti2.php' method='post'>";
            echo "<input type='number' value='".(int)$_GET ["a"]."' name='a'>";
            echo "<input type='number' value='".(int)$_GET ["b"]."' name='b'>
            </form> ";
            var_dump($_GET)
        ?>
    </body>
</html>
    <script>
            window.onload=function(){
                        // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["formulario"].submit();
            }
    </script>