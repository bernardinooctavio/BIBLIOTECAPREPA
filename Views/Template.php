<?php


namespace Views;


use http\Url;

class Template
{
    public static function header()
    {
       ?>
        <!DOCTYPE html>
        <html>
        <head>

            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link type="text/css" rel="stylesheet" href="<?php echo URL?>Public/css/materialize.min.css"  media="screen,projection"/>
            <link rel="stylesheet" href="<?php echo URL?>Public/style.css">
            <link type="text/css" rel="stylesheet" href="<?php echo URL?>Public/fonts/material-icons.css">
            <link type="text/css" rel="stylesheet" href="<?php echo URL?>Public/css/scroll.css">
            <link type="text/css" rel="stylesheet" href="<?php echo URL?>Public/css/style.min.css" media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="<?php echo URL?>Public/css/Style.css" media="screen,projection"/>


            <!--Aquí van los escripts-->
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/jquery-1.11.2.min.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/materialize.min.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/pagination.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/jquery.validate.min.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/uifilter.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/plugins/highcharts.js"></script>

            <script type="text/javascript">
                $('document').ready(function () {
                    $('.parallax').parallax();
                    $(".button-collapse").sideNav();

                    $('.collapsible').collapsible();

                    $('.tooltipped').tooltip();

                })

                $.validator.setDefaults({ ignore: [],
                    errorClass: 'invalid',
                    validClass: "valid",
                });
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                    return this.optional(element) || /^[a-z, ]+$/i.test(value);
                }, "Solo Letras");
            </script>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </head>

        <body>


        <nav id="menusito">

            <div id="barra_arriba" class="nav-wrapper cyan lighten-2"><a href="<?php echo URL?>empleado_bienvenido" class="brand-logo" style="height: 60px;"><img src="Public/imagenes/logo.jpg" width="150px" height="60px"/></a>
                <?php if(!isset($_SESSION["username"]))
                {?>
                <div id="barra_arriba" class="nav-wrapper cyan lighten-2"><a href="<?php echo URL?>inicio" class="brand-logo"><img src="Public/imagenes/logo.jpg" width="160px" height="65px"/></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?php echo URL?>inicio" class="black-text"><font color="#ffffff"><b>Inicio</b></font></a></li>
                        <li><a href="<?php echo URL?>Login" class="black-text"><font color="#ffffff"><b>Login</b></font></a></li>
                    </ul>
                    <?php }?>
                </div>
        </nav>


        <?php

        if (isset($_SESSION["username"]))

        {
        ?>

            
        <ul id="slide-out" class="side-nav collapsible" data-collapsible="accordion" style="overflow-y: auto;">
            <li><div class="user-view">
                    <div class="background">
                        <img src="<?php echo URL?>Public/imagenes/fondo.jpg">
                    </div>

                    <div class="row">
                        <div class="col s5"><img class="circle" src="<?php echo URL?>Public/imagenes/admin.jpg"></div>
                        <div class="col s1"></div>
                        <div class="col s5" align="right"><a href="<?php echo URL?>Settings"><i class="material-icons black-text ">settings</i></a></div>
                    </div>
                    <a href="#!name"><span class="black-text name">Administrador</span></a>
                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons">directions_run</i>Lectores</div>
                <div class="collapsible-body orange accent-3">
                    <ul>
                        <li><a href="<?php echo URL?>personas" class=" black-text"><i class="material-icons">chevron_right</i>Lector</a></li>
                        <li><a href="<?php echo URL?>grados" class="black-text"><i class="material-icons">chevron_right</i>Grado</a></li>
                        <li><a href="<?php echo URL?>grupos" class="black-text"><i class="material-icons">chevron_right</i>Grupos</a></li>
                        <li><a href="<?php echo URL?>tipo_persona" class="black-text"><i class="material-icons">chevron_right</i>Tipo de lector</a></li>


                    </ul>
                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons">local_library</i>Prestamos</div>
                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>prestamos" class="black-text"><i class="material-icons">chevron_right</i>Realizo de prestamos</a></li>
                            <li><a href="<?php echo URL?>libro_ocupado" class="black-text"><i class="material-icons">chevron_right</i>libros prestados</a></li>
                            <li><a href="<?php echo URL?>sanciones" class="black-text"><i class="material-icons">chevron_right</i>Sanciones</a></li>
                            <li><a href="<?php echo URL?>estados" class="black-text"><i class="material-icons">chevron_right</i>Estado del libro</a></li>
                        </ul>
                    </div>

            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">import_contacts</i>Libros</div>

                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>libros" class="black-text"><i class="material-icons">chevron_right</i>Libros</a></li>
                            <li><a href="<?php echo URL?>autores" class="black-text"><i class="material-icons">chevron_right</i>Autores</a></li>
                            <li><a href="<?php echo URL?>editoriales" class="black-text"><i class="material-icons">chevron_right</i>Editorial</a></li>
                            <li><a href="<?php echo URL?>tipo_libro" class="black-text"><i class="material-icons">chevron_right</i>Tipo de libro</a></li>
                            <li><a href="<?php echo URL?>tipo_adquisicion" class="black-text"><i class="material-icons">chevron_right</i>Tipos de adquisicion</a></li>
                        </ul>
                    </div>

            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">people</i>usuarios</div>
                    <div class="collapsible-body orange accent-3">
                            <ul>

                                <li><a href="<?php echo URL?>empleados" class=" black-text"><i class="material-icons">chevron_right</i>Registrar</a></li>

                            </ul>
                    </div>
            </li>


            <li>
                <div class="collapsible-header">Cerrar sesión</div>
                    <div class="collapsible-body orange accent-3">
                            <ul>
                                <li><a href="<?php echo URL?>login/logout" class="black-text"">Salir</a></li>
                            </ul>
                    </div>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons orange-text">menu</i></a>

        <!--Import jQuery before materialize.js-->

        <?php
        }
        ?>


        <?php
    }

    public static function footer()
    {
        ?>
        <footer class="page-footer cyan lighten-2" id="footer_color">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="black-text"><font color="#ffffff"><b></b>Ubicación</font></h5>
                        <p class="grey-text white-text center-align">Paraje la comunidad S/N San Francisco Mihualtepec 51030, Donato Guerra, México.</p>

                        <h5 class="black-text"><font color="#ffffff"><b></b>Telefono</font></h5>
                        <p class="black-text"><font color="#ffffff">
                            7262513019
                        </font></p>

                    </div>
                    <div  class="col l6 s12">
                        <h5 class="black-text"><font color="#ffffff"><b></b>Correo</font></h5>
                        <p class="black-text"><font color="#ffffff">
                            Epo255@edugem.gob.mx
                        </font></p>
                    </div>
                    <div class="col l3 s12 amber lighten-5">
                        <h5 class="orange-text center-align">Redes Sociales</h5>
                        <ul><i class="small material-icons center-align"><a href="https://www.facebook.com/prepasf255/"><span class="icon-facebook" ></span></a></i>
                            <i class="small material-icons center-align"><a href="https://web.whatsapp.com/"><span class="icon-whatsapp "></span></a></i>
                            <i class="small material-icons center-align"><a href="https://www.instagram.com/epo255/?hl=es-la"><span class="icon-instagram"></span></a></i>
                            <i class="small material-icons center-align"><a href="https://plus.google.com/u/1/114372695279038049440?pageId=none"><span class="icon-gmail"></span></a></i>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright" id="foot_copy">
                <div class="container white-text right-align">
                    ® 2019
                </div>
            </div>
        </footer>
        </body>
        </html>
        <?php
    }
}