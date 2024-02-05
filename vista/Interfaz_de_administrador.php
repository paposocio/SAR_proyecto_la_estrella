<?php
include"../controlador/sesion.php";
include"../modelo/modelo_1.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="https://th.bing.com/th/id/R.0d12668f87faed591dbd730d692113b2?rik=hPZ2D9T%2bBiAP%2fg&riu=http%3a%2f%2fwww.chnafricaica.com%2fupload%2f2020%2f05%2f19%2fc4c64bff72d12c48348922d1115788bb.png&ehk=s6O%2fbTioXXzgUL6roZabIbd3OiXXTuw4ANWH%2b1468vU%3d&risl=&pid=ImgRaw&r=0" sizes="64x64">
        <meta charset="utf-8">
        <title>Bienvenido a SAR</title>
        <link rel="stylesheet" href="style_interface.css">
        <!--font awesome/iconos-->        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body style="overflow-x:hidden;overflow-y:hidden">

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">la <span>estrella</span></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul>
                        <li><a href="../controlador/cerrar_session.php">Cerrar sesion</a></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="https://th.bing.com/th/id/R.0d12668f87faed591dbd730d692113b2?rik=hPZ2D9T%2bBiAP%2fg&riu=http%3a%2f%2fwww.chnafricaica.com%2fupload%2f2020%2f05%2f19%2fc4c64bff72d12c48348922d1115788bb.png&ehk=s6O%2fbTioXXzgUL6roZabIbd3OiXXTuw4ANWH%2b1468vU%3d&risl=&pid=ImgRaw&r=0" alt="">
                        <?php
                          echo '<P>'.($_SESSION ['nombre_user']).'</P>';
                          echo "<p style='color: #e0ac1c; margin-top: 0;margin-bottom: 20px;'>".($_SESSION ['rol'])."</p>";
                        ?>
                    </center>

                    <!--sidebar start-->
                    <li class="item" id="usuarios">
                        <a href="#usuarios" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Usuarios <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#" id="userbtn"><i class="fa-solid fa-user-gear"></i><span>Perfil</span></a>
                            <a href="../controlador/funciones/consulta_general.php"><i class="fas fa-address-card"></i><span>Panel de control</span></a>
                        </div>
                    </li>
                    <!--sidebar start-->

                    <!--sidebar start-->
                    <li class="item" id="citas">
                        <a href="#citas" class="menu-btn">
                        <i class="fa-solid fa-calendar-days"></i><span>Citas <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#" id="citasbtn"><i class="fa-solid fa-book"></i><span>Agenda</span></a>
                        </div>
                    </li>
                    <!--sidebar start-->

                    
                    <!--sidebar start-->
                    <li class="item" id="servicios">
                        <a href="#servicios" class="menu-btn">
                        <i class="fa-solid fa-briefcase"></i><span>Servicios <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#" id="serviciosbtn"><i class="fa-regular fa-clipboard"></i><span>Portafolio</span></a>
                        </div>
                    </li>
                    <!--sidebar start-->
                    
                    <!--sidebar start-->
                    <li class="item">
                        <a href="https://docdro.id/Dwdtq0H" target="_blank" class="menu-btn">
                            <i class="fas fa-info-circle"></i><span>Ayuda</span>
                        </a>
                    </li>
                    <!--sidebar start-->

                </div>
            </div>
            <!--sidebar end-->

            <!--main container start-->
            <div class="main-container" >
                
                <div class="card" id="contenido_usuario">
                <iframe src="../controlador/funciones/info_perfil.php"; width=100% height=800></iframe>
                </div>

                <div class="card" id="contenido_citas">
                <iframe src="../controlador/funciones/panel_citas.php"; width=100% height=800></iframe>
                </div>

                <div class="card" id="contenido_servicios">
                <iframe src="../controlador/funciones/panel_servicios.php"; width=100% height=800></iframe>
                </div>

            </div>
            <!--main container end-->
            </div>
        <!--wrapper end-->

        <script 
        type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>
                <script>
            $(document).ready(() => {
                $('#contenido_usuario').show();
                $('#contenido_citas').hide();
                $('#contenido_servicios').hide();

                $('#citasbtn').click(function() {
                    $('#contenido_servicios').hide();
                    $('#contenido_usuario').hide();
                    $('#contenido_citas').show();
                });

                $('#serviciosbtn').click(function() {
                    $('#contenido_citas').hide();
                    $('#contenido_usuario').hide();
                    $('#contenido_servicios').show();
                });

                $('#userbtn').click(function() {
                    $('#contenido_usuario').show();
                    $('#contenido_citas').hide();
                    $('#contenido_servicios').hide();
                });
            });
        </script>
    </body>
</html>
       