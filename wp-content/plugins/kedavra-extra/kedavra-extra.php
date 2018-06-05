<?php
	/*
	Plugin Name: Kedavra Extra
	Plugin URI: http://www.themesawesome.com
	Description: A plugin to add functionality to Premium Theme Kedavra from Themes Awesome
	Version: 1.1
	Author: Themes Awesome
	Author URI: http://www.themesawesome.com
	License: GPL2
	*/



define( 'KEDAVRA_EXTRA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'KEDAVRA_EXTRA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );



register_activation_hook( __FILE__, array( 'Kedavra Extra', 'kedavra_extra_activation' ) );
register_deactivation_hook( __FILE__, array( 'Kedavra Extra', 'kedavra_extra_deactivation' ) );


// Flush rewrite rules on activation
function kedavra_extra_activation() {
    flush_rewrite_rules(true);
}

function kedavra_porfolio_admin_style() {

}
add_action( 'admin_enqueue_scripts', 'kedavra_porfolio_admin_style' );


function kedavra_portfolio_scripts() {

    if (!is_admin()) { 


    wp_enqueue_script('jquery');
    wp_enqueue_script('wp-mediaelement'); 
    } 
} 

add_action( 'wp_head', 'kedavra_portfolio_scripts',0);

/*-----------------------------------------------------------------------------------*/
/* The Portfolio custom post type
/*-----------------------------------------------------------------------------------*/
    add_action('init', 'kedavra_portfolio_register'); 
    function kedavra_portfolio_register() { 


        $labels = array(
            'name'               => _x('Portfolio', 'Portfolio General Name', 'kedavra'),
            'singular_name'      => _x('Portfolio', 'Portfolio Singular Name', 'kedavra'),
            'add_new'            => _x('Add New', 'Add New Portfolio Name', 'kedavra'),
            'add_new_item'       => __('Add New Portfolio', 'kedavra'),
            'edit_item'          => __('Edit Portfolio', 'kedavra'),
            'new_item'           => __('New Portfolio', 'kedavra'),
            'view_item'          => __('View Portfolio', 'kedavra'),
            'search_items'       => __('Search Portfolio', 'kedavra'),
            'not_found'          => __('Nothing found', 'kedavra'),
            'not_found_in_trash' => __('Nothing found in Trash', 'kedavra'),
            'parent_item_colon'  => ''
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'query_var'          => 'portfolio',
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'rewrite'            => false,
            'supports'           => array('title','editor','thumbnail'),
            'menu_position'       => 5,

        ); 

        register_post_type('kedavra-portfolio' , $args);
            
        register_taxonomy(
                "portfolio-category", array("kedavra-portfolio"), array(
                "hierarchical"   => true,
                "label"          => "Categories", 
                "singular_label" => "Categories", 
                "rewrite"        => true));
        register_taxonomy_for_object_type('portfolio-category', 'kedavra-portfolio');  

    }
            
    function kedavra_portfolio_edit_columns($columns) {  
        $columns = array(  
            "cb"          => "<input type=\"checkbox\" />",  
            "title"       => __('Project', 'kedavra'),  
            "type"        => __('Categories', 'kedavra'),  
        );    
        return $columns;  
    }    

    add_filter("manage_edit-portfolio_columns", "kedavra_portfolio_edit_columns"); 


       
    function kedavra_portfolio_custom_columns($column) {  
        global $post;  
        switch ($column) {  

            case "type":  
                echo get_the_term_list($post->ID, 'portfolio-category', '', ', ','');  
                break;         
        }  
    }    

    add_action("manage_posts_custom_column",  "kedavra_portfolio_custom_columns");


/*-----------------------------------------------------------------------------------*/
/* The Team custom post type
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists('kedavra_team_register') ) {

// Register Custom Post Type
function kedavra_team_register() {

    $labels = array(
        'name'                => _x( 'Team', 'Post Type General Name', 'kedavra' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'kedavra' ),
        'menu_name'           => __( 'Team', 'kedavra' ),
        'parent_item_colon'   => __( 'Parent Team:', 'kedavra' ),
        'all_items'           => __( 'All Team', 'kedavra' ),
        'view_item'           => __( 'View Team', 'kedavra' ),
        'add_new_item'        => __( 'Add New Team', 'kedavra' ),
        'add_new'             => __( 'Add New', 'kedavra' ),
        'edit_item'           => __( 'Edit Team', 'kedavra' ),
        'update_item'         => __( 'Update Team', 'kedavra' ),
        'search_items'        => __( 'Search Team', 'kedavra' ),
        'not_found'           => __( 'Not found', 'kedavra' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kedavra' ),
    );
    $args = array(
        'label'               => __( 'kedavra_team', 'kedavra' ),
        'description'         => __( 'Team post', 'kedavra' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'kedavra_team', $args );

}

// Hook into the 'init' action
add_action( 'init', 'kedavra_team_register', 0 );

}

/*-----------------------------------------------------------------------------------*/
/* The Testimonial custom post type
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists('kedavra_testimonial_register') ) {

// Register Custom Post Type
function kedavra_testimonial_register() {

    $labels = array(
        'name'                => _x( 'Testimonial', 'Post Type General Name', 'kedavra' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'kedavra' ),
        'menu_name'           => __( 'Testimonial', 'kedavra' ),
        'parent_item_colon'   => __( 'Parent Testimonial:', 'kedavra' ),
        'all_items'           => __( 'All Testimonial', 'kedavra' ),
        'view_item'           => __( 'View Testimonial', 'kedavra' ),
        'add_new_item'        => __( 'Add New Testimonial', 'kedavra' ),
        'add_new'             => __( 'Add New', 'kedavra' ),
        'edit_item'           => __( 'Edit Testimonial', 'kedavra' ),
        'update_item'         => __( 'Update Testimonial', 'kedavra' ),
        'search_items'        => __( 'Search Testimonial', 'kedavra' ),
        'not_found'           => __( 'Not found', 'kedavra' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kedavra' ),
    );
    $args = array(
        'label'               => __( 'kedavra_testimonial', 'kedavra' ),
        'description'         => __( 'Testimonial post', 'kedavra' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'kedavra_testimonial', $args );

}

// Hook into the 'init' action
add_action( 'init', 'kedavra_testimonial_register', 0 );

}
