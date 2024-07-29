<?php
get_header();
?>


<div class="breadcrumps_section">
   <div class="tringle_div">   
   </div>
   <div class="content">
      <h1><?php echo single_term_title(); ?></h1>
      <ul>
         <li><a href="<?php echo get_site_url(); ?>" target="_blank">Home</a></li>
         <li class="active"><a href="<?php $term = get_queried_object(); $term_link = get_term_link($term); echo $term_link; ?>"><?php echo single_term_title(); ?></a></li>
      </ul>
   </div>
</div>

<div class="container departments">
	<div class="row">
			<div class="row about-sec-tab" style="padding-top: 20px;">									
				<div class="col-md-3">
					<div class="tab tabs-left sideways">
						<button class="tablinks active" onclick="openCity(event, 'about')" id="defaultOpen">Departmental Signage</button>
						<button class="tablinks" onclick="openCity(event, 'teaching')" >Content Details</button>
						<button class="tablinks" onclick="openCity(event, 'research')" >Major Achievements</button>
						<button class="tablinks" onclick="openCity(event, 'fas')" >Faculty/Staff</button>
						<button class="tablinks" onclick="openCity(event, 'pg')" >Photo Gallery</button>
					</div>
				</div>
				<div class="col-md-9">
					<div id="about" class="tabcontent">
						<div class="row trending_content">								
							<div class="col-md-10 trending-box-title pb-20"><h2>Departmental Signage</h2></div>	
							<div class="col-md-2">
								<div class="back-btn"><a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><i class="fa-regular fa-circle-left"></i> Back</a></div>
							</div>
							<div class="col-md-12 trending-box pb-20"> 
								<?php
									$term = get_queried_object();
									$image = get_field('departmental_signage_image', $term);
									if ($image): ?>
									
									<img src="<?php echo $image; ?>" alt="" />
                           					
								<?php endif; ?>
							</div>
											
						</div>								
					</div>
					<div id="teaching" class="tabcontent">
						<div class="row trending_content">								
							<div class="col-md-10 trending-box-title pb-20"><h2>Content Details</h2></div>	
							<div class="col-md-2">
								<div class="back-btn"><a href="<a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><i class="fa-regular fa-circle-left"></i> Back</a></div>
							</div>
							<div class="col-md-12 trending-box pb-20"> 
								<?php
									$term = get_queried_object();
									$overview = get_field('overview', $term);
									if ($overview):
										echo $overview; 
										
									endif;  ?>
							
							</div>							
						</div>								
					</div>
					<div id="research" class="tabcontent">
						<div class="row trending_content">								
							<div class="col-md-10 trending-box-title pb-20"><h2>Major Achievements</h2></div>	
							<div class="col-md-2">
								<div class="back-btn"><a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><i class="fa-regular fa-circle-left"></i> Back</a></div>
							</div>
							<div class="col-md-12 trending-box pb-20"> 
							<?php
									$term = get_queried_object();
									$achievements = get_field('achievements', $term);
									if ($achievements):
										echo $achievements; 
										
									endif; ?>
							</div>								
						</div>								
					</div>
					<div id="fas" class="tabcontent">
						<div class="row trending_content">								
							<div class="col-md-10 trending-box-title pb-20"><h2>Faculty/Staff</h2></div>	
							<div class="col-md-2">
								<div class="back-btn"><a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><i class="fa-regular fa-circle-left"></i> Back</a></div>
							</div>
							<div class="col-md-12 trending-box pb-20"> 
								<div class="faculty-list-open">
									  <div class="faculty-items">
										 <div class="row">
											<?php
											$term = get_queried_object();
											$term_link = get_term_link($term);
											$args = array(
												'post_type' => 'faculty',
												'post_status' => 'publish',
											    'posts_per_page' => '-1',
											    'orderby' => 'menu_order',
											    'order' => 'ASC',
												'tax_query' => array(
													array(
														'taxonomy' => 'category_department',
														'field'    => 'slug',
														'terms'    => $term->slug,
													),
												),
											);

											$query = new WP_Query($args);

											if ($query->have_posts()) :
												while ($query->have_posts()) :
													$query->the_post();
													?>									 
											<div class="col-md-3 col-sm-3 col-xs-6 pb-20">
											   <div class="faculty-prof-inner">
												  <div class="facultyprofile-img"><a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><img src="<?php echo get_field( 'image' ); ?>" /></a></div>
												  <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
												  <h4><?php echo get_field('designation' ); ?></h4>
												  
											   </div>
											</div>
											<?php
											endwhile;
											wp_reset_postdata(); 
											else :
											
											endif;
											
											?>											
										 </div>
									  </div>	
								</div>
							</div>								
						</div>								
					</div>
					<div id="pg" class="tabcontent">
						<div class="row trending_content">								
							<div class="col-md-10 trending-box-title pb-20"><h2>Photo Gallery</h2></div>	
							<div class="col-md-2">
								<div class="back-btn"><a href="<?php echo get_site_url(); ?>/all-departments" Title="Back to Department"><i class="fa-regular fa-circle-left"></i> Back</a></div>
							</div>
							<div class="col-md-12 trending-box pb-20"> 
							<?php 
								$term = get_queried_object(); 
								if (have_rows('gallery', $term)):
							?>								
								<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
								<?php while (have_rows('gallery', $term)): the_row();
									$image = get_sub_field('images');
									$title = get_sub_field('title');
								?>	
								  <div class="col">
									<a class="gallery-item" href="<?php echo $image; ?>">
									  <img src="<?php echo $image; ?>" class="img-fluid" alt="<?php echo $image; ?>">
									</a>
								  </div>
									<div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
									  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
										<div class="modal-content">
										  <button type="button" class="btn-fullscreen-enlarge" aria-label="Enlarge fullscreen">
											<svg class="bi"><use href="#enlarge"></use></svg>
										  </button>
										  <button type="button" class="btn-fullscreen-exit d-none" aria-label="Exit fullscreen">
											<svg class="bi"><use href="#exit"></use></svg>
										  </button>
										  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										  <div class="modal-body">
											<div class="lightbox-content">
											  <!-- JS content here -->
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
				</div>					
			</div>			
	</div>
