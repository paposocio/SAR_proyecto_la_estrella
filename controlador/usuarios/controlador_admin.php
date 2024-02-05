<?php
            include"../../modelo/modelo_1.php";
            include "../sesion.php";
            $o=new usuario ();
            $retorno=$o->registro_admin($_POST);

                if ($retorno==1)
                {
                    include"../registro_exitoso.php";
                }
                
                else if(str_contains($retorno,'SQLSTATE[23000] [1062]'))
                {
                    echo "Datos duplicados , por favor modifiquelos e intente de nuevo";
                }
?>