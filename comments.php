<div id="comments">

    <h3 id="comments-title">
        <?php _e('Commenti', 'am_template'); ?>
    </h3>
    <?php
    $fields = array(
        'author' => '<div style="color:#555" class="comments-fields"><input type="text" value="" id="author" name="author" placeholder="Nome..." />',
        'email' => '<input style="color:#555" type="text" value="" id="email" name="email" placeholder="Email..." />',
        'url' => '<input style="color:#555" type="text" value="" id="url" name="url" placeholder="WebSite..." /></div>' /* chiudo div aperto in author */
    );

    /* sotto // c'è del codice aggiuntivo che mi permette di cambiare l'html del submit */

    ob_start();
    comment_form(array(
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => '<textarea class="form-control" maxlength="560" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Messaggio..."></textarea></div>',
        'title_reply' => '',
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        'label_submit' => __('Submit Comment', 'templatezero')
    ));


//comment_form($comments_args, $post_id);
    $form = ob_get_clean();
    $form = str_replace('class="comment-form"', 'class="comment-form my-class"', $form);
    echo str_replace('id="submit"', 'class="btn btn-warning"', $form);
    ?>

    <ol class="commentlist">
        <?php
        $args = array(
            'walker' => null,
            'max_depth' => '',
            'style' => '',
            'callback' => 'advanced_comment',
            'end-callback' => null,
            'type' => 'all',
            'reply_text' => 'Reply',
            'page' => '',
            'per_page' => '',
            'avatar_size' => 32,
            'reverse_top_level' => null,
            'reverse_children' => '',
            'format' => 'html5',); //or xhtml if no HTML5 theme

        wp_list_comments($args);
        ?>
    </ol>
    <!-- la chiusura del div comments non va messa!! -->