</div>

<script>

const html = document.querySelector('html');
//html.setAttribute('data-bs-theme', 'dark');

document.addEventListener('DOMContentLoaded', () => {
  // --- Create LightBox
  const galleryGrid = document.querySelector(".gallery-grid");
  const links = galleryGrid.querySelectorAll("a");
  const imgs = galleryGrid.querySelectorAll("img");
  const lightboxModal = document.getElementById("lightbox-modal");
  const bsModal = new bootstrap.Modal(lightboxModal);
  const modalBody = lightboxModal.querySelector(".lightbox-content");

  function createCaption (caption) {
    return `<div class="carousel-caption d-none d-md-block">
        <h4 class="m-0">${caption}</h4>
      </div>`;
  }

  function createIndicators (img) {
    let markup = "", i, len;

    const countSlides = links.length;
    const parentCol = img.closest('.col');
    const curIndex = [...parentCol.parentElement.children].indexOf(parentCol);

    for (i = 0, len = countSlides; i < len; i++) {
      markup += `
        <button type="button" data-bs-target="#lightboxCarousel"
          data-bs-slide-to="${i}"
          ${i === curIndex ? 'class="active" aria-current="true"' : ''}
          aria-label="Slide ${i + 1}">
        </button>`;
    }

    return markup;
  }

  function createSlides (img) {
    let markup = "";
    const currentImgSrc = img.closest('.gallery-item').getAttribute("href");

    for (const img of imgs) {
      const imgSrc = img.closest('.gallery-item').getAttribute("href");
      const imgAlt = img.getAttribute("alt");

      markup += `
        <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
          <img class="d-block img-fluid w-100" src=${imgSrc} alt="${imgAlt}">
          ${imgAlt ? createCaption(imgAlt) : ""}
        </div>`;
    }

    return markup;
  }

  function createCarousel (img) {
    const markup = `
      <!-- Lightbox Carousel -->
      <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-ride="true">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          ${createIndicators(img)}
        </div>
        <!-- Wrapper for Slides -->
        <div class="carousel-inner justify-content-center mx-auto">
          ${createSlides(img)}
        </div>
        <!-- Controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      `;

    modalBody.innerHTML = markup;
  }

  for (const link of links) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const currentImg = link.querySelector("img");
      const lightboxCarousel = document.getElementById("lightboxCarousel");

      if (lightboxCarousel) {
        const parentCol = link.closest('.col');
        const index = [...parentCol.parentElement.children].indexOf(parentCol);

        const bsCarousel = new bootstrap.Carousel(lightboxCarousel);
        bsCarousel.to(index);
      } else {
        createCarousel(currentImg);
      }

      bsModal.show();
    });
  }

  // --- Support Fullscreen
  const fsEnlarge = document.querySelector(".btn-fullscreen-enlarge");
  const fsExit = document.querySelector(".btn-fullscreen-exit");

  function enterFS () {
    lightboxModal.requestFullscreen().then({}).catch(err => {
      alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
    });
    fsEnlarge.classList.toggle("d-none");
    fsExit.classList.toggle("d-none");
  }

  function exitFS () {
    document.exitFullscreen();
    fsExit.classList.toggle("d-none");
    fsEnlarge.classList.toggle("d-none");
  }

  fsEnlarge.addEventListener("click", (e) => {
    e.preventDefault();
    enterFS();
  });

  fsExit.addEventListener("click", (e) => {
    e.preventDefault();
    exitFS();
  });
})

</script>
<?php
get_footer(); ?>
