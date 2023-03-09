<?php 
get_header();
?>
<!-- ##### Single Blog Area Start ##### -->
<div class="single-blog-wrapper section-padding-0-100">

<!-- Single Blog Area  -->
<!-- <div class="single-blog-area blog-style-2 mb-50">
    <div class="single-blog-thumbnail">
        <img  src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
        <div class="post-tag-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="post-date">
                        <a href="#"><?php echo get_the_date("d") ?> <span><?php echo get_the_date("F") ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row">
        
        <?php $cat = get_the_category(get_the_ID()); ?>
        <!-- ##### Post Content Area ##### -->
        
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12 ">
                    <div class="single-blog-thumbnail" style="position:relative">
                        <img 
                        style="object-fit: cover; max-height: 450px; width: 100%;"
                        class="special-author-image" src="<?php echo  get_the_post_thumbnail_url() ?>" alt="">
                        <div class="special-tag">
                            <a href="#"><?php echo get_the_date("d") ?><span><?php echo get_the_date("F") ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Blog Area  -->
            <div class="single-blog-area blog-style-2 mb-50">
                <!-- Blog Content -->
                <div class="single-blog-content">
                    <div class="line"></div>
                    <a href="#" class="post-tag"><?php echo $cat[0]->name;?></a>
                    <h4><a href="#" class="post-headline mb-0"><?php echo get_the_title() ?></a></h4>
                    <div class="post-meta mb-50">
                        <p>By <a href="#"><?php $post_id =  get_the_ID();
                        $author_id = get_post_field ('post_author', $post_id);
                        $display_name = get_the_author_meta( 'nickname' , $author_id ); 
                        echo $display_name;
                        ?></a></p>
                        <p><?php echo get_comments_number(get_the_ID()) ?> comments</p>
                    </div>
                    <p><?php echo get_the_content(); ?></p>

                </div>
            </div>

            <!-- About Author -->
            <div class="blog-post-author mt-100 d-flex">
                <?php 
                // Get the author ID    
                $author_id = get_post_field('post_author' , get_the_ID());
                // Get the author image URL    
                $output = get_avatar_url($author_id);
                ?>
                <div class="author-thumbnail">
                    <img src="<?php echo $output ?>" alt="">
                </div>
                <div class="author-info">
                    <div class="line"></div>
                    <span class="author-role">Author</span>
                    <h4><a href="#" class="author-name"><?php echo $display_name; ?></a></h4>
                    <?php
                         $description = get_the_author_meta( 'description' , $author_id ); 
                    ?>
                    <p><?php echo $description ?></p>
                </div>
            </div>
            <!-- Comment Area Start -->
            <?php 
                    $args = array(
                    'post_id' => get_the_ID(),   // Use post_id, not post_ID
                    'parent'  => 0
                );
                $comments =  get_comments($args);
                if(count($comments)>0){
                    ?>
                    <div class="comment_area clearfix mt-70">
                    <h5 class="title">Comments</h5>
                        <ol>
                        <?php 
                        foreach($comments as $comment){
                            //  var_dump($comment);
                            ?>
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="<?php echo get_avatar_url($comment->user_id) ?>" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="post-date"><?php echo get_comment_date() ?></a>
                                        <p><a href="#" class="post-author"><?php echo $comment->comment_author;  ?></a></p>
                                        <p><?php echo $comment->comment_content ?></p>
                                    <?php $post_id = get_the_ID();
                                            $comment_id = get_comment_ID();

                                            //get the setting configured in the admin panel under settings discussions "Enable threaded (nested) comments  levels deep"  
                                            $max_depth = get_option('thread_comments_depth');
                                            //add max_depth to the array and give it the value from above and set the depth to 1
                                            $default = array(
                                                'add_below'  => 'comment',
                                                'respond_id' => 'respond',
                                                'reply_text' => __('Reply'),
                                                'login_text' => __('Log in to Reply'),
                                                'depth'      => 1,
                                                'before'     => '',
                                                'after'      => '',
                                                'max_depth'  => $max_depth
                                                );
                                        echo  comment_reply_link($default,$comment_id,$post_id);  ?>
                                    </div>
                                </div>
                                <?php if($comment->get_children()){
                                    $childcomments = array(
                                        'post_id'   => get_the_ID(),
                                        // 'status'    => 'approve',
                                        'order'     => 'DESC',
                                        'hierarchical' => true,
                                        'parent'    => $comment->comment_ID,
                                    );
                                    $childs = get_comments($childcomments);
                                    foreach($childs as $child){
                                        ?>
                                        <ol class="children">
                                            <li class="single_comment_area">
                                                <!-- Comment Content -->
                                                <div class="comment-content d-flex">
                                                    <!-- Comment Author -->
                                                    <div class="comment-author">
                                                        <img src="<?php echo get_avatar_url($child->user_id) ?>" alt="author">                                            </div>
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <a href="#" class="post-date"><?php echo get_comment_date() ?></a>
                                                        <p><a href="#" class="post-author"><?php echo $child->comment_author;  ?></a></p>
                                                        <p><?php echo $child->comment_content ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                        <?php
                                    }
                                } ?>
                            </li>
                            <?php
                        }
                        ?>
                            <!-- Single Comment Area -->
                        </ol>
                    </div>
                
                <?php } ?>
            <div class="post-a-comment-area mt-70">
                <h5>Leave a reply</h5>
                <!-- Reply Form -->
                <?php if(comments_open() ):
                        comments_template();
                        // echo wp_list_comments();
                endif; ?>
            </div>
            
        </div>
        <!-- ##### Sidebar Area ##### -->
        <?php get_sidebar("post") 
        ?>               
          
        
    </div>
</div>
</div>



<div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                       <!-- echo  do_shortcode('[contact-form-7 id="161" title="Contact form 1"]');  -->
                       <?php echo do_shortcode('[newsletter_form form="1" ]'); ?>
                    </div>
                </div>
            </div>
        </div>
 </div>
<?php
get_footer();
?>