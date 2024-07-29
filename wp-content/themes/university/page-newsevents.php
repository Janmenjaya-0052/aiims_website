<?php
/**
 * Template Name: News and Events Template
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

  <!-- ==========================breadcrumps===================================== -->

	
  <div class="py-4">
    <div class="container">
		<div class="inner-content">
		
			<div class="table-responsive">
			<table class="table table-bordered table-striped" id="singles" border="0" cellspacing="0" cellpadding="0">
			  <thead>
			  <tr>
			  <th width="10%">Sl. No.</th>
			  <th width="70%"> Title</th>
			  <th width="10%"> Publish Date</th>
			  <th width="10%"> Download</th>			  
			  </tr>
			  </thead>
			  <tbody>
					<?php 
						$current_date = date('Ymd');
						$tender_args = array(
							'post_type' => 'newsevents',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							'order' => 'DSC',
						);
					$loop = new WP_Query($tender_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();						
						$pre_bid_minutes = get_field('pre_bid_minutes');						
					?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count++; ?></td>
					  <td><?php the_title(); ?></td>					  		  
					  <td><?php echo get_the_date( 'd/m/Y' ); ?></td>					  		  
						
					  <td style="text-align: center;">
						<?php 
							$file = get_field('files');
							$link = get_field('links');
							if($file):
						?>
							<a href="<?php echo $file; ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>
						<?php elseif($link): ?>
							<a href="<?php echo $link; ?>" target="_blank" class="tenderdocs"><i class="fa-solid fa-link"></i></a>
						<?php else: ?>
						<?php endif; ?>	
					  </td>
					  </tr>
					<?php 
						endwhile; 
						}
					?>
					</tbody>
			  </table>
		</div>
    </div>
  </div>
  </div>

<?php
get_footer();
