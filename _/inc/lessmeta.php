<footer class="thepostmeta" role="contentinfo">
	<span>by </span>
	<span class="byline author vcard">
		<a class="fn url n external nofollow" href="<?php echo the_author_meta('user_url'); ?>">
			<span class="given-name"><?php echo the_author_meta('first_name'); ?></span>
			<span class="family-name"><?php echo the_author_meta('last_name'); ?></span>
		</a>
		<span class="org visuallyhidden"><?php bloginfo('name'); ?></span>
		<span class="email visuallyhidden"><?php echo the_author_meta('user_email'); ?></span>
	</span>
	<span> on</span>
	<time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('M jS, Y') ?></time>
	<?php
			$theseCategories = get_categories();
			if ( ($theseCategories) ) {
				echo '<span>in the category </span>';
				echo get_the_category_list(', ');
			}
		?>
	<?php
		$theseTags = get_the_tags();
		if ($theseTags != "") {
			echo get_the_tag_list('<span>with the tags "','", "','"</span>');
		}
	?>
</footer>