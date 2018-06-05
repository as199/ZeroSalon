<?php

define('KEDAVRA_DIR', get_template_directory_uri());
define('KEDAVRA_TEMPLATE_DIR', get_template_directory());
define('KEDAVRA_BUILDER_DIR', get_template_directory() . '/inc/builder/blocks/');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1170; /* pixels */

/*-----------------------------------------------------------------------------------*/
/*  SETUP THEME
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'kedavra_setup' ) ) :

	function kedavra_setup() {
		// several theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );	
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		load_theme_textdomain( 'kedavra', KEDAVRA_TEMPLATE_DIR .'/languages' );
		add_theme_support( "title-tag" );

}
endif;
add_action( 'after_setup_theme', 'kedavra_setup' );

function kedavra_thumbnail_setup() {
add_image_size( 'post-thumb-loop', 555, 315, true );
}

add_action('after_setup_theme', 'kedavra_thumbnail_setup');


/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/

add_filter('acf/settings/show_admin', '__return_false');

if ( class_exists( 'acf' ) ) { 
function kedavra_remove_update_nag($value) {
	unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
	return $value;
}
add_filter('site_transient_update_plugins', 'kedavra_remove_update_nag');
}

/*-----------------------------------------------------------------------------------*/
/*  SCRIPTS & STYLES
/*-----------------------------------------------------------------------------------*/

