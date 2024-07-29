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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content();


		?>

				<div class="col-12 col-carousel">
					<div class="owl-carousel carousel-main">
				<?php 
				$accord = 1;
				$haccord = 1;
				$qaccord = 1;
				if(is_page('shakarpur-i')){
					$campusgroup = 'shakarpur-campus-i';
				}if(is_page('ashok-vihar')){
					$campusgroup = 'ashok-vihar-campus';
				}if(is_page('dwarka')){
					$campusgroup = 'dwarka-campus';
				}if(is_page('maharani-bagh')){
					$campusgroup = 'maharani-bagh-campus';
				}if(is_page('okhla-i')){
					$campusgroup = 'okhla-i-campus';
				}if(is_page('okhla-ii')){
					$campusgroup = 'okhla-ii-campus';
				}if(is_page('dseu-okhla-iii-campus')){
					$campusgroup = 'okhla-iii-campus';
				}if(is_page('pusa')){
					$campusgroup = 'pusa-campus-i';
				}if(is_page('rajokri')){
					$campusgroup = 'rajokri-campus';
				}if(is_page('rohini')){
					$campusgroup = 'rohini-campus';
				}if(is_page('wazirpur')){
					$campusgroup = 'wazirpur-campus';
				}if(is_page('siri-fort')){
					$campusgroup = 'siri-fort-campus';
				}if(is_page('vivek-vihar')){
					$campusgroup = 'vivek-vihar-campus';
				}if(is_page('pitampura')){
					$campusgroup = 'pitampura-campus';
				}if(is_page('dseu-mayur-vihar-campus')){
					$campusgroup = 'mayur-vihar-campus';
				}if(is_page('dseu-dheerpur-campus')){
					$campusgroup = 'dheerpur-campus';
				}if(is_page('champs-dseu-okhla-ii-campus')){
					$campusgroup = 'champs-okhla-ii-campus';
				}if(is_page('dseu-wcsc-pusa-campus')){
					$campusgroup = 'pusa-campus-ii';
				}if(is_page('bhai-parmanand-dseu-shakarpur-campus-ii')){
					$campusgroup = 'shakarpur-campus-ii';
				}
						$tender_args = array( 
										'post_type' => 'campusesblock',
										'posts_per_page' => 3,
										'post_status' => 'publish',
										'order' => 'DESC',
										'tax_query' => array(
												'relation' => 'AND',
													array(
														'taxonomy' => 'category_campusblock',
														'field' => 'slug',
														'terms' => 'campus_news'
													),
													array(
														'taxonomy' => 'category_campusestype',
														'field' => 'slug',
														'terms' => $campusgroup
													)																
												)
									);		
						$loop = new WP_Query($tender_args);
						$count = 2;
						if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						$campusdsec = get_the_content();
					?>
						<div class="certification-item">
							<img src="<?php echo get_field('image'); ?>" />
							<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>"><h3><?php echo the_title(); ?></h3></a>
							<p>Date: <?php echo get_the_date(); ?></p>
						</div>
					<?php 
					
					endwhile; 
					
					}
							echo '<div class="container">';
							echo '<nav class="pagnav">';
							$big = 999999999; // need an unlikely integer
							 echo paginate_links( array(
								'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages
							) );
							echo '</nav>';
							echo "</div>";					
					wp_reset_query();
				?>
					</div>
					
				</div>
				<div class="col-12 col-carousel">
					<?php if( have_rows('videos') ): ?>
					<div class="owl-carousel carousel-partnersblock">
					<?php while( have_rows('videos') ): the_row(); 
						$videos_image = get_sub_field('videos_image');
						$video_link = get_sub_field('video_link');
					?>
						<div class="partnersblock-item">
							<div class="partnersblock-img"><a href="<?php echo $video_link; ?>"><img src="<?php echo $videos_image; ?>" title="...."/></a></div>
							
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
