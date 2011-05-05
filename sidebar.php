<div id="sidebar" class="grid_4">    	    
	    
	    <!-- Inserindo widgets -->
	    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Lateral da HOME') ) :?>
	    <?php endif; ?>
	    
	    
	    <h3 class="topicwidget">vídeos</h3>
	    <div id="galleryvideos">
		<ul id="galleria">
		<?php $galeriavideos = get_posts('category_name=videos&posts_per_page=3'); ?>
		    <?php $count = 1; ?>
		    <?php foreach($galeriavideos as $post) :  setup_postdata($post);
			$v = get_post_meta($post->ID, '_tern_wp_youtube_video', true); ?>
		    <?php $a = array(
			'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $v .'/hqdefault.jpg',
			
				    
			'player' => '<object width="280" height="240">
					<param name="movie" value="http://www.youtube.com/v/'. $v .'"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/'. $v .'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="280" height="240"></embed>
				    </object>',
			);
		    ?>
		    <li class="<?php if($count == 1) { echo "player-video"; }else{ echo "thumb-video"; }  ?>">
			<?php if($count == 1) { ?>
			    <?php echo $a['player'] ?>
			    <h2 class="chamada-video"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			    <?php } else { ?>
			<a href="<?php the_permalink(); ?>" class="video-thumbnail" title="<?php the_title(); ?>">
			    <img src="<?php echo $a['thumbnail'] ?>" alt="<?php the_title(); ?>" width="70" /></a>			
			</a>
			<h2 class="chamada-video"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php } ?>
		    </li>
		    <?php $count++; ?>
		    <?php endforeach; ?>
		    
		</ul>
		
		<span id="vermais">
		    <a href="#" title="Veja todos os nossos vídeos" class="mais-videos">mais vídeos<span class="icon"></span></a>
		</span>
	    </div>
	    
	    <h3 class="topicwidget">delegacias regionais</h3>
	    <object type="application/x-shockwave-flash" data="<?php bloginfo('template_directory'); ?>/images/mapa.swf" width="300" height="372">
		<param name="movie" value="<?php bloginfo('template_directory'); ?>/images/mapa.swf" />
		<param name="wmode" value="" />
	    </object>
  
</div><!-- sidebar -->
<div class="clear"></div>