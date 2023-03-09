<?php 

class tags extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'Yinas-tags', // Base ID
            'Yinas-tags-Widget', // Name
            array( 'description' => __( 'Customized tags Widget'), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
 
        echo $before_widget;
        $tags = get_tags(array(
            'taxonomy' => 'post_tag',
            'orderby' => 'name',
            'hide_empty' => false,
            "order"=> "DESC",
            "number" => 8
        ));
        ?>
        <div class="sidebar-widget-area">
            <h5 class="title">Tags</h5>
            <div class="widget-content">
                <ul class="tags">
                    <?php 
                        foreach($tags as $tag){
                            $tag_link = get_tag_link($tag->term_id);
                            ?>
                                <li><a href="<?php echo $tag_link ?>"><?php echo $tag->name ?></a></li>
                            <?php
                        }
                    ?>   
                </ul>
            </div>
        </div>
        <?php
        echo $after_widget;
    }

    public function form( $instance ) {

        $tags = get_tags(array(
            'taxonomy' => 'post_tag',
            'orderby' => 'name',
            'hide_empty' => false,
            "order"=> "DESC",
            "number" => 8
        ));
        ?>
        <div class="sidebar-widget-area">
            <h5 class="title">Tags</h5>
            <div class="widget-content">
                <ul class="tags">
                    <?php 
                        foreach($tags as $tag){
                            $tag_link = get_tag_link($tag->term_id);
                            ?>
                                <li><a href="<?php echo $tag_link ?>"><?php echo $tag->name ?></a></li>
                            <?php
                        }
                    ?>   
                </ul>
            </div>
        </div>
        <?php
    }

    


}



?>


