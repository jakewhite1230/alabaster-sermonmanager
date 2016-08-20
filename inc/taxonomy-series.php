<?php
	$style_options = get_option('alabaster-sermonmanager-options');
	if($style_options != '' ){
		$primary_style = $style_options['alabaster-sermonmanager-primary-color'];
		$secondary_style = $style_options['alabaster-sermonmanager-secondary-color'];
	}

			//list terms in a given taxonomy
			$taxonomy = 'series';
			$series = get_terms($taxonomy);
			?>
			<?php

			if($series == null){
				echo '<p>There are no registered series.</p>';
			} else {

			foreach ($series as $singular) {
				$t_id = $singular->term_id;
				$term_meta = get_option( "series_$t_id" );
				$series_image = get_term_meta( $t_id, 'series-image', true );
				?>
				<div class="asm-tax-body clearfix">
					<div class="asm-tax-profile-image">
							<img src="<?php echo $series_image;?>" alt="<?php echo $singular->name; ?>" style="width:100%;">
					</div>
					<div class="asm-tax-content">
							<h1 class="asm-tax-name"><?php echo $singular->name; ?></h1>
						<?php
							if($singular->description !=''){
									?><p class="asm-tax-description"><?php echo $singular->description; ?></p><?php
							}
						 ?>

						<?php	$args = array(
										'post_type' => 'sermon',
										'series' => $singular->name
								);
								//  assigning variables to the loop
									$wp_query = new WP_Query($args);
									// starting loop
									$sermonCount = $wp_query->post_count;
									while ($wp_query->have_posts()) : $wp_query->the_post();?>
										<p class="asm-tax-sermon-listings"><a class="asm-sermon-listing-link" href="<?php the_permalink();?>"><?php the_title();?></a></p>
										<hr class="asm-tax-hr">
									<?php endwhile;?>
										<?php wp_reset_query();?>
					</div>
				</div>
			<?php }
		}
			?>
<?php include('partials/asm-taxonomy-styles.php');?>
