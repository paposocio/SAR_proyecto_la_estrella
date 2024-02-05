<?php
            include"../../modelo/modelo_1.php";
            include "../sesion.php";

            $o=new cita ();
            $retorno=$o->registro_cita($_POST);

            $o2=new servicio ();
            $retorno2=$o2->registro_servicio($_POST);

                if ($retorno ==1 and $retorno2==1 ) 
                {
                    header('Location: registro_cita_usuario.php');
                }
                
                else 
                {
                    echo $retorno;
                }
?>