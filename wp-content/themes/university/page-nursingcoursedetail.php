<?php
/**
 * Template Name: Nursing Course Template
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
			  <th width="10%">Sl. No.</th>
			  <th width="30%">Name of the Course</th>
			  <th width="30%">Duration</th>			  
			  <th width="30%">No of Seats</th>			  
			  </tr>
			  </thead>
			  <?php if( have_rows('course_details') ): $count=0; ?>
			  <tbody>
				<?php while( have_rows('course_details') ): the_row(); 
					$name_of_the_course = get_sub_field('name_of_the_course');
					$duration = get_sub_field('duration');
					$no_of_seats = get_sub_field('no_of_seats');
					$count++;
					?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count; ?></td>
					  <td><?php echo $name_of_the_course; ?></td>					  		  
					  <td style="text-align: center;">
						<?php echo $duration; ?>
					  </td>
					  <td style="text-align: center;">
						<?php echo $no_of_seats; ?>
					  </td>
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
