<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head();?>
</head>
<body>


<div class="container <?php echo is_front_page() ? 'container--home' : '';?>">
   
    <!-- HEADER -->

    <header class="header">
        <div class="header__inner">
            <!-- BRANDING -->
            <a href="<?php echo is_front_page() ? '#home' : home_url('/'); ?>" class="branding">
               <?php the_custom_logo();?> 
            </a> 

            <!-- MENU -->

            <?php 

            if (is_front_page()) {
                $location = 'main_menu';
            } else {
                $location = 'main_menu_singular';
            }

            $args = [
                'theme_location'    => $location,
                'container'         => 'nav',
                'container_class'   => 'menu',
                'menu_class'        => 'menu__list',
   
            ];
            
            wp_nav_menu($args);
            ?>
            <button id="menu--button">Menu</button>
        </div>
    </header>