<?php get_header(); ?>                    

    <div id="centro" class="container_12">
        <div id="conteudo" class="grid_8">
            <div class="entry">
		<?php get_template_part('noticia-destaque'); ?>
            </div><!-- .entry -->
            
            <h5 class="topico stand">Notícias Anteriores</h5>
	    
	    <!-- Start loop do CTP fotos-->
	    
	    
	    <?php $count = 1; ?>
	    <?php $newsArgs = array( 'category_name=noticias', 'posts_per_page' => 4);                  
				   
		$GaleriasLoop = new WP_Query( $newsArgs );                  
				   
		while ( $GaleriasLoop->have_posts() ) : $GaleriasLoop->the_post(); ?>
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
	    <div class="clear"></div>
	   
	<!-- End loop do CTP fotos -->
	    
	    <?php // get_template_part('loop'); ?>
	    
	    <hr class="page post" />
	    <h3 class="widget">Galerias</h3>
	    <div id="fotos" class="grid_5 alpha">
		
		<ul>
		    <?php $b = array( 'post_type' => 'fotos', 'posts_per_page' => 3);                  				   
		    $FotosLoop = new WP_Query( $b );                  				   
		    while ( $FotosLoop->have_posts() ) : $FotosLoop->the_post(); ?>
		    <li>
			 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb_fotos'); ?></a>
			 <div class="fundo"><!--  --></div>
			 <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		    </li>
		    <?php endwhile; ?>
		    <?php wp_reset_query(); ?>
		</ul>
		
		<div class="controles">
		    <a href="#" class="prev">anterior</a>
		    <a href="#" class="prox">próximo</a>
		</div>
		
	    </div>
	    
	    <!-- Álbum de Fotos em Destaque -->
	    <?php $albumdestaque = new WP_Query( array(
						       'post_type' => 'fotos',
						       'taxonomy' => 'category',
						       'field' => 'slug',
						       'category_name' => 'album-destaque',
						       'posts_per_page'=> 1
						       ) );                  	    		       
	    while ( $albumdestaque->have_posts() ) : $albumdestaque->the_post(); ?>
	    <div id="album-destaque" class="grid_3 omega">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb_fotodestaque'); ?></a>
		<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="mais">ver +</a>
	    </div>
	    <?php endwhile; ?>
	    <?php wp_reset_query(); ?>
	    
	    <div class="clear"></div>
            <hr class="page post" />
	    
	    <!-- Informativo Serra Pelada -->
	    <div id="info-sp">
		<a href="" title="Informativo Serra Pelada, Ed 5">
		    <img src="<?php bloginfo('template_directory'); ?>/images/info-serrapalada.jpg" alt="Informativo Serra Pelada, Ed 5" />
		</a>
	    </div>
	    
            <hr class="page post" />
            
        </div><!-- #conteudo -->
        
        <?php get_sidebar(); ?>
        
    </div><!-- #centro container_12 -->
    
<?php get_footer(); ?>