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

function is_child_of_college_of_nursing() {
    global $post;

    // Replace 1647 with the ID of your "College of Nursing" page
    $college_of_nursing_page_id = 1647;

    if (is_page() && $post->post_parent) {
        $parent_id = wp_get_post_parent_id($post->ID);
        if ($parent_id == $college_of_nursing_page_id) {
            return true;
        }
    }

    return false;
}

// In your page.php template
if (function_exists('is_child_of_college_of_nursing') && is_child_of_college_of_nursing()) {

    get_header('nurshing');
} else {
    get_header();
}
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
  <div class="introduction_page py-4">
    <div class="container p-0">
		<div class="inner-content ps-4 pe-3">
			<?php echo the_content(); ?>
		</div>
    </div>
  </div>

<?php
if (function_exists('is_child_of_college_of_nursing') && is_child_of_college_of_nursing()) {

    get_footer('nurshing');
} else {
    get_footer();
}
