<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/image/favicon.png" type="image/x-icon" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper"> 
	<div class="page">
	    <header> 
      <!-- header top bar -->
      <div class="top-bar blue-color-bg">
        <div class="container">
          <div class="row"> 
            <!-- support -->
            <div class="col-sm-6 col-md-6 col-lg-6">
            <?php if ( function_exists ( dynamic_sidebar('header_information') ) ) : ?>
            <?php dynamic_sidebar ('header_information'); ?>
            <?php endif; ?>
            </div>
            <!-- / support --> 
            <!-- language currency -->
            <div class="col-md-6 col-lg-6 lang-currency">
			  <?php wp_nav_menu( array( 'menu' => 'social_menu','menu_class' => 'nav navbar-nav pull-right sociallinks','container'=>'') ); ?>
            </div>
            <!-- / lang currency --> 
          </div>
        </div>
      </div>
      <!-- / header top bar --> 
      <!-- header center -->
      <div class="header-container white-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4  col-lg-4">
              <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="logo"><img alt="logo" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/image/logo.png"></a> </div>
            </div>
             <div class="col-sm-4 col-md-4 col-lg-4">
                 <div class="header-cart-mini mobile-center">
        			  <?php if ( function_exists ( dynamic_sidebar('product_search') ) ) : ?>
        			  <?php dynamic_sidebar ('product_search'); ?>
                      <?php endif; 
        			  ?>
			  </div>
                 </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="header-cart-mini mobile-center" style="margin-top:0px;">
			  <?php if ( function_exists ( dynamic_sidebar('contact_information') ) ) : ?>
			  <?php dynamic_sidebar ('contact_information'); ?>
              <?php endif; 
			  ?>
			  </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / header Container --> 
      <!-- header menu -->
      <div class="header-menu headerpng">
        <div class="container"> 
          <!-- header menu -->
          <div class="nav-container">
            <nav class="navigation" id="sf-menu">
               <ul class="sf-menu sf-js-enabled sf-arrow">
                <!--<li <?php if(is_front_page()) { ?>class="acitve" <?php } ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li> -->
                <li <?php if(is_page(11)) { ?>class="acitve" <?php } ?>><a href="<?php echo get_permalink(11); ?>">About Us</a></li>
                <!--<li class="megamenu <?php if(is_product_category()){?>active<?php } ?>"> <a href="<?php echo get_category_link(34); ?>">Products</a></li>-->
                <!--<li <?php if(is_page(13)) { ?>class="acitve" <?php } ?>> <a href="<?php echo get_permalink(13); ?>">Promotions</a></li>-->
                <li <?php if(is_page(15)) { ?>class="acitve" <?php } ?>> <a href="<?php echo get_permalink(15); ?>">Gallery</a> </li>
                <li class="sfish-menu" <?php if(is_page(55) || is_page(57)) { ?>class="acitve" <?php } ?>> <a href="" class="activered">Contact Us <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                  <ul class="menu-animation sfmenuffect">
                    <li> <a href="<?php echo get_permalink(55); ?>">Locations and Timings</a> </li>
                    <li> <a href="<?php echo get_permalink(57); ?>">Career</a> </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <div class="mobile-container " style="display: none">
          <div class="mobile-menu-toggle">
              <ul>
                <li class="toggle-icon"><a href="#">Categories</a></li>
              </ul>
          </div>
		  <div style="display: none;" class="mobile-main-menu">
              <ul class="accordion">
                <li class="home"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li> <a href="<?php echo get_permalink(11); ?>">About Us</a></li>
                <li> <a href="<?php echo get_category_link(34); ?>">Products</a></li>
                <li><a href="<?php echo get_permalink(13); ?>">Promotions</a> </li>
                <li><a href="<?php echo get_permalink(15); ?>">Gallery</a> </li>
                <li class="parent "> <a href="#">Contact Us</a>
                  <ul class="children fullchildres" style="display: none;">
                    <li> <a href="<?php echo get_permalink(55); ?>">Locations and Timings</a> </li>
                    <li> <a href="<?php echo get_permalink(57); ?>">Career</a> </li>
                  </ul>
                  <span class="down-up">&nbsp;</span> </li>
              </ul>
            </div>
          </div>
		</div>
      </div>
</header>