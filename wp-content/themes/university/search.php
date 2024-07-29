<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header('inner');
?>
<section class="inner-header divider layer-overlay overlay-dark-5" style="background:url(<?php echo get_site_url();?>/wp-content/uploads/2021/04/inner-header.jpg) no-repeat; background-size: cover;">
    <div class="container">
		<div class="section-content">
			<div class="row">
				<div class="col-md-12">
				  <h2 class="title text-white text-center"><?php echo get_the_title(); ?></h2>             
				</div>
			</div>
		</div>
    </div>
</section>
<section id="primary" class="ftco-section content-area">
	<div class="container">
		<div class="row">
        <div class="col-lg-12 ftco-animate">
		<main id="main" class="site-main">
		
		<?php if ( have_posts() ) : ?>

			
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
		</div>
		</div>
		</div>
</section><!-- #primary -->
<?php
get_footer();