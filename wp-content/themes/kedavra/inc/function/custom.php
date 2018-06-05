<?php 

function kedavra_social_profile() {

$options = get_option('kedavra_framework');


$twitter = $options['twitter_profile'];
$facebook = $options['facebook_profile'];
$instagram = $options['instagram_profile'];
$google = $options['google_profile'];
$behance = $options['behance_profile'];
$youtube = $options['youtube_profile'];

if (!empty($facebook)) { ?>
  <li class="facebook social"><a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook-square"></a></li>
<?php }

if (!empty($twitter)) { ?>
    <li class="twitter social"><a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter"></a></li>
<?php } 

if (!empty($google)) { ?>
  <li class="google social"><a href="<?php echo esc_url( $google ); ?>" class="fa fa-google-plus"></a></li>
<?php }  

if (!empty($instagram)) { ?>
  <li class="instagram social"><a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram"></a></li>
<?php } 

if (!empty($behance)) { ?>
  <li class="behance social"><a href="<?php echo esc_url( $behance ); ?>" class="fa fa-behance"></a></li>
<?php } 

if (!empty($youtube)) { ?>
  <li class="youtube social"><a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube"></a></li>
<?php } 

 }


function kedavra_social_share() { 
global $post;
  ?>
  <div class="social-share-wrapper">
  <ul class="social-share">
    <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="product_share_facebook" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="icon icon-facebook-1"></i></a></li>
    <li class="twitter"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter"><i class="icon icon-twitter-alt"></i></a></li>   
    <li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="icon icon-google"></i></a></li>
  </ul>
<div class="border-social"></div>
</div><!-- Social Share Wrapper -->
<?php
}

function get_tag_id_by_name($tag_name) {
    global $wpdb;
    $tag_ID = $wpdb->get_var("SELECT * FROM ".$wpdb->terms." WHERE  `name` =  '".$tag_name."'");

    return $tag_ID;
}


//EXCERPT

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


function kedavra_custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'kedavra_custom_excerpt_length', 999 );

function kedavra_new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'kedavra_new_excerpt_more');

function kedavra_header_menu_choice() {

global $post, $paged, $page;

$options = get_option('kedavra_framework');
$header_type = $options['header_type'];


if( $header_type == 'header-default' ) {

  get_header();
}
elseif( $header_type == 'header-two-menu' ) {

  get_header('two');
}
elseif( $header_type == 'header-social-link' ) {

  get_header('social');
}

}

function kedavra_page_header_menu_choice() {

global $post, $paged, $page;

$header_background_choice = get_field( 'header_background_choice' );
$header_color             = get_field( 'header_color' );

$options = get_option('kedavra_framework');
$header_type = $options['header_type'];



if( $header_type == 'header-default' && $header_background_choice == 'transparent' ) {

  get_header('transparent');
}
elseif( $header_type == 'header-two-menu' && $header_background_choice == 'transparent' ) {

  get_header('two-transparent');
}
elseif( $header_type == 'header-social-link' && $header_background_choice == 'transparent' ) {

  get_header('social-transparent');
}
elseif( $header_type == 'header-default' && $header_color  == 'light' ) {

  get_header('light');
}
elseif( $header_type == 'header-two-menu' && $header_color == 'light' ) {

  get_header('two-light');
}
elseif( $header_type == 'header-social-link' && $header_color == 'light' ) {

  get_header('social-light');
}
elseif( $header_type == 'header-default' ) {

  get_header();
}
elseif( $header_type == 'header-two-menu' ) {

  get_header('two');
}
elseif( $header_type == 'header-social-link' ) {

  get_header('social');
}

}

function kedavra_footer_type_choice() {

global $post, $paged, $page;

$options = get_option('kedavra_framework');
$footer_choice = $options['footer_choice'];

if( $footer_choice == 'footer-widget' ) {

  get_footer();
}
elseif( $footer_choice == 'footer-slogan' ) {

  get_footer('slogan');
}

}

function kedavra_page_footer_type_choice() {

global $post, $paged, $page;

$hide_footer    = get_field( 'hide_footer' );

$options = get_option('kedavra_framework');
$footer_choice = $options['footer_choice'];

if( $footer_choice == 'footer-widget' && $hide_footer == true ) {

  get_footer('empty');
}
elseif( $footer_choice == 'footer-slogan' && $hide_footer == true ) {

  get_footer('empty');
}
elseif( $footer_choice == 'footer-widget' ) {

  get_footer();
}
elseif( $footer_choice == 'footer-slogan' ) {

  get_footer('slogan');
}

}

function kedavra_heading_font_choice() {

global $paged, $page;

$options = get_option('kedavra_framework');
$demofont_choice = $options['demofont_choice'];


if( $demofont_choice == 'restaurant' ) {
  
  echo 'hanskendrick';

}
elseif( $demofont_choice == 'salon' ) {
  
  echo 'librecaslontext';

}
elseif( $demofont_choice == 'photography' ) {

  echo 'bebasneue';

}

}