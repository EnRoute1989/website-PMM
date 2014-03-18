
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
    
    <div class="noimgthumb"></div>

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
		
		<?php
			//显示作者和发布时间
			restaurateur_posted_on();
			//echo '<span>' . get_the_title() . '</span>' ;
			echo '<time class="entry_date">';
			echo mysql2date('Y-m-j', $post->post_modified);
			echo '</time>';
		?>

		
		
	</div><!-- .entry-content -->
	
</div><!-- #post-<?php the_ID(); ?> -->
