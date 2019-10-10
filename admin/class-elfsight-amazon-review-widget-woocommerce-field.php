<?php
 
class Elfsight_Amazon_Review_Widget_Field{
 
        private $textfield_id;
	private $grid_textfield_id;
 
    public function __construct() {
        $this->textfield_id = 'widgetid_text_field';
        $this->grid_textfield_id = 'grid_widgetid_text_field';
    }
 
    public function init() {
 
            add_action(
                'woocommerce_product_options_advanced',
                array( $this, 'product_options_grouping' )
            );

	    add_action(
		    'woocommerce_process_product_meta',
		    array( $this, 'add_custom_linked_field_save' )
	    );


            add_action(
                'woocommerce_product_options_advanced',
                array( $this, 'product_options_grid_grouping' )
            );

	    add_action(
		    'woocommerce_process_product_meta',
		    array( $this, 'add_custom_gridid_linked_field_save' )
	    );

    }
 
    public function product_options_grouping() {
 
            $description = sanitize_text_field( 'enter widget id of product.' );
            $placeholder = sanitize_text_field( 'classid' );
 
            $args = array(
                'id'            => $this->textfield_id,
                'label'         => sanitize_text_field( 'Elfsight Widget ID' ),
                'placeholder'   => 'Enter class id for product',
                'desc_tip'      => true,
                'description'   => $description,
            );
            woocommerce_wp_text_input( $args );
    }

    public function add_custom_linked_field_save( $post_id ) {
	 
		if ( ! ( isset( $_POST['woocommerce_meta_nonce'], $_POST[ $this->textfield_id ] ) || wp_verify_nonce( sanitize_key( $_POST['woocommerce_meta_nonce'] ), 'woocommerce_save_data' ) ) ) {
		return false;
	    }
	 
	    $widget_id = sanitize_text_field(
		wp_unslash( $_POST[ $this->textfield_id ] )
	    );
	 
	    update_post_meta(
		$post_id,
		$this->textfield_id,
		esc_attr( $widget_id )
	    );
     }

    public function product_options_grid_grouping() {
 
            $description = sanitize_text_field( 'enter Grid widget id of product.' );
            $placeholder = sanitize_text_field( 'classid' );
 
            $args = array(
                'id'            => $this->grid_textfield_id,
                'label'         => sanitize_text_field( 'Elfsight Grid Widget ID' ),
                'placeholder'   => 'Enter grid class id for product',
                'desc_tip'      => true,
                'description'   => $description,
            );
            woocommerce_wp_text_input( $args );
    }

    public function add_custom_gridid_linked_field_save( $post_id ) {
	 
		if ( ! ( isset( $_POST['woocommerce_meta_nonce'], $_POST[ $this->grid_textfield_id ] ) || wp_verify_nonce( sanitize_key( $_POST['woocommerce_meta_nonce'] ), 'woocommerce_save_data' ) ) ) {
		return false;
	    }
	 
	    $grid_id = sanitize_text_field(
		wp_unslash( $_POST[ $this->grid_textfield_id ] )
	    );
	 
	    update_post_meta(
		$post_id,
		$this->grid_textfield_id,
		esc_attr( $grid_id )
	    );
     }
}

