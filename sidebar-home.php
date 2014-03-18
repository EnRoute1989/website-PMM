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
				$scat = get_categories(array('hide_empty' => 0, 'order' => 'asc', 'orderby' => 'id'));
				foreach ($scat as $mx_cat)
				{
			
				// 判断是哪一类，cat_ID=6,7,10,11 class=inotice, cat_ID=9,class="iprogress"
				// 开始打印分类的名字

				echo '<aside id="categories" class="inotice">';

				echo '<div class="widget-title">'. $mx_cat->cat_name;

				echo '<span><a href="';
				echo get_category_link($mx_cat->cat_ID);
				//echo '"></a></span></div>';
				echo '">Read more..</a></span></div>';				
				echo '<ul>';

				//对取出的文章，根据发表时间做降序排序
				$recentPosts = new WP_Query(array ( 'orderby' => 'post_date', 'order' => 'ASC' ));
				
				// showposts=n,表示最多显示n篇文章，科研进展10篇，其余5篇
				//if ($mx_cat->cat_ID==7)
					//$query_str="cat=".$mx_cat->cat_ID."&showposts=10";
				//else 
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
				echo '</ul></aside>';
				}
						
				?>
			
			
		</div><!-- #sidebar .widget-area -->
     </div>
