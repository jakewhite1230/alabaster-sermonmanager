<?php
		$style_options = get_option('alabaster-sermonmanager-options');
			if($style_options != '' ){
						$primary_style = $style_options['alabaster-sermonmanager-primary-color'];
						$secondary_style = $style_options['alabaster-sermonmanager-secondary-color'];

 			}

			$args = array('post_type' => 'sermon');
			$the_query = new WP_Query($args);
			if($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
			 $thumbnail_src = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		?>
		<div class="col-xs-12 col-sm-6 sermons-shortcode">



		<?php if($thumbnail_src == null){ ?>

				<a href="<?php echo the_permalink();?>"><div class="imagePlaceholder" style="width:100%; background-color:black; color:white;">
					<h3>There is no image for this message.</h3>
				</div></a>
				<?php } else { ?>
			<a href="<?php echo the_permalink();?>"><img style="width:100%;" src="<?php echo $thumbnail_src;?>"></a>

			<?php } ?>



			<h2><a class="asm-tax-name" href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h2>
			<p><?php echo get_custom_field("sermon_date"); ?></p>
		</div>

	<?php endwhile; else: ?>
		<p>There are no sermons.</p>
	<?php endif; ?>
<?php include('partials/asm-taxonomy-styles.php');?>
