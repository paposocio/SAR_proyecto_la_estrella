<?php
include"../../modelo/modelo_1.php";
include"../sesion.php";
$o=new usuario ();
$retorno=$o->consultar($_SESSION['id']);
?>
<html>
    <head>
        <style>
            body{margin-top:20px;
            background-color:#f2f6fc;
            color:#69707a;
            }
            .img-account-profile {
                height: 10rem;
            }
            .rounded-circle {
                border-radius: 50% !important;
            }
            .card {
                box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
            }
            .card .card-header {
                font-weight: 500;
            }
            .card-header:first-child {
                border-radius: 0.35rem 0.35rem 0 0;
            }
            .card-header {
                padding: 1rem 1.35rem;
                margin-bottom: 0;
                background-color: rgba(33, 40, 50, 0.03);
                border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            }
            .form-control, .dataTable-input {
                display: block;
                width: 100%;
                padding: 0.875rem 1.125rem;
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1;
                color: #69707a;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #c5ccd6;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.35rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .nav-borders .nav-link.active {
                color: #0061f2;
                border-bottom-color: #0061f2;
            }
            .nav-borders .nav-link {
                color: #69707a;
                border-bottom-width: 0.125rem;
                border-bottom-style: solid;
                border-bottom-color: transparent;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0;
                padding-right: 0;
                margin-left: 1rem;
                margin-right: 1rem;
            }

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </head>
    <body>
    <div class="container-xl px-4 mt-4">
    <h1 style="text-align:center;font-size:larger">Perfil</h1>
    <form action="cont-act3.php" method="post">
    <?php
            echo "
            <input name='a' type='number' hidden value='".($retorno [0]['id_usuario'])."'>
            <input name='l' type='text' hidden value='".($retorno [0]['rol_usuario'])."'>
            ";
    ?>
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Informacion adicional</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php
                        if ($retorno [0]['rol_usuario']=='administrador')
                        {
                            echo "
                            <img class='img-account-profile rounded-circle mb-2' src='https://www.pngmart.com/files/21/Admin-Profile-Vector-PNG-Picture.png'>
                            ";
                        }
                        else if ($retorno [0]['rol_usuario']=='vigilante')
                        {
                            echo "
                            <img class='img-account-profile rounded-circle mb-2' src='https://icons.iconarchive.com/icons/aha-soft/free-large-boss/512/Security-Guard-icon.png'>
                            ";
                        }
                        else if ($retorno [0]['rol_usuario']=='residente')
                        {
                            echo "
                            <img class='img-account-profile rounded-circle mb-2' src='https://icons.iconarchive.com/icons/aha-soft/free-large-boss/512/Chief-icon.png'>
                            ";
                        }
                    ?>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"><?php echo $retorno [0]['rol_usuario']?></div>
                </div>
            </div>
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-body">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (nombre completo)-->
                            <div class="col-md-6">
                                <?php
                                    if ($retorno [0]['rol_usuario']=='administrador' || $retorno [0]['rol_usuario']=='vigilante')
                                    {
                                        echo "
                                        <label class='small mb-1'>Direccion de residencia</label>
                                        <input name='d' class='form-control' type='text' placeholder='Ingrese su direccion de residencia' required value='".($retorno [0]['direccion'])."'>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (experiencia)-->
                                    <div class="col-md-6">
                                        <?php
                                            if ($retorno [0]['rol_usuario']=='administrador' || $retorno [0]['rol_usuario']=='vigilante')
                                            {
                                                echo "
                                                <label class='small mb-1'>Años de experiencia laboral</label>
                                                <input name='q' class='form-control' type='number' required value='".($retorno [0]['anosexperiencia'])."'>
                                                ";
                                            }
                                            else if ($retorno [0]['rol_usuario']=='residente')
                                            {
                                                echo "
                                                <label class='small mb-1'>Casa de residencia</label>
                                                <input name='o' class='form-control' type='number' placeholder='Ingrese su numero de residencia' required value='".($retorno [0]['casa_residente'])."'>
                                                ";
                                            }
                                            if ($retorno [0]['rol_usuario']=='administrador')
                                            {
                                                if ($retorno [0]['titulo_universitario']=="si")
                                                {
                                                    echo "
                                                    <label class='small mb-1'>Titulo universitario</label>
                                                    <select class='form-select' name='j' required>
                                                        <option value='1' selected>Si</option>
                                                        <option value='2'>No</option>
                                                    </select>
                                                ";
                                                }
                                                else
                                                {
                                                    echo "
                                                    <label class='small mb-1'>Titulo universitario</label>
                                                    <select class='form-select' name='j' required>
                                                        <option value='1'>Si</option>
                                                        <option value='2' selected>No</option>
                                                    </select>
                                                ";
                                                }
                                            }
                                            else if ($retorno [0]['rol_usuario']=='vigilante')
                                            {
                                                if ($retorno [0]['porte_armas']=="si")
                                                {
                                                    echo "
                                                    <label class='small mb-1'>Porte de armas</label>
                                                    <select class='form-select' name='p' required>
                                                        <option value='1' selected>Si</option>
                                                        <option value='2'>No</option>
                                                    </select>
                                                ";
                                                }
                                                else
                                                {
                                                    echo "
                                                    <label class='small mb-1'>Porte de armas</label>
                                                    <select class='form-select' name='p' required>
                                                        <option value='1'>Si</option>
                                                        <option value='2' selected>No</option>
                                                    </select>
                                                ";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>


                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Informacion personal</div>
                <div class="card-body">
                        <!-- Form Group (nombre de usuario)-->
                        <div class="mb-3">
                            <label class="small mb-1">Nombre de usuario</label>
                            <input name='c' class="form-control" type="text" placeholder="Ingrese su nombre de usuario" required <?php echo "value='".($retorno [0]['nombre_u'])."'"?>>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (nombre completo)-->
                            <div class="col-md-6">
                                <label class="small mb-1">Nombre completo</label>
                                <input name='b' class="form-control" type="text" placeholder="Ingrese su nombre completo" required <?php echo "value='".($retorno [0]['nombre'])."'"?>>
                            </div>
                            <!-- Form Group (genero)-->
                            <div class="col-md-6">
                                <label class="small mb-1">Genero</label>
                                <select class='form-select' name='k' required>
                                <?php
                                        if ($retorno [0]['genero']=='femenino')
                                    {
                                    echo "
                                        <option value='1'>Masculino</option>input
                                        <option value='2' selected>Femenino</option>
                                    </select>
                                    ";
                                    }
                                    else if ($retorno [0]['genero']=='masculino')
                                    {
                                    echo"
                                        <option value='1' selected>Masculino</option>input
                                        <option value='2' >Femenino</option>
                                    </select>
                                    ";
                                    }
                                    ?>
                            </div>
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1">Numero de documento</label>
                                <input name='g' class="form-control" type="number" placeholder="Ingrese su numero de documento" required <?php echo "value='".($retorno [0]['num_doc'])."'"?>>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Tipo de documento</label>
                                <select class='form-select' required name='f'>
                                <?php

                                    if (str_contains(($retorno [0] ['tip_doc']),'ivil'))
                                    {
                                    echo "
                                    <option value='1' selected>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'dentidad'))
                                    {
                                    echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2' selected>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }

                                    else if (str_contains(($retorno [0] ['tip_doc']),'iudadania'))
                                    {
                                    echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3' selected>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'xtranjeria'))
                                    {echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4' selected>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'asaporte'))
                                    {echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5' selected>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'iplomatico'))
                                    {echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6' selected>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'ermanencia'))
                                    {echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7' selected>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                    else if (str_contains(($retorno [0] ['tip_doc']),'alvo'))
                                    {
                                    echo"
                                    <option value='1'>Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8' selected>Salvo Conducto</option>
                                    </select>
                                    ";
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1">Fecha de nacimiento</label>
                            <input name='m' class="form-control" type="date" placeholder="Seleccione su fecha de nacimiento" required <?php echo "value='".($retorno [0]['fecha_nac'])."'"?>>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1">Numero telefonico</label>
                                <input name='h' class="form-control" type="number" placeholder="Ingrese su numero telefonico" required <?php echo "value='".($retorno [0]['telefono'])."'"?>>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1">Correo</label>
                                <input name='n' class="form-control" type="email" name="n" placeholder="Ingrese su correo" required <?php echo "value='".($retorno [0]['correo'])."'"?>>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Contraseña</label>
                            <input name='i'class="form-control" id="inputEmailAddress" type="text" placeholder="Ingrese su contraseña" required <?php echo "value='".($retorno [0]['contrasena'])."'"?>>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
    </body>
</html>
<script>
$('input').focusout(function(){
    /* Obtengo el valor contenido dentro del input */
    var value = $(this).val();
 
    /* Elimino todos los espacios en blanco que tenga la cadena delante y detrás */
    var value_without_space = $.trim(value);
    
    /* Cambio el valor contenido por el valor sin espacios */
    $(this).val(value_without_space);
});
</script>

 