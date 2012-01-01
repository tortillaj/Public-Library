<?php get_header(); ?>
<div id="main" role="main" class="clearfix">
	<?php get_sidebar(); ?>
	<section>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<?php if ( has_post_thumbnail()) : ?>
				    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				    <?php the_post_thumbnail( array(50, 50) ); ?>
				    </a>
				<?php endif; ?>
				
				<header class="clearfix">
	
					<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<?php 
						if ('open' == $post->comment_status) 
							comments_popup_link('0', '1', '%', 'comments-link', '');
					?>
				
				</header>
	
				<div class="entry">
				<?php
					the_content(); 
				?>
				</div>
	
				<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>
	
			</article>
	
		<?php endwhile; ?>
	
		<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
	
		<?php else : ?>
	
			<h2>Not Found</h2>
	
		<?php endif; ?>
	</section>
</div>

</div><!-- page wrap -->
<?php get_footer(); ?>
