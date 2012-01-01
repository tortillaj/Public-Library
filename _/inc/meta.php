<footer class="thepostmeta" role="contentinfo">
	<ul>
	
		<li><span class="postmetainfo">Date</span>
			<time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('M jS, Y') ?></time>
		</li>
		
		<?php
			$posttags = get_the_tags();
			$count=0;
			if ($posttags) {
				echo '<li><span class="postmetainfo">Tags</span> ';
				foreach($posttags as $tag) {
					$count++;
					echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>, ';
					if( $count >= 4 ) break;
				}
				echo '</li>';
			}
		?>
		
		<?php
			$theseCategories = get_categories();
			if ($theseCategories) {
				echo '<li><span class="postmetainfo">Category</span> ';
				echo get_the_category_list(', ');
				echo '</li>';
			}
		?>
		
		<li><span class="postmetainfo">Author</span>
			<span class="byline author vcard">
				<a class="fn url n external nofollow" href="<?php echo the_author_meta('user_url'); ?>">
					<span class="given-name"><?php echo the_author_meta('first_name'); ?></span>
					<span class="family-name"><?php echo the_author_meta('last_name'); ?></span>
				</a>
				<span class="org visuallyhidden"><?php bloginfo('name'); ?></span>
				<span class="email visuallyhidden"><?php echo the_author_meta('user_email'); ?></span>
			</span>
		</li>
		
	</ul>
</footer>