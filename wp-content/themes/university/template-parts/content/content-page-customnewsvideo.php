<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<style>
.partnersblock-item img{width: 100%;}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?> 

				<div class="col-12 col-carousel">
								<?php 
								 $terms = get_field('news_category');
								 if( $terms ): ?>				
					<div class="owl-carousel anews" id="cnews">
			<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;	

					$args = array( 
						'post_type'=> 'allnews', 
						'posts_per_page' => -1,
						'post_status' => 'publish',
						'order' => 'DSC',
						);
					

				$loop_news = new WP_Query($args); $count = 1; ?>
				<?php while ( $loop_news->have_posts() ) : $loop_news->the_post(); 
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
										<?php 
											$term = get_field('news_category');
											if( $term == $terms ): ?>					
						<div class="certification-item">
							<img src="<?php echo get_field('image'); ?>" />
							<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"><h3><?php echo the_title(); ?></h3></a>
							<p>Date: <?php echo get_the_date(); ?></p>
						</div>
										<?php endif; ?>
										<?php wp_reset_query(); endwhile; ?>
					</div>
								<?php endif; ?>					
				</div>	
				
				<div class="col-12 col-carousel">
				<?php if( have_rows('videos') ): ?>
					<div class="owl-carousel carousel-partnersblock avideo">
				<?php while( have_rows('videos') ): the_row(); 
					$image = get_sub_field('thumbnail_image');
					$video_link = get_sub_field('video_link');
				?>					
						<div class="partnersblock-item">
							<div class="partnersblock-img"><a href="<?php echo $video_link; ?>" target="_blank" title="...."><img src="<?php echo $image; ?>" title="...."/></a></div>
							
						</div>
				<?php endwhile; ?>
					</div>
				<?php endif; ?>	
				</div>					
				
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
