<?php

/*Post Thumbnails*/
add_theme_support( 'post-thumbnails' );
add_image_size('image-size-2000-1200', 2000, 1200, true);
add_image_size('image-size-200-200', 200, 200, true);
add_image_size('image-size-300-300', 300, 300, true);
add_image_size('image-size-600-300', 600, 300, true);
add_image_size('image-size-450-300', 450, 300, true);
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
    'image-size-2000-1200' => __( 'image-size 2000 * 1200' ),
    'image-size-200-200' => __( 'image-size 200 * 200' ),
    'image-size-300-300' => __( 'image-size 300 * 300' ),
    'image-size-600-300' => __( 'image-size 600 * 300' ),
    'image-size-450-300' => __( 'image-size 450 * 300' )
    ) );
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );