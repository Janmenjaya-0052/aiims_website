<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
  <!-- ==========================Footer1===================================== -->
  <div id="footer_01" style="background: linear-gradient(180deg, #000000 -20.23%, #000000 128.85%);">
    <div class="container">
      <div class="row text-light py-5">
        <div class="col-lg-4 py-2 border-right_1 pe-lg-5">
          <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_img1.svg" class="w-100 pb-3" />
          <div class="ps-0 ps-lg-4">
            <p class="mb-1">
              <a href="http://maps.google.com/?q=All India Institute of Medical Sciences, Bhubaneswar, Sijua, Patrapada, Bhubaneswar-751019"
                target="_blank">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Sijua, Patrapada, Bhubaneswar-751019
              </a>
            </p>
            <p class="mb-1">
              <span style="font-size:24px">✉</span>
              &nbsp;
              fb.hospital@aiimsbhubaneswar.edu.in
            </p>
            <p class="mb-1">
              <a href="mailto:helpdesk@aiimsbhubaneswar.edu.in" target="_blank">
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_icon1.svg" alt="" style="width: 25px;">
                &nbsp;
                helpdesk@aiimsbhubaneswar.edu.in
              </a>
            </p>
            <p>
              <span style="font-size:23px">☎</span>
              &nbsp;
              Phone: (0674) 2476789
            </p>
          </div>
        </div>

        <div class="col-lg-4 py-2 border-right_1 ps-lg-5 pb-lg-0 pb-4 pt-lg-0 pt-3">
          <h5 class="pb-2 px-2 mb-2" style=" border-bottom: 2px solid #FF8D4F; width:max-content;">
            Important Links
          </h5>
          <?php
			wp_nav_menu( array(
			  'theme_location' => 'importantlink',
			  'menu_class'     => 'm-0', // Add the desired class here
			  'container'      => false,
			  'link_before'    => '<span class="glow-on-hover">', // Add class to links
			  'link_after'     => '</span>',
			  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			) );
			?>
        </div>

        <div class="col-lg-4 py-2 m-auto ps-lg-5">
          <div class="row mb-2">
            <div class="col-6">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_img2.svg" style="width: 100%" />
            </div>
            <div class="col-6">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_img3.svg" style="width: 100%" />
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_img4.svg" style="width: 100%" />
            </div>
            <div class="col-6">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/university/images/footer_img5.svg" style="width: 100%" />
            </div>
          </div>
        </div>

        <div></div>
      </div>
    </div>
  </div>

  <!-- ==========================Footer2===================================== -->
  <div id="footer_02" style="background: #020B20;">
    <div class="container py-1" style="padding: 0 25px;">
      <div class="row py-2">
        <div class="col-md-4 p-0">
          <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All Rights Reserved.</p>
        </div>
        <div class="col-md-8 p-0 flex_box justify-content-end">
			<?php
			wp_nav_menu( array(
			  'theme_location' => 'footermenu',
			  'menu_class'     => '', // Add any desired class here
			  'container'      => false,
			  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			) );
			?>
        </div>
      </div>
    </div>
  </div>

<!-- SCRIPTS -->

<?php
// Check if we are on the "All Faculty Page Template"
if (is_page_template('page-allfaculty.php') || is_tax('category_department') || is_singular('faculty') ):
    ?>
    <!-- Bootstrap JavaScript inclusion -->
    <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/bootstrap3.min.js"></script>
    <script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
		}
		document.getElementById("defaultOpen").click();
    </script>
<?php endif; ?>

  <!-- Custome javascript link -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/script.js"></script>

  <!-- bootstrap javascript cdn -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/bootstrap.bundle.min.js"></script>

  <!-- popper javascript cdn -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/popper.min.js"></script>

  <!-- AOS javascript cdn -->
  <script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/aos.js"></script>
	<script src="<?php echo get_site_url(); ?>/wp-content/themes/university/js/datatables.min.js"></script>
	
<script>
	
	jQuery( document ).ready( function () {
		jQuery('#datatable').DataTable();
		jQuery('#datatablenon').DataTable();
		jQuery('#datatableshort').DataTable();
		jQuery('#datatableresult').DataTable();
		jQuery('#datatablenotice').DataTable();
		jQuery(document).ready(function($) {
			$('#singles').DataTable({
				"ordering": false // Disable sorting
			});
		});
		//$(".project-progress").hide();
		jQuery( '#start-btn' ).mouseover( function () {
			//$(".project-progress").slideToggle();
			jQuery( ".col-cst-1" ).each( function ( i ) {
				jQuery( this ).addClass( "project-progress-hover" );				
			});
			return false;
		});
		jQuery( '#start-btn' ).mouseleave( function () {
			//$(".project-progress").slideToggle();
			jQuery( ".col-cst-1" ).each( function ( i ) {
				jQuery( this ).removeClass( "project-progress-hover" );				
			});
			return false;
		});	
	});
	jQuery(document).ready(function() {
	  jQuery('.search-icon').on('click', function() {
		jQuery('.search-bar').slideToggle();
		jQuery( "input[type='search']" ).focus();
	  });
	});
	jQuery(document).ready(function() {
		jQuery("#myModal button.close").on("click",function(){
			jQuery("#popupbell").css("display","block");
			jQuery("#myModal").css("display","none");
		});
		jQuery("#popupbell").on("click",function(){
			jQuery("#myModal").css("display","block");
			jQuery("#myModal").css("background-color","#0000006b");
			jQuery(".fade").addClass("in");
		});
	});
	
</script>	
  <script>
    AOS.init();

    // =============person tooltip============
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
  
<script>
jQuery(document).ready(function () {
    jQuery('table[id^="datatable-"]').each(function() {
        jQuery(this).DataTable({
            lengthChange: false,
            ordering: false
        });
    });
    jQuery('#datatable').DataTable({
        lengthChange: false,
        ordering: false
    });	
    jQuery('#datatablenon').DataTable({
        lengthChange: false,
        ordering: false
    });
    jQuery('#datatableshort').DataTable({
        lengthChange: false,
        ordering: false
    });
    jQuery('#datatableresult').DataTable({
        lengthChange: false,
        ordering: false
    });
    jQuery('#datatablenotice').DataTable({
        lengthChange: false,
        ordering: false
    });

    jQuery('#start-btn').mouseover(function () {
        jQuery(".col-cst-1").each(function (i) {
            jQuery(this).addClass("project-progress-hover");
        });
        return false;
    });

    jQuery('#start-btn').mouseleave(function () {
        jQuery(".col-cst-1").each(function (i) {
            jQuery(this).removeClass("project-progress-hover");
        });
        return false;
    });
});
</script>  
  <?php wp_footer(); ?>
</body>
</html>
