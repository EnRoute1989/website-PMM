<?php get_header(); ?>

    <div id="content" class="clearfix">
        <!--  Add gallery to the head -->
      	<div id="main" class="clearfix sldr" role="main">
		
        	<img src="wp-content/themes/restaurateur/library/images/group.jpg" >
            
           	<!--  Start showing content below = right + left-->

		   <div class="main">
				<!--  Start sidebar--page content -- left  -->
				 <div class="left">
					<ul>
						 <?//php wp_list_pages('title_li='); //��ʾȫ��ҳ��id?>
						 <ul>
							  <?php
							  //echo $post->post_title;
							  //wp_list_pages('title_li=&child_of='.$post->ID); 
							  ?>
						  </ul>
					 <div class="list" >
					 <?php
						  // ʵ�ָù��ܵĹؼ����жϵ�ǰ�򿪵�ҳ���Ƿ�Ϊ����ҳ�����ҳ�� 	
						  // ��ӡÿҳ������ĵ�����Ϣ�����Ƕ���ҳ�����ҳ��
						  if($post->post_parent)
						  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
						  else
						  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
						  if ($children) { ?>
						  <ul>
							<?php echo $children; ?>
						  </ul>
					  <?php } ?>
					  </div>
						 <?//php wp_list_categories(); //��ʾȫ������Ŀ¼��id?>
					</ul>

				 </div>
				<!--  Start sidebar--page content --right  -->
			   <div class="right">
					<?php while ( have_posts() ) : the_post(); ?>
						<h2><?php echo get_the_title($post->post_parent); ?>  </h2>
						<?php get_template_part( 'content', 'page' ); ?>

					<?php endwhile; // end of the loop. ?>
			   </div>

		   </div>
        </div> <!-- end #main -->

        <?//php get_sidebar("home"); // sidebar 1 ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>