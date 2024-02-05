<?php
        class usuario 
        {
            function ingreso_usuario ()
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion-> prepare ("select id_usuario,nombre_u,contrasena,rol_usuario,estado from usuario where nombre_u= ? and contrasena =?");
                    $sentencia->bindParam(1,$_POST['a1']);
                    $sentencia->bindParam(2,$_POST['a2']);
                    $sentencia->execute();
                    $matriz=$sentencia->fetchall(PDO::FETCH_ASSOC);
                    return $matriz;
                }

                catch (Exception $e)
                {
                    return $e;
                }
            }

            function registro_admin() 
            {
                try 
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call registrar_admin (?,?,?,?,?,?,?,?,?,?,?,?);");
                    $sentencia->bindParam(1,$_POST['a1']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$_POST['a2']);
                    $sentencia->bindParam(3,$_POST['a3']);
                    $sentencia->bindParam(4,$_POST['a4']);
                    $sentencia->bindParam(5,$_POST['a5']);
                    $sentencia->bindParam(6,$_POST['a6']);
                    $sentencia->bindParam(7,$_POST['a7']);
                    $sentencia->bindParam(8,$_POST['a8']);
                    $sentencia->bindParam(9,$_POST['a9']);
                    $sentencia->bindParam(10,$_POST['a10']);
                    $sentencia->bindParam(11,$_POST['a11']);
                    $sentencia->bindParam(12,$_POST['a12']);
                    $sentencia->execute();//ejecutamos la sentencia
                    return 1;
                }

                    catch (Exception $e)
                    {
                        return $e;
                    }

            }

            function registro_residente() 
            {
                try 
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call registrar_residente (?,?,?,?,?,?,?,?,?,?)");
                    $sentencia->bindParam(1,$_POST['a1']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$_POST['a2']);
                    $sentencia->bindParam(3,$_POST['a3']);
                    $sentencia->bindParam(4,$_POST['a4']);
                    $sentencia->bindParam(5,$_POST['a5']);
                    $sentencia->bindParam(6,$_POST['a6']);
                    $sentencia->bindParam(7,$_POST['a7']);
                    $sentencia->bindParam(8,$_POST['a8']);
                    $sentencia->bindParam(9,$_POST['a9']);
                    $sentencia->bindParam(10,$_POST['a10']);
                    $sentencia->execute();//ejecutamos la sentencia
                    return 1;
                }

                catch (Exception $e)
                {
                    return $e;
                }

            }

            function registro_vigilante() 
            {
                try 
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call registrar_vigilante (?,?,?,?,?,?,?,?,?,?,?,?)");
                    $sentencia->bindParam(1,$_POST['a1']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$_POST['a2']);
                    $sentencia->bindParam(3,$_POST['a3']);
                    $sentencia->bindParam(4,$_POST['a4']);
                    $sentencia->bindParam(5,$_POST['a5']);
                    $sentencia->bindParam(6,$_POST['a6']);
                    $sentencia->bindParam(7,$_POST['a7']);
                    $sentencia->bindParam(8,$_POST['a8']);
                    $sentencia->bindParam(9,$_POST['a9']);
                    $sentencia->bindParam(10,$_POST['a10']);
                    $sentencia->bindParam(11,$_POST['a11']);
                    $sentencia->bindParam(12,$_POST['a12']);
                    $sentencia->execute();//ejecutamos la sentencia
                    return 1;
                }

                catch (Exception $e)
                {
                    return $e;
                }

            }

            function consultar ($datos)
            {
                if (is_numeric($datos))
                {
                    try
                    {
                            include "rutas_conexion.php";
                            $sentencia=$conexion->prepare("call consulta_usuario_id (?)"); 
                            $sentencia->bindParam(1,$datos);
                            $sentencia->execute();
                            $matriz=$sentencia->fetchall(PDO::FETCH_ASSOC);
                            return $matriz;
                    }
                    catch (Exception $e)
                    {
                        return $e;
                    }
                }
                else 
                {
                    try
                    {
                            include "rutas_conexion.php";
                            $con_gen=$conexion->prepare("call consulta_usuarios"); 
                            $con_gen->execute();
                            $matriz=$con_gen->fetchall(PDO::FETCH_ASSOC);
                            return $matriz;
                    }
                    catch (Exception $e)
                    {
                        return $e;
                    }
                }
            }

            function actualizar_usuario($datos)
            {

                if ($datos ['l']=='administrador')
                {
                    try
                    {
                        include "rutas_conexion.php";
                        $sentencia=$conexion->prepare ("call actualizacion_admin (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $sentencia->bindparam (1,$datos['a']); //id
                        $sentencia->bindparam (2,$datos['b']); //Nombre
                        $sentencia->bindparam (3,$datos['c']); //Nombre usuario
                        $sentencia->bindparam (4,$datos['d']); //Direccion
                        $sentencia->bindparam (5,$datos['f']); //Tipo documento
                        $sentencia->bindparam (6,$datos['g']); //Numero documento
                        $sentencia->bindparam (7,$datos['h']); //Telefono
                        $sentencia->bindparam (8,$datos['i']); //Contraseña
                        $sentencia->bindparam (9,$datos['j']); //Titulo universitario
                        $sentencia->bindparam (10,$datos['k']); //Genero
                        $sentencia->bindparam (11,$datos['m']); //Fecha de nacimiento
                        $sentencia->bindparam (12,$datos['n']); //Correo electronico
                        $sentencia->bindparam (13,$datos['q']); //Años de experiencia
                        $sentencia->execute();
                        return 1;
                    }

                    catch (Exception $e)
                    {
                        return $e;
                    }
                }

                else if ($datos ['l']=='residente')
                {
                    try
                    {
                        include "rutas_conexion.php";
                        $sentencia=$conexion->prepare ("call actualizacion_residente (?,?,?,?,?,?,?,?,?,?,?)");
                        $sentencia->bindparam (1,$datos['a']); //id
                        $sentencia->bindparam (2,$datos['b']); //Nombre
                        $sentencia->bindparam (3,$datos['c']); //Nombre usuario
                        $sentencia->bindparam (4,$datos['f']); //Tipo documento
                        $sentencia->bindparam (5,$datos['g']); //Numero documento
                        $sentencia->bindparam (6,$datos['h']); //Telefono
                        $sentencia->bindparam (7,$datos['i']); //Contraseña
                        $sentencia->bindparam (8,$datos['k']); //Genero
                        $sentencia->bindparam (9,$datos['m']); //Fecha de nacimiento
                        $sentencia->bindparam (10,$datos['n']); //Correo electronico
                        $sentencia->bindparam (11,$datos['o']); //casa
                        $sentencia->execute();
                        return 1;
                    }

                    catch (Exception $e)
                    {
                        return $e;
                    }
                }

                else if ($datos ['l']=='vigilante')
                {
                    try
                    {
                        include "rutas_conexion.php";
                        $sentencia=$conexion->prepare ("call actualizacion_vigilante (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $sentencia->bindparam (1,$datos['a']); //id
                        $sentencia->bindparam (2,$datos['b']); //Nombre
                        $sentencia->bindparam (3,$datos['c']); //Nombre usuario
                        $sentencia->bindparam (4,$datos['d']); //Direccion
                        $sentencia->bindparam (5,$datos['f']); //Tipo documento
                        $sentencia->bindparam (6,$datos['g']); //Numero documento
                        $sentencia->bindparam (7,$datos['h']); //Telefono
                        $sentencia->bindparam (8,$datos['i']); //Contraseña
                        $sentencia->bindparam (9,$datos['k']); //Genero
                        $sentencia->bindparam (10,$datos['m']); //Fecha de nacimiento
                        $sentencia->bindparam (11,$datos['n']); //Correo electronico
                        $sentencia->bindparam (12,$datos['p']); //armas
                        $sentencia->bindparam (13,$datos['q']); //Años de experiencia
                        $sentencia->execute();
                        return 1;
                    }
                    catch (Exception $e)
                    {
                        return $e;
                    }
                }         
            }

            function activar_inactivar_usuario ($datos)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare ("call activacion_inactivacion_usuarios (?,?)");
                    $sentencia->bindparam (1,$datos['a']); //id
                    $sentencia->bindparam (2,$datos['b']); //estado
                    $sentencia->execute();
                    return 1;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }
            
        };

        class cita
        {
            function consulta_citas($dato)
            {
                if ($dato ['rol']=='administrador' || $dato ['rol']=='vigilante')
                {
                    try
                    {
                        include "rutas_conexion.php";
                        $con_gen=$conexion->prepare("call consulta_cita_ordenado"); 
                        $con_gen->execute();
                        $matriz=$con_gen->fetchall(PDO::FETCH_ASSOC);
                        return $matriz;
                    }
    
                    catch (Exception $e)
                    {
                        return $e;
                    }
                }
                else if ($dato ['rol']=='residente')
                {
                    try
                    {
                        include "rutas_conexion.php";
                        $sentencia=$conexion->prepare("call consulta_cita_id (?)");
                        $sentencia->bindParam(1,$dato['id']); //asignamos y parametrizamos valores a la sentencia 
                        $sentencia->execute();
                        $matriz=$sentencia->fetchall(PDO::FETCH_ASSOC);
                        return $matriz;
                    }
                    catch (Exception $e)
                    {
                        return $e;
                    }
                }

            }

            function informacion_cita ($dato)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call informacion_cita (?)");
                    $sentencia->bindParam(1,$dato); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->execute();
                    $matriz=$sentencia->fetchall(PDO::FETCH_ASSOC);
                    return $matriz;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }

            function registro_cita ($datos)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call registro_cita (?,?)");
                    $sentencia->bindParam(1,$datos['a']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$datos['b']);
                    $sentencia->execute();
                    return 1;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }

            function activacion_inactivacion_cita ($datos)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call activacion_inactivacion_cita (?,?)");
                    $sentencia->bindParam(1,$datos['a']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$datos['b']);
                    $sentencia->execute();
                    return 1;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }

        };

        class servicio
        {
            function consulta_servicios()
            {
                try
                {
                    include "rutas_conexion.php";
                    $con_gen=$conexion->prepare("call consulta_servicios"); 
                    $con_gen->execute();
                    $matriz=$con_gen->fetchall(PDO::FETCH_ASSOC);
                    return $matriz;
                }

                catch (Exception $e)
                {
                    return $e;
                }
            }

            function registro_servicio ($datos)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call registro_servicio (?,?)");
                    $sentencia->bindParam(1,$datos['c']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$datos['d']);
                    $sentencia->execute();
                    return 1;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }

            
            function activacion_inactivacion_servicio ($datos)
            {
                try
                {
                    include "rutas_conexion.php";
                    $sentencia=$conexion->prepare("call activacion_inactivacion_servicio (?,?)");
                    $sentencia->bindParam(1,$datos['a']); //asignamos y parametrizamos valores a la sentencia 
                    $sentencia->bindParam(2,$datos['b']);
                    $sentencia->execute();
                    return 1;
                }
                catch (Exception $e)
                {
                    return $e;
                }
            }

        };
?>