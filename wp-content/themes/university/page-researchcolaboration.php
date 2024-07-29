<?php
/**
 * Template Name: Research Collaboration Templates
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
			  </tr>
			  </thead>
				<?php if( have_rows('collaboration_field') ): $count=0; ?>
				<tbody>
					<?php while( have_rows('collaboration_field') ): the_row(); 
						$title = get_sub_field('title');
						$count++;
					?>
					  <tr>
					  <td style="text-align: center;"><?php echo $count; ?></td>
					  <td><?php echo $title; ?></td>					  		  
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
