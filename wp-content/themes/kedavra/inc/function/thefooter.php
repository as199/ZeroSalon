<?php 


$options = get_option('kedavra_framework');
$footer_widget = $options['footer-layout'];

if($footer_widget === '1widget-footer') {
    register_sidebar( array(
    'name'          => __( 'Footer 1', 'kedavra' ),
    'id'            => 'footer-1',
    'description'   => '',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));  

}


if($footer_widget === '2widget-footer') {
    register_sidebar( array(
    'name'          => __( 'Footer 1', 'kedavra' ),
    'id'            => 'footer-1',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

    register_sidebar( array(
    'name'          => __( 'Footer 2', 'kedavra' ),
    'id'            => 'footer-2',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

}

if($footer_widget === '3widget-footer') {
    register_sidebar( array(
    'name'          => __( 'Footer 1', 'kedavra' ),
    'id'            => 'footer-1',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

    register_sidebar( array(
    'name'          => __( 'Footer 2', 'kedavra' ),
    'id'            => 'footer-2',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

    register_sidebar( array(
    'name'          => __( 'Footer 3', 'kedavra' ),
    'id'            => 'footer-3',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

}

if($footer_widget === '4widget-footer') {
    register_sidebar( array(
    'name'          => __( 'Footer 1', 'kedavra' ),
    'id'            => 'footer-1',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

    register_sidebar( array(
    'name'          => __( 'Footer 2', 'kedavra' ),
    'id'            => 'footer-2',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

     register_sidebar( array(
    'name'          => __( 'Footer 3', 'kedavra' ),
    'id'            => 'footer-3',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

      register_sidebar( array(
    'name'          => __( 'Footer 4', 'kedavra' ),
    'id'            => 'footer-4',
    'description'   => '',
        'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title"><h4><span>',
    'after_title'   => '</span></h4></div>' ));

}


function kedavra_footer_widget() {
   $options = get_option('kedavra_framework');
$footer_widget = $options['footer-layout'];

    switch ($footer_widget){
  case '1widget-footer' : ?>
  
        <div class="footer-widget item col-md-12">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
    
  <?php break;
  
  case '2widget-footer' : ?>
  
        <div class="footer-widget item col-md-6">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        
        <div class="footer-widget item col-md-6">
            <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
    
  <?php break;
  
  case '3widget-footer' : ?>
  
        <div class="footer-widget item col-md-4">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        
        <div class="footer-widget item col-md-4">
            <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        
        <div class="footer-widget item col-md-4">
            <?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
    
  <?php break;
  
  case '4widget-footer' : ?>
  
        <div class="footer-widget item col-md-3">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        
        <div class="footer-widget item col-md-3">
            <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        
        <div class="footer-widget item col-md-3">
            <?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
        
        <div class="footer-widget item col-md-3">
            <?php dynamic_sidebar( 'footer-4' ); ?>
        </div>
    
  <?php break;
    
  }
}