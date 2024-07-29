<?php
get_header();
?>


<div class="breadcrumps_section">
   <div class="tringle_div">   
   </div>
   <div class="content">
      <h1><?php echo single_term_title(); ?></h1>
      <ul>
         <li><a href="<?php echo get_site_url(); ?>" target="_blank">Home</a></li>
         <li class="active"><a href="<?php $term = get_queried_object(); $term_link = get_term_link($term); echo $term_link; ?>"><?php echo single_term_title(); ?></a></li>
      </ul>
   </div>
</div>

  <div class="py-4">
    <div class="container">
		<div class="inner-content">
		
			<div class="table-responsive">
				<?php
				// Get the current taxonomy term
				$term = get_queried_object();

				// Fetch recruitmentnotice posts associated with the current term
				$recruitment_posts = new WP_Query([
					'post_type' => 'recuitmentnotice',
					'tax_query' => [
						[
							'taxonomy' => 'category_recrutimentnotice',
							'field' => 'term_id',
							'terms' => $term->term_id,
						],
					],
				]);
				$count=1;
				if ($recruitment_posts->have_posts()) {
					echo '<table class="table table-bordered table-striped" id="singles" border="0" cellspacing="0" cellpadding="0">';
					echo '<thead>';
					echo '<tr>';
					echo '<th width="10%">Sl. No.</th>';
					echo '<th width="40%"> Title</th>';
					echo '<th width="20%"> Start Date</th>';
					echo '<th width="20%"> End Date</th>';
					echo '<th width="10%"> Download</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';

					while ($recruitment_posts->have_posts()) {
						$recruitment_posts->the_post();
						$startdate = get_field('start_date');
						$enddate = get_field('end_date');
						$file = get_field('attachement');
						$links = get_field('link');
						
						echo '<tr>';
						echo '<td>' . $count++ . '</td>';
						echo '<td>' . get_the_title() . '</td>';
						echo '<td>' . $startdate . '</td>';
						echo '<td>' . $enddate . '</td>';
						if ($file) {
							echo '<td><a href="' . esc_url($file) . '" target="_blank"><img src="'. get_site_url(). '/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a></td>'; // Display the file link if it exists
						} else {
							echo '<td><a href="' . $links . '" target="_blank"><img src="'. get_site_url(). '/wp-content/uploads/2024/06/link.png" width="25px" title="Link"></a></td>'; // Display the custom link if it exists
						}
						echo '</tr>';
					}

					echo '</tbody>';
					echo '</table>';

					wp_reset_postdata();
				} else {
					echo '<p>No posts found.</p>';
				}
				?>
		</div>
    </div>
  </div>
  </div>
<?php
get_footer(); ?>
