<?php get_header(); ?>

<?php get_sidebar(); ?>

	<section id="main" role="main">

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1 class="entry-title"><?php single_cat_title(); ?></h1>
				<span class="thispagetype">Category Archive</span>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1 class="entry-title"><?php single_tag_title(); ?></h1>
				<span class="thispagetype">Tag Archive</span>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1 class="entry-title"><?php the_time('F jS, Y'); ?></h1>
				<span class="thispagetype">Daily Archive</span>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1 class="entry-title"><?php the_time('F, Y'); ?></h1>
				<span class="thispagetype">Monthly Archive</span>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="entry-title"><?php the_time('Y'); ?></h1>
				<span class="thispagetype">Yearly Archive</span>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="entry-title">Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="entry-title">Blog Archives</h1>
			
			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<article <?php post_class() ?>>
					<header class="clearfix">
						<h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						
						<?php 
							if ('open' == $post->comment_status) 
								comments_popup_link('0', '1', '%', 'comments-link', '');
						?>
					</header>

						<div class="entry">
							<?php the_content(); ?>
						</div>
						
						<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

				</article>

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

	</section>

</div><!-- page wrapper -->
<?php get_footer(); ?>
