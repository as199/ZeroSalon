<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> > <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php wp_head(); ?>

</head>

<body <?php body_class() ;?>>

<div id="preloader">
	<div id="status">&nbsp;</div>
</div>

<div id="main-wrapper" class="clearfix">

			<!-- Start of Header -->
			<header id="header" class="site-header two-side header-fixed clearfix">
				<div class="container">

					<div class="navigation">
						<div class="logo"><?php kedavra_logo_type() ?></div>

						<!-- Mobile Menu -->
	                    <div class="menu-mobile">Menu</div>
	                    <!-- Mobile Menu -->

						<!-- Start of Menu  -->
						<nav id="main-menu" class="menu">
							<?php kedavra_top_nav_menu(); ?>
						</nav>
						<!-- End of Menu  -->
					</div>

					<div class="navigation-right">
				      <div class="links">
				          <?php kedavra_right_nav_menu(); ?>
				      </div>
				  </div>

				</div>
			</header>
			<!-- End of Header -->
