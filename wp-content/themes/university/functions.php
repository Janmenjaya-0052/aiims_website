<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'twentynineteen' ),
				'importantlink' => __( 'Important Link', 'twentynineteen' ),
				'footermenu' => __( 'Footer Menu', 'twentynineteen' ),
				'nurshing' => __( 'Nurshing Menu', 'twentynineteen' ),

			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Right Sidbar', 'twentynineteen' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Add widgets here to appear in your Right Sidebar.', 'twentynineteen' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}

	wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function custom_post_type() {

	//Notice Custom Post Type
    $notice_labels = array(
        'name'                => _x( 'Notice', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Notice', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Notice', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Notice', 'twentynineteen' ),
        'all_items'           => __( 'All Notice', 'twentynineteen' ),
        'view_item'           => __( 'View Notice', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Notice', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Notice', 'twentynineteen' ),
        'update_item'         => __( 'Update Notice', 'twentynineteen' ),
        'search_items'        => __( 'Search Notice', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $notice_args = array(
        'label'               => __( 'Notice', 'twentynineteen' ),
        'description'         => __( 'Notice news and reviews', 'twentynineteen' ),
        'labels'              => $notice_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'notice', $notice_args );
	
    $tender_labels = array(
        'name'                => _x( 'Tender', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Tender', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Tender', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Tender', 'twentynineteen' ),
        'all_items'           => __( 'All Tender', 'twentynineteen' ),
        'view_item'           => __( 'View Tender', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Tender', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Tender', 'twentynineteen' ),
        'update_item'         => __( 'Update Tender', 'twentynineteen' ),
        'search_items'        => __( 'Search Tender', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $tender_args = array(
        'label'               => __( 'Tender', 'twentynineteen' ),
        'description'         => __( 'Tender news and reviews', 'twentynineteen' ),
        'labels'              => $tender_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'tender', $tender_args );

    $photogallery_labels = array(
        'name'                => _x( 'Photo Gallery', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Photo Gallery', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Photo Gallery', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Photo Gallery', 'twentynineteen' ),
        'all_items'           => __( 'All Photo Gallery', 'twentynineteen' ),
        'view_item'           => __( 'View Photo Gallery', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Photo Gallery', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Photo Gallery', 'twentynineteen' ),
        'update_item'         => __( 'Update Photo Gallery', 'twentynineteen' ),
        'search_items'        => __( 'Search Photo Gallery', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $photogallery_args = array(
        'label'               => __( 'Photo Gallery', 'twentynineteen' ),
        'description'         => __( 'Photo Gallery news and reviews', 'twentynineteen' ),
        'labels'              => $photogallery_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'photogallery', $photogallery_args );

    $otheraiims_labels = array(
        'name'                => _x( 'Other Aiims', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Other Aiims', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Other Aiims', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Other Aiims', 'twentynineteen' ),
        'all_items'           => __( 'All Other Aiims', 'twentynineteen' ),
        'view_item'           => __( 'View Other Aiims', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Other Aiims', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Other Aiims', 'twentynineteen' ),
        'update_item'         => __( 'Update Other Aiims', 'twentynineteen' ),
        'search_items'        => __( 'Search Other Aiims', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $otheraiims_args = array(
        'label'               => __( 'Other Aiims', 'twentynineteen' ),
        'description'         => __( 'Other Aiims news and reviews', 'twentynineteen' ),
        'labels'              => $otheraiims_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'otheraiims', $otheraiims_args );
	
    $faculty_labels = array(
        'name'                => _x( 'Faculty', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Faculty', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Faculty', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Faculty', 'twentynineteen' ),
        'all_items'           => __( 'All Faculty', 'twentynineteen' ),
        'view_item'           => __( 'View Faculty', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Faculty', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Faculty', 'twentynineteen' ),
        'update_item'         => __( 'Update Faculty', 'twentynineteen' ),
        'search_items'        => __( 'Search Faculty', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $faculty_args = array(
        'label'               => __( 'Faculty', 'twentynineteen' ),
        'description'         => __( 'Faculty news and reviews', 'twentynineteen' ),
        'labels'              => $faculty_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'faculty', $faculty_args );
	
    $actregulation_labels = array(
        'name'                => _x( 'Act and Regulation', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Act and Regulation', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Act and Regulation', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Act and Regulation', 'twentynineteen' ),
        'all_items'           => __( 'All Act and Regulation', 'twentynineteen' ),
        'view_item'           => __( 'View Act and Regulation', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Act and Regulation', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Act and Regulation', 'twentynineteen' ),
        'update_item'         => __( 'Update Act and Regulation', 'twentynineteen' ),
        'search_items'        => __( 'Search Act and Regulation', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $actregulation_args = array(
        'label'               => __( 'Act and Regulation', 'twentynineteen' ),
        'description'         => __( 'Act and Regulation news and reviews', 'twentynineteen' ),
        'labels'              => $actregulation_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'actregulation', $actregulation_args );	

    $conference_labels = array(
        'name'                => _x( 'Conference', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Conference', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Conference', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Conference', 'twentynineteen' ),
        'all_items'           => __( 'All Conference', 'twentynineteen' ),
        'view_item'           => __( 'View Conference', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Conference', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Conference', 'twentynineteen' ),
        'update_item'         => __( 'Update Conference', 'twentynineteen' ),
        'search_items'        => __( 'Search Conference', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $conference_args = array(
        'label'               => __( 'Conference', 'twentynineteen' ),
        'description'         => __( 'Conference news and reviews', 'twentynineteen' ),
        'labels'              => $conference_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'conference', $conference_args );	

    $annualreport_labels = array(
        'name'                => _x( 'Annual Report', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Annual Report', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Annual Report', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Annual Report', 'twentynineteen' ),
        'all_items'           => __( 'All Annual Report', 'twentynineteen' ),
        'view_item'           => __( 'View Annual Report', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Annual Report', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Annual Report', 'twentynineteen' ),
        'update_item'         => __( 'Update Annual Report', 'twentynineteen' ),
        'search_items'        => __( 'Search Annual Report', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $annualreport_args = array(
        'label'               => __( 'Annual Report', 'twentynineteen' ),
        'description'         => __( 'Annual Report news and reviews', 'twentynineteen' ),
        'labels'              => $annualreport_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'annualreport', $annualreport_args );		
	
	

    $newsletter_labels = array(
        'name'                => _x( 'Newsletter', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Newsletter', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Newsletter', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Newsletter', 'twentynineteen' ),
        'all_items'           => __( 'All Newsletter', 'twentynineteen' ),
        'view_item'           => __( 'View Newsletter', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Newsletter', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Newsletter', 'twentynineteen' ),
        'update_item'         => __( 'Update Newsletter', 'twentynineteen' ),
        'search_items'        => __( 'Search Newsletter', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $newsletter_args = array(
        'label'               => __( 'Newsletter', 'twentynineteen' ),
        'description'         => __( 'Newsletter news and reviews', 'twentynineteen' ),
        'labels'              => $newsletter_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'newsletter', $newsletter_args );	

    $op_labels = array(
        'name'                => _x( 'Other Publication', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Other Publication', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Other Publication', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Other Publication', 'twentynineteen' ),
        'all_items'           => __( 'All Other Publication', 'twentynineteen' ),
        'view_item'           => __( 'View Other Publication', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Other Publication', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Other Publication', 'twentynineteen' ),
        'update_item'         => __( 'Update Other Publication', 'twentynineteen' ),
        'search_items'        => __( 'Search Other Publication', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $op_args = array(
        'label'               => __( 'Other Publication', 'twentynineteen' ),
        'description'         => __( 'Other Publication news and reviews', 'twentynineteen' ),
        'labels'              => $op_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'otherpublication', $op_args );		
	
    $mrbwm_labels = array(
        'name'                => _x( 'Biomedical Waste Management', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Biomedical Waste Management', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Biomedical Waste Management', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Biomedical Waste Management', 'twentynineteen' ),
        'all_items'           => __( 'All Biomedical Waste Management', 'twentynineteen' ),
        'view_item'           => __( 'View Biomedical Waste Management', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Biomedical Waste Management', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Biomedical Waste Management', 'twentynineteen' ),
        'update_item'         => __( 'Update Biomedical Waste Management', 'twentynineteen' ),
        'search_items'        => __( 'Search Biomedical Waste Management', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $mrbwm_args = array(
        'label'               => __( 'Biomedical Waste Management', 'twentynineteen' ),
        'description'         => __( 'Biomedical Waste Management news and reviews', 'twentynineteen' ),
        'labels'              => $mrbwm_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'mrbwm', $mrbwm_args );		
	
	
    $nstudentlist_labels = array(
        'name'                => _x( 'Nursing College Student List', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Nursing College Student List', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Nursing College Student List', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Nursing College Student List', 'twentynineteen' ),
        'all_items'           => __( 'All Nursing College Student List', 'twentynineteen' ),
        'view_item'           => __( 'View Nursing College Student List', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Nursing College Student List', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Nursing College Student List', 'twentynineteen' ),
        'update_item'         => __( 'Update Nursing College Student List', 'twentynineteen' ),
        'search_items'        => __( 'Search Nursing College Student List', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $nstudentlist_args = array(
        'label'               => __( 'Nursing College Student List', 'twentynineteen' ),
        'description'         => __( 'Nursing College Student List news and reviews', 'twentynineteen' ),
        'labels'              => $nstudentlist_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'ncsl', $nstudentlist_args );			
	
    $allstudentlist_labels = array(
        'name'                => _x( 'Student List', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Student List', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Student List', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Student List', 'twentynineteen' ),
        'all_items'           => __( 'All Student List', 'twentynineteen' ),
        'view_item'           => __( 'View Student List', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Student List', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Student List', 'twentynineteen' ),
        'update_item'         => __( 'Update Student List', 'twentynineteen' ),
        'search_items'        => __( 'Search Student List', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $allstudentlist_args = array(
        'label'               => __( 'Student List', 'twentynineteen' ),
        'description'         => __( 'Student List news and reviews', 'twentynineteen' ),
        'labels'              => $allstudentlist_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'allstudentlist', $allstudentlist_args );	
	
    // Registering your Custom Post Type
    register_post_type( 'ncsl', $nstudentlist_args );			
	
    $recuitmentnotice_labels = array(
        'name'                => _x( 'Recruitment Notice', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Recruitment Notice', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Recruitment Notice', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Recruitment Notice', 'twentynineteen' ),
        'all_items'           => __( 'All Recruitment Notice', 'twentynineteen' ),
        'view_item'           => __( 'View Recruitment Notice', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Recruitment Notice', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Recruitment Notice', 'twentynineteen' ),
        'update_item'         => __( 'Update Recruitment Notice', 'twentynineteen' ),
        'search_items'        => __( 'Search Recruitment Notice', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $recuitmentnotice_args = array(
        'label'               => __( 'Recruitment Notice', 'twentynineteen' ),
        'description'         => __( 'Recruitment Notice news and reviews', 'twentynineteen' ),
        'labels'              => $recuitmentnotice_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'recuitmentnotice', $recuitmentnotice_args );		
	

    $studentnotice_labels = array(
        'name'                => _x( 'Student Notice', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Student Notice', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Student Notice', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Student Notice', 'twentynineteen' ),
        'all_items'           => __( 'All Student Notice', 'twentynineteen' ),
        'view_item'           => __( 'View Student Notice', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Student Notice', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Student Notice', 'twentynineteen' ),
        'update_item'         => __( 'Update Student Notice', 'twentynineteen' ),
        'search_items'        => __( 'Search Student Notice', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $studentnotice_args = array(
        'label'               => __( 'Student Notice', 'twentynineteen' ),
        'description'         => __( 'Student Notice news and reviews', 'twentynineteen' ),
        'labels'              => $studentnotice_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'studentnotice', $studentnotice_args );		 

    $antiragging_labels = array(
        'name'                => _x( 'Antiragging', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Antiragging', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Antiragging', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Antiragging', 'twentynineteen' ),
        'all_items'           => __( 'All Antiragging', 'twentynineteen' ),
        'view_item'           => __( 'View Antiragging', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Antiragging', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Antiragging', 'twentynineteen' ),
        'update_item'         => __( 'Update Antiragging', 'twentynineteen' ),
        'search_items'        => __( 'Search Antiragging', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $antiragging_args = array(
        'label'               => __( 'Antiragging', 'twentynineteen' ),
        'description'         => __( 'Antiragging news and reviews', 'twentynineteen' ),
        'labels'              => $antiragging_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'antiragging', $antiragging_args );	

    $centralassistance_labels = array(
        'name'                => _x( 'Central Assistance', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Central Assistance', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Central Assistance', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Central Assistance', 'twentynineteen' ),
        'all_items'           => __( 'All Central Assistance', 'twentynineteen' ),
        'view_item'           => __( 'View Central Assistance', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Central Assistance', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Central Assistance', 'twentynineteen' ),
        'update_item'         => __( 'Update Central Assistance', 'twentynineteen' ),
        'search_items'        => __( 'Search Central Assistance', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $centralassistance_args = array(
        'label'               => __( 'Central Assistance', 'twentynineteen' ),
        'description'         => __( 'Central Assistance news and reviews', 'twentynineteen' ),
        'labels'              => $centralassistance_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'centralassistance', $centralassistance_args );	

    $curriculum_labels = array(
        'name'                => _x( 'Curriculum', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Curriculum', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Curriculum', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Curriculum', 'twentynineteen' ),
        'all_items'           => __( 'All Curriculum', 'twentynineteen' ),
        'view_item'           => __( 'View Curriculum', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Curriculum', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Curriculum', 'twentynineteen' ),
        'update_item'         => __( 'Update Curriculum', 'twentynineteen' ),
        'search_items'        => __( 'Search Curriculum', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $curriculum_args = array(
        'label'               => __( 'Curriculum', 'twentynineteen' ),
        'description'         => __( 'Curriculum news and reviews', 'twentynineteen' ),
        'labels'              => $curriculum_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'curriculum', $curriculum_args );		
	
    $financeaudit_labels = array(
        'name'                => _x( 'Finance & Audit', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Finance & Audit', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Finance & Audit', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Finance & Audit', 'twentynineteen' ),
        'all_items'           => __( 'All Finance & Audit', 'twentynineteen' ),
        'view_item'           => __( 'View Finance & Audit', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Finance & Audit', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Finance & Audit', 'twentynineteen' ),
        'update_item'         => __( 'Update Finance & Audit', 'twentynineteen' ),
        'search_items'        => __( 'Search Finance & Audit', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $financeaudit_args = array(
        'label'               => __( 'Finance & Audit', 'twentynineteen' ),
        'description'         => __( 'Finance & Audit news and reviews', 'twentynineteen' ),
        'labels'              => $financeaudit_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'financeaudit', $financeaudit_args );		
	
    $newsevents_labels = array(
        'name'                => _x( 'News & Events', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'News & Events', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'News & Events', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent News & Events', 'twentynineteen' ),
        'all_items'           => __( 'All News & Events', 'twentynineteen' ),
        'view_item'           => __( 'View News & Events', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New News & Events', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit News & Events', 'twentynineteen' ),
        'update_item'         => __( 'Update News & Events', 'twentynineteen' ),
        'search_items'        => __( 'Search News & Events', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $newsevents_args = array(
        'label'               => __( 'News & Events', 'twentynineteen' ),
        'description'         => __( 'News & Events news and reviews', 'twentynineteen' ),
        'labels'              => $newsevents_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'newsevents', $newsevents_args );		
	
    $scheduledforms_labels = array(
        'name'                => _x( 'Whats New', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Whats New', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Whats New', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Whats New', 'twentynineteen' ),
        'all_items'           => __( 'All Whats New', 'twentynineteen' ),
        'view_item'           => __( 'View Whats New', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Whats New', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Whats New', 'twentynineteen' ),
        'update_item'         => __( 'Update Whats New', 'twentynineteen' ),
        'search_items'        => __( 'Search Whats New', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $scheduledforms_args = array(
        'label'               => __( 'Whats New', 'twentynineteen' ),
        'description'         => __( 'Whats New news and reviews', 'twentynineteen' ),
        'labels'              => $scheduledforms_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'scheduledforms', $scheduledforms_args );		
	

    $whatsnew_labels = array(
        'name'                => _x( 'Whats New', 'Post Type General Name', 'twentynineteen' ),
        'singular_name'       => _x( 'Whats New', 'Post Type Singular Name', 'twentynineteen' ),
        'menu_name'           => __( 'Whats New', 'twentynineteen' ),
        'parent_item_colon'   => __( 'Parent Whats New', 'twentynineteen' ),
        'all_items'           => __( 'All Whats New', 'twentynineteen' ),
        'view_item'           => __( 'View Whats New', 'twentynineteen' ),
        'add_new_item'        => __( 'Add New Whats New', 'twentynineteen' ),
        'add_new'             => __( 'Add New', 'twentynineteen' ),
        'edit_item'           => __( 'Edit Whats New', 'twentynineteen' ),
        'update_item'         => __( 'Update Whats New', 'twentynineteen' ),
        'search_items'        => __( 'Search Whats New', 'twentynineteen' ),
        'not_found'           => __( 'Not Found', 'twentynineteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
    );
     
    $whatsnew_args = array(
        'label'               => __( 'Whats New', 'twentynineteen' ),
        'description'         => __( 'Whats New news and reviews', 'twentynineteen' ),
        'labels'              => $whatsnew_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'whatsnew', $whatsnew_args );			
	
	
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'custom_post_type', 0 );

add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
    register_taxonomy(
        'category_department',
        array('faculty'),
        array(
            'labels' => array(
                'name' => 'Department Category',
                'add_new_item' => 'Add New Department Category Types',
                'new_item_name' => "New Department Category Types"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );

	

    register_taxonomy(
        'category_tender',
        array('tender'),
        array(
            'labels' => array(
                'name' => 'Tender Category',
                'add_new_item' => 'Add New Tender Category Types',
                'new_item_name' => "New Tender Category Types"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );		
	
    register_taxonomy(
        'category_allstudentlist',
        array('allstudentlist'),
        array(
            'labels' => array(
                'name' => 'All Student List Category',
                'add_new_item' => 'Add New All Student List Category Types',
                'new_item_name' => "New All Student List Category Types"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );	
	
    register_taxonomy(
        'category_recrutimentnotice',
        array('recuitmentnotice'),
        array(
            'labels' => array(
                'name' => 'All Recrutiment Category',
                'add_new_item' => 'Add New All Recrutiment Category Types',
                'new_item_name' => "New All Recrutiment Category Types"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );	
}
remove_filter( 'the_content', 'wpautop' );

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//* Remove type tag from script and style
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('autoptimize_html_after_minify', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
remove_action('wp_head', 'wp_generator');
add_action( 'send_headers', 'tgm_io_strict_transport_security' );
/**
* Enables the HTTP Strict Transport Security (HSTS) header.
*
* @since 1.0.0
*/
function tgm_io_strict_transport_security() {

	header( 'Strict-Transport-Security: max-age=10886400' );

}
add_action('login_init', 'acme_autocomplete_login_init');
function acme_autocomplete_login_init()
{
    ob_start();
}
 
add_action('login_form', 'acme_autocomplete_login_form');
function acme_autocomplete_login_form()
{
    $content = ob_get_contents();
    ob_end_clean();

    $content = str_replace('id="user_pass"', 'id="user_pass" autocomplete="off"', $content);

    echo $content;
}
function remove_wordpress_version_number() {
return '';
}
add_filter('the_generator', 'remove_wordpress_version_number');

function remove_version_from_scripts( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_version_from_scripts');
add_filter( 'script_loader_src', 'remove_version_from_scripts');

add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ];

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}
// Croping logo skip

function my_theme_customize_register($wp_customize) {
    // Remove the default logo control
    $wp_customize->remove_control('custom_logo');

    // Add a new control with the skip cropping option
    $wp_customize->add_setting('custom_logo', array(
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'custom_logo', array(
        'label' => __('Site Logo', 'mytheme'),
        'section' => 'title_tagline',
        'priority' => 8,
        'height' => 250, // Set your desired height
        'width' => 250,  // Set your desired width
        'flex_height' => true,
        'flex_width' => true,
        'button_labels' => array(
            'select' => __('Select logo', 'mytheme'),
            'change' => __('Change logo', 'mytheme'),
            'remove' => __('Remove', 'mytheme'),
            'default' => __('Default', 'mytheme'),
            'placeholder' => __('No logo selected', 'mytheme'),
            'frame_title' => __('Select logo', 'mytheme'),
            'frame_button' => __('Choose logo', 'mytheme'),
        ),
    )));
}
add_action('customize_register', 'my_theme_customize_register');

class Custom_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $submenu_class = ($depth > 0) ? ' submenu' : '';
        $output .= "\n$indent<ul class=\"submenu$submenu_class\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

//Front Page Content Editor Remove 
function hide_editor_on_home_template() {
    // Get the current screen
    $screen = get_current_screen();

    // Check if we are on a post editing screen
    if ($screen->id != 'page') {
        return;
    }

    // Get the post ID
    $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : '');

    // Check if the post ID is set and is an integer
    if (!isset($post_id) || !is_int((int)$post_id)) {
        return;
    }

    // Check if the current page uses the 'Home Page' template
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'front-page.php') { // Change 'home-page.php' to your home template file name
        // Hide the content editor
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_head', 'hide_editor_on_home_template');

//Tender or Notice conrtent editor hide

function hide_editor_for_custom_post_types() {
    global $pagenow;
    
    // Check if we are on the post editing screen
    if (in_array($pagenow, array('post.php', 'post-new.php'))) {
        // Get the current post type
        $post_type = get_post_type();

        // Define the custom post types you want to hide the editor for
        $post_types_to_hide = array('tender', 'notice','photogallery','otheraiims','actregulation');

        // If the current post type is in our array, remove the editor support
        if (in_array($post_type, $post_types_to_hide)) {
            remove_post_type_support($post_type, 'editor');
        }
    }
}
add_action('admin_head', 'hide_editor_for_custom_post_types');

// Post Title Trim
function get_trimmed_title($limit = 20) {
    $title = get_the_title(); // Get the current post title
    $title_words = explode(' ', $title); // Split the title into an array of words

    // If the number of words is less than or equal to the limit, return the title as is
    if (count($title_words) <= $limit) {
        return $title;
    }

    // Otherwise, trim the title and add an ellipsis
    $trimmed_title = implode(' ', array_slice($title_words, 0, $limit)) . '...';
    return $trimmed_title;
}

