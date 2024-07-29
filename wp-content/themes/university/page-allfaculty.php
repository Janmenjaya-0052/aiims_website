<?php
   /**
    * Template Name: All Faculty Page Template
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
      <div class="tab tabs-left sideways">
         <button class="tablinks active" onclick="openCity(event, 'facultylist')" id="defaultOpen">All</button>
         <button class="tablinks" onclick="openCity(event, 'schoolwise')">Departments</button>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div id="facultylist" class="tabcontent">
               <div class="row ">
                  <div class="col-md-12 pb-20">
                     <?php											
                        $args = array(
                        	'post_type' => 'faculty',
                        	'post_status' => 'publish',
                        	'posts_per_page' => '-1',
                        	'order' => 'ASC',
                        	'orderby' => 'title',
                        );
                        $query = new WP_Query($args);
                        $count = 1;
                        ?>
                     <div class="row">
                        <div class="col-md-10">
                           <div class="faculty-search"><input id="search" class="form-control nl-text-input" placeholder="Search Faculty" autocomplete="off" type="text"> </div>
                        </div>
                        <div class="col-md-2">
                           <div class="facultycount">
                              <img src="<?PHP echo get_site_url(); ?>/wp-content/themes/university/images/profile.png"> Total Doctors: <?php echo $totalpostcount = $query->post_count;?>										
                           </div>
                        </div>
                     </div>
                     <div class="faculty-list-open">
                        <div class="faculty-items">
                           <div class="row">  
							  <div class="team__container">
								<div class="row">
								<?php while ($query->have_posts()): $query->the_post(); ?>		  
								<article class="col-md-3">
								  <a class="team__link" href="<?php echo get_permalink(); ?>" target="_blank">
									<div class="team__img-container">
									  <span class="preloader"></span>
									  <figure class="team__img">
										<img class="absolute-bg" src="<?php echo get_field( 'image' ); ?>" alt=""/>
												  </figure>
									 </div>
									<div class="team__text">
									  <h3 class="team__title"><?php the_title(); ?></h3>
									  <span class="team__position"><?php echo get_field('designation' ); ?></span>
									  <?php 
									  // Fetch the term for the current post
									  $terms = get_the_terms(get_the_ID(), 'category_department');
									  if ($terms && !is_wp_error($terms)) {
										  $term = array_shift($terms);
									  ?>
									  <span class="team__position"><?php echo $term->name; ?></span>
									  <?php } ?>
									 </div>
								  </a>
								</article>
								<?php endwhile; wp_reset_query(); ?> 
								</div>
							  </div>							  

                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="schoolwise" class="tabcontent">
               <div class="row trending_content">
                  <div class="col-md-12 pb-20">
                     <div class="faculty-search"><input type='text' id='search' class="form-control nl-text-input" placeholder='Search Faculty' autocomplete="off" /> </div>
                     <div class="faculty-list-open">
                        <?php 
                           $schoolterms = get_terms( array(
                           	'taxonomy' => 'category_department',
                           	'hide_empty' => true
                           ));
                           $tab1 = 1;
                           $tabcontent1 = 1;
                           
                           ?>					 
                        <ul id="schooltabs" class="nav nav-tabs" role="tablist">
                           <?php
                              foreach( $schoolterms as $term){
                              	$termChildren = get_term_children($term->term_id, 'category_department');
                              	$trendingslug = $term->slug;
                              		
                              ?>						
                           <li role="presentation" class="<?php if ($tab1 == 1){ echo 'active'; } ?>"><a href="#<?php echo $trendingslug; ?>" role="tab" data-toggle="tab" aria-expanded="<?php if ($tab1 == 1){ echo 'true'; }else{echo 'false'; } ?>" ><?php echo $term->name; ?></a></li>
                           <?php $tab1++; } ?>
                        </ul>
						<div class="tab-content">
						   <?php
							  foreach( $schoolterms as $term) {
								  $cat_id = $term->term_id;
								  $trendingslug = $term->slug;
								  $args = array(
									  'post_type' => 'faculty',
									  'post_status' => 'publish',
									  'posts_per_page' => '-1',
									  'orderby' => 'menu_order',
									  'order' => 'ASC',
									  'tax_query' => array(
										  array(
											  'taxonomy' => 'category_department',
											  'field' => 'slug',
											  'terms' => $term->slug
										  )
									  )
								  );
								  $query = new WP_Query($args);
						   ?>                      
						   <div role="tabpanel" class="tab-pane <?php if ($tabcontent1 == 1) { echo 'in active'; } ?>" id="<?php echo $trendingslug; ?>">
							  <div class="faculty-items">
								 <div class="faculty-title"><?php echo $term->name; ?></div>
								 <div class="row">
									<div class="team__container">
									   <?php 
										  // Separate the special item and other items
										  $special_item = null;
										  $other_items = array();

										  while ($query->have_posts()) : $query->the_post();
											  if (get_post_field('menu_order', get_the_ID()) == 1) {
												  $special_item = get_the_ID();
											  } else {
												  $other_items[] = get_the_ID();
											  }
										  endwhile; 
										  
										  // Display the special item if it exists
										  if ($special_item) : 
											  $post = get_post($special_item);
											  setup_postdata($post);
									   ?>
									   <div class="row">
											<article class="col-md-4">
											</article>
										   <article class="col-md-4">
											  <a class="team__link" href="<?php echo get_permalink(); ?>" target="_blank">
												 <div class="team__img-container">
													<span class="preloader"></span>
													<figure class="team__img">
													   <img class="absolute-bg" src="<?php echo get_field('image'); ?>" alt=""/>
													</figure>
												 </div>
												 <div class="team__text">
													<h3 class="team__title"><?php the_title(); ?></h3>
													<span class="team__position"><?php echo get_field('designation'); ?></span>
													<span class="team__position"><?php echo $term->name; ?></span>
												 </div>
											  </a>
										   </article>
										   <article class="col-md-4">
											</article>
									   </div>
									   <?php 
											  wp_reset_postdata(); 
										  endif; 
									   ?>
									   <div class="row">
									   <?php 
										  foreach ($other_items as $post_id) : 
											  $post = get_post($post_id);
											  setup_postdata($post);
									   ?>
										   <article class="col-md-3">
											  <a class="team__link" href="<?php echo get_permalink(); ?>" target="_blank">
												 <div class="team__img-container">
													<span class="preloader"></span>
													<figure class="team__img">
													   <img class="absolute-bg" src="<?php echo get_field('image'); ?>" alt=""/>
													</figure>
												 </div>
												 <div class="team__text">
													<h3 class="team__title"><?php the_title(); ?></h3>
													<span class="team__position"><?php echo get_field('designation'); ?></span>
													<span class="team__position"><?php echo $term->name; ?></span>
												 </div>
											  </a>
										   </article>
									   <?php 
											  wp_reset_postdata(); 
										  endforeach; 
									   ?>
									   </div>
									</div>  
								 </div>
							  </div>
						   </div>
						   <?php
							  $tabcontent1++;
							  }
						   ?>                              
						</div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<script>
	jQuery(document).ready(function(){
		jQuery('#tchdesc').click(function() {
			jQuery('#targetpanel').toggle('slow');
		});
	  jQuery('#search').keyup(function(){
	 
	   // Search text
	   var text = $(this).val().toLowerCase();
	 
	   // Hide all content class element
	   jQuery('.fi-searched').hide();

	   // Search 
	   jQuery('.fi-searched').each(function(){
	 
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 jQuery(this).closest('.fi-searched').show();
		}
	  });
	 });
	 jQuery('#searchschool').keyup(function(){
	 
	   // Search text
	   var text = $(this).val().toLowerCase();
	 
	   // Hide all content class element
	   jQuery('.school-items').hide();

	   // Search 
	   jQuery('.school-items').each(function(){
	 
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 jQuery(this).closest('.school-items').show();
		}
	  });
	 });
	});
</script>
<?php
get_footer(); ?>
