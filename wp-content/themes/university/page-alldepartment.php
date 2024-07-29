<?php
/**
 * Template Name: Deaprtment Template
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
			<div class="row">
						<?php
						// Get all terms (departments) from the taxonomy 'category_department'
						$terms = get_terms(array(
							'taxonomy' => 'category_department',
							'hide_empty' => false, // Show even if no posts are assigned
						));

						// Loop through each term
						foreach ($terms as $term) {
							$term_link = get_term_link($term); // Get the URL to the term archive
							if (!is_wp_error($term_link)) {          		
                    ?>			
				<div class="col-md-2">
					<div class="dbox">
					<a href="<?php echo $term_link; ?>" class="pg_widget" id="COE_Cardiology">
					<img src="<?php echo the_field('department_icon', $term); ?>" alt="icon" loading="lazy">
					<h5><?php echo $term->name; ?></h5>
					</a>
					</div>
				</div>
						<?php  } }?>
					
				
			</div>
						   
		</div>
	</div>
  </div>

<?php
get_footer();
