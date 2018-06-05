<?php

if (!class_exists("KEDAVRA_Framework_Config")) {

    class KEDAVRA_Framework_Config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( defined('KEDAVRA_TEMPLATE_DIR') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( KEDAVRA_TEMPLATE_DIR ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setHelpTabs();
            $this->setSections();

            if (!isset($this->args['opt_name'])) { 
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {



            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'kedavra'), $this->theme->display('Name'));
            ?>
            

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();


            // DECLARATION OF SECTIONS



                $this->sections[] = array(
                    'icon' => ' el-icon-credit-card',
                    'icon_class' => 'icon-large',
                    'title' => __('Header Options', 'kedavra'),
                    'fields' => array(
                        
                        array(
                            'id' => 'logo_upload',
                            'type' => 'media',
                            'url' => true,
                            'compiler' => 'true',
                            'title' => __('Logo', 'kedavra'), 
                            'desc' => __('Upload your logo here (any size).', 'kedavra'),
                            ),

                        array(
                            'id'       => 'header_type',
                            'type'     => 'image_select',
                            'compiler'=>true,
                            'title'    => __( 'Header Type', 'kedavra' ),
                            'subtitle' => __('Select your header type for your site.', 'kedavra'),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'header-default' => array('alt' => 'header-default', 'img' => KEDAVRA_DIR .'/img/header-default.png', 'title' => __( 'Header Default', 'kedavra' )),
                                'header-two-menu' => array('alt' => 'header-two-menu', 'img' => KEDAVRA_DIR .'/img/header-two.png', 'title' => __( 'Header Two Side', 'kedavra' )),
                                'header-social-link' => array('alt' => 'header-social-link', 'img' => KEDAVRA_DIR .'/img/header-social.png', 'title' => __( 'Header Social', 'kedavra' )),
                            ),
                            'default'  => 'header-default'
                        ),

                       /* array(
                            'id'       => 'demofont_choice',
                            'type'     => 'radio',
                            'title'    => __( 'Demo Font Choice', 'kedavra' ),
                            'subtitle' => __( 'Select a Kedavra custom Font for Heading', 'kedavra' ),
                            'desc'     => __( 'This is the description field, again good for additional info.', 'kedavra' ),
                            //Must provide key => value pairs for radio options
                            'options'  => array(
                                'restaurant' => 'HansKendrick',
                                'salon' => 'Libre Caslon Text',
                                'photography' => 'Bebas Neue'
                            ),
                            'default'  => 'restaurant'
                        ),*/
                            
                    )
                );

                $this->sections[] = array(
                    'icon' => 'el-icon-fullscreen',
                    'icon_class' => 'icon-large',
                    'title' => __('Background Options', 'kedavra'),
                    'fields' => array(
                        
                        array(
                            'id' => 'loading_image',
                            'type' => 'background',
                            'output' => array('#status'),
                            'title' => __('Loader Image', 'kedavra'), 
                            'desc' => __('Upload your own loader image.', 'kedavra'),
                            'default' => ''
                        ),
                        
                    )
                );


                $this->sections[] = array(
                    'icon' => 'el-icon-photo',
                    'icon_class' => 'icon-large',
                    'title' => __('Footer Options', 'kedavra'),
                    'fields' => array(

                        array(
                            'id'=>'footer_choice',
                            'type' => 'image_select',
                            'compiler'=>true,
                            'title' => __('Footer Type', 'kedavra'), 
                            'subtitle' => __('Select footer type for your site', 'kedavra'),
                            'options' => array(
                                    'footer-widget' => array('alt' => 'footer-widget', 'img' => KEDAVRA_DIR .'/img/footer-widget.png'),
                                    'footer-slogan' => array('alt' => 'footer-slogan', 'img' => KEDAVRA_DIR .'/img/footer-slogan.png'),
                                ),
                            'default' => 'footer-widget'
                            ),

                        array(
                            'id' => 'footerslog_background',
                            'type' => 'background',
                            'output' => array('#footer .footer-with-bg'),
                            'title' => __('Footer Background', 'kedavra'),
                            'subtitle' => __('Footer slogan background with image, color, etc.', 'kedavra'),
                            'default' => ''
                        ),

                        array(
                            'id'=>'footerslog_title',
                            'type' => 'text',
                            'title' => __('Footer Slogan Title', 'kedavra'), 
                            'subtitle' => __('Add Your Slogan Text Here', 'kedavra'),
                            'default' => 'WOULD YOU LIKE TO WORK WITH US?',
                        ),

                        array(
                            'id'=>'footerslog_btn',
                            'type' => 'text',
                            'title' => __('Footer Slogan Button', 'kedavra'), 
                            'subtitle' => __('Add Your Slogan Button Here', 'kedavra'),
                            'default' => 'contact us now',
                        ),

                        array(
                            'id'=>'footerslog_link',
                            'type' => 'text',
                            'title' => __('Footer Slogan Button Link', 'kedavra'),
                            'validate' => 'url',
                            'default' => 'http://kedavra.themesawesome.com/contact/'
                        ),


                        array(
                            'id'=>'footer-layout',
                            'type' => 'image_select',
                            'compiler'=>true,
                            'title' => __('Main Layout', 'kedavra'), 
                            'subtitle' => __('Select footer and widget alignment. Choose between 1, 2, 3 or 4 column layout.', 'kedavra'),
                            'options' => array(
                                    '1widget-footer' => array('alt' => '1widget-footer', 'img' => KEDAVRA_DIR .'/img/footer-one.png'),
                                    '2widget-footer' => array('alt' => '2widget-footer', 'img' => KEDAVRA_DIR .'/img/footer-two.png'),
                                    '3widget-footer' => array('alt' => '3widget-footer', 'img' => KEDAVRA_DIR .'/img/footer-three.png'),
                                    '4widget-footer' => array('alt' => '4widget-footer', 'img' => KEDAVRA_DIR .'/img/footer-four.png')
                                ),
                            'default' => '3widget-footer'
                            ),


                        array(
                            'id'=>'footer-text',
                            'type' => 'editor',
                            'title' => __('Footer Text', 'kedavra'), 
                            'subtitle' => __('Add Your Copyright Here', 'kedavra'),
                            'default' => 'Powered by WordPress - Built by <a href= "http://www.themesawesome.com/">Themes Awesome</a>',
                            )
                        
                        
                    )
                );


            $this->sections[] = array(
                'icon' => 'el-icon-list-alt',
                'title' => __('Typography Options', 'kedavra'),
                'fields' => array(



                    array(
                        'id'=>'body-font',
                        'type' => 'typography', 
                        'title' => __('Body Options', 'kedavra'),
                        'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website body font (leave form empty if you want to use default)', 'kedavra'),
                        'default'=> array(

                        )
                    ),  


                    array(
                        'id'=>'heading-font',
                        'type' => 'typography', 
                        'title' => __('Heading Typography', 'kedavra'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('h1', 'h2', 'h3','h4','h5','h6'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website heading font (leave form empty if you want to use default)', 'kedavra'),
                        'default'=> array(

                        )
                    ),


                 array(
                        'id'=>'menu-font',
                        'type' => 'typography', 
                        'title' => __('Menu Typography', 'kedavra'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('nav.menu a'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website menu font (leave form empty if you want to use default)', 'kedavra'),
                        'default'=> array(
                      
                        )
                    ),
                    
                )
            );

        
            $this->sections[] = array(
                'icon' => 'el-icon-twitter',
                'title' => __('Social Profile', 'kedavra'),
                'fields' => array(

                    array(
                        'id'=>'facebook_profile',
                        'type' => 'text',
                        'title' => __('Facebook Profile', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://facebook.com/#'
                        ),

                    array(
                        'id'=>'twitter_profile',
                        'type' => 'text',
                        'title' => __('twitter Profile', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://twitter.com/#'
                        ),


                    array(
                        'id'=>'google_profile',
                        'type' => 'text',
                        'title' => __('Google+ Profile', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://google.com/#'
                        ),


                    array(
                        'id'=>'instagram_profile',
                        'type' => 'text',
                        'title' => __('Instagram Profile', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://instagram.com/#'
                        ),


                    array(
                        'id'=>'behance_profile',
                        'type' => 'text',
                        'title' => __('Behance Profile', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://behance.com/#'
                        ),


                    array(
                        'id'=>'youtube_profile',
                        'type' => 'text',
                        'title' => __('Youtube URL', 'kedavra'),
                        'validate' => 'url',
                        'default' => 'http://youtube.com/#'
                        ),

                    
                )
            
            );  
            

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'kedavra'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'kedavra'),
                'content' => __('<p>Please go to themesawesome.com to get support</p>', 'kedavra')
            );
        }


        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'kedavra_framework', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Options', 'kedavra'),
                'page' => __('Options', 'kedavra'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => false, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => true, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons. 

            $this->args['share_icons'][] = array(
                'url' => 'http://www.themesawesome.com/',
                'title' => 'Our Site',
                //'icon' => 'el-icon-github'
                'img' => 'http://www.themesawesome.com/img/ta-option.jpg', // You can use icon OR img. IMG needs to be a full URL.
            );

            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/themesawesome',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/themesawesome',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.youtube.com/themesawesome',
                'title' => 'Find us on Youtube',
                'icon' => 'el-icon-youtube'
            );



        }

    }

    new KEDAVRA_Framework_Config();
}


function kedavra_footer_copyright() {


    $options = get_option('kedavra_framework');
    $copyright_footer = $options['footer-text'];
    echo balancetags( $copyright_footer );
}

function kedavra_loader_image() {

    $options = get_option('kedavra_framework');
    $loader_img = $options['loading_image'];
    echo esc_url( $loader_img );
}