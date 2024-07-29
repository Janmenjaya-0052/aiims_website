<?php
/**
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
  <div class="py-4">
    <div class="container">
		<div class="inner-content">
		
			<div class="table-responsive">
			<table class="table table-bordered table-striped" id="singles" border="0" cellspacing="0" cellpadding="0">
			  <thead>
			  <tr>
			  <th width="10%">Sl. No.</th>
			  <th width="30%"> Roll No</th>
			  <th width="30%"> Name of the Student</th>			  
			  <th width="30%"> Remarks</th>			  
			  </tr>
			  </thead>
			  <?php if( have_rows('student_details') ): $i=0; ?>
				<tbody>
				 <?php while( have_rows('student_details') ): the_row(); 
						$roll_no = get_sub_field('roll_no');
						$name_of_the_student = get_sub_field('name_of_the_student');
						$remarks = get_sub_field('remarks');
						$i++;
						?>
					  <tr>
					  <td style="text-align: center;"><?php echo $i; ?></td>
					  <td><?php echo $roll_no; ?></td>					  		  
					  <td><?php echo $name_of_the_student; ?></td>					  		  
					  <td><?php echo $remarks; ?></td>
					  </tr>
				<?php endwhile; ?>
				</tbody>
				<?php endif; ?>
			  </table>
		</div>
    </div>
    </div>
  </div>

	
<?php get_footer('nurshing'); ?>
