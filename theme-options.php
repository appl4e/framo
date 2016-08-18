<?php 

// Creating Theme Options page and options 

function admin_styles_and_scripts(){
    wp_register_script( 'theme_uploads', get_template_directory_uri() .'/js/theme_uploads.js', array('jquery','media-upload','thickbox') );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('theme_uploads');
}
add_action('admin_enqueue_scripts','admin_styles_and_scripts');

function new_custom_settings(){


        //custom option sections
        add_settings_section('header_section',__('Logo','lang'),'header_section_function','theme-options.php');
        
        add_settings_section('social_icons',__('Social Icon Links','lang'),'social_section_text','theme-options.php');


        //custom options
        add_settings_field('logo','Upload Logo','logo_function','theme-options.php','header_section');
        register_setting('header_section','field_ids', 'validate_setting');

        add_settings_field('facebook',__('Facebook Icon Link','lang'),'facebook_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('twitter',__('Twitter Icon Link','lang'),'twitter_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('pinterest',__('Pinterest Icon Link','lang'),'pinterest_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('google',__('Google+ Icon Link','lang'),'google_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('linkedin',__('Linkedin Icon Link','lang'),'linkedin_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('instagram',__('Instagram Icon Link','lang'),'instagram_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        add_settings_field('youtube',__('Youtube Icon Link','lang'),'youtube_link_field','theme-options.php','social_icons');
        register_setting('social_icons','field_ids');

        

}
add_action('admin_init','new_custom_settings');

function validate_setting($plugin_options) {
 $keys = array_keys($_FILES);
 $i = 0;
  foreach ( $_FILES as $image ) {   
  // if a files was upload
     if ($image['size']) {
          // if it is an image
        if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {
        $override = array('test_form' => false);
        // save the file, and store an array, containing its location in$file
            $file = wp_handle_upload( $image, $override );
            $plugin_options[$keys[$i]] = $file['url'];
            } else {
                    // Not an image.
                    $options = get_option('logo_field');
                    $plugin_options[$keys[$i]] = $options[$logo];
                    // Die and let the user know that they made a mistake.
                    wp_die('No image was uploaded.');
                         }
                   }   
                   // Else, the user didn't upload a file.   
                   // Retain the image that's already on file.   
                   else {     
                    $options = get_option('logo_field');     
                    $plugin_options[$keys[$i]] = $options[$keys[$i]];   
                }   $i++; 
            } 
            return $plugin_options;
        }

// define callback functions
function logo_function(){       
    $option = get_option('field_ids');
    $value = $option['logo'];
    echo ' <img src="'.$option['logo'].'" alt=""> ';
    echo '<input type="file" name="logo" placeholder="upload" /><br><input type="text" class="regular-text" name="field_ids[logo]" value="'.$value.'" /><br>';  
        
}
function social_section_text(){
        echo '<p>Add social links below... eg: www.google.com</p>';
        
}
function header_section_function(){
        echo '<p>Add Logo from below inputs</p>';
}

function facebook_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['facebook'];
        echo '<input type="text" class="regular-text" name="field_ids[facebook]" value="'.esc_url($field_value).'"/>';
}
function twitter_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['twitter'];
        echo '<input type="text" class="regular-text" name="field_ids[twitter]" value="'.esc_url($field_value).'"/>';
}
function pinterest_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['pinterest'];
        echo '<input type="text" name="field_ids[pinterest]" value="'.esc_url($field_value).'" class="regular-text" />';
}
function google_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['google'];
        echo '<input type="text" name="field_ids[google]" value="'.esc_url($field_value).'" class="regular-text" />';
}
function linkedin_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['linkedin'];
        echo '<input type="text" name="field_ids[linkedin]" value="'.esc_url($field_value).'" class="regular-text" />';
}
function instagram_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['instagram'];
        echo '<input type="text" name="field_ids[instagram]" value="'.esc_url($field_value).'" class="regular-text" />';
}
function youtube_link_field(){
        $field_arrays = (array)get_option('field_ids');
        $field_value = $field_arrays['youtube'];
        echo '<input type="text" name="field_ids[youtube]" value="'.esc_url($field_value).'" class="regular-text" />';
}




// create theme options page
function add_theme_options(){
        add_menu_page(__('Framo Theme Options','lang'),__('Theme Options','lang'),'manage_options','theme-options.php','theme_options_function', 'dashicons-screenoptions', 58);
}
add_action('admin_menu','add_theme_options');

//Add custom option sections to the Theme options page
function theme_options_function(){ ?>
        <h2 style="font-weight: bold;">Framo Theme Options</h2>
        <?php settings_errors(); ?>
        <form action="options.php" method="POST" enctype="multipart/form-data">
                <?php 
                        do_settings_sections('theme-options.php');
                        settings_fields('header_section');
                        settings_fields('social_icons');                        
                        submit_button();
                 ?>
        </form>
<?php }



