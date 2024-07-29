<?php
/**
 * Template Name: Normal Tenders Archive Template
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
			  <th width="5%">Sl. No.</th>
			  <th width="30%"> Title</th>
			  <th width="10%"> Publishing Date</th>
			  <th width="10%"> Closing Date</th>
			  <th width="10%"> Download</th>			  
			  <th width="10%"> Corrigendum</th>			  
			  <th width="10%"> Cancellation</th>			  
			  <th width="15%"> Award of Contract</th>			  
			  </tr>
			  </thead>
			  <tbody>
					<?php 
						$current_date = date('Ymd');
						$tender_args = array(
							'post_type' => 'tender',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							'meta_query'	=> array(
									array(
										'key'		=> 'end_date',
										'value'		=> $current_date,
										'compare'	=> '<'
									)
								),
							'tax_query' => array(
								array(
									'taxonomy' => 'category_tender',
									'field' => 'slug', // Or 'term_id', 'name'
									'terms' => 'normal-tender' // Replace with your actual term slug
								)
							),								
						);
					$loop = new WP_Query($tender_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();							
					?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count++; ?></td>
					  <td><?php the_title(); ?></td>					  		  
					  <td><?php the_field('start_date'); ?></td>					  		  
					  <td><?php the_field('end_date'); ?></td>					  		  
					  <td style="text-align: center;">
						<?php 
							$file = get_field('attachment');
							$link = get_field('links');
							if($file):
						?>
							<a href="<?php echo $file; ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>
						<?php elseif($link): ?>
						<a href="<?php echo $link; ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/link.png" width="25px" title="Link"></a>
						<?php else: ?>
						<a href="#" target="_blank" class="tenderdocs">No File / Link</a>
						<?php endif; ?>	
					  </td>
					  <td>
						<a href="<?php echo the_field('final_opening_file'); ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>
						<a href="<?php echo the_field('corrigendum'); ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>
					  </td>
					  <td>
						<a href="<?php echo the_field('cancellation'); ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>
						
					  </td>
					  <td><?php the_field('award_of_contracts'); ?></td>	
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
