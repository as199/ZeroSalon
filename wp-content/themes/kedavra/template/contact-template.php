<?php kedavra_page_header_menu_choice(); 

/*
Template Name: Contact Template
*/

$contact_type = get_field( 'contact_type' );
$contact_maps_iframe = get_field( 'contact_maps_iframe' );
$telephone_number = get_field( 'telephone_number' );
$email_address = get_field( 'email_address' );
$office_address = get_field( 'office_address' );
$contact_template = get_field( 'contact_template' );

$use_margin             = get_field('use_margin');
$add_margin             = get_field('add_margin');

?>

<?php if( $use_margin === true || $use_margin === NULL  ) { ?>
    <div id="content-wrapper" class="wrapper with-margin" style="margin: <?php echo sanitize_text_field( $add_margin ); ?>px 0px 0px">
<?php }

else { ?>
    <div id="content-wrapper" class="wrapper">
<?php } ?>
<!-- CONTACT
============================================= -->
<!-- section -->
<?php if($contact_type == 'contactstyle1'){ ?>
<section id="contact" class="page-wrapper clearfix">
    <div class="container">
        <div class="row">
            <div class="map acf-map col-md-6 wow fadeInUp" data-wow-duration="2s">
                <?php echo balancetags( $contact_maps_iframe ); ?>
            </div>

            <div class="content col-md-6 vertical-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="info wow fadeInUp" data-wow-duration="2s">
                    <h3 class="title"><?php the_title(); ?></h3>
                    <p class="text"><?php the_content(); ?></p>
                    <?php if(!empty( $telephone_number ) ){ ?>
                    <a href='tel:<?php echo sanitize_text_field( $telephone_number ); ?>' target='_blank'><span>T</span><span class="value"><?php echo sanitize_text_field( $telephone_number ); ?></span></a>
                    <?php } 
                    if(!empty( $email_address ) ){ ?>
                    <a href='mailto:<?php echo sanitize_email( $email_address ); ?>' target='_blank'><span>E</span><span class="value"><?php echo sanitize_text_field( $email_address ); ?></span></a>
                    <?php } 
                    if(!empty( $office_address ) ){ ?>
                    <a href="#"><span>A</span><span class="value"><?php echo balancetags( $office_address ); ?></span></a>
                	<?php } ?>
                </div>
            <?php endwhile; // end of the loop. ?>
            </div>
        </div>

        <div class="row">
            <div class="form col-md12">
                <div class="border">
                <?php if(!empty( $contact_template ) ){
                    echo do_shortcode( $contact_template );
                } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }

if($contact_type == 'contactstyle2'){ ?>
<section id="contact" class="page-wrapper clearfix">
<div class="google-map full-width">
    <div class="map acf-map wow fadeInUp" data-wow-duration="2s">
        <?php echo balancetags( $contact_maps_iframe ); ?>
    </div>
</div>

<!-- section -->
<div class="charity clearfix">
    <div class="container">
        <div class="form col-md-6">
            <div class="border">
                <?php if(!empty( $contact_template ) ){
                    echo do_shortcode( $contact_template );
                } ?>
            </div>
        </div>

        <div class="content col-md-6 vertical-center">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="info wow fadeInUp" data-wow-duration="2s">
                <h3 class="title"><?php the_title(); ?></h3>
                <p class="text"><?php the_content(); ?></p>
                <?php if(!empty( $telephone_number ) ){ ?>
                <a href='tel:<?php echo sanitize_text_field( $telephone_number ); ?>' target='_blank'><span>T</span><span class="value"><?php echo sanitize_text_field( $telephone_number ); ?></span></a>
                <?php } 
                if(!empty( $email_address ) ){ ?>
                <a href='mailto:<?php echo sanitize_email( $email_address ); ?>' target='_blank'><span>E</span><span class="value"><?php echo sanitize_text_field( $email_address ); ?></span></a>
                <?php } 
                if(!empty( $office_address ) ){ ?>
                <a href="#"><span>A</span><span class="value"><?php echo balancetags( $office_address ); ?></span></a>
                <?php } ?>
            </div>
        <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>
</section>
<?php } ?>

</div>

<!-- contact end -->
<?php kedavra_page_footer_type_choice(); ?>