<?php
// Add custom Theme Functions here

add_filter( 'woocommerce_product_tabs', 'wpb_remove_product_tabs', 98 );
function wpb_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'wpb_reorder_tabs', 98 );
function wpb_reorder_tabs( $tabs ) {
	$tabs['lifestyle']['priority']               = 5;
    $tabs['features']['priority']                = 10;
    $tabs['specifications']['priority']          = 15;
    $tabs['description']['priority']         	 = 20;
	
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'wpb_rename_tabs', 98 );
function wpb_rename_tabs( $tabs ) {
    $tabs['description']['title']               = __( 'More Information', 'text-domain' );
    return $tabs;
}
/*
add_action( 'init', function () {
 add_ux_builder_post_type('happyhuman_photos'); 
} );
*/

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
        'id' => 'strip-image',
        'desc' => 'Product Strip Picture here.',
        'label_name' => 'Strip Image',
        'label_set' => 'Set Strip image',
        'label_remove' => 'Remove Strip image',
        'label_use' => 'Set Strip image',
        'post_type' => array( 'product' ),
    );

    $featured_images[] = $args;

    return $featured_images;
});
