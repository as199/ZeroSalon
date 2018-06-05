/*
*
*	Live Customiser Script
*	------------------------------------------------
	*	Akmanda Framework
	* 	Copyright Themes Awesome 2013 - http://www.themesawesome.com
*
*/
( function( $ ){		
	
	// HEADER STYLING

	wp.customize('menu_list',function( value ) {
		value.bind(function(to) {
			$('.menus a, .navigation-right .links a, .menus li.menu-item-has-children:hover ul li a, .navigation-right .social-links li a').css('color', to ? to : '' );
		});
	});

	wp.customize('menu_bg',function( value ) {
		value.bind(function(to) {
			$('.site-header, .fixedwrap.site-header, .page-template-contact-template .site-header, .page-template-blog-sidebar-template .site-header, .page-template-gallery-template .site-header, .page-template-portfolio-grid-template .site-header, .page-template-portfolio-masonry-template .site-header, .single-post .site-header, .search-results .site-header, .archive .site-header, .error404 .site-header, .single-kedavra-portfolio .site-header .page-template-fullwidth-portfolio-template .site-header').css('background-color', to ? to : '' );
		});
	});

	wp.customize('sub_bg',function( value ) {
		value.bind(function(to) {
			$('.menus ul').css('background-color', to ? to : '' );
		});
	});

	// CONTENT STYLING

	wp.customize('titlepage_color',function( value ) {
		value.bind(function(to) {
			$('.thetitle, #contact .info .title').css('color', to ? to : '' );
		});
	});

	wp.customize('desc1_color',function( value ) {
		value.bind(function(to) {
			$('p').css('color', to ? to : '' );
		});
	});

	wp.customize('testi_color',function( value ) {
		value.bind(function(to) {
			$('.review p').css('color', to ? to : '' );
		});
	});

	wp.customize('newslet_title',function( value ) {
		value.bind(function(to) {
			$('#subscribe .title').css('color', to ? to : '' );
		});
	});

	wp.customize('blog_title',function( value ) {
		value.bind(function(to) {
			$('section.blog .post .info .title, article.article .info .title').css('color', to ? to : '' );
		});
	});

	wp.customize('blog_date',function( value ) {
		value.bind(function(to) {
			$('section.blog .post .info .date').css('color', to ? to : '' );
		});
	});

	wp.customize('blog_bg',function( value ) {
		value.bind(function(to) {
			$('section.blog .post .info').css('background-color', to ? to : '' );
		});
	});

	wp.customize('blog_ds',function( value ) {
		value.bind(function(to) {
			$('article.article .info .date').css('color', to ? to : '' );
		});
	});

	wp.customize('bg_article1',function( value ) {
		value.bind(function(to) {
			$('article.article .offset').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bg_article2',function( value ) {
		value.bind(function(to) {
			$('article.article').css('background-color', to ? to : '' );
		});
	});

	wp.customize('detail_post',function( value ) {
		value.bind(function(to) {
			$('.post-meta a, .single-tag-bottom a, .single-category-bottom a, .comment-author .fn a, .logged-in-as a').css('color', to ? to : '' );
		});
	});

	wp.customize('bg_port',function( value ) {
		value.bind(function(to) {
			$('.causes-desc').css('background-color', to ? to : '' );
		});
	});

	wp.customize('title_port',function( value ) {
		value.bind(function(to) {
			$('.causes-desc h4').css('color', to ? to : '' );
		});
	});

	wp.customize('detail_causes',function( value ) {
		value.bind(function(to) {
			$('.causes-desc span').css('color', to ? to : '' );
		});
	});

	wp.customize('bar_causes',function( value ) {
		value.bind(function(to) {
			$('.cause-detail .bar').css('background-color', to ? to : '' );
		});
	});

	wp.customize('icon_causes',function( value ) {
		value.bind(function(to) {
			$('.progress-detail .info ul li span i').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_causes',function( value ) {
		value.bind(function(to) {
			$('a.link').css('color', to ? to : '' );
			$('a.link').css('border-color', to ? to : '' );
		});
	});

	wp.customize('title_portfolio',function( value ) {
		value.bind(function(to) {
			$('.with-detail .project-details h3.title, .full-width-detail .project-details h3.title').css('color', to ? to : '' );
		});
	});

	wp.customize('detail_portfolio',function( value ) {
		value.bind(function(to) {
			$('.project-details .client-detail p').css('color', to ? to : '' );
		});
	});

	wp.customize('website_portfolio',function( value ) {
		value.bind(function(to) {
			$('.link a').css('color', to ? to : '' );
		});
	});

	wp.customize('webhov_portfolio',function( value ) {
		value.bind(function(to) {
			$('.link a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('bord_blog',function( value ) {
		value.bind(function(to) {
			$('section.blog.style-2 .post .info').css('border-color', to ? to : '' );
		});
	});

	wp.customize('bg_sidebar',function( value ) {
		value.bind(function(to) {
			$('#primary-sidebar .widget').css('background-color', to ? to : '' );
		});
	});

	wp.customize('title_widgetsid',function( value ) {
		value.bind(function(to) {
			$('#primary-sidebar .widget-title').css('color', to ? to : '' );
		});
	});

	wp.customize('link_sidebar',function( value ) {
		value.bind(function(to) {
			$('ul li a').css('color', to ? to : '' );
		});
	});

	wp.customize('bg_form',function( value ) {
		value.bind(function(to) {
			$('#contact .form').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bord_form',function( value ) {
		value.bind(function(to) {
			$('.form .border, #contact .form input[type="text"], #contact .form input[type="email"], #contact .form textarea').css('border-color', to ? to : '' );
		});
	});



	// BUILDER STYLING

	wp.customize('desc_color',function( value ) {
		value.bind(function(to) {
			$('article.article .content p').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_slider',function( value ) {
		value.bind(function(to) {
			$('.button.box.light a').css('color', to ? to : '' );
			$('.button.box.light a').css('border-color', to ? to : '' );
		});
	});



	// FOOTER STYLING

	wp.customize('bg_color',function( value ) {
		value.bind(function(to) {
			$('#footer').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bg_color2',function( value ) {
		value.bind(function(to) {
			$('#footer.agency .footer-with-bg').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bord_color',function( value ) {
		value.bind(function(to) {
			$('#footer .info .item').css('border-color', to ? to : '' );
			$('#footer .info').css('border-color', to ? to : '' );
		});
	});

	wp.customize('title_widget',function( value ) {
		value.bind(function(to) {
			$('#footer .info .item .title').css('color', to ? to : '' );
		});
	});

	wp.customize('text_widget',function( value ) {
		value.bind(function(to) {
			$('.info .textwidget p').css('color', to ? to : '' );
		});
	});

	wp.customize('copyright_color',function( value ) {
		value.bind(function(to) {
			$('#footer .copyright').css('color', to ? to : '' );
			$('#footer .copyright a').css('color', to ? to : '' );
		});
	});

	wp.customize('socicon_color',function( value ) {
		value.bind(function(to) {
			$('#footer .social li a').css('color', to ? to : '' );
		});
	});

	wp.customize('banner_color',function( value ) {
		value.bind(function(to) {
			$('#footer.agency .banner h1, #footer.architect .banner h1').css('color', to ? to : '' );
		});
	});

	wp.customize('banner_btn',function( value ) {
		value.bind(function(to) {
			$('.button.box a').css('color', to ? to : '' );
			$('.button.box a').css('border-color', to ? to : '' );
		});
	});

	


} )( jQuery );