<div id="sidebar" class="grid_4">
	    
	    <!-- Inserindo widgets -->
	    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Lateral do Canal de Videos') ) :?>
		<div class="widget">
			<h2>Widgets</h2>
		    Configure your Widgets in Wordpress from the Appearance menu > Widgets > Sidebar Area
		</div>
	    <?php endif; ?>
	    
	    
	    
	    <h3 class="topicwidget">outros vídeos</h3>
		    
	    <div id="galleryvideos">
		<ul id="galleria">
		<?php $galeriavideos = get_posts('category_name=videos&posts_per_page=5'); ?>
		    <?php $count = 1; ?>
		    <?php foreach($galeriavideos as $post) :  setup_postdata($post);
			$v = get_post_meta($post->ID, '_tern_wp_youtube_video', true); ?>
		    <?php $a = array(
			'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $v .'/hqdefault.jpg',
			'player' => '<object width="280" height="240">
					<param name="movie" value="http://www.youtube.com/v/'. $v .'"></param>
					<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/'. $v .'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="280" height="240"></embed>
				    </object>',
			);
		    ?>
		    <li class="thumb-video">
			<a href="<?php the_permalink(); ?>" class="video-thumbnail" title="<?php the_title(); ?>">
			    <img src="<?php echo $a['thumbnail'] ?>" alt="<?php the_title(); ?>" width="70" /></a>			
			</a>
			<h2 class="chamada-video"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
		    </li>
		    <?php endforeach; ?>
		    
		</ul>
		
		<span id="vermais">
		    <a href="#" title="Veja todos os nossos vídeos" class="mais-videos">mais vídeos<span class="icon"></span></a>
		</span>
	    </div>
	    
	    <!-- Widget -> Últimas Notícias (a ser criado) -->
	    <h3 class="topicwidget">últimas notícias</h3>
	    <ul class="last-news">     	
	    <?php $newswidget = get_posts('category_name=noticias&posts_per_page=4'); ?>
	    <?php foreach($newswidget as $post) :  setup_postdata($post); ?>
			<li>
				    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    <?php if ( has_post_thumbnail() ) {
				    the_post_thumbnail('thumb_news');
				    } else { ?>
				    <img src="<?php bloginfo('template_directory'); ?>/img/thumb-newswidget.png" alt="<?php the_title(); ?>" />
				    <?php } ?>
				    </a>
				    <div class="text">
						<div class="meta">
							    em <?php the_time('d.m.y') ?> &nbsp; | &nbsp; <img src="<?php bloginfo('template_directory'); ?>/images/ico_comments.png" /> as <strong><?php the_time(__('H:i')) ?></strong>
						</div>
						<h2 class="chamada-video"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				    </div>
			</li>
	    <?php endforeach; ?>
	    </ul>
	    
</div><!-- sidebar -->
<div class="clear"></div>