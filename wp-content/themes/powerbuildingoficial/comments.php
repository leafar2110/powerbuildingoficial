<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <?php 
      $args = array(
        'fields' => apply_filters(
          'comment_form_default_fields', array(
            'author' =>'<p class="comment-form-author">' . '<input id="author" placeholder="Nombre" name="author" type="text" value="' .
            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
            '<label for="author">' . __( '' ) . '</label> ' .
            ( $req ? '<span class="required">*</span>' : '' )  .
            '</p>'
            ,
            'email'  => '<p class="comment-form-email">' . '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' />'  .
            '<label for="email">' . __( '' ) . '</label> ' .
            ( $req ? '<span class="required">*</span>' : '' ) 
            .
            '</p>'
          )
        ),
        'comment_field' => '<p class="comment-form-comment">' .
        '<label for="comment">' . __( '' ) . '</label>' .
        '<textarea id="comment" name="comment" width="100%" rows="7" aria-required="true"></textarea>' .
        '</p>',
        'comment_notes_after' => '',
        'must_log_in' => "<textarea rows='20' width='100%' disabled style='resize:none;'>Debes registrate para poder comentar</textarea>",
      );
      ?>

      <div id="comments" class="comments-area">
        <?php if ( have_comments() ) : ?>
          <h3 class="comments-title">
          </h3>
          <ul class="comment-list">
            <?php 
            wp_list_comments( array(
              'short_ping'  => true,
              'avatar_size' => 50,
            ) );
            ?>
          </ul>
        <?php endif; ?>
        <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">
          <?php _e( 'Los comentarios estan cerrados' ); ?>
        </p>
      <?php endif; ?>
      <?php comment_form($args); ?>
    </div>
  </div>
  <div class="col-md-6"></div>
</div>
</div>