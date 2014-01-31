<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title('-', true, 'right'); bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="wrapper">
            <nav class="main-menu">
                <?php
                $args = array(
                    'theme-location' => 'primary',
                    'container' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>'
                );
                wp_nav_menu($args);
                ?>
            </nav>   
