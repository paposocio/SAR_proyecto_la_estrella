<html>
    <head>
        <link rel="icon" type="image/png" href="https://th.bing.com/th/id/R.0d12668f87faed591dbd730d692113b2?rik=hPZ2D9T%2bBiAP%2fg&riu=http%3a%2f%2fwww.chnafricaica.com%2fupload%2f2020%2f05%2f19%2fc4c64bff72d12c48348922d1115788bb.png&ehk=s6O%2fbTioXXzgUL6roZabIbd3OiXXTuw4ANWH%2b1468vU%3d&risl=&pid=ImgRaw&r=0" sizes="64x64">
                <!-- links -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link rel="stylesheet" href="../registro_user.css">
                <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
                        
                <!-- scripts -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                
                <!-- metainformacion -->
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <section class="registerbox">
            <h1>Crea tu cuenta</h1>
            <div>
                <form action="../../controlador/usuarios/controlador_vigilante.php" method="POST">
                         

                        <!--anos_exp-->
                        <p>Años de experiencia *</p>
                                <input class="controls"  type="number" name="a1" min="0" placeholder="Ingrese sus años de experiencia laboral" required/>
                        
                        <!-- direc-->                     
                        <p>Direccion *</p>
                                <input class="controls"  type="text" name="a2" placeholder="Ingrese su direccion de residencia" required/>


                        <!--armas-->                        
                        <p>Porte de armas * </p>
                                <select class="controls" name="a3" required>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>

                        <!-- nombre-->
                        <p>Nombres *</p>
                                <input class="controls" type="text"  name="a4" placeholder="Ingrese sus nombres y apellidos"required/>
                                
                        <!-- genero-->                        
                        <p>Genero *</p>
                                <select class="controls" name="a5"required>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>

                         <!-- tip_doc-->   
                        <p>Tipo documento *</p>
                                <select class="controls" name="a6"required>
                                    <option value="1">Registro Civil</option>
                                    <option value="2">Tarjeta de Identidad</option>
                                    <option value="3">Cedula de Ciudadania</option>
                                    <option value="4">Cedula de Extranjeria</option>
                                    <option value="5">Pasaporte</option>
                                    <option value="6">Carnet Diplomatico</option>
                                    <option value="7">Permiso Especial de Permanencia</option>
                                    <option value="8">Salvo Conducto</option>
                                </select>

                         <!--num_doc-->   
                        <p>Numero de documento *</p>
                                <input class="controls" type="number"  name="a7" min="0" placeholder="Ingrese su Numero de Documento"required/>

                         <!--num_tel-->                       
                        <p>Telefono *</p>
                                <input class="controls"  type="number" name="a8" min="0" placeholder="Ingrese su Numero de Teléfono"required/>

                        <!-- correo-->                        
                        <p>Correo *</p>
                                <input class="controls"  type="email" name="a9" placeholder="Ingrese su dirreccion de correo"required/>

                        <!--fecha_nac-->    
                        <p>Fecha de Nacimiento *</p>
                                <input class="controls"  name="a10" type="date" max="2021" required/>

                        <!--user_nom-->    
                        <p>Nombre de Usuario *</p>
                                <input class="controls" type="text"  name="a11" placeholder="Ingrese un Nombre de Usuario"required/>

                        <!--clave-->
                        <p>Contraseña * </p>
                                <input class="controls" type="password"  name="a12" placeholder="Ingrese su Contraseña"required/>
    
                        <!-- boton de envio-->
                        <input type="submit" class="botons" value="Registrarse"/>
                </form>
            </div>
        </section>

    </body>
</html>
<script>
/* Evento para cuando el usuario libera la tecla escrita dentro del input */
$('input').focusout(function(){
    /* Obtengo el valor contenido dentro del input */
    var value = $(this).val();
 
    /* Elimino todos los espacios en blanco que tenga la cadena delante y detrás */
    var value_without_space = $.trim(value);
    
    /* Cambio el valor contenido por el valor sin espacios */
    $(this).val(value_without_space);
});
</script>
<?php
?>
