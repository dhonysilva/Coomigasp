<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name') ?></title>
	
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	
    
    
	<link rel="shortcut icon" href="<?php echo get_option('nt_favicon'); ?>" type="image/x-icon" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- jQuery -->
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>	
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js" type="text/javascript"></script>
	<!-- Onde estão armazenaos os efeitos de slider -->
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-fotos.js" type="text/javascript"></script>
	
	<?php wp_head(); ?>
</head>
<body>

	<div class="container_12">                
	
		<div id="header">
			   
			<h1><a href="<?php bloginfo('url') ?>" title="Coomigasp">Coomigasp - Cooperativa Mineral dos Garimpeiros de Serra Pelada</a></h1>
			
			<div class="busca">
				<form action="<?php bloginfo('url'); ?>" method="get" id="search">						
					<input type="text" name="s" value="Digite para buscar" onfocus="if (this.value == 'Digite para buscar') this.value = '';" onblur="if (this.value == '') {this.value = 'Digite para buscar';}" />
					<input class="go" type="submit" name="search" value="Buscar" />
				</form>	
			</div>			
			
		</div><!-- #header -->
		<div class="clear"></div>
		
		<?php wp_nav_menu(array('menu_id' => 'nav')); ?>
		
		<div class="clear"></div>
		
		
		<!-- Slider com imagens em destaque no topo do site alimentado por thumbnails do CTP Slider -->
		<div id="slider">
			<ul>
			<?php $slider = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => 3 ) );
			while ( $slider->have_posts() ) : $slider->the_post(); ?>
				<li><?php the_post_thumbnail('thumb_slider'); ?></li>
			<?php endwhile; ?>
			</ul>
		</div><!-- #slider -->

		
	</div><!-- container_12 -->