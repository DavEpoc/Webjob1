<?php get_header(); ?>


<!-- Inizio Content -->

<?php
$loop = new WP_Query('posts_per_page=1');
while ($loop->have_posts()) : $loop->the_post();
    ?>

    <article>
        <header>
            <h3><?php the_title(); ?></h3>
            <div class="meta">
                <time datetime="<?php the_date('c'); ?>" pubdate>
                    <?php the_time(get_option('date_format')); ?>
                </time>

                <span class="autore">
                    Scritto da: <?php the_author_link(); ?>
                </span>

                <span class="cat">
                    Categorie: <?php the_category(','); ?>
                </span>
            </div>
        </header>

        <section class="contenuto-art">
            <?php the_content('<div class="moretext">' . __('Read More', 'am_template') . '</div>'); ?>
        </section>

        <footer>
            <?php the_tags('Etichette', ', ', '.'); ?>
        </footer>
    </article>

    <?php
endwhile;
wp_reset_query();
?>





</div> <!-- fine col-sm-5 -->
<div class="col-sm-3">
    <div id="main" role="main">
        <?php dynamic_sidebar('benvenuto'); ?>
        <?php
        query_posts('posts_per_page=2&offset=1;');
        if (have_posts()) : while (have_posts()) : the_post();
                ?>
                <article>
                    <header>
                        <h3><?php the_title(); ?></h3>
                        <div class="meta">
                            <time datetime="<?php the_date('c'); ?>" pubdate>
                                <?php the_time(get_option('date_format')); ?>
                            </time>

                            <span class="autore">
                                Scritto da: <?php the_author_link(); ?>
                            </span>

                            <span class="cat">
                                Categorie: <?php the_category(','); ?>
                            </span>
                        </div>
                    </header>

                    <section class="contenuto-art">
                        <?php the_content("Continua a Leggere"); ?>
                    </section>

                    <footer>
                        <?php the_tags('Etichette', ', ', '.'); ?>
                    </footer>
                </article>
                <?php
            endwhile;
        else:
            ?>

            <!-- Aggiungere un messaggio di errore --> Non c'è alcun articolo!

        <?php endif; ?>

    </div>
    <!-- Fine Content -->


    <?php get_footer(); ?>

