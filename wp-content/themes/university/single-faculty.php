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
    <div class="container" id="faculity_container">
        <div class="row py-4">
            <div class="col-md-3">
                <div class="faculity_left">
                    <div style="position: relative;">
                        <img src="<?php echo get_field('image'); ?>"
                            alt="<?php echo the_title(); ?>" class="prof_img">
                        <div class="socials">
                            <div class="soc_card">
                                <a href="#">
                                    <i class="fa-solid fa-globe"></i>
                                </a>
                            </div>
                            <div class="soc_card">
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="soc_card">
                                <a href="#">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row pt-3 px-2">
                            <div class="col-3 p-0">
                                <div class="sm_card">
                                    <img src="https://www.nitrkl.ac.in/assets/images/orcid_1.png" alt="">
                                    <p>Doctor ID</p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <div class="sm_card">
                                    <img src="https://www.nitrkl.ac.in/assets/images/orcid_1.png" alt="">
                                    <p>Doctor ID</p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <div class="sm_card">
                                    <img src="https://www.nitrkl.ac.in/assets/images/orcid_1.png" alt="">
                                    <p>Doctor ID</p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <div class="sm_card">
                                    <img src="https://www.nitrkl.ac.in/assets/images/orcid_1.png" alt="">
                                    <p>Doctor ID</p>
                                </div>
                            </div>
                        </div>
                        <div class="fac_info_1 mt-3">
                            <h5>EXPERTISE INFORMATION</h5>
                            <div class="content">
                                <h6>Research Group</h6>
                                <ul>
                                    <li>Transport Processes</li>
                                </ul>
                                <h6>Areas of Interest</h6>
                                <ul>
                                    <li> Fluidization Engg, Energy & Environment, Modeling and Design</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="faculity_right">
                    <div class="fac_info_2">
                        <h2><?php echo the_title(); ?></h2>
                        <h5><?php the_field('designation'); ?></h5>
                        <h6>
						<?php 
										$terms = get_the_terms(get_the_ID(), 'category_department');
										$term = reset($terms);
										echo esc_html($term->name); ?>
						</h6>
                        <p><i class="fa-solid fa-envelope"></i> <?php echo the_field('email'); ?></p>
                        </p><i class="fa-solid fa-phone"></i> 0661 - 246 2258</p>
                        <span><i class="fa-solid fa-download"></i> Biosketch</span>
                    </div>
                    <div class="row py-4">
                        <div class="col-md-2">
                            <div class="info_card">
                                <h3>65</h3>
                                <p>PUBLICATIONS</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="info_card">
                                <h3>65</h3>
                                <p>PUBLICATIONS</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="info_card">
                                <h3>65</h3>
                                <p>PUBLICATIONS</p>
                            </div>
                        </div>
                    </div>
                    <div class="personal_info">
                        <h4>PERSONAL INFORMATION</h4>
                        <div class="row">
                            <div class="col-6">
                                <h5><?php echo the_title(); ?></h5>
                                <p><?php the_field('designation'); ?></p>
                                <span>
								<?php 
										$terms = get_the_terms(get_the_ID(), 'category_department');
										$term = reset($terms);
										echo esc_html($term->name); ?>
								</span>
                            </div>
                            <div class="col-6">
                                <p><i class="fa-solid fa-house"></i> Room Number: CH-017</p>
                                <p><i class="fa-solid fa-location-dot"></i> xxxxxxxx xxxxxxxx xxxxxxxxx xxxxxxxxx xxxxxxx</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush pt-3" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Educational Qualification
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<table class="table table-bordered table-striped" id="datatable-<?php echo $i; ?>" border="0" cellspacing="0" cellpadding="0">
										<thead>
										  <tr>
										  <th width="25%">Degree / Diploma</th>
										  <th width="25%">Name of the University/ Institution</th>
										  <th width="25%">Subject</th>
										  <th width="25%">Year of Passing</th>
										  </tr>
										</thead>
										<?php if( have_rows('educational_qualification') ): $j=0;?>
										<tbody>
											<?php while( have_rows('educational_qualification') ): the_row(); 
													$degree = get_sub_field('degree');
													$university = get_sub_field('year_of_passing');
													$subject = get_sub_field('subject');
													$passing = get_sub_field('collegeuniversity');
													$j++;
													?>								
											<tr>
												<td><?php echo $degree;?></td>
												<td><?php echo $university;?></td>
												<td><?php echo $subject;?></td>
												<td><?php echo $passing;?></td>
											</tr>
											<?php endwhile; ?>

										</tbody>
										<?php endif; ?>
									</table>									
								</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Area of Research Interest
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<?php the_field('area_of_research_interest'); ?>
								</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Fellowship
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<?php the_field('fellowship'); ?>
								</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefour" aria-expanded="false"
                                    aria-controls="flush-collapsefour">
                                    Fellowship
                                </button>
                            </h2>
                            <div id="flush-collapsefour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<?php the_field('honors_and_awards'); ?>
								</div>
                            </div>
                        </div>		
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive" aria-expanded="false"
                                    aria-controls="flush-collapsefive">
                                    Membership of Professional Bodies
                                </button>
                            </h2>
                            <div id="flush-collapsefive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<?php the_field('membership_of_professional_bodies'); ?>
								</div>
                            </div>
                        </div>			
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsesix" aria-expanded="false"
                                    aria-controls="flush-collapsesix">
                                    Publications
                                </button>
                            </h2>
                            <div id="flush-collapsesix" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
									<?php the_field('publications'); ?>
								</div>
                            </div>
                        </div>						
                    </div>
                </div>
            </div>
        </div>
    </div>


	
<?php get_footer(); ?>
