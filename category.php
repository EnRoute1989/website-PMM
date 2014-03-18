<?php get_header(); ?>

    <div id="content" class="clearfix">
        <!--  Add gallery to the head -->
      	<div id="main" class="clearfix sldr" role="main">
		
        	<img src="http://bbs.nankai.edu.cn/data/user/img/group.jpg" >
            
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
					<h2><?php
						printf( __( ' %s', 'restaurateur' ), '<span class="colortxt">' . single_cat_title( '', false ) . '</span>' );
					?></h2>
					<?php while ( have_posts() ) : the_post(); ?>
					    <div class="news">
							<ul><?php get_template_part( 'content-new', 'page' ); ?> </li>
						</div>
						
					<?php endwhile; // end of the loop. ?>
					<?php restaurateur_pagination($range = 2); ?>
			   </div>

		   </div>
        </div> <!-- end #main -->

        <?//php get_sidebar("home"); // sidebar 1 ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>