<?php 

class news extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'Yinas-News', // Base ID
            'Yinas-News-Widget', // Name
            array( 'description' => __( 'Customized News Letter Widget'), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;
        //  echo  do_shortcode('[contact-form-7 id="161" title="Contact form 1"]');
        echo do_shortcode('[newsletter_form form="1" ]');
        echo $after_widget;
    }
    public function form( $instance ) {
        echo do_shortcode('[newsletter_form form="1"]');
    }

}
?>