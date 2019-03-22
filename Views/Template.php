<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 20/03/2019
 * Time: 08:15 PM
 */

namespace Views;


new Template();

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
            <title>Biblioteca </title>
        </head>

        <body>


        <nav id="menusito">

            <div id="barra_arriba" class="nav-wrapper cyan lighten-2"><a href="<?php echo URL?>empleado_bienvenido" class="brand-logo" style="height: 60px;"><img src="Public/imagenes/escudo.jpg" width="150px" height="60px"/></a>
                <?php if(!isset($_SESSION["username"]))
                {?>
                <div id="barra_arriba" class="nav-wrapper cyan lighten-2"><a href="<?php echo URL?>inicio" class="brand-logo"><img src="Public/imagenes/escudo.jpg" width="160px" height="65px"/></a>
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
                            <img src="<?php echo URL?>Public/imagenes/prepa.jpg">
                        </div>

                        <div class="row">
                            <div class="col s5"><img class="circle" src="<?php echo URL?>Public/imagenes/Cesars.jpeg"></div>
                            <div class="col s1"></div>
                            <div class="col s5" align="right"><a href="<?php echo URL?>Settings"><i class="material-icons black-text ">settings</i></a></div>
                        </div>
                        <a href="#!name"><span class="black-text name">Administrador</span></a>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">airline_seat_individual_suite</i>Reservaciones</div>
                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>clientes" class=" black-text"><i class="material-icons">chevron_right</i>Clientes</a></li>
                            </li>
                            <li><a href="<?php echo URL?>habitaciones" class="black-text"><i class="material-icons">chevron_right</i>Habitaciones</a>
                            </li>
                            <li><a href="<?php echo URL?>checkin" class="black-text"><i class="material-icons">chevron_right</i>Check-In</a></li>
                            <li><a href="<?php echo URL?>checkout" class="black-text"><i class="material-icons">chevron_right</i>Check-Out</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">business_center</i>Servicios</div>
                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>servicios" class="black-text"><i class="material-icons">chevron_right</i>Servicios</a></li>
                            <li><a href="<?php echo URL?>asigna_servicios" class="black-text"><i class="material-icons">chevron_right</i>Asignar Servicios</a></li>
                            <li><a href="<?php echo URL?>ticket" class="black-text"><i class="material-icons">chevron_right</i>Lavanderia</a></li>
                        </ul>
                    </div>

                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">dns</i>Almacen</div>

                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>productos" class="black-text"><i class="material-icons">chevron_right</i>Admin Almacen</a></li>
                            <li><a href="<?php echo URL?>Tipos_producto" class="black-text"><i class="material-icons">chevron_right</i>Tipos productos</a></li>
                            <li><a href="<?php echo URL?>categorias_producto" class="black-text"><i class="material-icons">chevron_right</i>Categorias producto</a></li>
                        </ul>
                    </div>

                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">directions_run</i>Empleados</div>
                    <div class="collapsible-body orange accent-3">
                        <ul>

                            <li><a href="<?php echo URL?>empleados" class=" black-text"><i class="material-icons">chevron_right</i>Registro</a></li>

                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">local_convenience_store</i>Mantenimiento</div>

                    <div class="collapsible-body orange accent-3">
                        <ul>
                            <li><a href="<?php echo URL?>tareas" class="black-text"><i class="material-icons">chevron_right</i>Control Tarea</a></li>
                            <li><a href="<?php echo URL?>Equipo_seguridad" class="black-text"><i class="material-icons">chevron_right</i>Equipo de Seguridad</a></li>
                            <li><a href="<?php echo URL?>Tipo_equiposegu" class="black-text"><i class="material-icons">chevron_right</i>Tipos de Equipo</a></li>
                            <li><a href="<?php echo URL?>Estado_mantenimiento" class="black-text"><i class="material-icons">chevron_right</i>Estados</a></li>
                            <li><a href="<?php echo URL?>tipo_tarea" class="black-text"><i class="material-icons">chevron_right</i>Tipo de Tarea</a></li>
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
                        <p class="grey-text white-text center-align">Paraje la comunidad San francisco Mihualtepec,51030
                            Donato Guerra, Méx.</p>
                        <p class="grey-text white-text center-align">TELEFONO: 7262513019, CORREO: Epo255@edugem.gob.mx </p>
                    </div>
                    <div class="col l3 s12 amber lighten-5">
                        <h5 class="orange-text center-align">Redes Sociales</h5>
                        <ul><i class="small material-icons center-align"><a href="https://www.facebook.com/AdmonISC601/"><span class="icon-facebook" ></span></a></i>
                            <i class="small material-icons center-align"><a href="https://web.whatsapp.com/"><span class="icon-whatsapp "></span></a></i>
                            <i class="small material-icons center-align"><a href="https://www.instagram.com/hotelcasablanca_wh601/?hl=es-la"><span class="icon-instagram"></span></a></i>
                            <i class="small material-icons center-align"><a href="https://plus.google.com/u/1/114372695279038049440?pageId=none"><span class="icon-gmail"></span></a></i>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright" id="foot_copy">
                <div class="container white-text right-align">
                    ® 2018
                </div>
            </div>
        </footer>
        </body>
        </html>
        <?php
    }
}