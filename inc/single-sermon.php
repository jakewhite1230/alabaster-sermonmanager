<?php get_header(); ?>

<div class="row">
<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php $thumbnail_src = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	

							<div class="blogimage-single" style="background-image: url('<?php echo $thumbnail_src; ?>')"></div>

							<div class="post-text">

									<h3><?php the_title(); ?></h3></a>
									<p><?php the_time('F j, Y')?></p>
									<?php the_content(); ?>
									<h1>This is the single-sermons.php template</h1>
									<div class="left"><?php previous_post_link('< %link') ?></div>
									<div class="right"><?php next_post_link('%link >') ?></div>
									
									<?php endwhile; else: ?>

									<p>There are no posts</p>


								<?php endif; ?>
								</div>
</div>

<?php get_footer(); ?>