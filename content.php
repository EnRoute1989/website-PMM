
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header>
    	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta clearfix">
			<?php
			//显示作者和发布时间
			restaurateur_posted_on();
			//echo '<span>' . get_the_title() . '</span>' ;
			echo '<time class="entry_date">';
			echo mysql2date('Y-m-j', $post->post_modified);
			echo '</time>';
			?>
       
		</div><!-- .entry-meta -->
		<?php endif; ?>
        
		<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'restaurateur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

    	<?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(600, 300) ); ?></a></div> 
        <?php else : ?>
        <div class="noimgthumb"></div>
    	<?php endif; ?>


	<div class="entry-content post-content">
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'restaurateur' ) );
				if ( $categories_list && restaurateur_categorized_blog() ) :
			?>
			
			
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'restaurateur' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( '<span class="meta-tag"></span>Tagged %1$s', 'restaurateur' ), $tags_list ); ?>
			</span>
			
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>



		
	</footer><!-- #entry-meta -->
</div><!-- #post-<?php the_ID(); ?> -->
