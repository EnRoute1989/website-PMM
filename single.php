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
				<?php if('research_team' == get_post_type()){?>
				<h2>研究团队</h2>
				
					<?php
					$args = array(
						'post_type'=>'member', //调用文章类型为member
						//'showposts'=>10,
					);
					query_posts($args);
					if( have_posts() ) : while( have_posts() ) : the_post();
					//echo the_title();


					?>
					
					<div class="member-table">
					<li class="twocols"><h3><?php the_title(); ?><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'restaurateur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">点击查看简介..</a> </h3>&nbsp;</li></div>
					<?php 
					endwhile;endif;
				}
				?>
				
				<?php if('achievement' == get_post_type()){?>	
					<?php 
						//simpleYearlyArchive('yearly','','', 'paper');	
						//simpleYearlyArchive('yearly','','', 'patent');	
					?> 
				   
					<div class="publication_table" id="publication_table">
						<ul id="publication_type">
							<li class="active"> <span id="paper-tab" >发表论文</span></li>
							<li> <span id="patent-tab">发表专利</span></li>
						</ul>
						
					</div>
					<!--
				    <aside id="archives">	 -->
						<!--<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;" >
						  <option value=""><?php echo esc_attr( __( '按年份筛选' ) ); ?></option> 
						  <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 0 ) ); ?>
						</select>  	<br />	 -->
						<?php //wp_get_archives( array( 'type' => 'yearly' ) );
						 ?>
					<!-- </aside>  -->
					
					<?php
					 $args = array(
						'post_type'=>'paper'
					);
					query_posts($args);
					?>
					<div id="paper-content">
					<?php //while ( have_posts() ) : the_post(); ?>
						<?php //get_template_part( 'archive', 'single' );
							if (function_exists('simpleYearlyArchive')) {
								simpleYearlyArchive('yearly','','', 'paper');
							}
						?>
					<?php //endwhile; // end of the loop. ?>
				    </div>
					
					 
					 <?php 
					 $args = array(
							'post_type'=>'patent'
						);
						query_posts($args);
						?>
						<div id="patent-content" class="disactive">
						<?php //while ( have_posts() ) : the_post(); ?>
							<?php //get_template_part( 'archive', 'single' ); 
								if (function_exists('simpleYearlyArchive')) {
									simpleYearlyArchive('yearly','','', 'patent');
								}
							?>
						<?php //endwhile; // end of the loop. ?>
						</div>
				    </div>
					<?php } ?>
		   </div>
        </div> <!-- end #main -->

        <?//php get_sidebar("home"); // sidebar 1 ?>

    </div> <!-- end #content -->
    <script type="text/javascript">
		 jQuery(document).ready(function(){
			jQuery("#publication_type li span").click(function(){
				//jQuery("#paper-tab").toggleClass("active");
				var tab_id = jQuery(this).attr("id");
				if(tab_id == "paper-tab"){
					jQuery("#paper-content,#paper-content").removeClass("disactive");
					//jQuery("#paper-tab").addClass("active");
					jQuery("#patent-content").addClass("disactive");
				}else{
					jQuery("#patent-content,#paper-content").removeClass("disactive");
					jQuery("#paper-content").addClass("disactive");
					
					//jQuery("#patent-tab").addClass("active");
				}
				//alert(temp);  
				// jQuery("#patent-tab").toggle();
				// alert("click");
			});

		 });

	</script>
<?php get_footer(); ?>