<?php
            include"../../modelo/modelo_1.php";
            include "../sesion.php";
            $o=new usuario ();
            $ret=$o->registro_residente($_POST);

                if ($ret==1)
                {
                    header("location: ../registro_exitoso.php" );
                } 

                else if(str_contains($ret,'SQLSTATE[23000]'))
                {
                    header("location: ../error_datos_repetidos.php" );
                }

                else if(str_contains($ret,'SQLSTATE[HY000] [2002]'))
                {
                    header("location: ../servidor.php" );
                }
?>