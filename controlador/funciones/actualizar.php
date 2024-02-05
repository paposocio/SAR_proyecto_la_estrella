<?php
        include "../sesion.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
    }
    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f3ede7;
    
    }
    * {
    margin: 0;
    padding: 0;
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
    text-decoration: none;
    }
    .container{
        position: relative;
        height:700px;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #24252a;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .container header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #fff;
    }
    .container header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }
    .container form{
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #24252a;
        overflow: hidden;
        height:97%;
    }
    .container form .form{
        position: absolute;
        background-color: #24252a;
        transition: 0.3s ease;
    }
    
    .container form .fields{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    form .fields .input-field{
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
        color: #000000;
    }
    .input-field label{
        font-size: 12px;
        font-weight: 500;
        color: #fff;
    }
    .input-field input, select{
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #fff;
        border-radius: 5px;
        border: 1px solid #24252a;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
        color: #000000;
    }
    .input-field input :focus,
    .input-field select:focus{
        box-shadow: 0 3px 6px rgba(0,0,0,0.13);
    }
    .input-field select,
    .input-field input[type="date"]{
        color: #000000;
    }
    .input-field input[type="date"]:valid{
        color: #333;
    }
    .container form button, .backBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }
    
    
    </style>
    
</head>
<body>
    <div class="container">
        <header>Actualize su perfil</header>

        <form action="cont-act.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
