<div id="sidebar">
	<div class="widget">
		<h4>Categories</h4>
		<ul class="widget_categories">
			<?php foreach (get_categories(array('hide_empty'=>false, 'number'=>10, 'orderby'=>count, 'order'=>desc)) as $category)
				{
					echo '<li><a href="' . get_category_link( $category->term_id ) . '"><span class="category-name"><span>' .
					$category->cat_name . '</span></span> <span class="post-count">' . $category->count .
					'</span></a></li>';
				}
			?>
		</ul>
    </div>
    
    <div class="widget">
		<h4>Archives</h4>
		<ul class="widget_archive">
			<?php publiclibrary_get_archives(); ?>
		</ul>
	</div>
	
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
    	<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
        
    	<?php wp_list_bookmarks(); ?>
    
    	<h4>Meta</h4>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	
    	<h4>Subscribe</h4>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
	
	<?php endif; ?>

</div>