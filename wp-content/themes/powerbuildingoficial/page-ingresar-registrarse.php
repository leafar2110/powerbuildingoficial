<?php  get_header(); ?>

    <section id="registrarse" class="margin-top-page">
        <div class="container">
            <div class="title-page text-center">
                <h1>Registrate!</h1> <?php echo do_shortcode('[login]') ?>


            </div>

            <div class="login-box">

                <div id="successful-registration">
                    <h4><span class="glyphicon glyphicon-ok-circle"></span>
                       
                        El registro se ha realizado exitosamente.</h4>
                    <p>Ahora ya puedes Iniciar Sesión</p>
                    <a  href="iniciar-sesion.html">Iniciar Sesión</a>
                </div>

                <div id="error-registration">
                        <h4><span class="glyphicon glyphicon-remove-circle"></span>
                            Datos incorrectos.</h4>
                            <p>Revisa tus datos e intentalo nuevamente</p>
                </div>

                <div class="login-block">
                    <div class="btn-pair">
                        <a href="" class="btn btn-default fbook-login-btn">
                            <span><img src="images/icons/icon-facebook.svg" alt=""></span>Facebook</a>

                        <a href="" class="btn btn-default google-login-btn">
                            <span><img src="images/icons/icon-google.svg" alt=""></span>Google</a>
                    </div>
                </div>

                <div class="login-divider">
                    <div class="line-divider"></div>
                    <p> ó cuentanos sobre ti</p>
                </div>

                <div class="login-block -narrow">

                    <form class="login-form" role="form">

                        <div class="form-group">
                            <label for="first_name" class="sr-only">First Name</label>
                            <input id="first_name" name="first_name" type="text" placeholder="Nombre Completo"
                                required="required" aria-required="true" aria-invalid="false">
                        </div>

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" name="email" type="email" placeholder="Email" required="required"
                                aria-required="true">
                        </div>

                        <div class="form-group">
                            <label for="username" class="sr-only">Nombre de usuario</label>
                            <input id="username" type="text" placeholder="Nombre de Usuario" required=""
                                name="login_username" value="">
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">Contraseña</label>
                            <input id="password" type="password" required="" placeholder="Contraseña" name="password">


                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                placeholder="Confirmar contraseña" required="required">
                        </div>

                        <div class="action-login text-center">
                            <button id="" type="submit" name="sign-in-button"
                                class="btn btn-default action-login-btn buttom-gradient-red">Registrarse</button>
                        </div>

                    </form>

                </div>

                <footer class="sign-up-footer">
                    <p>¿Ya eres miembro? <a href="iniciar-sesion.html">Iniciar Sesión</a></p>
                </footer>
            </div>

        </div>
    </section>


<section id="voting">

    <div class="container" style="margin-top:200px">

            <div class="voting-posts-content">
              <div class="row">

                <!-- Post 1 -->
                <div class="col-md-12 col-sm-12 col-xs-12">
<?php echo do_shortcode('[TheChamp-Login]') ?>
                    <form action="#" method="POST" name="register-form" class="register_form">
                      <div class="the_champ_login_container"><ul class="the_champ_login_ul"><li><i class="theChampLogin theChampFacebookBackground theChampFacebookLogin" alt="Login with Facebook" title="Login with Facebook" onclick="theChampInitiateLogin(this)"><ss style="display:block" class="theChampLoginSvg theChampFacebookLoginSvg"></ss></i></li><li><i id="theChampGoogleButton" class="theChampLogin theChampGoogleBackground theChampGoogleLogin" alt="Login with Google" title="Login with Google" onclick="theChampInitiateLogin(this)"><ss style="display:block" class="theChampLoginSvg theChampGoogleLoginSvg"></ss></i></li></ul></div>
                      <h2 style="margin-bottom:20px">!Regístrate!</h2>
                      <p style="margin-bottom:20px" class="register-message" style="display:none"></p>
                      <div class="row">
                        <div class="col-sm-6 col-12" style="margin-bottom:15px">
                          
                          <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name" class="form-control">
                        </div>
                        <div class="col-sm-6 col-12" style="margin-bottom:15px">
                          <input class="form-control" type="email"  name="new_user_email" placeholder="Dirección de correo electrónico" id="new-useremail">
                        </div>
                      </div> 
        
                      <div class="row">
                        <div class="col-sm-6 col-12" style="margin-bottom:15px">
                          <input class="form-control" type="password"  name="Contraseña" placeholder="Password" id="new-userpassword">
                        </div>
                        <div class="col-sm-6 col-12" style="margin-bottom:15px">
                         <input class="form-control" type="password"  name="re_pwd" placeholder="Confirmar contraseña" id="re-pwd">
                        </div>
                      </div> 

                      <input type="submit"  class="custom-coach buttom-gradient-red" id="register-button" value="Registrarse" >
                    </form>       
                </div>
              </div>
            </div>
            <hr>
            <!-- login -->  
            <div class="voting-posts-content" style="margin-top:50px">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <h2>Ingresar</h2>

                   <form id="login" action="login" class="login_form" method="post">
                     <p class="status"></p>
                     <div class="col-sm-6 col-12" style="margin-bottom:15px">
                       <input class="form-control" id="username" type="text" name="username" placeholder="Nombre de usuario">
                     </div>
                     <div class="col-sm-6 col-12" style="margin-bottom:15px">     
                       <input class="form-control" id="password" type="password" name="password" placeholder="Contraseña">
                     </div>
                     <div class="col-sm-6 col-12" style="margin-bottom:15px">  
                       <input class="custom-coach buttom-gradient-red" type="submit" value="Ingresar" name="submit">
                     </div>   
                     <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                   </form>
                   <div class="modal_text">
                     <br>
                     <a href="<?php echo $reset_pass ?>">¿Has olvidado tu contraseña?</a>
                   </div>                
                </div>
              </div>
            </div>    


    </div>

</section>
<script type="text/javascript">
  // Envío y registro 
 jQuery('#register-button').on('click',function(e){
e.preventDefault();
var newUserName = jQuery('#new-username').val();
var newUserEmail = jQuery('#new-useremail').val();
var newUserPassword = jQuery('#new-userpassword').val();
var confirm_password = jQuery('#re-pwd').val();

jQuery.ajax({
    type:"POST",
    url:"<?php echo admin_url('admin-ajax.php'); ?>",
    data: {
    action: "register_user_front_end",
    new_user_name : newUserName,
    new_user_email : newUserEmail,
    new_user_password : newUserPassword,
    re_pwd : confirm_password,
    },
    success: function(results){
    console.log(results);
    jQuery('.register-message').text(results).show();
    },
     error: function(results) {
     }
 });
}); 
</script>
<?php  get_footer(); ?>

