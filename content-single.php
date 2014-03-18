
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
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
        
        <h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(600, 300) ); ?></a></div> 
        <?php else : ?>
        <div class="noimgthumb"></div>
    	<?php endif; ?>

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'restaurateur' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! restaurateur_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="meta-tag"></span>Tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'restaurateur' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'restaurateur' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="meta-cat"></span>Filed Under %1$s | <span class="meta-tag"></span>Tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'restaurateur' );
				} else {
					$meta_text = __( '<span class="meta-cat"></span>Filed Under %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'restaurateur' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php 
/* 
single page?show current category articles 
*/ 
?> 
<?php 
if ( is_single() ) : 
global $post; 
$categories = get_the_category(); 
foreach ($categories as $category) : 
?> 
<li class="widget widget_recent_entries" id="<?php $category->term_id;?>-posts"> 
<h2 class="widgettitle"><?php echo $category->name; ?></h2> 
<ul> 
<?php 
$posts = get_posts('numberposts=5&category='. $category->term_id); 
foreach($posts as $post) : 
?> 
<li> 
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
<?php	
	echo mysql2date('Y-m-j', $post->post_modified);
?>
</li> 
<?php endforeach; ?> 
</ul> 
</li> 
<?php 
endforeach; endif ; ?> 
<?php 
/* 
end show current category articles 
*/ 
?> 
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
