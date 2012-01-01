<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '</h4>'
    	));
    }
 //
 //
 //
 //
 //
    
    // Add the theme options
add_theme_support('post-thumbnails');

function register_my_menus() {
  register_nav_menus(
    array('header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );


// remove parentheses from category list and add span class to post count
function categories_postcount_filter ($variable) {
$variable = str_replace('(', '<span class="post-count"> ', $variable);
$variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_postcount_filter');

function wordpressapi_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
	 <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		 <div id="comment-<?php comment_ID(); ?>">
			 <div class="commentmetainfo clearfix">
				 <?php echo get_avatar($comment,$size='45',$default='http://localhost:8888/wordpress/wp-content/themes/HTML5-Reset-Compass-Sass-Wordpress-Theme/_/images/non-avatar.png' ); ?>
				 <?php $user_name_str = substr(get_comment_author(),0, 20); ?>
				 <?php printf(__('<cite>%s</cite>'), $user_name_str) ?>
				 <a class="commentdatelink" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), comment_date('M j, Y'),  get_comment_time()) ?></a>
				 <?php if ($comment->comment_approved == '0') : ?>
			 		<span class="warning"><?php _e('Your comment is awaiting moderation.') ?></span>
		 		<?php endif; ?>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			 </div>
		
		 <?php comment_text() ?>

		 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	 </div>
<?php
}

 


function publiclibrary_get_archives() {
	global $wpdb, $wp_locale;
	$output = '';

		$query = "SELECT COUNT( ID ) posts, YEAR( post_date ) year, MONTH( post_date ) month
				FROM wp_posts
				WHERE post_status =  'publish'
				GROUP BY month
				HAVING year = YEAR( NOW( ) ) 
				UNION 
				SELECT COUNT( ID ) , YEAR( post_date ) year, MONTH( post_date ) month
				FROM wp_posts
				WHERE post_status =  'publish'
				GROUP BY month
				HAVING year < YEAR( NOW( ) )";
		$key = md5($query);
		$cache = wp_cache_get( 'wp_get_archives' , 'general');
		if ( !isset( $cache[ $key ] ) ) {
			$arcresults = $wpdb->get_results($query);
			$cache[ $key ] = $arcresults;
			wp_cache_set( 'wp_get_archives', $cache, 'general' );
		} else {
			$arcresults = $cache[ $key ];
		}
		if ( $arcresults ) {
			$afterafter = $after;
			foreach ( (array) $arcresults as $arcresult ) {
				$url = get_month_link( $arcresult->year, $arcresult->month );
				/* translators: 1: month name, 2: 4-digit year */
				$thismonth = substr($wp_locale->get_month($arcresult->month), 0, 3);
				$text = sprintf(__('%1$s %2$d'), $thismonth, $arcresult->year);
				if ($arcresult->posts == 1)
					$text .= '<span class="post-count">' . $arcresult->posts.' post</span>' . $afterafter;
				else
					$text .= '<span class="post-count">' . $arcresult->posts.' posts</span>' . $afterafter;
				//$output .= publiclibrary_archives_link($url, $text, $before, $after);
				$output .= '<li>' . $before . '<a href="' . $url . '" title="Archives for ' . $wp_locale->get_month($arcresult->month) . '">' . $text . '</a>' . $after .'</li>';
			}
			
			echo $output;
		} 

}

    
    //
    //
    //
    //
    //
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
    
  // Define Theme Constants
  
  define('HOMEPATH', get_bloginfo('url'));
  define('THEMEPATH', get_stylesheet_directory_uri());  
  define('IMAGESPATH', THEMEPATH . '/_/images/');  
  define('JAVASCRIPTSPATH', THEMEPATH . '/_/javascripts/');    

?>