<?php                   
                        echo "
                        <div class='input-field'>
                        <input readonly type='number' name='a' value='".(int)$_GET ["a"]."'>
    
                        </div>

                        <div class='input-field'>
                            <label>Nombre completo</label>
                            <input type='text' placeholder='Ingrese su nombre' required name='b' value='".urldecode($_GET ["b"])."'>
                        </div>
                        ";

                        echo "
                        <div class='input-field'>
                            <label>Nombre de usuario</label>
                            <input type='text' placeholder='Nombre de usuario' required name='c' value='".urldecode($_GET ["c"])."'>
                        </div>
                        ";

                        if (str_contains(urldecode($_GET ["l"]),'igilante') || str_contains(urldecode($_GET ["l"]),'dministrador'))
                        {
                            echo "
                            <div class='input-field'>
                                <label>Direccion</label>
                                <input type='text' placeholder='Ingrese su direccion' required name='d' value='".urldecode($_GET ["d"])."'>
                            </div>
                            ";
                        }
                        else 
                        {
                            echo "
                            <div class='input-field'>
                            <input type='text' readonly required name='d' value='".urldecode($_GET ["d"])."'>
      
                            </div>
                            "; 
                        }

                        echo"
                        <div class='input-field'>
                        <input readonly type='text' name='e' value='".(int)($_GET ["e"])."'>
     
                        </div>
                        ";

                        if (str_contains(urldecode($_GET ["f"]),'ivil'))
                        {
                            echo "
                                <div class='input-field'>
                                <label>Tipo de documento</label>
                                <select required name='f' id='tip_doc'>
                                    <option value='1' selected >Registro Civil</option>
                                    <option value='2'>Tarjeta de Identidad</option>
                                    <option value='3'>Cedula de Ciudadania</option>
                                    <option value='4'>Cedula de Extranjeria</option>
                                    <option value='5'>Pasaporte</option>
                                    <option value='6'>Carnet Diplomatico</option>
                                    <option value='7'>Permiso Especial de Permanencia</option>
                                    <option value='8'>Salvo Conducto</option>
                                    </select>
                                    </div>
                            ";
                        }
                        else if (str_contains(urldecode($_GET ["f"]),'dentidad'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2' selected>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'iudadania'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3' selected>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'xtranjeria'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4' selected>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'asaporte'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5' selected>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'iplomatico'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6' selected>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'ermanencia'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7' selected>Permiso Especial de Permanencia</option>
                            <option value='8'>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else if (str_contains(urldecode($_GET ["f"]),'alvo'))
                        echo"
                        <div class='input-field'>
                        <label>Tipo de documento</label>
                        <select required name='f' id='tip_doc'>
                            <option value='1'>Registro Civil</option>
                            <option value='2'>Tarjeta de Identidad</option>
                            <option value='3'>Cedula de Ciudadania</option>
                            <option value='4'>Cedula de Extranjeria</option>
                            <option value='5'>Pasaporte</option>
                            <option value='6'>Carnet Diplomatico</option>
                            <option value='7'>Permiso Especial de Permanencia</option>
                            <option value='8' selected>Salvo Conducto</option>
                        </select>
                        </div>
                        ";
                        else
                        {
                            echo"
                            <div class='input-field'>
                            <label>Tipo de documento</label>
                            <select required name='f' id='tip_doc'>
                                <option value='1'>Registro Civil</option>
                                <option value='2'>Tarjeta de Identidad</option>
                                <option value='3'>Cedula de Ciudadania</option>
                                <option value='4'>Cedula de Extranjeria</option>
                                <option value='5'>Pasaporte</option>
                                <option value='6'>Carnet Diplomatico</option>
                                <option value='7'>Permiso Especial de Permanencia</option>
                                <option value='8'>Salvo Conducto</option>
                            </select>
                            </div>
                            ";
                        }

                        echo "
                        <div class='input-field'>
                            <label>Numero de documento</label>
                            <input type='number' placeholder='Ingrese su numero de documento' required name='g' value='".(int)$_GET ["g"]."'> 
                        </div>
                        ";

                        echo "
                        <div class='input-field'>
                            <label>Numero de celular</label>
                            <input type='number' placeholder='Ingrese su numero de celular' required name='h' value='".(int)$_GET ["h"]."'>
                        </div>
                        ";

                        echo "
                        <div class='input-field'>
                            <label>Contraseña</label>
                            <input type='text' placeholder='Contraseña' required name='i' value='".urldecode($_GET ["i"])."'>
                        </div>
                        ";

                        if (str_contains(urldecode($_GET ["l"]),'dministrador'))
                        {
                        echo "
                        <div class='input-field'>
                            <label>Titulo universitario</label>
                            <select required name='j'>
                                <option disabled selected>Selecione</option>
                                <option value='1'>Si</option>
                                <option value='2'>No</option>
                            </select>
                        </div>
                        ";
                        }
                        else
                        {
                            echo"
                            <div class='input-field'>
                                <input type='text' readonly required name='j' value='".urldecode($_GET ["j"])."'>
                            </div>

                            ";
                        }

                        if (str_contains (urldecode($_GET ["k"]),'femenino'))
                        {
                          echo "
                          <div class='input-field'>
                            <label>Genero</label>
                            <select required name='k'>
                                <option value='1'>Masculino</option>input
                                <option value='2' selected>Femenino</option>
                            </select>
                        </div>
                        ";
                        }
                        else if (str_contains (urldecode($_GET ["k"]),'masculino'))
                        {
                          echo"
                          <div class='input-field'>
                            <label>Genero</label>
                            <select required name='k'>
                                <option value='1' selected>Masculino</option>
                                <option value='2'>Femenino</option>
                            </select>
                        </div>
                        ";
                        }
                        else
                        {
                            echo"
                            <div class='input-field'>
                              <label>Genero</label>
                              <select required name='k'>
                                  <option value='1'>Masculino</option>
                                  <option value='2'>Femenino</option>
                              </select>
                          </div>
                          ";
                        }

                        echo"
                        <div class='input-field'>
                        <input readonly type='text' name='l' value='".urldecode($_GET ["l"])."'>
               
                        </div>
                        ";

                        $fecha = str_replace(' ','',urldecode($_GET ["m"])); 
                        echo "
                        <div class='input-field'>
                            <label>Fecha de nacimiento</label>
                            <input type='date' placeholder='Ingrese su fecha de nacimiento' required name='m' value='".$fecha."'> 
                        </div>                        
                        ";

                        echo "
                        <div class='input-field'>
                            <label>Correo</label>
                            <input type='email' placeholder='Ingrese su correo' required name='n' value='".urldecode($_GET ["n"])."'>
                        </div>
                        ";

                        if (str_contains(urldecode($_GET ["l"]),'esidente'))
                        {
                            echo "
                            <div class='input-field'>
                                <label>Numero de residencia</label>
                                <input type='number' placeholder='Digite el numero de su casa' required name='o' value='".(int)$_GET ["o"]."'>
                            </div>
                            ";
                        }
                        else
                        {
                            echo "
                            <div class='input-field'>
                            <input type='number' readonly required name='o' value='".(int)$_GET ["o"]."'>
              
                            </div>
                            ";
                        }

                        if (str_contains(urldecode($_GET ["l"]),'igilante'))
                        {
                        echo "
                        <div class='input-field'>
                            <label>Porte de armas</label>
                            <select required name='p'>
                                <option value='1'>Si</option>
                                <option value='2'>No</option>
                            </select>
                        </div>
                        ";
                        }
                        else
                        {
                            echo"
                            <div class='input-field'>
                            <input type='text' readonly required name='p' value='".urldecode($_GET ["p"])."'>
     
                            </div>
                            ";
                        }

                        if (str_contains(urldecode($_GET ["l"]),'igilante') || str_contains($_GET ["l"],'dministrador'))
                        {
                        echo "
                        <div class='input-field'>
                            <label>Años de experiencia</label>
                            <input type='number' placeholder='Experiencia en el cargo' required name='q' value='".(int)$_GET ["q"]."'>
                        </div>
                        ";
                        }
                        else
                        {
                            echo"
                            <div class='input-field'>
                            <input type='number' readonly required name='q' value='".(int)$_GET ["q"]."'>           
                            </div>

                            ";
                        }

                        echo "
                    </div>
                </div>
                    <button class='nextBtn' type='submit' onclick='eliminaEspacio();'>
                        <span class='btnText'>Actualizar</span>
                    </button>
                </div> 
            </div>

            ";
?>
        </form>
    </div>
</body>
</html>
<script>
  function eliminaEspacio(){
  
  $('input').val(function(_, value) {
     return $.trim(value);
  });

}//end function eliminaEspacio
</script>


      