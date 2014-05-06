<!doctype html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html lang="en" class="no-js html"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js html"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js html"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js html" lang="en"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php wp_title(''); ?></title>

        <meta name="description" content="">

        <meta name="author" content="">



        <!-- JQuery -->

        <script src="<?php bloginfo('template_url') ?>/jquery/jquery.js"></script>

        <!-- Bootstrap -->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/Bootstrap/bootstrap-3.1.1/dist/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?php /* bloginfo('template_url') */ ?>/Bootstrap/bootstrap-3.1.1/dist/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php bloginfo('template_url') ?>/Bootstrap/bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>


        <!-- Less.js -->

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?> ">
        <link rel="stylesheet/less" href="<?php bloginfo('template_url') ?>/less/style.less ">

        <script src="<?php bloginfo('template_url'); ?>/js/libs/less.js/dist/less-1.7.0.js" type="text/javascript"></script>

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <?php $opzioni = get_option('opt_impostazioni_tema'); ?>

        <div class="row">
            <div class="col-sm-12">
                <?php get_sidebar('mainimage'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <header>
                    <img id="logo" src="<?php echo $opzioni['logo']; ?>" title="<?php bloginfo('name'); ?> Logo" />
                    <!--               <hgroup>
                    <?php if (!is_single()) : ?>
                                                   <h1 id="titolo-sito"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                                   <h2 id="descrizione-sito"><?php bloginfo('description'); ?></h2>
                    <?php else : ?>
                                                   <h2 id="titolo-sito"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h2>
                                                   <h3 id="descrizione-sito"><?php bloginfo('description'); ?></h3>
                    <?php endif; ?>
                                   </hgroup> -->
                </header>
            </div>
            <div class="col-sm-8">
                <nav>
                    <?php wp_nav_menu('principale'); ?>
                </nav>
            </div>
        </div>

        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-2"> <?php get_sidebar('left'); ?> </div>
                <div class="col-sm-5">
                    <!-- Fine Header -->