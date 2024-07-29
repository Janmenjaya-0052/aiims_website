<?php
/**
 * Template Name: 404 pages Template
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header('inner');
?>
	<div class="pageerror">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
				</header><!-- .page-header -->
				<div class="img_404"><img src="<?php echo get_template_directory_uri();?>/img/404error_background.png" title="404 Not Found"/> </div>
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location.', 'twentynineteen' ); ?></p>
					<h2>404 <br/> <span>Page Not Found</span></h2>
					<div class="backtohome"><a href="<?php echo get_site_url(); ?>" alt="">Back to Home </a></div>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->
	</div>

<?php
get_footer();
