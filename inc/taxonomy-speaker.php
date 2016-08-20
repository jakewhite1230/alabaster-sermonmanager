
		<?php
		$style_options = get_option('alabaster-sermonmanager-options');
		if($style_options != '' ){
		            $primary_style = $style_options['alabaster-sermonmanager-primary-color'];
		            $secondary_style = $style_options['alabaster-sermonmanager-secondary-color'];

		 }
			//list terms in a given taxonomy
			$taxonomy = 'speakers';
			$speakers = get_terms($taxonomy);
			?>
			<?php

			if($speakers == null){
				echo '<p>There are no registered speakers.</p>';
			} else {

			foreach ($speakers as $speaker) {
				$t_id = $speaker->term_id;
				$term_meta = get_option( "speakers_$t_id" );
				$speakers_image = get_term_meta( $t_id, 'speakers-image', true );
				?>
				<div class="asm-tax-body clearfix">
					<div class="asm-tax-profile-image">
							<img src="<?php echo $speakers_image;?>" alt="<?php echo $speaker->name; ?>" style="width:100%;">
					</div>
					<div class="asm-tax-content">
							<h1 class="asm-tax-name"><?php echo $speaker->name; ?></h1>
						<?php
							if($speaker->description !=''){
									?><p class="asm-tax-description"><?php echo $speaker->description; ?></p><?php
							}
						 ?>

						<?php	$args = array(
										'post_type' => 'sermon',
										'speakers' => $speaker->name,
										'posts_per_page' => 3
								);
								//  assigning variables to the loop
									$wp_query = new WP_Query($args);
									// starting loop
									$sermonCount = $wp_query->post_count;
									while ($wp_query->have_posts()) : $wp_query->the_post();?>
										<p class="asm-tax-sermon-listings"><a class="asm-sermon-listing-link" href="<?php the_permalink();?>"><?php the_title();?></a></p>
										<hr class="asm-tax-hr">
									<?php endwhile;?>
									<?php
										if($sermonCount >= 3){ ?>
												<p style="margin:20px 0px;">
													<a class='asm-listings-view-more' href="<?php echo esc_attr(get_term_link($speaker, $taxonomy)); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $speaker->name ); ?>">
													View More
												</a></p>
									<?php	}?>
										<?php wp_reset_query();?>
					</div>
				</div>
			<?php }
		}
			?>
<?php include('partials/asm-taxonomy-styles.php');?>
