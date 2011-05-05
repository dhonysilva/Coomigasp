<?php get_header(); ?>    
                        
    <div id="centro" class="container_12">   
        <div id="conteudo" class="grid_8">
            <div class="entry">			
		
	    <!-- Start vídeos loop -->
	    <?php $count = 1; ?>
	    <?php if(have_posts()) { ?>
	    
		<h5 class="topico stand"><?php _e('Canal de Vídeos') ?>
		    <span id="video-rss">
			<a href="#" title="Assine RSS do Canal de Vídeos">
			    <img src="<?php bloginfo('template_url'); ?>/img/rss.png" alt="Assine o RSS do Canal de Vídeos" width="20" height="20" />
			</a>
		    </span>
		</h5>
		<div class="entry-meta">
		    <span class="entry-date"></span>
		</div><!-- .entry-meta -->
		
		<div class="cabecalho">
		    <h3>Acompanhe aqui todos os nossos vídeos</h3>
		    <p>Fique por dentro da coberturas de todas as Assembléias, coberturas Jornalísticas e tudo que envolve o Mundo Garimpeiro.</p>
		</div><!-- .entry-meta -->
	    
	    
		    <?php while(have_posts()):the_post(); ?>
			
			<div id="arq-videos" class="grid_4 <?php if($count == 1) { echo "alpha simple-clear"; }else{ if($count == 2){ echo "omega"; $count = 0; } }  ?> ">
			    <div class="entry-date"><?php the_time(__('j \d\e F \d\e Y')) ?> as <strong><?php the_time(__('H:i')) ?></strong></div>
			    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumb_videos');
				} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/img/video-default.png" alt="<?php the_title(); ?>" />
			    <?php } ?>
			    <h2 class="chamadas"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			    <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo excerpt('35'); ?></a></p>
			</div>
			
		    <?php $count++; ?>
		    <?php endwhile; ?>
		    <div class="clear"></div>
		    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<span class="navigation-posts">
			   <?php posts_nav_link(); ?>
			</span>
		    <?php endif; ?>
		
		<?php } else { ?>
		    <h5 class="topico stand"><?php _e('Resultado da Busca','mnmagazine') ?></h5>
		    <div class="entry-meta">
			<p class="mensage"><?php echo $notfound_msg; ?></p>
		    </div><!-- .entry-meta -->
		<?php } ?>
		<!-- End vídeos loop -->
		
		
	    </div><!-- .entry -->      
        
	
	
	
	
	</div><!-- #conteudo -->       
    
    	<?php get_sidebar("video"); ?><!-- Apresenta o Sidebar específico pra essa categoria | sidebar-video.php -->
	
    </div><!-- #centro container_12 -->           
    
<?php get_footer(); ?>