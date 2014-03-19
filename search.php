<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( '搜索结果: %s', 'restaurateur' ), '<span class="colortxt">' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'new' ); ?>

				<?php endwhile; ?>

				<?php if (function_exists("restaurateur_pagination")) {
							restaurateur_pagination(); 
				} elseif (function_exists("restaurateur_content_nav")) { 
							restaurateur_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( '木有找到', 'restaurateur' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( '对不起，没有找到和您搜索结果相匹配的结果. 请尝试输入其他的关键字.', 'restaurateur' ); ?></p>
						<?php get_search_form(); ?>
                        
                        <p><?php _e('也许下面的链接可能会有帮助~', 'restaurateur'); ?></p>
                        
                        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widget-title"><?php _e( '常用分类', 'restaurateur' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

        </div> <!-- end #main -->

        <?//php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>