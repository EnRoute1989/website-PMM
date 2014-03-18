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
				// ����������飬get_categories�������õ�order-->�������������ʾ desc
				// orderby id,���еķ���Ŀ¼����id�Ĵ�С����������
				// �������$scat = get_categories('hide_empty=0');
				// $scat = get_categories(array('hide_empty' => 0, 'order' => 'desc', 'orderby' => 'id'));
				// ���ȫ��,����hide_empty=1��ʾ����б�Ϊ������ʾ
				$scat = get_categories(array('hide_empty' => 0, 'order' => 'asc', 'orderby' => 'id'));
				foreach ($scat as $mx_cat)
				{
			
				// �ж�����һ�࣬cat_ID=6,7,10,11 class=inotice, cat_ID=9,class="iprogress"
				// ��ʼ��ӡ���������

				echo '<aside id="categories" class="inotice">';

				echo '<div class="widget-title">'. $mx_cat->cat_name;

				echo '<span><a href="';
				echo get_category_link($mx_cat->cat_ID);
				//echo '"></a></span></div>';
				echo '">Read more..</a></span></div>';				
				echo '<ul>';

				//��ȡ�������£����ݷ���ʱ������������
				$recentPosts = new WP_Query(array ( 'orderby' => 'post_date', 'order' => 'ASC' ));
				
				// showposts=n,��ʾ�����ʾnƪ���£����н�չ10ƪ������5ƪ
				//if ($mx_cat->cat_ID==7)
					//$query_str="cat=".$mx_cat->cat_ID."&showposts=10";
				//else 
					$query_str="cat=".$mx_cat->cat_ID."&showposts=5";

				$recentPosts->query($query_str);

				while ($recentPosts->have_posts()) : $recentPosts->the_post();
				echo '<li><span>';
				//echo $post->post_modified;		//����ʱ��
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
