<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<div class="breadcrumps_section">
   <div class="tringle_div">   
   </div>
   <div class="content">
      <h1><?php echo the_title(); ?></h1>
      <ul>
         <li><a href="<?php echo get_site_url(); ?>" target="_blank">Home</a></li>
         <li class="active"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
      </ul>
   </div>
</div>
  <div class="py-4">
    <div class="container">
		<div class="inner-content">
			<?php echo the_content(); ?>
		</div>
    </div>
  </div>

	
<?php get_footer(); ?>
