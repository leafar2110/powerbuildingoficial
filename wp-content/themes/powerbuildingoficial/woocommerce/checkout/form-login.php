<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
  return;
}

?>
   <section id="iniciar-sesion" class="margin-top-page">
    <div class="container">
      <div class="title-page text-center">
        <h1>Iniciar Sesión</h1>
      </div>

      <div class="login-box">

          <div id="error-registration">
              <h4><span class="glyphicon glyphicon-remove-circle"></span>
                  Datos incorrectos.</h4>
                  <p>Revisa tus datos e intentalo nuevamente</p>
      </div>

        <div class="login-block">
          <div class="btn-pair">
            <!--<a class="btn btn-default fbook-login-btn"><i  alt="Login with Facebook" title="Login with Facebook" onclick="theChampInitiateLogin(this)" style="display: block;"><span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-facebook.svg" alt="" style="display:block"></span>Facebook</i></a>     -->
            

            <a class="btn btn-default google-login-btn"><i id="theChampGoogleButton" alt="Login with Google" title="Login with Google" onclick="theChampInitiateLogin(this)"><span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-google.svg" alt=""></span>Google</i></a>
            
        </div>

        <div class="login-divider">
          <div class="line-divider"></div>
          <p> ó accede directamente</p>
        </div>

        <div class="login-block -narrow">

<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>



<?php endif; ?>
 

    <form class="login-form" method="post">

      <?php do_action( 'woocommerce_login_form_start' ); ?>
     <div class="form-group">
        <label for="username" class="sr-only">Nombre de usuario</label>
        <input type="text"  name="username" id="username" autocomplete="username" placeholder="Nombre de Usuario" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>     
     </div>       
     <div class="form-group">  
        <input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="current-password" />
        <a class="forgot" href="<?php echo get_home_url() ?>/index.php/olvidaste-contrasena">¿Lo olvidaste?</a> 
       
     </div> 

      <?php do_action( 'woocommerce_login_form' ); ?>

      <p class="form-row">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
          <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Recuerdame', 'woocommerce' ); ?></span>
        </label>
      </p>
      <div class="action-login text-center">  
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
        <button type="submit" class="btn btn-default action-login-btn buttom-gradient-red" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Iniciar Sesión', 'woocommerce' ); ?></button>
      </div>

      <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>



<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

        </div>

        <footer class="sign-up-footer">
          <p>¿Aún no eres miembro? <a href="<?php echo get_home_url() ?>/index.php/registrarse-compras"> Registrate gratis aquí</a></p>
        </footer>
      </div>

    </div>
  </section>
<?php

woocommerce_login_form(
  array(
    'message'  => __( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
    'redirect' => wc_get_page_permalink( 'checkout' ),
    'hidden'   => true,
  )
);
