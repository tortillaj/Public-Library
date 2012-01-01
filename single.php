<?php get_header(); ?>

<?php get_sidebar(); ?>

	<section id="main" role="main">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<h1 class="entry-title"><?php the_title(); ?></h1>
	
				<div class="entry-content">
					
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => '<span class="pagination">Pages: ', 'after' => '</span>', 'next_or_number' => 'number')); ?>
				
					<?php include (TEMPLATEPATH . '/_/inc/lessmeta.php' ); ?>
	
				</div>
				
				<?php edit_post_link('Edit this entry','','.'); ?>
				
			</article>
	
		<?php comments_template(); ?>
	
		<?php endwhile; endif; ?>
	
	</section>

</div><!-- page wrap -->
<?php get_footer(); ?>