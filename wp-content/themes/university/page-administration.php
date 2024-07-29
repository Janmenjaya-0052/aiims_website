<?php
/**
 * Template Name: Administration Template
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
		<div class="content-area">
			<div class="row">
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</div>	
		</div>
				  <div class="teamWrapper">
					<?php if( have_rows('members_data') ): ?>
					  <div class="teamGrid">
						<?php while( have_rows('members_data') ): the_row(); 
							$image = get_sub_field('profile_photo');
							$name = get_sub_field('name');
							$designation = get_sub_field('designation');
							$mail_id = get_sub_field('mail_id');
							?>						
						<div class="colmun">
						  <div class="teamcol">
							<div class="teamcolinner">
							  <div class="avatar"><img src="<?php echo $image; ?>" alt="<?php echo $name; ?>"></div>
							  <div class="member-name"> <h2 align="center"><?php echo $name; ?></h2> </div>
							  <div class="member-info"><p align="center"><?php echo $designation; ?></p></div>
							  <div class="member-mail"> <p align="center"> <a href="<?php echo $mail_id; ?>"><?php echo $mail_id; ?></a> </p> </div>
							  <div class="member-social"> 
								<?php if( have_rows('socila_media_links') ): ?>
								<ul class="social-listing">
								<?php while( have_rows('socila_media_links') ): the_row(); 
									$link = get_sub_field('link');
									$icon = get_sub_field('icon');
									?>								
								  <li><a href="<?php echo $link; ?>"><i class="fa-brands <?php echo $icon; ?>"></i></a></li>
								<?php endwhile; ?>  
								  
								</ul>
								<?php endif; ?>
							  </div>
							</div>
						  </div>
						</div>
						<?php endwhile; ?>

						
					  </div>
					<?php endif; ?>
				  </div>				

  </div>

<?php
get_footer();
