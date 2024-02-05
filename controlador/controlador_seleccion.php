<?php
            if ($_POST['a1']==1)
            {
                header("Location:../vista/registro_usuarios/registro_admin.php");
                exit();
            }
            else if ($_POST['a1']==2)
            {
                header("Location:../vista/registro_usuarios/registro_residente.php");
                exit();

            }
            else if ($_POST['a1']==3)
            {
                header("Location:../vista/registro_usuarios/registro_vigilante.php");
                exit();

            }
?>