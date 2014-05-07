<?php get_header(); ?>

<div class="row">
    <div class="col-sm-2"> <?php get_sidebar('left'); ?> </div>
    <div class="col-sm-5">
        <!-- Inizio Content -->
        <div class="striscia1"> GENNY </div>
        <div id="main" role="main">
        <!-- se non è presente il contenuto (almeno un <p>), il css puo' non essere visualizzato correttamente! -->
            <?php get_template_part('content', 'single'); ?>

            <?php comments_template(); ?>
        </div>

    </div> <!-- fine col-sm-5 -->
    <div class="col-sm-3">
        <div class="striscia2"> <div class="parola">INFO</div> <div class="retta"></div> </div>
        <?php get_sidebar('singola'); ?>

    </div> <!-- fine col-ms-3 -->
    <div class="col-sm-2"> <?php get_sidebar('right'); ?> </div>
</div> <!-- chiudo row -->
<!-- Fine Content -->

<?php get_footer(); ?>