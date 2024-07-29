// ===================Hero page animation======================

TweenMax.staggerFrom("#navbar_01,#navbar_02", 1.5, {
  opacity: 0,
  y: -30,
  ease: Expo.easeInOut,
  delay: 0
}, 0.09);
TweenMax.staggerFrom(".menu > li,#main-navbar span", 1.5, {
  opacity: 0,
  x: -30,
  ease: Expo.easeInOut,
  delay: 0.3
}, 0.09);
TweenMax.staggerFrom("#menu-toggler", 1, {
  opacity: 0,
  x: 30,
  ease: Expo.easeInOut,
  delay: 0.3
}, 0.09);
TweenMax.staggerFrom("#main_carousel", 1, {
  opacity: 0,
  scale: 0.8,
  ease: Expo.linear,
  delay: 0.3
}, 0.09);
TweenMax.staggerFrom(".slider_notice", 1.5, {
  opacity: 0,
  y: 30,
  ease: Expo.easeInOut,
  delay: 0
}, 0.09);

// ===========navbar3==========
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


// ==============number cards============

// Function to start counter animation
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

// ========to change font size========

jQuery(document).ready(function(){
  var $affectedElements = $("p,body,a"); // Can be extended, ex. $("div, p, span.someClass")
    // Storing the original size in a data attribute so size can be reset
    $affectedElements.each( function(){
      var $this = $(this);
      $this.data("orig-size", $this.css("font-size") );
    });

    $("#btn-increase").click(function(){
      changeFontSize(1);
    })

    $("#btn-decrease").click(function(){
      changeFontSize(-1);
    })

    $("#btn-orig").click(function(){
      $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , $this.data("orig-size") );
       });
    })

    function changeFontSize(direction){
      $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , parseInt($this.css("font-size"))+direction );
      });
    }
});

// ===========to handle color blindness============
$('#black').on('click', function () {
  $('body').css('background', '#000');
  $('#navbar_01').css('background', '#000')
  $('#navbar_01').css('color', '#fff')
  $('#main-navbar').css('background', '#000');
  $('.slider_notice').css('background', '#000');
  $('#card_carousel1').css('background', '#000');
  $('.all_person').css('background', '#000');
  $('#card_carousel2_container').css('color', '#fff');
  $('.view-all').css('background-color', '#fff');
  $('.view-all').css('color', '#000');
});

$('#White').on('click', function () {
    $('body').css('background', '#fff');
    $('#navbar_01').css('background', '#FFE5D7');
  $('#navbar_01').css('color', '#000');
  $('#main-navbar').css('background', '#FF8D4F');
  $('.slider_notice').css('background', '#52110f');
  $('#card_carousel1').css('background', '#EAE3D9');
  $('.all_person').css('background', 'rgb(237, 233, 232)');
  $('#card_carousel2_container').css('color', '#000');
  $('.view-all').css('background-color', '#000');
  $('.view-all').css('color', '#fff');
});







function changeFontSize(x) {
    if(x==0){
      location.reload();
      return;
    }
    // Get all elements on the page
    var elements = document.querySelectorAll("*");
    
    // Loop through each element and decrease font size by 1px
    elements.forEach(function(element) {
      // Get current font size and convert it to a number
      var currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);
      
      // Decrease font size by 1px
      var newFontSize = currentFontSize + x;
      
      // Apply the new font size
      element.style.fontSize = newFontSize + "px";
    });
  }





  jQuery(document).ready(function(){
		var $affectedElements = $("p,body,a"); // Can be extended, ex. $("div, p, span.someClass")
			// Storing the original size in a data attribute so size can be reset
			$affectedElements.each( function(){
			  var $this = $(this);
			  $this.data("orig-size", $this.css("font-size") );
			});

			$("#btn-increase").click(function(){
			  changeFontSize(1);
			})

			$("#btn-decrease").click(function(){
			  changeFontSize(-1);
			})

			$("#btn-orig").click(function(){
			  $affectedElements.each( function(){
					var $this = $(this);
					$this.css( "font-size" , $this.data("orig-size") );
			   });
			})

			function changeFontSize(direction){
				$affectedElements.each( function(){
					var $this = $(this);
					$this.css( "font-size" , parseInt($this.css("font-size"))+direction );
				});
			}
});