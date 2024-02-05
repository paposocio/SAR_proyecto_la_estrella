<html>
    <head>
        <style>
            * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            text-decoration: none;
            }

            body
            {
            background-color: #f3ede7;
            background-size: cover;

            }
            h1 {
            margin: 0;
            padding: 0;
            text-align: center;
            font-size: 25px;
            margin-bottom: 20px;
            }

            .registerbox {
                width: 400px;
                background: #24252a;
                padding: 30px;
                margin: auto;
                margin-bottom: 100px;
                margin-top: 100px;
                color: white;
            }
            .registerbox p {
                margin: 0;
                padding: 0;
                font-weight: bold;
                font-size:15px;
            }
            .controls {
                width: 100%;
                background: #24252a;
                padding: 10px;
                border: none;
                margin-bottom: 16px;
                border-bottom: 1px solid #edf0f1;
                font-size: 13px;
                color: white;
                
            }
            .registerbox input {
                width: 100%;
                margin-bottom: 20px;
            }

            .registerbox input[type = "text"], input[type = "password"] {
                border: none;
                border-bottom: 1px solid #edf0f1;
                background: transparent;
                outline: none;
                height: 40px;
                color: #edf0f1;
                font-size: 13px;
            }

            .registerbox input[type = "submit"] {
                border: none;
                outline: none;
                height: 40px;
                background: #0066BB;
                color: #fff;
                font-size: 18px;
                border-radius: 20px;
            }

            .registerbox input[type = "submit"]:hover {
                cursor: pointer;
                background: #13a7cc;
                color: #000;
            }

        </style>

    </head>
    <body background="https://img.freepik.com/premium-photo/modern-building-office-blue-sky-background_35761-198.jpg?w=2000">
        
        <section class="registerbox">
             <h1>¿Que tipo de usuario desea registrar?</h1>
            
            <form action="../controlador/controlador_seleccion.php" method="POST">
                <select class="controls" name="a1"required>
                    <option value="1">Administrador</option>
                    <option value="2">Residente</option>
                    <option value="3">Vigilante</option>
                </select>

                <!-- boton de envio-->
                <input type="submit" class="botons" value="Registrar"/>
            </form>

        </section>
    </body>
</html>

<?php
?>