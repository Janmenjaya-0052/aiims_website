<?php
/**
 * Template Name: Research & Publication Template
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
			  <th width="80%"> Title</th>
			  <th width="10%"> View</th>			  
			  </tr>
			  </thead>
				<?php if( have_rows('research_and_publication_data') ): $count=0; ?>
			  <tbody>
				<?php while( have_rows('research_and_publication_data') ): the_row(); 
						$title = get_sub_field('title');
						$links = get_sub_field('links');
						$count++;
						?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count; ?></td>
					  <td><?php echo $title; ?></td>					  		  

					  <td style="text-align: center;">

							<a href="<?php echo $links; ?>" target="_blank" class="tenderdocs"><i class="fa-solid fa-link"></i></a>

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
