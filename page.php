<?php get_header(); ?>

<?php get_sidebar(); ?>

	<section id="main" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article class="post" id="post-<?php the_ID(); ?>">
	
				<h1 class="entry-title"><?php the_title(); ?></h1>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
				
				<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>
	
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
			</article>
			
			<?php comments_template(); ?>
	
		<?php endwhile; endif; ?>

	</section>
	
</div><!-- page wrap -->
<?php get_footer(); ?>
