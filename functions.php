<?php 

function framo_wp_functions(){
	add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search_form', 'comment_form'));
    add_theme_support('custom-background');
    load_theme_textdomain('lang', get_template_directory_uri().'/languages');

	if(function_exists('register_nav_menu')){
		register_nav_menu('mobile-menu',__('Mobile Menu','lang'));
	}
        function default_mobile_menu(){
                echo "<ul class='nav navbar-nav navbar-right'>";
                echo "<li class='text-uppercase'><a href='".esc_url(home_url())."'>Home</a></li>";
                echo "</ul>";
        }
        
}
add_action('after_setup_theme','framo_wp_functions');

function framo_widgets(){
    if(function_exists('register_sidebar')){
        register_sidebar(array(
                'name'=> __('Footer Widget','lang'),
                'description'=>'Add Multiple Wodgets to make them appear on footer',
                'id' => 'footer-widget-1',
                'before_widget'=> '<div class="col-md-4 col-sm-6 widget">',
                'after_widget'=>'</div>',
                'before_title'=>'<h4>',
                'after_title'=>'</h4>',
        ));

        }    
}
add_action('widgets_init', 'framo_widgets');

function framo_scripts_styles(){
	
        wp_register_style('bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.min.css');
        wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
        wp_register_style('normalize', get_template_directory_uri().'/css/normalize.css');
        wp_register_style('main', get_template_directory_uri().'/css/main.css');
        wp_register_style('style', get_template_directory_uri().'/css/style.css');

        wp_enqueue_style('bootstrap-theme');
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('normalize');
        wp_enqueue_style('main');
        wp_enqueue_style('style');

      
        

        wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr-2.8.3.min.js',array('jquery'));
        wp_register_script('plugins', get_template_directory_uri().'/js/plugins.js',array('jquery'));
        wp_register_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'));
        wp_register_script('custom', get_template_directory_uri().'/js/custom.js',array('jquery'));

        wp_enqueue_script('jquery');
        wp_enqueue_script('modernizr');        
        wp_enqueue_script('plugins');
        wp_enqueue_script('bootstrap.min');
        wp_enqueue_script('custom');

}
add_action('wp_enqueue_scripts', 'framo_scripts_styles');





//include cmb2 options
if(file_exists(dirname(__FILE__).'/theme-options.php')){
        require_once dirname(__FILE__).'/theme-options.php';
}

if(file_exists(dirname(__FILE__).'/inc/cmb2/init.php')){
        require_once( dirname(__FILE__).'/inc/cmb2/init.php');
}


if(file_exists(dirname(__FILE__).'/inc/cmb2/functions.php')){
        require_once dirname(__FILE__).'/inc/cmb2/functions.php';
}



?>