<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
	<div id="sidebar-home-wrap">
		<div id="sidebar-home" class="widget-area" role="complementary">
			<div id="sidefix" class="clearfix">

			<?php if ( have_posts() ) : ?>
	
			<?php endif; ?>

			 <?php
				// 定义参数数组，get_categories方法里用到order-->按最近的日期显示 desc
				// orderby id,所有的分类目录按照id的大小从左到右排序
				// 单参情况$scat = get_categories('hide_empty=0');
				// $scat = get_categories(array('hide_empty' => 0, 'order' => 'desc', 'orderby' => 'id'));
				// 获得全部,参数hide_empty=1表示如果列表为空则不显示
				// 打印最左边通栏,包括新闻通知id=6和学术活动id=9
					$scat = get_categories(array('hide_empty' => 0, 'order' => 'asc', 'orderby' => 'id', 'include' => '6,9'));
					echo '<div class="ml">';
					foreach ($scat as $mx_cat)
					{
					// 判断是哪一类，cat_ID=6,9 class= mod mc
					// 开始打印分类的名字
					echo '<div id="categories" class="inotice">';

					echo '<div class="widget-title">'. $mx_cat->cat_name;

					echo '<span><a href="';
					echo get_category_link($mx_cat->cat_ID);
					//echo '"></a></span></div>';
					echo '">Read more</a></span></div>';				
					echo '<ul>';

					//对取出的文章，根据发表时间做降序排序
					$recentPosts = new WP_Query(array ( 'orderby' => 'post_date', 'order' => 'ASC' ));
					
					$query_str="cat=".$mx_cat->cat_ID."&showposts=5";

					$recentPosts->query($query_str);

					while ($recentPosts->have_posts()) : $recentPosts->the_post();
					echo '<li>';
					echo '<a href="';
					echo the_permalink();
					echo '" target="_blank"><span>';
					//echo $post->post_modified;		//包含时间
					echo mysql2date('Y-m-j', $post->post_modified);	
					echo '</span>';
					
					echo $post->post_title;
					echo '</a>'; 
					
					echo '</li>';
					endwhile;
					echo '</ul></div>';
					
					}
					echo '</div>';
				?>

				<?php
					// 打印中间通栏,包括科研进展id=7
					$scat = get_categories(array('hide_empty' => 0, 'order' => 'asc', 'orderby' => 'id', 'include' => '7'));
					echo '<div class="mc">';
					foreach ($scat as $mx_cat)
					{
					// 判断是哪一类，cat_ID=6,9 class= mod mc
					// 开始打印分类的名字
					echo '<div id="categories" class="iprogress">';

					echo '<div class="widget-title">'. $mx_cat->cat_name;

					echo '<span><a href="';
					echo get_category_link($mx_cat->cat_ID);
					//echo '"></a></span></div>';
					echo '">Read more</a></span></div>';				
					echo '<ul>';

					//对取出的文章，根据发表时间做降序排序
					$recentPosts = new WP_Query(array ( 'orderby' => 'post_date', 'order' => 'ASC' ));
					
					$query_str="cat=".$mx_cat->cat_ID."&showposts=10";

					$recentPosts->query($query_str);

					while ($recentPosts->have_posts()) : $recentPosts->the_post();
					echo '<li><span>';
					//echo $post->post_modified;		//包含时间
					echo mysql2date('Y-m-j', $post->post_modified);	
					echo '</span><a href="';
					echo the_permalink();
					echo '" target="_blank">';
					echo $post->post_title;
					echo '</a>'; 
					
					echo '</li>';
					endwhile;
					echo '</ul></div>';
					
					}
					echo '</div>';
				?>

				<?php
					// 打印最右边通栏,包括政策法规id=10，友情链接=11
					$scat = get_categories(array('hide_empty' => 0, 'order' => 'asc', 'orderby' => 'id', 'include' => '10,11'));
					echo '<div class="mr">';
					foreach ($scat as $mx_cat)
					{
					// 判断是哪一类，cat_ID=6,9 class= mod mc
					// 开始打印分类的名字
					echo '<div id="categories" class="ilaws">';

					echo '<div class="widget-title">'. $mx_cat->cat_name;

					echo '<span><a href="';
					echo get_category_link($mx_cat->cat_ID);
					//echo '"></a></span></div>';
					echo '">Read more</a></span></div>';				
					echo '<ul>';

					//对取出的文章，根据发表时间做降序排序
					$recentPosts = new WP_Query(array ( 'orderby' => 'post_date', 'order' => 'ASC' ));
					
					$query_str="cat=".$mx_cat->cat_ID."&showposts=5";

					$recentPosts->query($query_str);

					while ($recentPosts->have_posts()) : $recentPosts->the_post();
					echo '<li><span>';
					//echo $post->post_modified;		//包含时间
					echo mysql2date('Y-m-j', $post->post_modified);	
					echo '</span><a href="';
					echo the_permalink();
					echo '" target="_blank">';
					echo $post->post_title;
					echo '</a>'; 
					
					echo '</li>';
					endwhile;
					echo '</ul></div>';
					
					}
					echo '</div>';
				?>
			
			
		</div><!-- #sidebar .widget-area -->
     </div>
