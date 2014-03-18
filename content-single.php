<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<span class="entry-title"><?php the_title(); ?>
		<span>
		<?php 
		  echo '<time class="entry_date">';
		  echo mysql2date('Y-m-j', $post->post_modified);
		  echo '</time>';
		?>
		</span>
		</span>
	</div><!-- .entry-header -->
    
    <div class="noimgthumb"></div>

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
		
		<?php
			//显示作者和发布时间
			//restaurateur_posted_on();
		?>

		
		
	</div><!-- .entry-content -->
	
</div><!-- #post-<?php the_ID(); ?> -->
