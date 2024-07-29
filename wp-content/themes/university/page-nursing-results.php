<?php
/**
 * Template Name: Nursing Results Template
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
			<?php if( have_rows('nursing_results_data') ): $i=0; ?>	
			  <div class="accordion accordion-flush" id="accordionFlushExample">
				<?php while( have_rows('nursing_results_data') ): the_row(); 
					$title = get_sub_field('title');
					$i++;
					?>				
				<div class="accordion-item rounded-3 border-0 shadow mb-2">
				  <h2 class="accordion-header">
					<button class="accordion-button border-bottom fw-semibold <?php if($i!=1){echo 'collapsed';}?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="<?php if($i==1){echo 'true';}else{ echo 'false';} ?>" aria-controls="flush-collapse<?php echo $i; ?>">
					  <?php echo $title; ?>
					</button>
				  </h2>
				  <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i==1){echo 'show';}?>" data-bs-parent="#accordionFlushExample">
					<div class="accordion-body">
						<table class="table table-bordered table-striped" id="datatable-<?php echo $i; ?>" border="0" cellspacing="0" cellpadding="0">
							<thead>
							  <tr>
							  <th width="5%">Sl. No</th>
							  <th >Roll No</th>
							  <th >Name of the Student</th>
							  <th>Results</th>
							  </tr>
							</thead>
							<?php if( have_rows('results_data') ): $j=0;?>
							<tbody>
								<?php while( have_rows('results_data') ): the_row(); 
										$roll_no = get_sub_field('roll_no');
										$name_of_the_student = get_sub_field('name_of_the_student');
										$results = get_sub_field('results');
										$j++;
										?>								
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $roll_no;?></td>
									<td><?php echo $name_of_the_student;?></td>
									<td><?php echo $results;?></td>
								</tr>
								<?php endwhile; ?>

							</tbody>
							<?php endif; ?>
						  </table>					  
					</div>
				  </div>
				</div>
				<?php endwhile; ?>

			  </div>
			<?php endif; ?>
		</div>
    </div>
  </div>
<?php
get_footer('nurshing');