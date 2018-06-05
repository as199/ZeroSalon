<article  id="page-<?php the_ID(); ?>" <?php post_class( 'page'); ?>>

<div class="page-content container clearfix">  
<?php 
$hide_title = get_field( 'hide_title' );
if($hide_title == false){ ?>
<div class="page-title text-center">
<h2><?php the_title(); ?></h2>
</div>
<?php } ?>                            

    <?php the_content(); ?>              

</div><!-- page-content -->     
</article><!-- #page<?php the_ID(); ?> -->