<?php
// Enqueue scripts and styles for custom template
function enqueue_custom_scripts_and_styles_for_template(): void
{
    if (is_page_template('tiktok-wrapped.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('tiktok-wrapped-script', get_stylesheet_directory_uri() . '/js/tiktok-wrapped.js', array('jquery'), '2.0.0', true);

        // Pass data to JavaScript file
        wp_localize_script('tiktok-wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('tiktok-wrapped-style', get_stylesheet_directory_uri() . '/css/tiktok-wrapped.css', array(), '2.0.0', 'all');
    }

    if (is_page_template('instagram-wrapped.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('instagram-wrapped-script', get_stylesheet_directory_uri() . '/js/instagram-wrapped.js', array('jquery'), '2.0.0', true);

        // Pass data to JavaScript file
        wp_localize_script('instagram-wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('instagram-wrapped-style', get_stylesheet_directory_uri() . '/css/instagram-wrapped.css', array(), '2.0.0', 'all');
    }

    if (is_page_template('x-wrapped.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('x-wrapped-script', get_stylesheet_directory_uri() . '/js/x-wrapped.js', array('jquery'), '2.0.0', true);

        // Pass data to JavaScript file
        wp_localize_script('x-wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('x-wrapped-style', get_stylesheet_directory_uri() . '/css/x-wrapped.css', array(), '2.0.0', 'all');
    }

    if (is_page_template('facebook-wrapped.php')) {
        // Enqueue custom script for this template
        wp_enqueue_script('facebook-wrapped-script', get_stylesheet_directory_uri() . '/js/facebook-wrapped.js', array('jquery'), '1.1.0', true);

        // Pass data to JavaScript file
        wp_localize_script('facebook-wrapped-script', 'myCharacters', array(
            'imagePath' => get_stylesheet_directory_uri() . '/characters/', // This line provides the URL to the characters folder
        ));

        // Enqueue custom style for this template
        wp_enqueue_style('facebook-wrapped-style', get_stylesheet_directory_uri() . '/css/facebook-wrapped.css', array(), '1.1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles_for_template');
?>
