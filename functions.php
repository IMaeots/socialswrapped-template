<?php
// Enqueue scripts and styles for custom template
function enqueue_custom_scripts_and_styles_for_template() {
    if (is_page_template('tiktok-wrapped.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('wrapped-script', get_stylesheet_directory_uri() . '/js/tiktok-wrapped.js', array('jquery'), '1.3.3', true);

        // Pass data to JavaScript file
        wp_localize_script('wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('wrapped-style', get_stylesheet_directory_uri() . '/css/tiktok-wrapped.css', array(), '1.3.2', 'all');
    }

    if (is_page_template('x-wrapped-template.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('wrapped-script', get_stylesheet_directory_uri() . '/js/x-wrapped.js', array('jquery'), '1.0', true);

        // Pass data to JavaScript file
        wp_localize_script('wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('wrapped-style', get_stylesheet_directory_uri() . '/css/x-wrapped.css', array(), '1.0', 'all');
    }

    if (is_page_template('facebook-wrapped-template.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('wrapped-script', get_stylesheet_directory_uri() . '/js/facebook-wrapped.js', array('jquery'), '1.0', true);

        // Pass data to JavaScript file
        wp_localize_script('wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('wrapped-style', get_stylesheet_directory_uri() . '/css/facebook-wrapped.css', array(), '1.0', 'all');
    }

    if (is_page_template('instagram-wrapped-template.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('wrapped-script', get_stylesheet_directory_uri() . '/js/instagram-wrapped.js', array('jquery'), '1.0', true);

        // Pass data to JavaScript file
        wp_localize_script('wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('wrapped-style', get_stylesheet_directory_uri() . '/css/instragram-wrapped.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles_for_template');
?>
