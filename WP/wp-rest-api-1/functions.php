<?php


//CSS & JS Include
function japasty_scripts() {
    //CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.css', '', '3.3.0' );
    
    //JS
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/script.js', array(), '2.0.0', true );
    
  
    
    wp_localize_script('main_js', 'magicalData', array(
        'nonce'     => wp_create_nonce('wp_rest')
    ));
    
}
add_action( 'wp_enqueue_scripts', 'japasty_scripts' );


?>