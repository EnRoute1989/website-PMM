<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '糟糕 - 您访问的页面不存在...', 'restaurateur' ); ?></h1>
					<img src="wp-content/themes/restaurateur/library/images/noexist.jpg">
				</header>

				<div class="entry-content post-content">
					<h4><?php _e( '您可尝试重新搜索，也许下面的链接可能会有帮助~', 'restaurateur' ); ?></h4>
					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widget-title"><?php _e( '常用分类', 'restaurateur' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>
			   </div><!-- .entry-content -->
			</article><!-- #post-0 -->

        </div> <!-- end #main -->

        <?php //get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>