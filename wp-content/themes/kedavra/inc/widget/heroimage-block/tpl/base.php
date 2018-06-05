<?php 
    $heroimage_type     = $instance['heroimage_type'];
    $heroimage_img      = $instance['heroimage_img'];
    $heroimage_title    = $instance['heroimage_title'];
    $heroimage_subtitle = $instance['heroimage_subtitle'];
    $heroimage_text_color  = $instance['heroimage_text_color'];
    $section_to_link    = $instance['section_to_link'];
    $heroimage_overlay_color  = $instance['heroimage_overlay_color'];
    $overlay_level          = $instance['overlay_level'];

    $text_align          = $instance['text_align'];
    $hero_img_anim          = $instance['hero_img_anim'];
    $hero_img_delay          = $instance['hero_img_delay'];
?>

<?php if($heroimage_type == 'heroimage_style1'){ ?>
<!-- section -->
<div class="hero-image default">
    <div class="overlay" style="background-color: <?php echo esc_html( $heroimage_overlay_color ); ?>; opacity: <?php echo sanitize_text_field( $overlay_level ); ?>">
        <div class="container">
            <div class="border">
                <div class="content-hero <?php echo sanitize_text_field( $text_align ); ?>">
                    <h1 class="title-hero wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s" style="color: <?php echo esc_html( $heroimage_text_color ) ?>;"><?php echo sanitize_text_field( $heroimage_title ); ?></h1>
                    <div class="text-hero wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s"><?php echo balancetags( $heroimage_subtitle ); ?></div>
                </div>
            </div>
        </div>
    </div>
        <!-- container -->
        <!-- container -->
        <?php if(!empty($section_to_link)) { ?>
        <div class="buttons">
            <div class="col-md-12">
                <div class="scroll"></div>
            </div>
        </div>

        <script type="text/javascript">
        jQuery(".hero-image.default .scroll").click(function(){
                jQuery('html,body').stop().animate({scrollTop: jQuery("<?php echo sanitize_text_field( $section_to_link ); ?>").position().top - 80}, 'slow');
            });
        </script>
        <?php } ?>
</div>
<!-- section -->

<?php }
if($heroimage_type == 'heroimage_style2'){

    $heroimageimg = wp_get_attachment_image_src($heroimage_img, 'full' ); 
?>
<div class="page-title agency">
    <div class="cover wow fadeIn">
        <div class="overlay">
            <div class="border">
                <div class="content vertical-center <?php echo sanitize_text_field( $text_align ); ?>">
                    <img src="<?php echo esc_url( $heroimageimg[0] ); ?>" class="wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s">
                    <h2 class="title wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s" style="color: <?php echo esc_html( $heroimage_text_color ) ?>;"><?php echo sanitize_text_field( $heroimage_title ); ?></h2>
                    <div class="wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s"><?php echo balancetags( $heroimage_subtitle ); ?></div>
                </div>      
            </div>
        </div>
    </div>
</div>
<?php }
if($heroimage_type == 'heroimage_style3'){ ?>

<div class="hero-image landing">
    <div class="overlay" style="background-color: <?php echo esc_html( $heroimage_overlay_color ); ?>; opacity: <?php echo sanitize_text_field( $overlay_level ); ?>">
        <!-- container -->
        <div class="container">
            <div class="border">
                <div class="content-hero <?php echo sanitize_text_field( $text_align ); ?>">
                    <h1 class="title-hero wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s" style="color: <?php echo esc_html( $heroimage_text_color ) ?>;"><?php echo sanitize_text_field( $heroimage_title ); ?></h1>
                    <div class="text-hero wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s"><?php echo balancetags( $heroimage_subtitle ); ?></div>
                    <div class="hero-button">
                        <div class="button box light <?php echo sanitize_text_field( $text_align ); ?> wow <?php echo sanitize_text_field( $hero_img_anim ); ?>" data-wow-delay="<?php echo sanitize_text_field( $hero_img_delay ); ?>s">
                        <?php foreach( $instance['heroimage_button'] as $i => $the_button ) : ?>
                            <a href="<?php echo esc_url( $the_button['button_img_link'] ); ?>"><?php echo sanitize_text_field( $the_button['button_img_text'] ); ?></a>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->

        <?php if(!empty($section_to_link)) { ?>
        <!-- container -->
        <div class="buttons container">
            <div class="col-md-12">
                <div class="scroll"></div>
            </div>
        </div>
        <!-- container -->
        <?php } ?>
    </div>
<script type="text/javascript">
jQuery(".hero-image.landing .scroll").click(function(){
        jQuery('html,body').stop().animate({scrollTop: jQuery("<?php echo sanitize_text_field( $section_to_link ); ?>").position().top - 80}, 'slow');
    });
</script>
</div>

<?php } ?>