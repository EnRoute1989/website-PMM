<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<img src="http://bbs.nankai.edu.cn/data/user/img/group.jpg" >

				<?php if (function_exists("restaurateur_pagination")) {
							restaurateur_pagination(); 
				} elseif (function_exists("restaurateur_content_nav")) { 
							restaurateur_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'restaurateur' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'restaurateur' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		   <?php echo get_the_category_list(); ?>
        </div> <!-- end #main -->
		
        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>