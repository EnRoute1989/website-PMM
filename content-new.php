<li><span><?php echo mysql2date('Y-m-j', $post->post_modified);?></span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'restaurateur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>

</li>