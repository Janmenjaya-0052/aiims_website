<?php
/**
 * Template Name: Clinical Postings
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
  <div class="introduction_page py-4">
    <div class="container p-0">
		<div class="inner-content ps-4 pe-3">
			<?php echo the_content(); ?>

			<table class="table table-bordered table-striped" id="singles" border="0" cellspacing="0" cellpadding="0">
			  <thead>
			  <tr>
			  <th>Batch</th>
			  <th>Rural</th>
			  <th> Dentistry</th>			  
			  <th> Elective R. Therapy</th>			  
			  <th> Anaesthesia</th>			  
			  <th> Elective R. Diag</th>			  
			  <th> Derma & Vener.</th>			  
			  <th> Casualty</th>			  
			  <th> ENT</th>			  
			  <th> Ortho</th>			  
			  </tr>
			  </thead>
			  <?php if( have_rows('clinical_posting_schedule') ): ?>
			  <tbody>
				<?php while( have_rows('clinical_posting_schedule') ): the_row(); 
					$batch = get_sub_field('batch');
					$rural = get_sub_field('rural');
					$dentistry = get_sub_field('dentistry');
					$elective_r_therapy = get_sub_field('elective_r_therapy');
					$anaesthesia = get_sub_field('anaesthesia');
					$elective_r_diag = get_sub_field('elective_r_diag');
					$drema = get_sub_field('drema');
					$casualty = get_sub_field('casualty');
					$ent = get_sub_field('ent');
					$ortho = get_sub_field('ortho');
					?>				
					  <tr>
					  <td><?php echo $batch; ?></td>				  
					  <td><?php echo $rural; ?></td>					  		  
					  <td><?php echo $dentistry; ?></td>					  		  
					  <td><?php echo $elective_r_therapy; ?></td>					  		  
					  <td><?php echo $anaesthesia; ?></td>					  		  
					  <td><?php echo $elective_r_diag; ?></td>					  		  
					  <td><?php echo $drema; ?></td>					  		  
					  <td><?php echo $casualty; ?></td>					  		  
					  <td><?php echo $ent; ?></td>					  		  
					  <td><?php echo $ortho; ?></td>						  		  
					  				  		  

					  </tr>
					<?php endwhile; ?>	
					</tbody>
				<?php endif; ?>	
			  </table>			
		</div>
    </div>
  </div>

<?php
get_footer();
