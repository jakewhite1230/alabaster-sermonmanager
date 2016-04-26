
		<?php 
                  
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
				$seriesimage = esc_attr( $term_meta['image'] ) ? esc_attr( $term_meta['image'] ) : ''; 
				?>
				<div class="col-xs-12 col-sm-6">
				<a href="<?php echo esc_attr(get_term_link($speaker, $taxonomy)); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $speaker->name ); ?>">
				<img src="<?php echo $seriesimage;?>" alt="<?php echo $speaker->name; ?>" style="width:100%;">
				</a>
					<a href="<?php echo esc_attr(get_term_link($speaker, $taxonomy)); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $speaker->name ); ?>"><p style="margin:20px 0px;"><?php echo $speaker->name; ?></p></a>
				</div>
			<?php }
		}
			?>
