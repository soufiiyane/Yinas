<?php

function YinasFiles() {
    wp_enqueue_style('YinasFontAwesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
    wp_enqueue_style('YinasMainStyle', get_theme_file_uri('/assets/style.css'));
    wp_enqueue_style('YinasStyle', get_theme_file_uri('/assets/scss/style.css'));
    
    wp_enqueue_script('YinasPopper', get_theme_file_uri('assets/js/popper.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('YinasBootstrapJs', get_theme_file_uri('assets/js/bootstrap.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('YinasPlugins', get_theme_file_uri('assets/js/plugins.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('YinasActiveJs', get_theme_file_uri('assets/js/active.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('YinasApi', "//maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s", array('jquery'), '1.0', true);
    wp_enqueue_script('YinasMapGoogle', get_theme_file_uri('assets/js/map-active.js'), array('jquery'), '1.0', true);
  }
  
  add_action('wp_enqueue_scripts', 'YinasFiles');
  
  ////////////////////////////////////////////////////////////

  function YinasFeatures() {
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
      // File does not exist... return an error.
      return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } 
    else {
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
  
  }
  
  add_action('after_setup_theme', 'YinasFeatures');

  
 register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'THEMENAME' ),
  ) );
  register_nav_menus( array(
    'secondary' => __( 'Secondary Menu', 'THEMENAME' ),
  ) );
  
/////////////////////////////////////////////////////
     /* Register the 'right sidebar' sidebar. */
  add_action( 'widgets_init', 'my_register_sidebars' );

  function my_register_sidebars() {
 
      register_sidebar(
          array(
              'id'            => 'home-right-sidebar',
              'name'          => __( 'Home right sidebar' ),
              'description'   => __( 'A short description of the sidebar.' ),
              'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget-area">',
              'after_widget'  => '</div>',
              'before_title'  => '<h3 class="widget-title title">',
              'after_title'   => '</h3>',
          )
      );

      register_sidebar(
        array(
            'id'            => 'contact-right-sidebar',
            'name'          => __( 'Contact right sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget-area">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title title">',
            'after_title'   => '</h3>',
        )
    );
      
    register_sidebar(
      array(
          'id'            => 'post-right-sidebar',
          'name'          => __( 'Single post right sidebar' ),
          'description'   => __( 'A short description of the sidebar.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget-area">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title title">',
          'after_title'   => '</h3>',
      )
    );

    register_sidebar(
      array(
          'id'            => 'archives-right-sidebar',
          'name'          => __( 'Archives right sidebar'),
          'description'   => __( 'A short description of the sidebar.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget-area">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title title">',
          'after_title'   => '</h3>',
      )
    );

    include("widgets/tags.php");
    register_widget( 'tags' );

    include("widgets/search.php");
    register_widget( 'search' ); 

    include("widgets/news.php");
    register_widget( 'news' ); 

    include("widgets/LastestPosts.php");
    register_widget( 'LatestPosts' ); 
     
  }


  function add_comment_fields($fields){
    $fields["message"] = '<div class="col-12">
        <div class="group">
            <textarea name="message" cols="5" rows="5" id="message" required ></textarea>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Comment</label>
        </div>
    </div>';
    $fields["subject"] = '<div class="col-12">
          <div class="group">
              <input type="text" name="subject" id="subject" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Subject</label>
          </div>
        </div>';

   

    return $fields;
  }
 
  add_filter("comment_form_default_fields","add_comment_fields");

  //////////////////////////////////////////////////////////////////////////

  add_filter( 'comment_form_defaults', 'RemoveTextareaField');
  function RemoveTextareaField( $defaults )
  {
      $defaults['comment_notes_before'] = '';
      $defaults['title_reply'] = '';

      $defaults['comment_field'] = '<div class="col-12">
      <div class="group">
          <textarea name="comment" cols="5" rows="5" id="comment_field" required ></textarea>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Comment</label>
      </div>
    </div>';
      return $defaults;
  }

  //////////////////////////////////////////////////////////////////////////
  function wc_comment_form_change_cookies( $fields ) {
	$commenter = wp_get_current_commenter();

	$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 '<label for="wp-comment-cookies-consent">'.__('Remember Me!', 'textdomain').'</label></p>';
	return $fields;
}
  add_filter( 'comment_form_default_fields', 'wc_comment_form_change_cookies' );

  //////////////////////////////////////////////////////////////////////////
  // Adding ACF optiones page 


  if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Page Header Settings',
      'menu_title'	=> 'Page Header Settings',
      'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Home Page Block Settings',
      'menu_title'	=> 'Home Block Settings',
      'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'About-us General Settings',
      'menu_title'	=> 'About-us Settings',
      'parent_slug'	=> 'theme-general-settings',
    ));

    
    
  }

  
?>