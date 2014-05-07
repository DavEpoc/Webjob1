<?php get_header(); ?>
<!-- Inizio Content -->
<div class="row">
    <div class="col-sm-2"> <?php get_sidebar('left'); ?> </div>
    <div class="col-sm-6">
        <div class="striscia1"> GENNY </div>
        <div id="main" role="main">

            <?php if (have_posts()) : ?>
                <!-- Controllo tipo di archivio -->
                <?php $post = $posts[0]; ?>
                <?php if (is_category()) { ?>
                    <h1><?php _e('Archivio per la Categoria: ', 'templatezero'); ?> &#8216;<?php single_cat_title(); ?>&#8217; </h1>
                <?php } elseif (is_tag()) { ?>
                    <h1><?php _e('Archivio per il Tag: ', 'templatezero'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>
                <?php } elseif (is_day()) { ?>
                    <h1><?php _e('Archivio per Giorno: ', 'templatezero'); ?> <?php the_time('F jS, Y'); ?></h1>
                <?php } elseif (is_month()) { ?>
                    <h1><?php _e('Archivio per Mese: ', 'templatezero'); ?> <?php the_time('F, Y'); ?></h1>
                <?php } elseif (is_year()) { ?>
                    <h1><?php _e('Archivio per Anno: ', 'templatezero'); ?> <?php the_time('Y'); ?></h1>
                <?php } elseif (is_author()) { ?>
                    <h1><?php _e('Archivio per Autore: ', 'templatezero'); ?><?php the_author_link(); ?></h1>
                <?php } ?>

                <?php while (have_posts()) : the_post(); ?>

                    <article>
                        <header>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </header>

                        <section class="contenuto-art">
                            <?php the_excerpt(); ?>
                        </section>

                    </article>

                <?php endwhile; ?>

                <div id="nav-archivio">
                    <!-- link a fondo pagina per altri articoli -->
                    <p>
                        <?php next_posts_link('Vecchi Articoli'); ?>
                        <?php previous_posts_link('Nuovi Articoli') ?>
                    </p>
                </div>

            <?php else : ?>
                <!-- Messaggio di Errore -->
            <?php endif; ?>

        </div>

    </div> <!-- fine col-sm-6 -->
    <div class="col-sm-2">
        <div class="striscia2"> <div class="parola">INF</div> <div class="retta"></div> </div>
        <?php get_sidebar('singola'); ?>

    </div> <!-- fine col-ms-3 -->
    <div class="col-sm-2"> <?php get_sidebar('right'); ?> </div>
</div> <!-- chiudo row -->
<!-- Fine Content -->

<?php get_footer(); ?>