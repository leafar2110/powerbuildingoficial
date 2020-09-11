<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

?>
<?php  get_header(); ?>

   <section id="iniciar-sesion" class="margin-top-page">
    <div class="container">
      <div class="title-page text-center">
        <h1>Regístrate!</h1>
      </div>

      <div class="login-box">

          <div id="error-registration">
              <h4><span class="glyphicon glyphicon-remove-circle"></span>
                  Datos incorrectos.</h4>
                  <p>Revisa tus datos e intentalo nuevamente</p>
      </div>

        <div class="login-block">
          <div class="btn-pair">
                      
            
            <a class="btn btn-default google-login-btn" id="theChampGoogleButton" alt="Login with Google" title="Login with Google" onclick="theChampInitiateLogin(this)"><i style="font-style: normal;"><span><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-google.svg" alt=""></span>Google</i></a>
            
        </div>

        <div class="login-divider">
          <div class="line-divider"></div>
          <p> ó cuentanos sobre ti</p>
        </div>

        <div class="login-block -narrow">

        <?php echo do_shortcode('[user_registration_form id="1578"]') ?>
        </div>

        <footer class="sign-up-footer">
          <p>¿Ya eres miembro? <a href="<?php echo get_home_url() ?>/index.php/finalizar-compra">Iniciar Sesión</a></p>
        </footer>
      </div>

    </div>
  </section>

  <section id="btn-top">
    <span class="ir-arriba glyphicon glyphicon-chevron-up">
  </span></section>

<?php  get_footer(); ?>

