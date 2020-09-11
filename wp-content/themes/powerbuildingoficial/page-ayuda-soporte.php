<?php  get_header(); ?>
    <section id="help-page" class="margin-top-page">
        <div class="container">
            <div class="row">

                <div class="col-md-9 col-md-push-3">
                    <div class="content-help-page">

                        <h1>SOPORTE</h1>
                        <br>
                        <h5>¿Necesitas ayuda?</h5>
                        <h6> <i class="glyphicon glyphicon-phone"></i> +34 661 01 73 17</h6>
                        <p>De lunes a viernes de 10:00 a 19:00 </p>
                        <h6> <i class="glyphicon glyphicon-envelope"></i> soporte@powerbuildingoficial.com</h6>
                        <p>Tiempo de respuesta de 2 horas</p>
                        <br>
                        <h5>Envíanos un mensaje ahora</h5>
                        
                        <?php echo do_shortcode('[formidable id=2]');  ?>
                    </div>
                </div>

                <div class="col-md-3 col-md-pull-9">
                    <div id="wrapperMenu">
                        <ul id="menu-dashboard" class="nav nav-pills nav-stacked">

                            <li><a href="<?php echo get_home_url() ?>/index.php/ayuda-terminos-y-condiciones">Términos y Condiciones</a></li>

                              <li><a href="<?php echo get_home_url() ?>/ayuda-privacidad">Privacidad</a></li>

                            <li><a href="<?php echo get_home_url() ?>/index.php/ayuda-cambios-y-devoluciones">Cambios y devoluciones</a></li>

                            <li><a href="<?php echo get_home_url() ?>/ayuda-envios-del-pedido">Envíos del pedido</a></li>

                            <li  class="active"><a href="<?php echo get_home_url() ?>/ayuda-soporte">Soporte</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section id="btn-top">
        <span class="ir-arriba glyphicon glyphicon-chevron-up">
        </span>
    </section>
<?php  get_footer(); ?>    