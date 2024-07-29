<?php
/**
 * Template Name: Student List Template
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
    <h1><?php echo get_the_title(); ?></h1>
    <ul>
      <li><a href="<?php echo get_site_url(); ?>" target="_blank">Home</a></li>
      <li class="active"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
    </ul>
  </div>
</div>

<!-- ==========================breadcrumps===================================== -->

<div class="py-4">
  <div class="container">
    <div class="inner-content">
      <div class="container p-4">
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <?php
          // Get all terms of the custom taxonomy
          $terms = get_terms(array(
              'taxonomy' => 'category_allstudentlist',
              'hide_empty' => false,
          ));

          if (!empty($terms) && !is_wp_error($terms)) {
              $count = 1;
              foreach ($terms as $term) {
                  // Initialize $i for each term
                  $i = 1;
                  // Query posts associated with the current term
                  $args = array(
                      'post_type' => 'allstudentlist',
                      'posts_per_page' => -1,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'category_allstudentlist',
                              'field' => 'slug',
                              'terms' => $term->slug,
                          ),
                      ),
                  );
                  $query = new WP_Query($args);
                  ?>
                  <div class="accordion-item rounded-3 border-0 shadow mb-2">
                    <h2 class="accordion-header">
                      <button class="accordion-button border-bottom collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $count; ?>">
                        <?php echo $term->name; ?>
                      </button>
                    </h2>
                    <div id="flush-collapse<?php echo $count; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped" id="datatable-<?php echo $count; ?>" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                              <tr>
                                <th width="10%">Sl. No.</th>
                                <th width="80%">Title</th>
                                <th width="10%">Download</th>              
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($query->have_posts()):
                                  $query->the_post();
                                  ?>
                                  <tr>
                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                    <td><?php the_title(); ?></td>
                                    <td style="text-align: center;">
                                      <a href="<?php echo get_field('student_list'); ?>" target="_blank" class="tenderdocs">
                                        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/06/pdf_icon.png" width="25px" title="Download PDF"/>
                                      </a>
                                    </td>
                                  </tr>
                              <?php
                              endwhile;
                              $count++;
                              wp_reset_query();
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>
