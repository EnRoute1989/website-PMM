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
				  <div class="list" >
					 <?php wp_list_categories('hide_empty=0'); //显示全部分类目录?>
				  </div>
				</ul>

				 </div>
				<!--  Start sidebar--page content --right  -->
			   <div class="right">
					<?php while ( have_posts() ) : the_post(); ?>
					<h2>	
						<?php
							$category = get_the_category();   //默认获取当前分类ID
							echo $category[0]->cat_name;    //使用$categories->cat_name不能获得正确值,应该$categories[0]->cat_name才能正确工作。
						?>	
					</h2>
						<?php get_template_part( 'content', 'single' ); ?>

					<?php endwhile; // end of the loop. ?>
			   </div>

		   </div>
        </div> <!-- end #main -->

        <?//php get_sidebar("home"); // sidebar 1 ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>