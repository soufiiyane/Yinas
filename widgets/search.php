<?php 

class search extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'Yinas-Search', // Base ID
            'Yinas-Search-Widget', // Name
            array( 'description' => __( 'Customized Search Widget'), ) // Args
        );
    }
        
    public function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;
        ?>
               <div class="sidebar-widget-area">
                    <div class="widget-content">
                        <form  class="search-form" action="<?php echo site_url() ?>" method="GET">
                            <input type="search" name="s" id="subscribesForm" placeholder="Search...">
                            <button type="submit" class="btn original-btn" hidden>Subscribe</button>
                        </form>
                    </div>
                </div>
        <?php
        echo $after_widget;
    }

    public function form( $instance ) {

        ?>
           <div class="sidebar-widget-area">
                    <div class="widget-content">
                        <form  class="search-form" action="<?php echo site_url() ?>" method="GET">
                            <input type="search" name="s" id="searchForm" placeholder="Search...">
                            <button type="submit" class="btn original-btn" hidden>Subscribe</button>
                        </form>
                    </div>
            </div>
        <?php
    }


    }
?>