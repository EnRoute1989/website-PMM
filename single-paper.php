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
			   <?php if('post' == get_post_type()){?>
					<?php while ( have_posts() ) : the_post(); ?>
						<h2>	
						<?php
							$category = get_the_category();   //默认获取当前分类ID
							echo $category[0]->cat_name;    //使用$categories->cat_name不能获得正确值,应该$categories[0]->cat_name才能正确工作。
						?>	
						</h2>
						<?php get_template_part( 'content', 'single' ); ?>
				 	<?php endwhile; // end of the loop. ?>
				<?php } ?>
				
				<?php if('paper' == get_post_type()){?>
				<h2><?php the_title()?>&nbsp;简介</h2>
					<?php
					//$args = array(
					//	'post_type'=>'team_members', //调用文章类型为book
						//'showposts'=>10,
					//);
					//query_posts($args);
					//if( have_posts() ) : while( have_posts() ) : the_post();
					//echo the_title();
					
					//echo '<p>';
					//echo types_render_field( "wpcf-projects",array("output"=>"raw") );
					//echo  ;
					$title = types_render_field( "title", array("output"=>"html") );
					if($title != null){
						echo $title;
					}
				    
					$author = types_render_field( "author", array("output"=>"html") );
					if($author != null){
						echo '<p>'; 
						echo '作者:</p>';
						?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'restaurateur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_author();?></a>
						
						<?
					}
					
					//echo '<p>联系方式:</p>';
					echo types_render_field( "telephone",array("output"=>"html","show_name"=>true) );

					//echo '<p>E-mail:</p>';
					echo types_render_field( "e-mail",array("output"=>"html","show_name"=>true) );

					//echo '<p>学习和工作经历:</p>';
					$experience = types_render_field( "experience",array("output"=>"html") );
					if($experience != null){
						echo '<p>学习和工作经历:</p>';
						echo $experience;
					}

					//echo '<p>研究方向:</p>';
					$topics = types_render_field( "research-things",array("output"=>"html") );
					if($topics != null){
						echo '<p>研究方向:</p>';
						echo $topics;
					}
					
					
					$projects = types_render_field( "projects",array("output"=>"html") );
					if($projects != null){
						echo '<p>承担项目:</p>';
						echo $projects;
					}
					
					$outcome = types_render_field( "research-outcome",array("output"=>"html") );
					if($outcome != null){
						echo '<p>科研成果:</p>';
						echo $outcome;
					}
					
					//$papers = types_render_field( "paper",array("output"=>"html") );
					//if($papers != null){
					//	echo '<p>发表论文:</p>';
					//	echo $papers;
					//}
					$child_posts = types_child_posts('paper');
					if($child_posts != null){
						echo '<p>发表论文:</p>';
				
						foreach ((array)$child_posts as $child_post) {
						  //echo $child_post->post_title;
						  echo $child_post->fields['title'];
						  echo ",&nbsp;";
						  foreach ((array)$child_post->fields['author'] as $child_post_author) {
							  echo $child_post_author;
							  echo ",&nbsp;";
						  }
						  echo $child_post->fields['journal'];
						  echo $child_post->fields['publication_time'];


						  echo '<br />';
						}
					}

}


					?>

					
				 <?php //echo the_meta(); 
					

?>
				 

					
					<?php 
					//endwhile;endif;
				//}
				?>
			   </div>

		   </div>
        </div> <!-- end #main -->

        <?//php get_sidebar("home"); // sidebar 1 ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>