<?php
/**
 * Template Name: Recruitment Notice Template
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
		<?php
		$parent_terms = get_terms([
			'taxonomy' => 'category_recrutimentnotice',
			'parent' => 0,
			'hide_empty' => false,
		]);

		if (!empty($parent_terms) && !is_wp_error($parent_terms)) {
			echo '<div class="container p-4 ">';
			echo '<div class="accordion accordion-flush" id="accordionFlushExample">';
			
			foreach ($parent_terms as $index => $term) {
				// Get child terms
				$child_terms = get_terms([
					'taxonomy' => 'category_recrutimentnotice',
					'parent' => $term->term_id,
					'hide_empty' => false,
				]);
				
				$collapse_id = 'flush-collapse' . ($index + 1);
				
				echo '<div class="accordion-item rounded-3 border-0 shadow mb-2">';
				echo '<h2 class="accordion-header">';
				echo '<button class="accordion-button border-bottom collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#' . $collapse_id . '" aria-expanded="false" aria-controls="' . $collapse_id . '">';
				echo $term->name;
				echo '</button>';
				echo '</h2>';
				
				echo '<div id="' . $collapse_id . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">';
				echo '<div class="accordion-body">';
				
				if (!empty($child_terms) && !is_wp_error($child_terms)) {
					// Display child categories in ul li
					echo '<ul>';
					foreach ($child_terms as $child_term) {
						echo '<li><a href="' . get_term_link($child_term) . '">' . $child_term->name . '</a></li>';
					}
					echo '</ul>';
				} else {
					// Display posts if no child terms
				$recruitment_posts = new WP_Query([
					'post_type' => 'recuitmentnotice',
					'tax_query' => [
						[
							'taxonomy' => 'category_recrutimentnotice',
							'field' => 'term_id',
							'terms' => $term->term_id,
						],
					],
					'posts_per_page' => -1,  // Number of posts per page
					'meta_key' => 'start_date', // Order by date
					'orderby' => 'meta_value',
					'order' => 'DESC',       // Order in descending order
					'post_status' => 'publish' // Only fetch published posts
				]);
				$count=1;
				if ($recruitment_posts->have_posts()) {
					echo '<table class="table table-bordered table-striped" id="datatable-'. $count . '" border="0" cellspacing="0" cellpadding="0">';
					echo '<thead>';
					echo '<tr>';
					echo '<th width="5%">Sl. No.</th>';
					echo '<th width="80%"> Title</th>';
					echo '<th width="10%"> Start Date</th>';
					//echo '<th width="20%"> End Date</th>';
					echo '<th width="5%"> Download</th>';
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
						//echo '<td>' . $enddate . '</td>';
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
				}
				
				echo '</div>'; // accordion-body
				echo '</div>'; // accordion-collapse
				echo '</div>'; // accordion-item
			}
			
			echo '</div>'; // accordion
			echo '</div>'; // container
		}
		
		?>
    </div>
  </div>
  </div>

<?php
get_footer();
