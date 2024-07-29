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
