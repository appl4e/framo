<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <!-- Meta tags and Title are added below -->
		<meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="author" content="Apple Mahmood">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/favicon.png ?>" />

		<!-- Stylesheets ar added below -->
		<!-- Equeued in functions.php -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<!-- Added Mordenizr below -->
        <!-- Equeued in functions.php -->

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<!-- Add your site or application content here -->
        <!-- Header Section Starts here -->
        <header>
            <div class="container">
                <div class="logo">
                    <?php  $logo = get_option('field_ids'); ?>
                    <img src="<?php echo $logo['logo']; ?>" alt="FRAMO" class="img-responsive">

                </div>
                <div class="social-icons pull-right hidden-xs">
                    <ul class="list-inline">
                        <?php
                            $field_arrays = (array)get_option('field_ids');
                            $facebook = $field_arrays['facebook'];
                            $twitter = $field_arrays['twitter'];
                            $pinterest = $field_arrays['pinterest'];
                            $linkedin = $field_arrays['linkedin'];
                            $instagram = $field_arrays['instagram'];
                            $google = $field_arrays['google'];
                            $youtube = $field_arrays['youtube'];

                        ?>
                        <?php if($facebook): ?>
                            <li><a href="<?php echo $facebook; ?>" class=""><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                        <?php if($twitter): ?>
                        <li><a href="<?php echo $twitter; ?>" class=""><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if ($google): ?>
                        <li><a href="<?php echo $google; ?>" class=""><i class="fa fa-google-plus"></i></a></li>
                        <?php endif; ?>
                        <?php if($pinterest): ?>
                        <li><a href="<?php echo $pinterest; ?>" class=""><i class="fa fa-pinterest"></i></a></li>
                        <?php endif; ?>
                        <?php if($linkedin): ?>
                        <li><a href="<?php echo $linkedin; ?>" class=""><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>
                        <?php if ($instagram): ?>
                        <li><a href="<?php echo $instagram; ?>" class=""><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if ($youtube): ?>
                        <li><a href="<?php echo $youtube; ?>" class=""><i class="fa fa-youtube"></i></a></li>
                        <?php endif; ?>

                    </ul>
                </div>
                <div class="menu visible-xs">
                    <div class="navbar navbar-default">
                        <div class="navbar-header">
                            <div class="location pull-left">
                                            <ul class="list-unstyled list-inline">
                                                <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                                                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                                            </ul>
                                        </div>
                            <button class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse" id="main-nav">
                            <?php
                                if(function_exists('wp_nav_menu')){
                                    wp_nav_menu(array(
                                        'theme_location' => 'mobile-menu',
                                        'menu_class' => 'nav navbar-nav navbar-right',
                                        'fallback_cb' => 'default_mobile_menu'
                                        ));
                                }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Section Ends here -->
