<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">

	<div id="search-box-wrap">
        <div id="search-box">
           <div id="close-x"><?php _e( 'x', 'restaurateur' ); ?></div>
           <?php get_search_form(); ?>
        </div>
    </div>

	<header id="branding" role="banner">
      <div id="inner-header" class="clearfix">
		<div id="site-heading">
			<?php if ( get_theme_mod( 'restaurateur_logo' ) ) : ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'restaurateur_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
            <?php else : ?>
			<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
			
		</div>
        
        <div class="change_language">
       	           
			<div id="search-icon"></div>
			
			<!--Add the language selector, 4 parameters: default-> text; dropdown, image , both-->
			<div class="qtrans_language" ><?php echo qtrans_generateLanguageSelectCode('text'); ?>  </div>
		 
	    </div>
      	  </div>
        <nav id="access" role="navigation">
            <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'restaurateur' ); ?></h1>	
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'restaurateur' ); ?>"><?php _e( 'Skip to content', 'restaurateur' ); ?></a></div>
            <?php restaurateur_main_nav(); // Adjust using Menus in Wordpress Admin ?>
        </nav><!-- #access -->
      
	</header><!-- #branding -->
