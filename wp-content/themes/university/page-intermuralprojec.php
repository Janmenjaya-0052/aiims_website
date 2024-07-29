<?php
/**
 * Template Name: Project Intermural Template
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
		
			<div class="table-responsive">
			<table class="table table-bordered table-striped" id="singles" border="0" cellspacing="0" cellpadding="0">
			  <thead>
			  <tr>
			  <th width="10%">Sl. No.</th>
			  <th width="80%"> Description</th>
			  <th width="10%"> Download</th>			  
			  </tr>
			  </thead>
				<?php if( have_rows('project_fields') ): $count=0; ?>
			  <tbody>
				<?php while( have_rows('project_fields') ): the_row(); 
						$description = get_sub_field('description');
						$file = get_sub_field('file');
						$count++;
						?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count; ?></td>
					  <td><?php echo $description; ?></td>					  		  

					  <td style="text-align: center;">

							<a href="<?php echo $file; ?>" target="_blank" class="tenderdocs"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/></a>

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
get_footer();
