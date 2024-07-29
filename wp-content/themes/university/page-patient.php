<?php
/**
 * Template Name: Patient Portal Template
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
<style>
.alltab_tab2 .btn-group img {
	width: 14%;
    padding-right: 9px;
}
</style>
  <!-- ==========================breadcrump===================================== -->
  <!--<div class="breadcrumps_section">
  <div class="tringle_div">   
  </div>
  <div class="content">
    <h1><?php //echo the_title(); ?></h1>
    <ul>
      <li><a href="<?php //echo get_site_url(); ?>" target="_blank">Home</a></li>
      <li class="active"><a href="<?php //echo get_permalink(); ?>"><?php //echo the_title(); ?></a></li>
    </ul>
  </div>
</div>-->

  <!-- ==========================carousel===================================== -->
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

  <!-- ==========================page content===================================== -->
	
    <div id="pateint_card_container" class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-3 mb-md-0">					
					<!-- ===========tab============ -->
					 <div class="alltab_tab1" data-aos="fade" data-aos-duration="1000">
					  <div class="btn-group w-100 mb-3">
						<button class="btn active" data-id="h_notice">Hospital Notice</button>
						<button class="btn" data-id="h_achievement">Hospital Achievement</button>
					  </div>
					  <div class="contentWrapper" style="min-height:400px;">
						<div class="content active" id="h_notice">
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
						  <button class="view-all mt-3">Read More</button>
						</div>
						<div class="content" id="h_achievement">
						  <p>Hospital Achievement</p>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-md-8">
					<?php if (have_rows("card_data")): ?>
					<div class="row">
					<?php while (have_rows("card_data")):
					the_row();
					$title = get_sub_field("title");
					$icon = get_sub_field("icon");
					$description = get_sub_field("description");
					$page_link = get_sub_field("page_link");
					?>			
						<div class="col-md-4">
							<div class="patient_card">
								<h6><?php echo $title; ?></h6>
								<i class="<?php echo $icon; ?>"></i>
								<p><?php echo $description; ?></p>
								<a href="<?php echo $page_link; ?>" target="_blank"><span>Click Here</span> <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					<?php
					endwhile; ?>   
					</div>
				<?php endif; ?>
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
	   <div class="number_cards">
		<div class="container py-5">
		<?php if( have_rows('counter_section') ): $i=0;?>
		  <div class="row">
			<?php while( have_rows('counter_section') ): the_row(); 
			$title = get_sub_field('title');
			$numbers = get_sub_field('counter_number');
			$i++;
			?>
			<div class="col-md-3 mb-2 mb-md-0">
			  <div class="card nc_<?php echo $i; ?>">
				<div class="counter" data-target="<?php echo $numbers; ?>"></div>
				<h4><?php echo $title; ?></h4>
			  </div>
			</div>
			<?php endwhile; ?>

		  </div>
		  <?php endif; ?>
		</div>
	  </div>
	
	
	
	<!-- =======================All tabs================================-->
	<div class="container py-3 my-5" style="overflow: hidden;">
		<div class="row w-100 m-auto">
		  <div class="col-md-6 p-0 pe-md-2 mb-4 mb-md-0">
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
				  <div>
				    <a class="twitter-timeline" data-height="400" data-dnt="true"
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

		  <div class="col-md-6 p-0 pe-md-2 mb-4 mb-md-0">
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
				<div class="content" id="Photo_Gallery">
				  <div class="flex_box justify-content-center">
					<img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/alltab_img5.svg" class="h-100 w-100" alt="">
				  </div>
				</div>
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
  
  
  
  
<script>
// =======================================================navbar3==================================================================
//=================================================================================================================================
var navbar_id = "main-navbar";
var navbar;
var navbar_menu;
var menu_toggler;
var li_list;

// The DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  navbar = document.getElementById(navbar_id);
  navbar_menu = navbar.querySelector(".menu");
  menu_toggler = navbar.querySelector("#menu-toggler");
  li_list = navbar.querySelectorAll(".menu li");

  // Insert 'fa-angle-down' icon to LI's which have children UL
  li_list.forEach(function (li) {
    if (li.children.length === 2) {
      li.children[0].innerHTML += "<i class='fa fa-angle-down'></i>";
      li.classList.add("has-dropdown");
    }
  });

  var mediaQuery = window.matchMedia("(min-width: 860px)");
  navFunctionality(mediaQuery);
  // Optional (Only for testing purposes)
  mediaQuery.addListener(navFunctionality);

  function navFunctionality(mediaQuery) {
    // Initially remove all the event listeners from LI if any
    li_list.forEach(function (li) {
      li.removeEventListener("mouseleave", toggleActive);
      li.removeEventListener("mouseenter", toggleActive);
      li.removeEventListener("click", toggleActive);
    });

    if (mediaQuery.matches) {
      // Toggle dropdown on hover
      li_list.forEach(function (li) {
        li.addEventListener("mouseleave", toggleActive);
        li.addEventListener("mouseenter", toggleActive);
      });
    } else {
      // Toggle dropdown on click
      li_list.forEach(function (li) {
        li.addEventListener("click", toggleActive);
      });

      // Hamburger operations
      menu_toggler.addEventListener("click", function (e) {
        if (e.currentTarget.classList.contains("active")) {
          li_list.forEach(function (li) {
            li.classList.remove("active");
          });
        }

        navbar_menu.classList.toggle("active");
        e.currentTarget.classList.toggle("active");
      });
    }
  }

  // function to toggle 'active' class from LI
  function toggleActive(e) {
    e.stopPropagation();
    if (e.type === "click") {
      if (e.currentTarget.classList.contains("has-dropdown")) {
        e.preventDefault();
      }
      if (
        !e.currentTarget.classList.contains("active") &&
        e.currentTarget.parentElement.classList.contains("menu")
      ) {
        li_list.forEach(function (li) {
          li.classList.remove("active");
        });
      }
    }
    e.currentTarget.classList.toggle("active");
  }
});


// ===================================================for card carousel============================================================
//=================================================================================================================================
const wrapper1 = document.querySelector("#wrapper1");
const carousels1 = document.querySelector("#carousels1");
const firstCardWidth1 = carousels1.querySelector("#carousels1 .card").offsetWidth;
const arrowBtns1 = document.querySelectorAll("#card_carousel1 i");
const carousels1Childrens1 = [...carousels1.children];

let isDragging = false, isAutoPlay1 = true, startX1, startScrollLeft1, timeoutId1;

// Get the number of cards that can fit in the carousels1 at once
let cardPerView1 = Math.round(carousels1.offsetWidth / firstCardWidth1);

// Insert copies of the last few cards to beginning of carousels1 for infinite scrolling
carousels1Childrens1.slice(-cardPerView1).reverse().forEach(card => {
    carousels1.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousels1 for infinite scrolling
carousels1Childrens1.slice(0, cardPerView1).forEach(card => {
    carousels1.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousels1 at appropriate postition to hide first few duplicate cards on Firefox
carousels1.classList.add("no-transition");
carousels1.scrollLeft = carousels1.offsetWidth;
carousels1.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousels1 left and right
arrowBtns1.forEach(btn => {
    btn.addEventListener("click", () => {
        carousels1.scrollLeft += btn.id == "left" ? -firstCardWidth1 : firstCardWidth1;
    });
});

const dragStart1 = (e) => {
    isDragging = true;
    carousels1.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousels1
    startX1 = e.pageX;
    startScrollLeft1 = carousels1.scrollLeft;
}

const dragging1 = (e) => {
    if (!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousels1 based on the cursor movement
    carousels1.scrollLeft = startScrollLeft1 - (e.pageX - startX1);
}

const dragStop1 = () => {
    isDragging = false;
    carousels1.classList.remove("dragging");
}

const infiniteScroll1 = () => {
    // If the carousels1 is at the beginning, scroll to the end
    if (carousels1.scrollLeft === 0) {
        carousels1.classList.add("no-transition");
        carousels1.scrollLeft = carousels1.scrollWidth - (2 * carousels1.offsetWidth);
        carousels1.classList.remove("no-transition");
    }
    // If the carousels1 is at the end, scroll to the beginning
    else if (Math.ceil(carousels1.scrollLeft) === carousels1.scrollWidth - carousels1.offsetWidth) {
        carousels1.classList.add("no-transition");
        carousels1.scrollLeft = carousels1.offsetWidth;
        carousels1.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousels1
    clearTimeout(timeoutId1);
    if (!wrapper1.matches(":hover")) autoPlay1();
}

const autoPlay1 = () => {
    if (window.innerWidth < 800 || !isAutoPlay1) return; // Return if window is smaller than 800 or isAutoPlay1 is false
    // Autoplay the carousels1 after every 2500 ms
    timeoutId1 = setTimeout(() => carousels1.scrollLeft += firstCardWidth1, 2500);
}
autoPlay1();

carousels1.addEventListener("mousedown", dragStart1);
carousels1.addEventListener("mousemove", dragging1);
document.addEventListener("mouseup", dragStop1);
carousels1.addEventListener("scroll", infiniteScroll1);
wrapper1.addEventListener("mouseenter", () => clearTimeout(timeoutId1));
wrapper1.addEventListener("mouseleave", autoPlay1);




// =====================================================for tab====================================================================
//=================================================================================================================================
	
	// =========alltabs tab1======
	const tabs1 = document.querySelector(".alltab_tab1");
	const tabButton1 = document.querySelectorAll(".alltab_tab1 button");
	const contents1 = document.querySelectorAll(".alltab_tab1 .content");

	tabs1.onclick = e => {
	  const id = e.target.dataset.id;
	  if (id) {
		tabButton1.forEach(btn => {
		  btn.classList.remove("active");
		});
		e.target.classList.add("active");

		contents1.forEach(content => {
		  content.classList.remove("active");
		});
		const element = document.getElementById(id);
		element.classList.add("active");
	  }
	}

    const tab1_slider = document.querySelector('.alltab_tab1 #slider');
    const slideTrack = tab1_slider.querySelector('.alltab_tab1 .slide-track');

    tab1_slider.addEventListener('mouseenter', () => {
      slideTrack.style.animationPlayState = 'paused';
    });

    tab1_slider.addEventListener('mouseleave', () => {
      slideTrack.style.animationPlayState = 'running';
    });
	
		
	// =========alltabs tab2======
	const tabs2 = document.querySelector(".alltab_tab2");
	const tabButton2 = document.querySelectorAll(".alltab_tab2 button");
	const contents2 = document.querySelectorAll(".alltab_tab2 .content");

	tabs2.onclick = e => {
	  const id = e.target.dataset.id;
	  if (id) {
		tabButton2.forEach(btn => {
		  btn.classList.remove("active");
		});
		e.target.classList.add("active");

		contents2.forEach(content => {
		  content.classList.remove("active");
		});
		const element = document.getElementById(id);
		element.classList.add("active");
	  }
	}



	// =========alltabs tab3======
	const tabs3 = document.querySelector(".alltab_tab3");
	const tabButton3 = document.querySelectorAll(".alltab_tab3 button");
	const contents3 = document.querySelectorAll(".alltab_tab3 .content");

	tabs3.onclick = e => {
	  const id = e.target.dataset.id;
	  if (id) {
		tabButton3.forEach(btn => {
		  btn.classList.remove("active");
		});
		e.target.classList.add("active");

		contents3.forEach(content => {
		  content.classList.remove("active");
		});
		const element = document.getElementById(id);
		element.classList.add("active");
	  }
	}

	
	// ===============================================number cards========================================================
	// ========================================Function to start counter animation========================================
	const startCounters = () => {
	  const counters = document.querySelectorAll(".number_cards .counter");
	  counters.forEach((counter) => {
		counter.innerText = "0";
		const updateCounter = () => {
		  const target = +counter.getAttribute("data-target");
		  const count = +counter.innerText;
		  const increment = target / 200;
		  if (count < target) {
			counter.innerText = `${Math.ceil(count + increment)}`;
			setTimeout(updateCounter, 1);
		  } else counter.innerText = target;
		};
		updateCounter();
	  });
	};
	// Create an Intersection Observer for the parent div
	const parentObserver = new IntersectionObserver((entries) => {
	  entries.forEach(entry => {
		if (entry.isIntersecting) {
		  // Start the counters when the parent div is visible
		  startCounters();
		}
	  });
	}, {
	  threshold: 0.1 // Adjust this threshold as needed
	});

	// Observe the parent div
	const parentDiv = document.querySelector(".number_cards"); // Adjust selector to the actual parent div
	if (parentDiv) {
	  parentObserver.observe(parentDiv);
	}


	// =============================================all aiims carousel====================================================
	// ===================================================================================================================
	const wrapper2 = document.querySelector("#wrapper2");
	const carousels2 = document.querySelector("#carousels2");
	const firstCardWidth2 = carousels2.querySelector("#carousels2 .card").offsetWidth;
	const arrowBtns2 = document.querySelectorAll("#card_carousel2 i");
	const carousels2Childrens1 = [...carousels2.children];

	let isDragging2 = false, isAutoPlay2 = true, startX2, startScrollLeft2, timeoutId2;

	// Get the number of cards that can fit in the carousels2 at once
	let cardPerView2 = Math.round(carousels2.offsetWidth / firstCardWidth2);

	// Insert copies of the last few cards to beginning of carousels2 for infinite scrolling
	carousels2Childrens1.slice(-cardPerView2).reverse().forEach(card => {
		carousels2.insertAdjacentHTML("afterbegin", card.outerHTML);
	});

	// Insert copies of the first few cards to end of carousels2 for infinite scrolling
	carousels2Childrens1.slice(0, cardPerView2).forEach(card => {
		carousels2.insertAdjacentHTML("beforeend", card.outerHTML);
	});

	// Scroll the carousels2 at appropriate postition to hide first few duplicate cards on Firefox
	carousels2.classList.add("no-transition");
	carousels2.scrollLeft = carousels2.offsetWidth;
	carousels2.classList.remove("no-transition");

	// Add event listeners for the arrow buttons to scroll the carousels2 left and right
	arrowBtns2.forEach(btn => {
		btn.addEventListener("click", () => {
			carousels2.scrollLeft += btn.id == "left" ? -firstCardWidth2 : firstCardWidth2;
		});
	});

	const dragStart2 = (e) => {
		isDragging2 = true;
		carousels2.classList.add("dragging");
		// Records the initial cursor and scroll position of the carousels2
		startX = e.pageX;
		startScrollLeft = carousels2.scrollLeft;
	}

	const dragging2 = (e) => {
		if (!isDragging2) return; // if isDragging2 is false return from here
		// Updates the scroll position of the carousels2 based on the cursor movement
		carousels2.scrollLeft = startScrollLeft - (e.pageX - startX);
	}

	const dragStop2 = () => {
		isDragging2 = false;
		carousels2.classList.remove("dragging");
	}

	const infiniteScroll2 = () => {
		// If the carousels2 is at the beginning, scroll to the end
		if (carousels2.scrollLeft === 0) {
			carousels2.classList.add("no-transition");
			carousels2.scrollLeft = carousels2.scrollWidth - (2 * carousels2.offsetWidth);
			carousels2.classList.remove("no-transition");
		}
		// If the carousels2 is at the end, scroll to the beginning
		else if (Math.ceil(carousels2.scrollLeft) === carousels2.scrollWidth - carousels2.offsetWidth) {
			carousels2.classList.add("no-transition");
			carousels2.scrollLeft = carousels2.offsetWidth;
			carousels2.classList.remove("no-transition");
		}

		// Clear existing timeout & start autoplay if mouse is not hovering over carousels2
		clearTimeout(timeoutId2);
		if (!wrapper2.matches(":hover")) autoPlay2();
	}

	const autoPlay2 = () => {
		if (window.innerWidth < 800 || !isAutoPlay2) return; // Return if window is smaller than 800 or isAutoPlay is false
		// Autoplay the carousels2 after every 2500 ms
		timeoutId2 = setTimeout(() => carousels2.scrollLeft += firstCardWidth2, 2500);
	}
	autoPlay2();

	carousels2.addEventListener("mousedown", dragStart2);
	carousels2.addEventListener("mousemove", dragging2);
	document.addEventListener("mouseup", dragStop2);
	carousels2.addEventListener("scroll", infiniteScroll2);
	wrapper2.addEventListener("mouseenter", () => clearTimeout(timeoutId));
	wrapper2.addEventListener("mouseleave", autoPlay2);
</script>
<?php
get_footer();
