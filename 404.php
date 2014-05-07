<?php get_header(); ?>

<!-- Inizio Content -->

<div class="row">
    <div class="col-sm-2"> <?php get_sidebar('left'); ?> </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-8">
                <div class="striscia1"> GENNY </div>

                <div id="main" role="main">
                    <h1>Pagina Non Trovata</h1>
                    <p>Siamo spiacenti ma non riusciamo a trovare la pagina che stavi cercando.</p>
                    <p>Ecco che cosa potresti fare:</p>

                    <div class="sx"><!-- Sinistra -->

                        <ul>
                            <li>Potresti consultare la lista di articoli che trovi qua a destra;</li>
                            <li>Consulta gli archivi degli ultimi mesi;</li>
                            <li>Mandami pure una email a
                                <a href="mailto://mia@mail.it" title="Manda una mail">mia@mail.it</a>
                            </li>
                            <li>Utilizza il modulo di ricerca sottostante.</li>
                        </ul>
                        <?php get_search_form(); ?>
                    </div><!-- Fine .sx -->

                </div>
            </div><!-- fine col-sm-8 -->
            <div class="col-sm-4">
                <div class="dx"><!-- Destra -->
                    <h2>Articoli recenti</h2>
                    <ul>
                        <?php
                        $loop = new WP_Query('posts_per_page=6');
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </ul>

                    <h2>Archives by Month:</h2>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </div><!-- Fine .dx -->
            </div><!-- fine col-sm-4 -->
        </div>

    </div> <!-- fine col-sm-6 -->
    <div class="col-sm-2">
        <div class="striscia2"> <div class="parola">INF</div> <div class="retta"></div> </div>
        <?php get_sidebar('singola'); ?>

    </div> <!-- fine col-ms-2 -->
    <div class="col-sm-2"> <?php get_sidebar('right'); ?> </div>
</div> <!-- chiudo row -->
<!-- Fine Content -->

<?php get_footer(); ?>