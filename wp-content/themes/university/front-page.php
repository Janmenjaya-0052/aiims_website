<?php
/**
 * Template Name: Home Page Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
  <!-- ============================carousel================================ -->
  <div id="main_carousel" class="carousel slide" data-bs-ride="carousel">
	<?php if( have_rows('main_slider') ): $i=0; $j=0; ?>
    <div class="carousel-indicators">
	<?php while( have_rows('main_slider') ): the_row(); 
        $image = get_sub_field('slider_images');
		$j++;
        ?>
      <button type="button" data-bs-target="#main_carousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo 'active';} ?>" aria-current="<?php if($i==0){echo 'true';} ?>" aria-label="Slide <?php echo $j; ?>"></button>
	  <?php $i++; endwhile; ?>

    </div>
	<?php endif; ?>
	<?php if( have_rows('main_slider') ): $i=0; $j=0; ?>
    <div class="carousel-inner">
	<?php while( have_rows('main_slider') ): the_row(); 
        $image = get_sub_field('slider_images');
		$j++;
		
        ?>	
      <div class="carousel-item <?php if($i==0){echo 'active';} ?>" data-bs-interval="3000">
	  <img src="<?php echo $image; ?>" alt="slide <?php echo $i; ?>">
      </div>
	  <?php $i++;  endwhile; ?>

    </div>
	<?php endif; ?>
    <button class="carousel-control-prev" type="button" data-bs-target="#main_carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#main_carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

 <!-- ======================slider Notice=============================== -->
   <!--<div class="slider_notice py-3">
    <div class="container">
      <div class="patient_helpline">
         <div class="d-flex align-items-center justify-content-center">
          <h6>Patient Helpline</h6>
          <div class="linear-wipe-div">
            <h1 class="linear-wipe">
            <i class="fas fa-hand-point-left"></i>
            click
          </h1>
          </div>
         </div>
		 <?php //if( have_rows('patient_help_line_links') ): ?>
          <ul class='p-0'>
			<?php //while( have_rows('patient_help_line_links') ): the_row(); 
				//$ptitle = get_sub_field('title');
				//$plink = get_sub_field('page_links');
				?>		  
            <li>
              <a href="<?php //echo $plink; ?>"><?php //echo $ptitle; ?></a>
            </li>
			<?php //endwhile; ?>

          </ul>
		  <?php //endif; ?>
      </div>
    
    </div>
  </div>-->

  
  <!-- new added section for 3cards section -->
  <div class="THREECARD">
	<div class="container py-4">
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo get_site_url(); ?>/patients/">
					<div class="cardz">
						<img src="http://sgov.stlindia.com/website/aiims_website/wp-content/themes/university/images/3card-services.png">
						<p>Hospital Services</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo get_site_url(); ?>/#">
					<div class="cardz">
						<img src="http://sgov.stlindia.com/website/aiims_website/wp-content/themes/university/images/3card-academic.png">
						<p>Academics</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo get_site_url(); ?>/#">
					<div class="cardz">
						<img src="http://sgov.stlindia.com/website/aiims_website/wp-content/themes/university/images/3card-research.png">
						<p>Research</p>
					</div>
				</a>
			</div>
		</div>
	</div>
  </div>
  
  
  <!-- =========================Person=================================== -->
  <!--<div class="all_person">
    <div class="bg_move"></div>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6 mb-3 mb-lg-0">
          <div class="card w-100 h-100 px-4 py-3 var_width">
            <div class="row m-auto">
              <div class="col-md-5 flex_box justify-content-center pb-3 pb-md-0">
                <img src="<?php //echo the_field('union_ministers_image'); ?>" class="img-fluid rounded-start"/>
              </div>
              <div class="col-md-7 p-0 flex_box">
                <div class="card-body text-center text-md-start p-2">
                  <h6 class="w-100">
                    <?php //echo the_field('union_ministers_message'); ?>
                    <span><a href="" data-bs-toggle="modal" data-bs-target="#exampleunion">Read more ></a></span>
					</h6>
                  <div style="text-align: right;">
                    <h5>
                       <?php //echo the_field('union_ministers_name'); ?>
                    </h5>
                    <p class="m-1">
                       <?php //echo the_field('designation'); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
				 Modal
				<div class="modal fade max-width-for-d" id="exampleunion" tabindex="-1" aria-labelledby="exampleunionLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleunionLabel">Hon’ble union minister's Message</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
					  <div class="modal-body">
						<div class="row">
							<div class="col-md-4 p-3">
							<img src="<?php //echo the_field('union_ministers_image'); ?>" class="img-fluid rounded-start" />
							</div>
							<div class="col-md-8">
							<p> 			
								<?php //echo the_field('union_ministers_message'); ?>
							</p>
							<p><strong><?php //echo the_field('union_ministers_name'); ?>
							<br>
							<?php //echo the_field('designation'); ?></strong></p>
							</div>
						</div>
					  </div>     
					</div>
				  </div>
				</div>			
          </div>
        </div>
        <div class="col-lg-6">
		<?php //if( have_rows('mentors_data') ): $i=0; ?>		
          <div class="row">
			<?php //while( have_rows('mentors_data') ): the_row(); 
				//$image = get_sub_field('profile_image');
				//$name = get_sub_field('name');
				//$designation = get_sub_field('designation');
				//$message_title = get_sub_field('message_title');
				//$message = get_sub_field('message');
				//$i++;
				?>		  
            <div class="col-md-6 pe-2 mb-3">
              <div class="card w-100 px-4 py-3 var_width">
                <div class="row">
                  <div class="col-md-5 flex_box justify-content-center mb-3 mb-md-0">
                    <img src="<?php //echo $image; ?>" class="img-fluid rounded-start" />
                  </div>
                  <div class="col-md-7 p-0 flex_box">
                    <div class="card-body text-center text-md-start p-0 ps-2">
                      <h5>
                        <?php //echo $name; ?>
                      </h5>
                      <p class="m-1">
                        <?php //echo $designation; ?>
                      </p>
                      <span>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php //echo $i; ?>">
                          <?php //echo $message_title; ?>
                        </a>
                      </span>
						 Modal 
						<div class="modal fade max-width-for-d" id="exampleModal-<?php //echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php //echo $i; ?>" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel-<?php //echo $i; ?>"><?php //echo $message_title; ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							  </div>
							  <div class="modal-body">
								<div class="row">
									<div class="col-md-4 p-3">
									<img src="<?php //echo $image; ?>" class="img-fluid rounded-start" />
									</div>
									<div class="col-md-8">
									<?php //echo $message; ?>
									<p><strong><?php //echo $name; ?>
									<br>
									<?php //echo $designation; ?></strong></p>
									</div>
								</div>
							  </div>     
							</div>
						  </div>
						</div>					  
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php //endwhile; ?>

          </div>
		  <?php //endif; ?>
        </div>
      </div>
    </div>
  </div>-->


  <!-- =========================updated Person=================================== -->
  <div class="updated_person">
	<div class="container py-4">
		<div class="row">
			<div class="col-md-4 left_div">
			<h3 class="whatnew_ttl">What's New</h3>
				<div class="slider" id="slider">
                <div class="slide-track">
					<?php 
						$current_date = date('Ymd');
						$tender_args = array(
							'post_type' => 'notice',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							/*'meta_query'	=> array(
									array(
										'key'		=> 'end_date',
										'value'		=> $current_date,
										'compare'	=> '>='
									)
								),*/
						);
					$loop = new WP_Query($tender_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();						
						$attachment = get_field('attachment');						
						$links = get_field('links');						
					?>
					
					
                  <div class="slide">
                    <div class="card mb-2">
                      <button class="btn btn-sm"><?php //echo the_field('start_date'); ?>20/07/2024</button>
					  <?php if($attachment): ?>
                      <a class="m-0 mt-1" href="<?php echo $attachment; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php elseif($links): ?>
					  <a class="m-0 mt-1" href="<?php echo $links; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php else: ?>
					  <a class="m-0 mt-1" href="#" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php endif; ?>
                    </div>
                  </div>
					<?php 
						endwhile; 
						}
					wp_reset_postdata();	
					?>				  

                </div>
              </div>
			  <button class="view-all">Read More</button>
			</div>
			
			<div class="col-md-4">				
				<div class="right_div">
					<h3>Quick Links</h3>
					<div class="btn_div">
						<button class="view-all">
							<a href="http://sgov.stlindia.com/website/aiims_website/wp-content/uploads/2024/07/Attachments-of-Tobacco-Framework-file.pdf">Conflict of Interest Declaration</a>
						</button>
						<button class="view-all">
							<a href="http://sgov.stlindia.com/website/aiims_website/central-assistance/">Central Assistance</a>
						</button>
						<button class="view-all">
							<a href="">RTI</a>
						</button>
						<button class="view-all">
							<a href="">Internal Complaint Committee</a></button>
						<button class="view-all">
							<a href="">AIIMS Donation</a>
						</button>
						<button class="view-all">
							<a href="">Grievances</a>
						</button>
					</div>
					<!-- =============director card================== -->
					<div class="director_card">
						<img src="http://sgov.stlindia.com/website/aiims_website/wp-content/uploads/2024/07/m5.png">
						<div class="content">
							<p>All India Institute of Medical Science Bhubaneswar was established under Phase 1 of Pradhan Mantri Swasthya Suraksha Yojana (PMSSY) in 2012 to create centre of excellence for providing high quality of patient care...</p>
							<div class="sub_head">
								<h5>
									Prof. (Dr.) Ashutosh Biswas
							    </h5>
							    <p class="m-0">
									Executive Director & CEO, AIIMS, BBSR
							    </p>
							</div>
						</div>
 					</div>
				</div>
			</div>
			
			<div class="col-md-4 center_div">
				<!-- ===========first card=========== -->
				<div class="card w-100 mb-2">
					<div class="row">
					<div class="col-md-4 flex_box justify-content-left pe-0">
					  <img src="http://sgov.stlindia.com/website/aiims_website/wp-content/uploads/2024/07/Image-of-Honble-HFM.jpeg">
					</div>
					<div class="col-md-8 p-0 flex_box">
					  <div class="card-body text-center text-md-start p-2">						
						<div>
						  <h5>
							Shri Jagat Prakash Nadda
						  </h5>
						  <p class="m-1">
							Hon'ble Union Minister, Health &amp; Family Welfare and Chemicals &amp;
							Fertilizers Government of India
						  </p>
						  <span>
							<a href="" data-bs-toggle="modal" data-bs-target="#exampleunion" style="color: #E0590D;">
							  Read more
							</a>
						  </span>
						</div>
					  </div>
					</div>
				  </div>
				</div>	
				  <!-- Modal -->
				  <div class="modal fade max-width-for-d" id="exampleunion" tabindex="-1"
				  aria-labelledby="exampleunionLabel" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title" id="exampleunionLabel">
							Hon’ble union minister's Message
						  </h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						  </button>
						</div>
						<div class="modal-body">
						  <div class="row">
							<div class="col-md-4 p-3">
							  <img src="http://sgov.stlindia.com/website/aiims_website/wp-content/uploads/2024/07/Image-of-Honble-HFM.jpeg"
							  class="img-fluid rounded-start">
							</div>
							<div class="col-md-8">
							  <p>
								All India Institute of Medical Sciences Bhubaneswar was established under
								Phase 1 of Pradhan Mantri Swasthya Suraksha Yojana (PMSSY)
							  </p>
							  <p>
								<strong>
								  Shri Jagat Prakash Nadda
								  <br>
								  Hon'ble Union Minister, Health &amp; Family Welfare and Chemicals &amp;
								  Fertilizers
								  <br>
								  Government of India
								</strong>
							  </p>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>				
				<!-- ===========other cards=========== -->
				<?php if (have_rows("mentors_data")):
				    $i = 0; ?>		
					   <?php while (have_rows("mentors_data")):
					   the_row();
					   $image = get_sub_field("profile_image");
					   $name = get_sub_field("name");
					   $designation = get_sub_field("designation");
					   $message_title = get_sub_field("message_title");
					   $message = get_sub_field("message");
					   $i++;
					   ?>		  
						  <div class="card w-100 mb-2">
							<div class="row">
							  <div class="col-md-4 flex_box justify-content-left pe-0">
								<img src="<?php echo $image; ?>" class="img-fluid"/>
							  </div>
							  <div class="col-md-8 p-0 flex_box">
								<div class="card-body text-center text-md-start p-2">
								  <h5>
									<?php echo $name; ?>
								  </h5>
								  <p class="m-1">
									<?php echo $designation; ?>
								  </p>
								  <span>
									<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $i; ?>">
									  <?php echo $message_title; ?>
									</a>
								  </span>	
								</div>
							  </div>
							</div>
						  </div>
						  <!-- Modal -->
						  <div class="modal fade max-width-for-d" id="exampleModal-<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php echo $i; ?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel-<?php echo $i; ?>"><?php echo $message_title; ?></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-4 p-3">
												<img src="<?php echo $image; ?>" class="img-fluid rounded-start" />
											</div>
											<div class="col-md-8">
												<?php echo $message; ?>
												<p><strong><?php echo $name; ?>
												<br>
												<?php echo $designation; ?></strong></p>
											</div>
										</div>
									</div>     
								</div>
							</div>
						  </div>	
						<?php
						endwhile; ?>
					<?php
			    endif; ?>
		    </div>
	    </div>
    </div>
  </div>
  
  
  <!-- ==========================card_carousel-1========================================== -->
  <div class="card_carousel py-0 py-md-3" id="card_carousel1" style="background:#EAE3D9;">
    <div class="container py-5" data-aos="fade" data-aos-duration="1000">
      <div class="wrapper" id="wrapper1">
        <i id="left" class="fa-solid fa-angle-left all_arrows"></i>
		<?php if( have_rows('scrolling_apps') ): ?>
        <ul class="carousels m-0" id="carousels1">
		<?php while( have_rows('scrolling_apps') ): the_row(); 
			$icons = get_sub_field('icons');
			$title = get_sub_field('title');
			$links = get_sub_field('links');
			?>		
          <li class="card">
			<a href="<?php echo $links; ?>" target="_blank">
            <img src="<?php echo $icons; ?>" alt="img" draggable="false" />
            <p><?php echo $title; ?></p>
			</a>
          </li>
		<?php endwhile; ?>

        </ul>
		<?php endif; ?>
        <i id="right" class="fa-solid fa-angle-right all_arrows"></i>
      </div>
    </div>
  </div>

  
 <!-- =======================number Card ================================-->
   <!--<div class="number_cards">
    <div class="container py-5">
	<?php //if( have_rows('counter_section') ): $i=0;?>
      <div class="row">
	    <?php //while( have_rows('counter_section') ): the_row(); 
        //$title = get_sub_field('title');
        //$numbers = get_sub_field('counter_number');
		//$i++;
        ?>
        <div class="col-md-3 mb-2 mb-md-0">
          <div class="card nc_<?php //echo $i; ?>">
            <div class="counter" data-target="<?php //echo $numbers; ?>"></div>
            <h4><?php //echo $title; ?></h4>
          </div>
        </div>
		<?php //endwhile; ?>

      </div>
	  <?php //endif; ?>
    </div>
  </div>-->
  
  
  <!-- ============================All tabs=================================== -->
  <div class="container py-3 my-5" style="overflow: hidden;">
    <div class="row w-100 m-auto">
      <div class="col-md-4 p-0 pe-md-2 mb-4 mb-md-0">
        <div class="alltab_tab1" data-aos="fade" data-aos-duration="1000">
          <div class="btn-group w-100 mb-3">
            <button class="btn active" data-id="Notice">Notice</button>
            <button class="btn" data-id="Tender">Tender</button>
          </div>
          <div class="contentWrapper" style="min-height:400px;">
            <div class="content active" id="Notice">
              <div class="slider" id="slider">
                <div class="slide-track">
					<?php 
						$current_date = date('Ymd');
						$tender_args = array(
							'post_type' => 'notice',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							/*'meta_query'	=> array(
									array(
										'key'		=> 'end_date',
										'value'		=> $current_date,
										'compare'	=> '>='
									)
								),*/
						);
					$loop = new WP_Query($tender_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();						
						$attachment = get_field('attachment');						
						$links = get_field('links');						
					?>
					
					
                  <div class="slide">
                    <div class="card mb-2">
                      <button class="btn btn-sm"><?php echo the_field('start_date'); ?></button>
					  <?php if($attachment): ?>
                      <a class="m-0 mt-1" href="<?php echo $attachment; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php elseif($links): ?>
					  <a class="m-0 mt-1" href="<?php echo $links; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php else: ?>
					  <a class="m-0 mt-1" href="#" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php endif; ?>
                    </div>
                  </div>
					<?php 
						endwhile; 
						}
					wp_reset_postdata();	
					?>				  

                </div>
              </div>
              <button class="view-all" style="position: relative;top: 12px;padding:5px 10px;" ><a href="<?php echo get_site_url(); ?>/public-notice">View all</a></button>
            </div>
            <div class="content" id="Tender">
              <div class="slider" id="slider">
                <div class="slide-track">
					<?php 
						$current_date = date('Ymd');
						$tender_args = array(
							'post_type' => 'tender',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							'meta_query'	=> array(
									array(
										'key'		=> 'end_date',
										'value'		=> $current_date,
										'compare'	=> '>='
									)
								),
						);
					$loop = new WP_Query($tender_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();						
						$attachment = get_field('attachment');						
						$links = get_field('links');						
					?>
					
					
                  <div class="slide">
                    <div class="card mb-2">
                      <button class="btn btn-sm"><?php echo the_field('start_date'); ?></button>
					  <?php if($attachment): ?>
                      <a class="m-0 mt-1" href="<?php echo $attachment; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php elseif($links): ?>
					  <a class="m-0 mt-1" href="<?php echo $links; ?>" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php else: ?>
					  <a class="m-0 mt-1" href="#" target="_blank"><?php echo esc_html(get_trimmed_title(20)); ?></a>
					  <?php endif; ?>
                    </div>
                  </div>
					<?php 
						endwhile; 
						}
					wp_reset_postdata();	
					?>				  

                </div>
              </div>
              <button class="view-all" style="position: relative;top: 12px;padding:5px 10px;" ><a href="<?php echo get_site_url(); ?>/tenders">View
                all</a></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 p-0 pe-md-2 mb-4 mb-md-0">
        <div class="alltab_tab2" data-aos="fade" data-aos-duration="1000">
          <div class="btn-group w-100 mb-3">
            <button class="btn active" data-id="Facebook" style="background:#16428B;">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_img1.svg" alt="">
              Facebook
            </button>
            <button class="btn" data-id="Twiter" style="background: black;">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_img2.svg" alt="">
              Twiter
            </button>
            <button class="btn" data-id="Instagram"
              style="background: linear-gradient(83.17deg, #F9CE34 -23.11%, #EE2A7B 39.45%, #6228D7 96.56%);">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_img3.svg" alt="">
              Instagram
            </button>
          </div>
          <div class="contentWrapper text-center">
            <div class="content active" id="Facebook">
              <div id="fb-root" class="w-100"></div>
              <div class="fb-page" data-href="https://www.facebook.com/aiimsbhubaneswarodisha/" data-tabs="timeline"
                data-width="400" data-height="400" data-small-header="false" data-adapt-container-width="true"
                data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/aiimsbhubaneswarodisha/" class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/aiimsbhubaneswarodisha/">AIl India Institute of Medical Sciences -
                    Bhubaneswar</a></blockquote>
              </div>
              <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0" nonce="UgO4kpnA"></script>
            </div>
            <div class="content" id="Twiter">
              <div><a class="twitter-timeline" data-height="400" data-width="400" data-dnt="true"
                  href="https://twitter.com/AIIMSBhubaneswr?ref_src=twsrc%5Etfw">Tweets by AIIMSBhubaneswr</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
            <div class="content" id="Instagram" style="height: 400px;">
              <div class="h-100 flex_box justify-content-center">
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_2_inst_img.png" class="h-100 w-100" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 p-0 pe-md-2 mb-4 mb-md-0">
        <div class="alltab_tab3" data-aos="fade" data-aos-duration="1000">
          <div class="flex_box justify-content-between">
            <div class="btn-group">
              <button class="btn active" data-id="Video_Gallery">Video Gallery</a>
                <button class="btn" data-id="Photo_Gallery">Photo Gallery</a>
            </div>
            <button class="view-all">View all</button>
          </div>
          <div class="contentWrapper text-center mt-3">
            <div class="content active" style="height: 300px;" id="Video_Gallery">
              <iframe style="width: 100%;" height="400"
                src="https://www.youtube.com/embed/Uh4JqVGIiJ8?si=RqG1qnHvTVoCL2pO" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            </div>
            <div class="content" style="height: 300px;" id="Photo_Gallery">
              <div class="h-100 flex_box justify-content-center">
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_img5.svg" class="h-100 w-100" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================Student_carousel=================================== -->
 <div class="pb-3 pt-1" style="overflow: hidden;">
    <div class="stu_carousel py-4">
      <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" data-aos="fade" data-aos-duration="1000">
            <div class="carousel-item active p-3 p-md-4">
              <div class="row">
                <div class="col-md-5 d-flex">
                  <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img1.svg" class="stu_car_img" />
                  <div class="contentz">
                    <h5>Students Association AIIMS,</h5>
                    <h6>Bhubaneswar</h6>
                  </div>
                </div>
                <div class="col-md-4 pt-3 pt-md-0">
                  <div class="flex_box mb-3 qlinks">
                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu_carousel_link_img.svg" />
                    <h5 class="m-0">Quick Links</h5>
                  </div>
                  <div class="row">
                    <div class='col-4 p-0'>
					<div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img2.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                        <a href=""><p>Central Assistance</p></a>
                      </div>
                    </div>
					</div>
                    <div class='col-4 p-0'>
                    <div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img3.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                         <a href=""><p>Anti Ragging</p></a>
                      </div>
                    </div>
                    </div>
                    <div class='col-4 p-0'>
                    <div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img4.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                         <a href=""><p>News and Events</p></a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
		  <div class="carousel-item p-3 p-md-4">
			
              <div class="row">
                <div class="col-md-5 d-flex">
                  <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img1.svg" class="stu_car_img" />
                  <div class="contentz">
                    <h5>Students Association AIIMS,</h5>
                    <h6>Bhubaneswar</h6>
                  </div>
                </div>
                <div class="col-md-4 pt-3 pt-md-0">
                  <div class="flex_box mb-3 qlinks">
                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu_carousel_link_img.svg" />
                    <h5 class="m-0">Quick Links</h5>
                  </div>
                  <div class="row">
                    <div class='col-4 p-0'>
					<div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img2.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                        <a href=""><p>Central Assistance</p></a>
                      </div>
                    </div>
					</div>
                    <div class='col-4 p-0'>
                    <div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img3.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                         <a href=""><p>Anti Ragging</p></a>
                      </div>
                    </div>
                    </div>
                    <div class='col-4 p-0'>
                    <div class="cardz">
                      <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/stu-carousel-img4.svg" style="width: 100%;cursor: pointer;" />
                      <div class="content">
                         <a href=""><p>News and Events</p></a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
				
              </div>
            </div>
           
		 </div>
          <div class="flex_box justify-content-end mt-1">
            <button class="carousel-control-prev all_arrows" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="prev" style="position: relative;height: 38px;
          width: 40px;
          padding: 10px;
          border: 1px solid #ffb36b;
          background: #FAD9BB;opacity:1">
              <i id="left" class="fa-solid fa-angle-left text-black"></i>
            </button>
            <button class="carousel-control-next all_arrows" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="next" style="position: relative;height: 38px;
          width: 40px;
          padding: 10px;
          border: 1px solid #ffb36b;
          background: #FAD9BB;opacity:1">
              <i id="right" class="fa-solid fa-angle-right text-black"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 
  <!-- ==========================card_carousel-2===================================== -->
  <div class="container px-0 flex_box py-5 pt-4" id="card_carousel2_container" data-aos="fade" data-aos-duration="1000">
    <h6 style="font-weight: 500;margin: 0;">Other AIIMS</h6>
    <div class="card_carousel w-100" id="card_carousel2">
      <div class="container">
        <div class="wrapper" id="wrapper2">
          <i id="left" class="fa-solid fa-angle-left all_arrows"></i>
          <ul class="carousels m-0 mx-2" id="carousels2">
					<?php 
						$current_date = date('Ymd');
						$otheraiims_args = array(
							'post_type' => 'otheraiims',
							'posts_per_page' => -1,
							'post_status' => 'publish',
							
						);
					$loop = new WP_Query($otheraiims_args);
					$count=1;
					if($loop->have_posts()) {
						while($loop->have_posts()) : $loop->the_post();						
						$image = get_field('logo_image');						
						$links = get_field('aiims_link');						
					?>		  
		  
            <li class="card">
				<a href="<?php echo $links; ?>" target="_blank">		
				  <img src="<?php echo $image; ?>" alt="img" draggable="false" />
				  <p><?php echo the_title(); ?></p>
				</a>
			</li>
					<?php 
						endwhile; 
						}
					wp_reset_postdata();	
					?>				
          </ul>
          <i id="right" class="fa-solid fa-angle-right all_arrows"></i>
        </div>
      </div>
    </div>
  </div>	  
<?php
get_footer();