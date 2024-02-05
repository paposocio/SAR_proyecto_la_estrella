<?php
        include"../modelo/modelo_1.php";
        $objeto=new usuario ();
        $retorno=$objeto->ingreso_usuario($_POST);

        if (empty($retorno)) 
        {
            include "../controlador/pantalla_de_error.php";          
        }
        else 
        {
        $usuario= ($retorno [0] ['nombre_u']);
        $rol= ($retorno [0] ['rol_usuario']);
        $estado= ($retorno [0] ['estado']);
        $id_user= ($retorno [0] ['id_usuario']);

        if (str_contains($estado,'inactivo') ) 
        {
            include "../controlador/pantalla_de_error.php";          
        }

        else if(str_contains($rol,'administrador'))
        {   
            session_start();
            $_SESSION['nombre_user']=$usuario;
            $_SESSION['rol']=$rol;
            $_SESSION['estado']=$estado;
            $_SESSION['id']=$id_user;
            header("Location: ../vista/Interfaz_de_administrador.php");
            exit();

        }

        else if(str_contains($rol,'vigilante'))
        {
            session_start();
            $_SESSION['nombre_user']=$usuario;
            $_SESSION['rol']=$rol;
            $_SESSION['estado']=$estado;
            $_SESSION['id']=$id_user;
            header("Location: ../vista/interfaz_de_usuario.php");
            exit();
        }

        else if(str_contains($rol,'residente'))
        {
            session_start();
            $_SESSION['nombre_user']=$usuario;
            $_SESSION['rol']=$rol;
            $_SESSION['estado']=$estado;
            $_SESSION['id']=$id_user;
            header("Location: ../vista/interfaz_de_usuario.php");
            exit();
        }

        else if(str_contains($rol,'SQLSTATE[HY000] [2002]'))
        {
            header("location: servidor.php" );
        }

        }


?>