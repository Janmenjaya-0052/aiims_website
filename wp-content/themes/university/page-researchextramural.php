<?php
/**
 * Template Name: Research Etramural Project Template
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
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		
			<?php if( have_rows('extramural_data') ): $i=0; ?>	
			  <div class="accordion accordion-flush" id="accordionFlushExample">
				<?php while( have_rows('extramural_data') ): the_row(); 
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
							<?php if($i==1): ?>
							<thead>
							  <tr>
							  <th width="5%">Sl. No.</th>
							  <th>Project code</th>
							  <th>Principal Investigator</th>
							  <th>Project Title</th>
							  <th>Status</th>
							  </tr>
							</thead>
							<?php else: ?>
							<thead>
							  <tr>
							  <th width="5%">Sl. No.</th>
							  <th>Project code</th>
							  <th>Principal Investigator</th>
							  <th>Co-PI</th>
							  <th>Collaborating Institute</th>
							  <th>Project Title</th>
							  <th>Status</th>
							  </tr>
							</thead>
							<?php endif; ?>
							<?php if( have_rows('project_data') ) : $j=0;?>
							<tbody>
								<?php while( have_rows('project_data') ): the_row(); 
										$project_code = get_sub_field('project_code');
										$principal_investigator = get_sub_field('principal_investigator');
										$co_pi = get_sub_field('co-pi');
										$collaborating_institute = get_sub_field('collaborating_institute');
										$project_title = get_sub_field('project_title');
										$status = get_sub_field('status');
										$j++;
										?>		
								<?php if($i==1): ?>
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $project_code;?></td>
									<td><?php echo $principal_investigator;?></td>
									<td><?php echo $project_title;?></td>
									<td><?php echo $status;?></td>
								</tr>
								<?php else: ?>
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $project_code;?></td>
									<td><?php echo $principal_investigator;?></td>
									<td><?php echo $co_pi;?></td>
									<td><?php echo $collaborating_institute;?></td>
									<td><?php echo $project_title;?></td>
									<td><?php echo $status;?></td>
								</tr>
								<?php endif; ?>
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
get_footer();