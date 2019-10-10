<?php

class Elfsight_Amazon_Review_Widget_WooCommerce_Display {
 
    private $textfield_id;
 
    public function __construct() {
        $this->textfield_id = 'grid_widgetid_text_field';
    }
 
    public function init() {
 
        add_action(
            'woocommerce_after_single_product_summary',
            array( $this, 'product_thumbnails' )
        );
    }

    public function product_thumbnails() {
 
        $widgetId = get_post_meta( get_the_ID(), $this->textfield_id, true );
        if ( empty( $widgetId ) ) {
            return;
        }
        echo '<script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="'. $widgetId .'">text</div>';
        //echo esc_html( $teaser );
    }
}
