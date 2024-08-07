<?php
/**
 * Template Name: Nursing Extra Mural Research Template
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header('nurshing');
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
			  <th> Name of the Faculty</th>
			  <th> Title</th>			  
			  <th> Status</th>			  
			  <th> Sponsoring Agency</th>			  
			  </tr>
			  </thead>
			  <?php if( have_rows('nursing_extra_mural_research_data') ): $count=1; ?>
			  <tbody>
				<?php while( have_rows('nursing_extra_mural_research_data') ): the_row(); 
					$name_of_the_faculty = get_sub_field('name_of_the_faculty');
					$title = get_sub_field('title');
					$status = get_sub_field('status');
					$sponsoring_agency = get_sub_field('sponsoring_agency');
					?>						
					  <tr>
					  <td style="text-align: center;"><?php echo $count++; ?></td>
					  <td><?php echo $name_of_the_faculty; ?></td>					  		  
					  <td><?php echo $title; ?></td>					  		  
					  <td><?php echo $status; ?></td>					  		  
					  <td><?php echo $sponsoring_agency; ?></td>					  		  

					  </tr>
				<?php endwhile; ?>	
					</tbody>
				<?php endif; ?>	
			  </table>
		</div>
    </div>
    </div>
  </div>
<?php
get_footer('nurshing');