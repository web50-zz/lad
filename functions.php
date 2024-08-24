<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage lad 
 * @since lad
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	
}


/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );


function load_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );



	wp_enqueue_script(
		'lad-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true,
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_style( 'lad-styles', get_template_directory_uri() . '/assets/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
	
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );



/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}

/*
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();
*/
/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );




add_action( 'admin_init', 'wpse_57647_register_settings' );

/* 
 * Register settings 
 */
function wpse_57647_register_settings() 
{
    register_setting( 
        'general', 
        'front_email',
        'esc_html'
    );
    add_settings_section( 
        'site-guide', 
        'Локальные настройки', 
        '__return_false', 
        'general' 
    );
    add_settings_field( 
        'front_email', 
        'E-mail на сайте', 
        'wpse_57647_print_text_editor', 
        'general', 
        'site-guide' 
	);
	register_setting( 
        'general', 
        'fb_link',
        'esc_html'
	);
	register_setting( 
        'general', 
        'vk_link',
        'esc_html'
	);
	register_setting( 
        'general', 
        'tg_link',
        'esc_html'
	);
	register_setting( 
        'general', 
        'yt_link',
        'esc_html'
	);
	register_setting( 
        'general', 
        'be_link',
        'esc_html'
	);

    add_settings_field( 
        'fb_link', 
        'Линк на facebook', 
        'wpse_57647_print_text_editor_1', 
        'general', 
        'site-guide' 
	);
	add_settings_field( 
        'vk_link', 
        'Линк на VK', 
        'wpse_57647_print_text_editor_2', 
        'general', 
        'site-guide' 
	);
	add_settings_field( 
        'tg_link', 
        'Линк на Telegram', 
        'wpse_57647_print_text_editor_3', 
        'general', 
        'site-guide' 
	);
	add_settings_field( 
        'yt_link', 
        'Линк на Youtube', 
        'wpse_57647_print_text_editor_y', 
        'general', 
        'site-guide' 
	);
	add_settings_field( 
        'be_link', 
        'Линк на Behance', 
        'wpse_57647_print_text_editor_b', 
        'general', 
        'site-guide' 
	);

}    

/* 
 * Print settings field content 
 */
function wpse_57647_print_text_editor() 
{
    $value = html_entity_decode( get_option( 'front_email' ) );
	echo '<input type="text" id="front_email" name="front_email" value="' . $value . '" />';
}
function wpse_57647_print_text_editor_1() 
{
    $value = html_entity_decode( get_option( 'fb_link' ) );
	echo '<input type="text" id="fb_link" name="fb_link" value="' . $value . '" />';
}
function wpse_57647_print_text_editor_2() 
{
    $value = html_entity_decode( get_option( 'vk_link' ) );
	echo '<input type="text" id="vk_link" name="vk_link" value="' . $value . '" />';
}
function wpse_57647_print_text_editor_3() 
{
    $value = html_entity_decode( get_option( 'tg_link' ) );
	echo '<input type="text" id="tg_link" name="tg_link" value="' . $value . '" />';
}
function wpse_57647_print_text_editor_y() 
{
    $value = html_entity_decode( get_option( 'yt_link' ) );
	echo '<input type="text" id="yt_link" name="yt_link" value="' . $value . '" />';
}
function wpse_57647_print_text_editor_b() 
{
    $value = html_entity_decode( get_option( 'be_link' ) );
	echo '<input type="text" id="be_link" name="be_link" value="' . $value . '" />';
}




function get_post_title( WP_Post $post ){
    $yoast_title = get_post_meta( $post->ID, '_yoast_wpseo_title', true );
    if ( empty( $yoast_title ) ) {
        $wpseo_titles = get_option( 'wpseo_titles', [] );
        $yoast_title  = isset( $wpseo_titles[ 'title-' . $post->post_type ] ) ? $wpseo_titles[ 'title-' . $post->post_type ] : get_the_title();
    }

    return wpseo_replace_vars( $yoast_title, $post );
}


function get_post_description( WP_Post $post ){
    $yoast_post_description = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true );
    if ( empty( $yoast_post_description ) ) {
        $wpseo_titles           = get_option( 'wpseo_titles', [] );
        $yoast_post_description = isset( $wpseo_titles[ 'metadesc-' . $post->post_type ] ) ? $wpseo_titles[ 'metadesc-' . $post->post_type ] : '';
    }

    return wpseo_replace_vars( $yoast_post_description, $post );
}

function sortOrder($a, $b) {
	$am = Ord(substr(mb_strtolower($a->name), 0, 1)) > 122;
    $bm = Ord(substr(mb_strtolower($b->name), 0, 1)) > 122;
    
    if($am == $bm) return strcasecmp(mb_strtolower($a->name), mb_strtolower($b->name));
    else return $am && !$bm ? -1 : 1;
	/*
	if($a->name == $b->name){ return 0 ; }
	return ($a->name < $b->name) ? -1 : 1;
	*/
}


//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
   } 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles');
	wp_dequeue_style( 'wp-emoji-styles');
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );


function post_remove ()      
{ 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //убираем посты из меню

	
function remove_comments(){
	remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'remove_comments' );