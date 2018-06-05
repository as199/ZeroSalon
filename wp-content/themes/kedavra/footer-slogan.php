<?php
$options = get_option('kedavra_framework');

$footerslog_title = $options['footerslog_title'];
$footerslog_btn = $options['footerslog_btn'];
$footerslog_link = $options['footerslog_link'];

?>
<footer id="footer" class="architect agency" role="contentinfo">
    <div class="footer-with-bg">
        <!-- container -->
        <div class="banner container">
            <h1><?php echo sanitize_text_field( $footerslog_title ); ?></h1>
            <div class="button box">
                <a href="<?php echo esc_url( $footerslog_link ); ?>"><?php echo sanitize_text_field( $footerslog_btn ); ?></a>
            </div>
        </div>
    </div>
    <!-- container -->

    <!-- container -->
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright col-md-6">
                <?php kedavra_footer_copyright(); ?>
            </div>

            <div class="social col-md-6">
                <ul>
                    <?php kedavra_social_profile(); ?>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- #footer -->

</div>
<!-- #main-wrapper -->
<?php wp_footer(); ?>

</body>
</html>