<?php
/**
 * code95 task functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package code95_task
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function code95_task_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on code95 task, use a find and replace
	 * to change 'code95-task' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('code95-task', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'code95-task'),
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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'code95_task_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'code95_task_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function code95_task_content_width()
{
	$GLOBALS['content_width'] = apply_filters('code95_task_content_width', 640);
}
add_action('after_setup_theme', 'code95_task_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function code95_task_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'code95-task'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'code95-task'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'code95_task_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function code95_task_scripts()
{
	wp_enqueue_style('code95-task-style', get_stylesheet_uri(), array('code95-task-bootstrap-css'), _S_VERSION);
	// Load google fonts.
	wp_enqueue_style('code95-task-google', 'https://fonts.googleapis.com', array(), _S_VERSION);
	wp_enqueue_style('code95-task-ggoglefont', 'https://fonts.gstatic.com', array(), _S_VERSION);
	wp_enqueue_style('code95-task-inter', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap
', array(), _S_VERSION);


	// wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
	// wp_enqueue_style('owl-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
	// wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null);
	// wp_enqueue_script('owl-init', get_template_directory_uri() . '/js/owl-init.js', array('owl-carousel-js'), null);

	// Load Bootstrap JS.
	wp_enqueue_script('code95-task-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2');

	// Load Bootstrap CSS.
	wp_enqueue_style('code95-task-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', '5.3.2', _S_VERSION);

	wp_style_add_data('code95-task-style', 'rtl', 'replace');

	wp_enqueue_script('code95-task-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null);
	wp_enqueue_script('swiper-init', get_template_directory_uri() . '/js/swiper.js', array('swiper-js'), null);
}
add_action('wp_enqueue_scripts', 'code95_task_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 * 
 */
require_once('class-wp-bootstrap-navwalker.php');

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Add meta box
function code95_task_add_main_post_meta_box()
{
	add_meta_box(
		'code95_task_main_post',
		__('Main Post', 'code95-task'),
		'code95_task_main_post_meta_box_callback',
		'post',
		'side'
	);
}
add_action('add_meta_boxes', 'code95_task_add_main_post_meta_box');

function code95_task_main_post_meta_box_callback($post)
{
	$value = get_post_meta($post->ID, '_code95_task_main_post', true);
	wp_nonce_field('code95_task_main_post_nonce', 'code95_task_main_post_nonce_field');
	?>
	<label>
		<input type="checkbox" name="code95_task_main_post" value="1" <?php checked($value, '1'); ?> />
		<?php _e('Mark as Main Post', 'code95-task'); ?>
	</label>
	<?php
}

// Save meta box value
function code95_task_save_main_post_meta_box($post_id)
{
	if (
		!isset($_POST['code95_task_main_post_nonce_field']) ||
		!wp_verify_nonce($_POST['code95_task_main_post_nonce_field'], 'code95_task_main_post_nonce')
	) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (isset($_POST['code95_task_main_post'])) {
		update_post_meta($post_id, '_code95_task_main_post', '1');
	} else {
		delete_post_meta($post_id, '_code95_task_main_post');
	}
}
add_action('save_post', 'code95_task_save_main_post_meta_box');


// Add meta box for Feature Post
function code95_add_feature_post_meta_box()
{
	add_meta_box(
		'code95_feature_post',
		__('Feature Post', 'code95-task'),
		'code95_feature_post_meta_box_callback',
		'post',
		'side'
	);
}
add_action('add_meta_boxes', 'code95_add_feature_post_meta_box');

function code95_feature_post_meta_box_callback($post)
{
	$value = get_post_meta($post->ID, '_code95_feature_post', true);
	wp_nonce_field('code95_feature_post_nonce', 'code95_feature_post_nonce_field');
	?>
	<label>
		<input type="checkbox" name="code95_feature_post" value="1" <?php checked($value, '1'); ?> />
		<?php _e('Mark as Feature Post', 'code95-task'); ?>
	</label>
	<?php
}

function code95_save_feature_post_meta_box($post_id)
{
	if (
		!isset($_POST['code95_feature_post_nonce_field']) ||
		!wp_verify_nonce($_POST['code95_feature_post_nonce_field'], 'code95_feature_post_nonce')
	) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (isset($_POST['code95_feature_post'])) {
		update_post_meta($post_id, '_code95_feature_post', '1');
	} else {
		delete_post_meta($post_id, '_code95_feature_post');
	}
}
add_action('save_post', 'code95_save_feature_post_meta_box');



// Function to get post views
function get_post_views($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}

// Function to set post views
function set_post_views($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

// Hook to count views on single post
function code95_track_post_views($post_id)
{
	if (is_single() && !is_admin()) {
		set_post_views($post_id);
	}
}
add_action('wp_head', function () {
	if (is_single()) {
		global $post;
		if ($post) {
			set_post_views($post->ID);
		}
	}
});


