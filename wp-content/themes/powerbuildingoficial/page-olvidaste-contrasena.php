<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<?php  get_header(); ?>

    <section id="olvidaste-contrasena" class="margin-top-page">
        <div class="container">
            <div class="title-page text-center">
                <h1>Olvistaste tu contraseña</h1>

            </div>

            <div class="login-box">
                    <div id="send-email-successful">
                            <h4><span class="glyphicon glyphicon-ok-circle"></span>
                                Se ha enviado el correo para reestablecer la contraseña.</h4>
                            <p>Revisa tu correo y sigue las instrucciones.</p>
                        </div>

                    <p class="description-olvidaste-contrasena">Por favor, proporcione su dirección 
                            de correo electrónico. Le enviaremos
                             un correo electrónico con un enlace 
                             e instrucciones sobre cómo cambiar su contraseña.</p>

                <div id="successful-registration">
                    <h4><span class="glyphicon glyphicon-ok-circle"></span>
                        El registro se ha realizado exitosamente.</h4>
                    <p>Ahora ya puedes Iniciar Sesión</p>
                    <a  href="">Iniciar Sesión</a>
                </div>



                <div class="login-block -narrow">

                    <form class="login-form" role="form" method="post">

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="user_login" id="user_login" autocomplete="username" placeholder="Email" />    
                        </div>
                        <div class="clear"></div>

                        <?php do_action( 'woocommerce_lostpassword_form' ); ?>
                        <div class="action-send text-center">
                                <input type="hidden" name="wc_reset_password" value="true" />
                                <button id="" type="submit" name="sign-in-button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"
                                    class="btn btn-default action-login-btn buttom-gradient-red">Enviar correo</button>
                        </div>
                         <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
                    </form>
                    <?php do_action( 'woocommerce_after_lost_password_form' );?>
                </div>

                <footer class="sign-up-footer">
                    <p>Volver a <a href="<?php echo get_home_url() ?>/index.php/iniciar-sesion">Iniciar Sesión</a></p>
                </footer>
            </div>

        </div>
    </section>

    <section id="btn-top">
        <span class="ir-arriba glyphicon glyphicon-chevron-up">
        </span></section>

<?php  get_footer(); ?>

