<?php
/*
Loop template
*/
?>

<?php 
	$notfound_msg = get_option('nt_text_not_found'); 
	if(empty($notfound_msg)): $notfound_msg = "Desculpe, mas não encontramos nenhum resultado. Tente novamente com outra palavra."; endif;
?>

<?php if(is_home()){ ?>
	


	<?php $count = 1; ?>
	<?php $news = array( "category_name=noticias&showposts=4");                  
			       
	    $maisnoticias = new WP_Query( $news );                  
	    		       
	    while ( $maisnoticias->have_posts() ) : $maisnoticias->the_post(); ?>
	    <ul class="list-noticias">
	    <li class="grid_2 <?php if($count == 1) { echo "alpha simple-clear"; }else{ if($count == 4){ echo "omega"; $count = 0; } }  ?> ">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('thumb_post');
		} else { ?>
		<img src="<?php bloginfo('template_directory'); ?>/images/thumb-default.jpg" alt="<?php the_title(); ?>" />
		<?php } ?>
		</a>
		<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="mais">leia mais<span class="seta"> </span></a> 
	    </li>
	    </ul>
	    <?php $count++; ?>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>

    <!-- Start home loop -->
    
	
    
        
        
    <!-- End home loop -->


    
<?php } else { ?>	
	
	<?php if(is_search()){ ?>
    
    	<!-- Start search loop -->
        <?php if(have_posts()){ ?>
            <h5 class="topico stand"><?php _e('Resultado da Busca','mnmagazine') ?></h5>
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
        <!-- End search loop -->

        
    <?php }else{ ?>
    
        <!-- Start general loop -->
        <?php if(have_posts()){ ?>
            
            <?php while(have_posts()):the_post(); ?>
            <div <?php post_class();?>>
                <a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb_post'); ?></a>
                <span><?php the_time('d.m.y') ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="meta"><?php the_time('d.m.y') ?> . <?php the_category(); ?> . <?php comments_number('0','1','%') ?> <a href="<?php comments_link(); ?>"><?php _e('Comments'); ?></a></div>
                <a href="<?php the_permalink(); ?>"><?php echo excerpt(30); ?></a>
                 <p class="tags"><?php the_tags(); ?></p> 
                <span class="clear"><!-- clear --></span>
            </div>     
            <?php endwhile; ?>
            
            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                <div class="navigation-posts">
                   <?php posts_nav_link(); ?>
                </div>
            <?php endif; ?>
        
        <?php } else { ?>
            <p class="mensage"><?php echo $notfound_msg; ?></p>
        <?php } ?>
        <!-- End general loop -->
        
    <?php } ?>   
    
<?php } ?> 