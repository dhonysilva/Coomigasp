<?php get_header(); ?>    
                        
    <div id="centro" class="container_12">   
        <div id="conteudo" class="grid_8">
            <div class="entry">			
		
		<?php// get_template_part('loop'); ?>
		
		<!-- Start vídeos loop -->
        <?php if(have_posts()){ ?>
            <h5 class="topico stand"><?php echo get_category_parents($cat, FALSE, ''); ?></h5>
	    <div class="entry-meta">
		<span class="entry-date"></span>
	    </div><!-- .entry-meta -->
	    
	    
            <?php while(have_posts()):the_post(); ?>
	    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php if(get_the_post_thumbnail()){ ?>
		<div class="grid_2 alpha">
		    <a href="<?php the_permalink(); ?>">
		    <?php the_post_thumbnail('thumb_post'); $next_grid = "grid_6 omega"; ?>
		    </a>
		</div>
		<?php }else{
			$next_grid = "grid_8 alpha omega";
		} ?>
		<div class="<?php echo $next_grid; ?>">
		    <div class="entry-date"><?php the_time('d.m.y') ?></div>
		    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo excerpt('35'); ?></a></p>
		    <p class="tags"><?php the_tags(); ?></p>
		</div>
		<div class="clear"><!-- clear --></div>
	    </div><!-- End classe do post -->
	    <?php endwhile; ?>
	    
            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                <div class="navigation-posts">
                   <?php posts_nav_link(); ?>
                </div>
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
    
    	<?php get_sidebar(); ?>  
    
    </div><!-- #centro container_12 -->           
    
<?php get_footer(); ?>