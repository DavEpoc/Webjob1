<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//Carico il file esterno per le Impostazioni del tema
require_once( TEMPLATEPATH . '/inc/impostazioni_tema.php');

// Rendo il tema disponibile alle traduzioni
// Le traduzioni potranno essere trovate dentro la cartella /languages/

function localizzo_tema() {
    load_theme_textdomain('templatezero', TEMPLATEPATH . '/languages');

    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if (is_readable($locale_file)) {
        require_once($locale_file);
    }
}

add_action('after_setup_theme', 'localizzo_tema');

// Creo il mio primo menu
if (function_exists('register_nav_menu')) {
    register_nav_menu('principale', 'Header Menu');
}

function zero_widget_area() {

    //sidebar principale
    register_sidebar(
            array(
                'name' => 'Sidebar Principale',
                'id' => 'principale-sidebar',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );

    //Messaggio Benvenuto
    register_sidebar(
            array(
                'name' => 'Messaggio Benvenuto',
                'id' => 'benvenuto',
                'before_widget' => '<div id="benvenuto">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>'
            )
    );

//Sidebar Singola Pagina
    register_sidebar(
            array(
                'name' => 'Sidebar Singola',
                'id' => 'sidebar-singola',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );

//Sezione Footer
    register_sidebar(
            array(
                'name' => 'Footer',
                'id' => 'area-footer',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );
    //Sezione Laterale sinistra
    register_sidebar(
            array(
                'name' => 'Sidebar left',
                'id' => 'sidebar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );

    //Sezione Laterale destra
    register_sidebar(
            array(
                'name' => 'Sidebar right',
                'id' => 'sidebar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );

    //Sezione Laterale destra
    register_sidebar(
            array(
                'name' => 'Sidebar mainimage',
                'id' => 'sidebar-mainimage',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );
}

add_action('widgets_init', 'zero_widget_area');

// Attivo le immagini in evidenza
add_theme_support('post-thumbnails');

// Le dimensioni per l'immagine slider
add_image_size('slider-img', 500, 300, true);

//Carichiamo il codice jQuery (functions.php)PHP

add_action('wp_enqueue_scripts', 'tz_init');

function tz_init() {
    $theme_url = get_template_directory_uri();
    wp_register_script('tz-slider', "$theme_url/js/tz_slider.js", array('jquery'), '0.0.1', false);

    wp_enqueue_script('jquery');
    wp_enqueue_script('tz-slider');
}

//FUNZIONI DIFFERENTI PER COMMENTI

/* Mostra Commenti (controllo HTML commenti,se sono sia di computer che degli utenti!) */

function tz_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li>Caso Pingback o Trackback</li>
            <?php
            break;
        default :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <!-- HTML da utente umano -->
                <article class="comment">
                    <div class="comment-info">
                        <span class="comment-auth">
                            Comment By: <?php comment_author_link(); ?>
                        </span>
                        &nbsp &nbsp &nbsp
                        <span title="<?php comment_date('c'); ?>">
                            <time class="comment-time" pubdate datetime="<?php comment_date('c'); ?>">
                                <?php comment_time('j F, Y'); ?>
                            </time>
                        </span>

                        <?php if ($comment->comment_approved == '0') : ?>
                            <em class="comment-awaiting-moderation"><?php _e('Il tuo commento sta aspettando la moderazione.', 'am_template'); ?></em>
                            <br />
                        <?php endif; ?>

                    </div><!-- .comment-info -->

                    <p><?php comment_text(); ?></p>

                </article><!-- .comment -->
            </li>
            <?php
            break;
    endswitch;
}

//this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-author vcard">

            <div class="comment-meta"><a href="<?php the_author_meta('user_url'); ?>"><?php _e('Written By ', '  ', '') ?><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
            <small><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?><?php edit_comment_link(__('(Edit)'), '  ', '') ?></small>
            <small></small>
        </div>
        <div class="clear"></div>

        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-text">
            <?php echo get_avatar($comment, $size = '48', $default = '<path_to_url>'); ?>
            <?php comment_text() ?>
        </div>

        <div class="reply">
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        <div class="clear"></div>
    <?php } ?>