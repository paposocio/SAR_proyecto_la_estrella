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

            }
                    .warningbox {
                        width: 600px;
                        height: 200px;
                        background: #24252a;
                        color: #fff;
                        top: 50%;
                        left: 50%;
                        position: absolute;
                        transform: translate(-50%, -50%);
                        box-sizing: border-box;
                        padding: 70px 30px;
                    }

                    .avatar {
                        width: 100px;
                        height: 100px;
                        position: absolute;
                        top: -10%;
                        left: calc(50% - 50px);
                    }

                    .warningbox h1 {
                        margin: 0;
                        padding: 0;
                        text-align: center;
                        font-size: 18px;
                        /* arriba horizontal abajo*/
                        margin: 20px auto 20px;
                    }

                    .warningbox input {
                        border: none;
                        outline: none;
                        height: 40px;
                        background: #0066BB;
                        color: #fff;
                        font-size: 18px;
                        border-radius: 20px;
                        width: 100%;
                        margin-bottom: 20px;
                    }

                    .warningbox input:hover {
                        cursor: pointer;
                        background: #13a7cc;
                        color: #000;
                    }
        </style>
    </head>
    <body>
        
        <section class="warningbox">
        <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/2048px-Yes_Check_Circle.svg.png' class='avatar'>
                <?php

            echo"<h1>Bienvenido, registro exitoso </h1>";
            ?>
            <form action="../index.html" >
                <input type="submit" value="Volver a la pagina de inicio"/>
            </form>
        </section>
    </body>
</html>