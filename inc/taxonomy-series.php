

		<?php 
                  
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
				$seriesimage = esc_attr( $term_meta['image'] ) ? esc_attr( $term_meta['image'] ) : ''; 
				?>
				<div class="col-xs-12 col-sm-6 ">
				<a href="<?php echo esc_attr(get_term_link($singular, $taxonomy)); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $singular->name ); ?>">
				<img src="<?php echo $seriesimage;?>" alt="<?php echo $singular->name; ?>" style="width:100%;">
				</a>
					<a href="<?php echo esc_attr(get_term_link($singular, $taxonomy)); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $singular->name ); ?>"> <p style="margin:20px 0px;"><?php echo $singular->name; ?></p></a>
				</div>
			<?php

				}
		}
			?>


