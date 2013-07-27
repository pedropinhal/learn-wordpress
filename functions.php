<?php 

// load CSS & JS
function loadStylesAndScripts()
{
	wp_enqueue_style(
			'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css'
		);
	wp_enqueue_style(
			'main-styles', get_template_directory_uri() . '/style.css'
		);
	wp_enqueue_script(
			'jquery', 'http://code.jquery.com/jquery.min.js'
		);
	wp_enqueue_script(
			'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js'
		);
}

add_action('wp_enqueue_scripts', 'loadStylesAndScripts');

// register main nav

register_nav_menus(array(
		'main-nav' => 'Main Navigation',
		'footer-nav' => 'Footer Navigation'
	));

// register side bar

register_sidebar( array(
	'name' => 'main-sidebar',
	'description' => 'This is the main sidebar',
	'before_widget' => '<div class="span4">',
	'after-widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>'
	));

// add thumbnail feature
add_theme_support( 'post_thumbnails' );


// comment template
function comments_feed_template_callback($comment, $args, $depth){
	$GLOBAL['coment'] = $comment;

	?>
		<div class="media">
			<a href="<?php echo get_comment_author_url(); ?>" class="pull-left">
				<?php echo get_avatar(); ?>
			</a>

			<div class="media-body">
				<h5 class="media-heading">
					<a href="<?php echo get_comment_author_url(); ?>">
						<?php echo get_comment_author(); ?>
					</a>
					<small><?php comment_date(); ?> at <?php comment_time();?></small>
				</h5>
				<?php comment_text(); ?>

				<?php comment_reply_link( array_merge($args, array(
					'reply_text' => __('<strong>reply</strong> <i class="icon-share-alt"></i>'),
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				))); ?>
			</div>

		</div>

	<?php
}

// filter for adding class to avatar thumbail
add_filter('get_avatar', 'add_avatar_class');

function add_avatar_class($class){
	$class = str_replace("class='avatar", "class='img-circle", $class);
	return $class;

}

// filter for reply link bs style
add_filter('comment_reply_link', 'add_reply_link_class');

function add_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='btn btn-mini pull-right", $class);
	return $class;

}

// register slide post type
function create_slides_post_type() {
  $labels = array(
    'name' => 'Slides',
    'singular_name' => 'Slide',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Slide',
    'edit_item' => 'Edit Slide',
    'new_item' => 'New Slide',
    'all_items' => 'All Slides',
    'view_item' => 'View Book',
    'search_items' => 'Search Slides',
    'not_found' =>  'No slides found',
    'not_found_in_trash' => 'No slides found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slide' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title')
  ); 

  register_post_type( 'slide', $args );
}
add_action( 'init', 'create_slides_post_type' );


















