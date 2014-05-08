<?php get_header(); ?>

<div class="row">
    <div class="col-sm-2"> <?php get_sidebar('left'); ?> </div>
    <div class="col-sm-5">

        <!-- Inizio Content -->
        <div class="striscia1"> GENNY </div>
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
                        &nbsp &nbsp &nbsp
                        <span class="autore">
                            Written by: <?php the_author_link(); ?>
                        </span>
                        &nbsp &nbsp &nbsp
                        <span class="cat">
                            Categories: <?php the_category(','); ?>
                        </span>
                    </div>
                </header>

                <section class="contenuto-art">
                    <?php the_content('<div class="readmore"><p class="moretext">' . __('Read More', 'am_template') . '</p></div>'); ?>
                </section>

                <footer>
                    <div class="mainfooter"> <?php the_tags('Tags: ', ', ', '.'); ?> </div>
                </footer>
            </article>

            <?php
        endwhile;
        wp_reset_query();
        ?>





    </div> <!-- fine col-sm-5 -->
    <div class="col-sm-3">
        <!-- Inizio Content -->
        <div id="main" role="main">
            <div class="striscia2"> <div class="parola">POSTS</div> <div class="retta"></div> </div>
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
                                &nbsp &nbsp &nbsp
                                <span class="autore">
                                    Written by: <?php the_author_link(); ?>
                                </span>
                                </br>
                                <span class="cat">
                                    Categories: <?php the_category(','); ?>
                                </span>
                            </div>
                        </header>

                        <section class="contenuto-art">
                            <?php the_content("Continua a Leggere"); ?>
                        </section>

                        <footer>
                            <?php the_tags('Tags: ', ', ', '.'); ?>
                        </footer>
                    </article>
                    <?php
                endwhile;
            else:
                ?>

                <!-- Aggiungere un messaggio di errore --> Non c'è alcun articolo!

            <?php endif; ?>

        </div>


    </div> <!-- fine col-ms-3 -->
    <div class="col-sm-2"> <?php get_sidebar('right'); ?> </div>
</div> <!-- chiudo row -->
<!-- Fine Content -->

<?php get_footer(); ?>

