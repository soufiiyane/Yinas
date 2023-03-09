<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head() ?>

    <title>Yinas</title>

</head>

<body <?php body_class(); ?>>

 <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>



    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <?php 
           $group = get_field("top_navbar","option");
           $social = $group["top_navbar_social"];
           $image  = $group["top_navbar_image"];
           $menu = $group["top_navbar_menu"];
           if($social){
               ?>
                <div class="top-header">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Breaking News Area -->
                        <div class="col-6 col-sm-8">
                            <div class="breaking-news-area">
                                <div id="breakingNewsTicker" class="ticker">
                                
                                    <ul>
                                    <?php 
                                        $loopnames = get_field("tags_name","option");
                                        if($loopnames){
                                            foreach($loopnames as $name){
                                                ?>
                                                    <li><a href="#"><?php echo $name["tag_name"] ?></a></li>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                                <li><a href="#">Hello Universe!</a></li>
                                                <li><a href="#">Hello Original!</a></li>
                                                <li><a href="#">Hello Earth!</a></li>
                                                <li><a href="#">Hello Colorlib!</a></li>
                                            <?php
                                        }
                                    ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Top Social Area -->
                        <div class="col-6 col-sm-4">
                            <div class="top-social-area">
                            <?php
                                    $getfields = get_field("social_links","option");
                                    if($getfields){
                                        foreach($getfields as $field){
                                            ?>
                                            <a href="<?php echo $field["link"] ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $field["icon_name"] ?>"><?php echo $field["icone"] ?></a>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <?php
           }
           if($image){
               ?>
                <div class="logo-area text-center">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <a href="#" class="original-logo"><img src="<?php echo get_theme_file_uri("assets/img/core-img/logo.png") ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
               <?php
           }
           if($menu){
               ?>
               <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">

                        <!-- Subscribe btn -->
                        <div class="subscribe-btn">
                            <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'  => 'primary',
                                        'depth'           => 5, // 1 = no dropdowns, 2 = with dropdowns.
                                        'container'       => false,
                                        'menu_class'      => '',
                                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'          => new WP_Bootstrap_Navwalker(),
                                    ) );
                                ?>
                                <!-- Search Form  -->
                                <div id="search-wrapper">
                                    <form action="<?php echo site_url() ?>" method="GET">
                                        <input type="text" name="s" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
               <?php
           }
        ?>
        
        
    </header>