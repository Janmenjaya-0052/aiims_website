<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="All India Institute Medical Science,Skills,silicontechlab,University,BBSR">
	<meta name="description" content="AIIMS Bhubaneswar">
	<link rel="shortcut icon" href="<?php echo get_site_url(); ?>/wp-content/themes/university/favicon.png">
  <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/university/css/style.css">

  <!-- Fontawesome Link for Icons -->
  <!--<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/university/css/all.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <!-- bootstrap css -->
  <link href="<?php echo get_site_url(); ?>/wp-content/themes/university/css/bootstrap.min.css" rel="stylesheet">

  <!-- gfont css -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <!-- AOS css -->
  <link href="<?php echo get_site_url(); ?>/wp-content/themes/university/css/datatables.min.css" rel="stylesheet">
  <link href="<?php echo get_site_url(); ?>/wp-content/themes/university/css/aos.css" rel="stylesheet">

  <!-- GSAP -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/gsap.min.js"></script>

  <!-- jQuery library -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/jquery.slim.min.js"></script>
	<?php wp_head(); ?>
</head>
  <div id="navbar_01" style="background: #FFE5D7;">
    <div class="container py-1" style="padding: 0 25px;">
      <div class="row ">

        <div class="col-md-5 mb-1 mb-md-0 p-0 flex_box">
          <img class="px-0 px-md-1" src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/nav1_logo1.svg" alt="">
		  <ul class="flex_box nav1part1">
          <li>Government of India</li>
          <li>ଓଡ଼ିଆ</li>
		  </ul>
        </div>
        <div class="col-md-7 p-0 flex_box justify-content-md-end text-center">
		  <ul class='flex_box nav1part2'>
            <li>Skip to Main Content</li>
            <li>Skip to Navigation</li>
            <li>Screen Reader Access </li>
		  </ul>
          <div class="flex_box" id="nav1_display1">
			<ul class='flex_box nav1part3'>
            <li class="m-0 small_box" id="btn-decrease">-A</li>
            <li class="m-0 small_box" id="btn-orig">A</li>
            <li class="m-0 small_box" id="btn-increase">+A</li>
            <li class="m-0 color_blind_box" id="White"></li>
            <li class="m-0 color_blind_box" id="black"></li>
			</ul>
          </div>
          <div id="nav1_display2">
		  <ul class='flex_box nav1part4'>
            <li class="m-0 small_box" id="btn-decrease">-A</li>
            <li class="m-0 small_box" id="btn-orig" >A</li>
            <li class="m-0 small_box" id="btn-increase">+A</li>
            <li class="m-0 mt-1 color_blind_box" id="White"></il>
            <li class="m-0 color_blind_box" id="black"></li>
			</ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===========navbar-02============ -->
  <nav class="navbar navbar-expand-lg px-1 p-0" id="navbar_02">
    <div class="container">
      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/nursingLogo.png" alt="" id="nursing_nav2_img1" class="my-2">    
      <a href="<?php echo get_site_url(); ?>" id="nursing_nav2_btn">
        <i class="fa fa-share fa-lg"></i>
        Back to Main Aiims Website
      </a>
    </div>
  </nav>

  <!-- ===========navbar-03============ -->
  <nav id="main-navbar">
    <div class="container">
      <div class="mobile-nav-content">
        <span>AIIMS<br>BBSR</span>
        <button id="menu-toggler">
          <i class="fa fa-bars"></i>
          <i class="fa fa-close"></i>
        </button>
      </div>
		<?php
			wp_nav_menu(array(
				'theme_location'  => 'nurshing',
				'menu_class'      => 'menu',
				'container'       => false,
				'walker'          => new Custom_Menu_Walker(),
			));
		?>
    </div>
  </nav>