function kedavra_scripts() {

//All necessary CSS
wp_enqueue_style( 'kedavra-bootstrap', KEDAVRA_DIR .'/css/bootstrap.min.css', array(), null );
wp_enqueue_style( 'kedavra-plugin-css', KEDAVRA_DIR .'/css/plugin.css', array(), null );
wp_enqueue_style( 'kedavra-responsive-css', KEDAVRA_DIR .'/css/responsive.css', array(), null );
wp_enqueue_style( 'kedavra-style', get_stylesheet_uri(), array( 'kedavra-bootstrap','kedavra-plugin-css' ) );
wp_enqueue_style( 'kedavra-font', KEDAVRA_DIR .'/css/font.css', array(), null );

//All Necessary Script
wp_enqueue_script( 'kedavra-plugin', KEDAVRA_DIR. '/js/plugin.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'kedavra-main-js', KEDAVRA_DIR. '/js/main.js', array( 'jquery' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'kedavra_scripts' );


/*-----------------------------------------------------------------------------------*/
/*  CALL FRAMEWORK
/*-----------------------------------------------------------------------------------*/

require_once( KEDAVRA_TEMPLATE_DIR . '/inc/option/core/framework.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/option/panel/config.php' );


/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/

//Register Menus
register_nav_menu( 'left-menu', 'Header Menu' ); 
register_nav_menu( 'right-menu', 'Right Menu' ); 

//TOP MENU
function kedavra_top_nav_menu(){
  wp_nav_menu( array(
	'theme_location' => 'left-menu',
	'container'       => 'ul',
   'menu_class'      => 'menus',
	'fallback_cb'  => 'kedavra_header_menu_cb'
  ));
}

function kedavra_right_nav_menu(){
  wp_nav_menu( array(
	'theme_location' => 'right-menu',
	'container'       => 'ul',
   'menu_class'      => 'right-menus',
   'fallback_cb'  => 'false'
  ));
}

// FALLBACK IF PRIMARY MENU HAVEN'T SET YET
function kedavra_header_menu_cb() {
  echo '<ul id="menu-top-menu" class="menus">';
  wp_list_pages('title_li=');
  echo '</ul>';
}

/*-----------------------------------------------------------------------------------*/
/*  HEADER
/*-----------------------------------------------------------------------------------*/

// logo text or image huh?
function kedavra_logo_type(){

$options = get_option('kedavra_framework');
$logo = '';
if (isset($options['logo_upload'])) {
$logo = $options['logo_upload'];
$upload_logo = $logo['url'];
}


if ( ! empty( $upload_logo ) ) { ?>

	<div class="logo-image">
	<a href="<?php bloginfo( 'siteurl' ); ?>"><img src="<?php echo esc_url( $upload_logo ); ?>" class="image-logo" alt="logo" /></a>
	</div>
	
	<?php } else { ?> 
	
	<div class="logo-title">
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
	</div>

<?php }
} 


/*-----------------------------------------------------------------------------------*/
/*  WIDGET
/*-----------------------------------------------------------------------------------*/


// SETUP DEFAULT SIDEBAR
function kedavra_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'kedavra' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'kedavra_widgets_init' );

// SETUP Causes SIDEBAR
function kedavra_causes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Causes Sidebar', 'kedavra' ),
		'id'            => 'causes-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-outer"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'kedavra_causes_widgets_init' );

// INCLUDE Custom Widget FILE
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/causes-widget.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/latest-work-widget.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/latest-post-widget.php' );

/*-----------------------------------------------------------------------------------*/
/*  PAGINATION
/*-----------------------------------------------------------------------------------*/

function kedavra_pagination($pages = '', $range = 2)
{  
		 $showitems = ($range * 2)+1;  

		 global $paged;
		 if(empty($paged)) $paged = 1;

		 if($pages == '')
		 {
				 global $wp_query;
				 $pages = $wp_query->max_num_pages;
				 if(!$pages)
				 {
						 $pages = 1;
				 }
		 }   

		 if(1 != $pages)
		 {
				 echo "<div class='pagination col-md-12 text-center'>";
				 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>First</a>";
				 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

				 for ($i=1; $i <= $pages; $i++)
				 {
						 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
						 {
								 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
						 }
				 }

				 if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
				 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last</a>";
				 echo "</div>\n";
		 }
}




/*-----------------------------------------------------------------------------------*/
/*  CUSTOM FUNCTIONS
/*-----------------------------------------------------------------------------------*/
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/custom.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/navigation.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/comment.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/thefooter.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/meta-box.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/akmanda-customizer.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/aq_resizer.php' );
require_once( KEDAVRA_TEMPLATE_DIR . '/inc/function/kedavra-importer.php');


// INSTALL NECESSARY PLUGINS
require_once( KEDAVRA_TEMPLATE_DIR . '/class-tgm.php' ); /*activate plugin function*/

/*-----------------------------------------------------------------------------------*/
/*  SITE ORIGIN SETTING
/*-----------------------------------------------------------------------------------*/

remove_filter('siteorigin_panels_widget_dialog_tabs', 'siteorigin_panels_add_widgets_dialog_tabs', 20);


add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );

function adjust_the_wp_menu() {

remove_submenu_page( 'plugins.php', 'so-widgets-plugins' );

}

function kedavra_panels_add_widgets_dialog_tabs($tabs){
	$tabs[] = array(
		'title' => __('KEDAVRA BUILDER', 'kedavra'),
		'filter' => array(
			'installed' => true,
			'groups' => array('kedavra')
		)
	);

	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'kedavra_panels_add_widgets_dialog_tabs');


if ( is_plugin_active( 'so-widgets-bundle/so-widgets-bundle.php' ) ) {

	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/heroimage-block/heroimage-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/about-block/about-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/feature-block/feature-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/testimonial-block/testimonial-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/partner-block/partner-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/slogan-block/slogan-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/newsletter-block/newsletter-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/html-block/html-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/title-block/title-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/menu-block/menu-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/clear-block/clear-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/service-block/service-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/masonry-block/masonry-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/grid-block/grid-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/fullportfolio-block/fullportfolio-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/counter-block/counter-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/team-block/team-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/image-block/image-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/about2-block/about2-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/slider-block/slider-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/author-block/author-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/skill-block/skill-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/portfoliocustom-block/portfoliocustom-block.php' );
	require_once( KEDAVRA_TEMPLATE_DIR . '/inc/widget/button-block/button-block.php' );


}
