
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
										'posts_per_page' => 5
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
										if($sermonCount > 1){ ?>
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

			<style>
				.asm-tax-body{
					background:#f5f5f5;
					font-family: 'Source Sans Pro', sans-serif;
					width: 75%;
					margin: auto;
					display: block;
					position: relative;
					min-height: 185px;
					height: auto;
					margin-bottom: 10px;
				}

				.asm-tax-body a:hover{
					text-decoration: none;
				}
				.asm-tax-body .clearfix:after {
					 visibility: hidden;
					 display: block;
					 font-size: 0;
					 content: " ";
					 clear: both;
					 height: 0;
					 }
				.asm-tax-body .clearfix { display: inline-block; }
				/* start commented backslash hack \*/
				* html .asm-tax-body .clearfix { height: 1%; }
				.asm-tax-body .clearfix { display: block; }
				/* close commented backslash hack */
				.asm-tax-profile-image{
					width: 30%;
					height: auto;
					float: left;
    			margin: 0px 15px 15px;
				}

				.asm-tax-content{
					float: left;
					width: 60%;
				}

				.asm-tax-name,
				.asm-listings-view-more{
					color: <?php echo $primary_style; ?>;
					margin-bottom: 0px !important;
					width: auto;
				}
				.asm-sermon-listing-link{
					color: <?php echo $secondary_style; ?>;
				}

				.asm-sermon-listing-link:hover{
					color: <?php echo $primary_style; ?>;
				}

				.asm-tax-description{
					font-size: .8em;
					font-style: italic;
					color: <?php echo $secondary_style; ?>;
				}

				.asm-tax-hr{
					margin-top: 10px;
			    margin-bottom: 10px;
			    border: 0;
			    border-top: 1px solid <?php echo $secondary_style; ?>;
					opacity: 0.4;
				}

				@media(max-width:767px){
					.asm-tax-body{
						margin: auto;
						display: block;
						position: relative;
						padding: 10px;
						margin-bottom: 10px;
					}

					.asm-tax-body p{
					text-align: center;
					}

					.asm-tax-name{
						text-align: center;
					}
					.asm-tax-profile-image{
						width: 50%;
						height: auto;
						float: none;;
	    			margin: 0px auto;
						margin-bottom: 15px;
						display: block;
					}

					.asm-tax-content{
						float: none;;
						width: 100%;
					}
					.asm-tax-name,
					.asm-listings-view-more{
						 width: 100%;
					 }


					.asm-tax-hr{
						margin: 0 auto;
						display: block;
						width: 75%;
					}


				}
			</style>
