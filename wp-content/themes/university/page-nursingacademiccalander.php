<?php
/**
 * Template Name: Nursing Academic Calander Template
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
			<?php if( have_rows('academic_calander_data') ): $i=0; ?>	
			  <div class="accordion accordion-flush" id="accordionFlushExample">
				<?php while( have_rows('academic_calander_data') ): the_row(); 
					$title = get_sub_field('title');
					$session = get_sub_field('session');
					$duration = get_sub_field('duration');
					$note = get_sub_field('note');
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
						<div class="row">
							<div class="col-md-6">
								<h6>Duration: <span><?php echo $duration;?></span></h6>
							
							</div>
							<div class="col-md-6">
								<h6>Session: <span><?php echo $session;?></span></h6>
							
							</div>
						</div>
						<table class="table table-bordered table-striped" id="datatable-<?php echo $i; ?>" border="0" cellspacing="0" cellpadding="0">
							<thead>
							  <tr>
							  <th width="10%">Sl. No.</th>
							  <th width="60%">Dates</th>
							  <th width="30%">Events</th>
							  </tr>
							</thead>
							<?php if( have_rows('calander_data') ): $j=0;?>
							<tbody>
								<?php while( have_rows('calander_data') ): the_row(); 
										$dates = get_sub_field('dates');
										$events = get_sub_field('events');
										$j++;
										?>								
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $dates;?></td>
									<td><?php echo $events;?></td>
								</tr>
								<?php endwhile; ?>

							</tbody>
							<?php endif; ?>
						</table>	
						<div class="row">
							<div class="col-md-12">
								<h6>Note: <span><?php echo $note;?></span></h6>
							
							</div>
							
						</div>						
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