<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article>
            <header>
                <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

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
                <?php the_content(); ?>
            </section>


            <footer>
                <!-- inserisco il cambiapagina nella mia pagina di articolo, devo mettere nextpage da wp però! -->
                <?php
                the_tags('Tags: ', ', ', '.');

                $args = array(
                    'before' => '<div id="impag">' . __('Pagine: ', 'templatezero'),
                    'after' => '</div>',
                    'next_or_number' => 'number',
                );

                wp_link_pages($args);
                ?>
            </footer>
        </article>

        <?php
    endwhile;
else:
    ?>

    <!-- Aggiungere un messaggio di errore -->

<?php endif; ?>