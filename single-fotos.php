<?php get_header(); ?>    

<div id="centro" class="container_12">
    
    <div id="conteudo" class="grid_12">

    <?php if(have_posts()){ the_post(); ?>
	<div class="entry">
	    <div class="entry-meta">
		    <span class="entry-date">em <?php the_time(__('j \d\e F \d\e Y')) ?></span>
	    </div><!-- .entry-meta -->
	    <h2 class="entry-title"><?php the_title(); ?></h2>
	    
	    <div class="dados">
		    <span class="meta-sep">por </span><span class="author"><?php the_author(); ?></span>
		    <span class="email"><a href="#" title="enviar essa notícia por email">enviar por email</a></span>
		    <span class="imprimir"><a href="#" title="imprimir notícia">imprimir</a></span>
	    </div><!-- .dados -->
	    
	    <?php the_content(); ?>
	    
	    <p>Retornando o campo personalizado: <?php echo get_post_meta($post->ID, 'valor_meta', true); ?></p>
     <?php }else{ ?>
    
	    <?php 
	    $notfound_msg = get_option('nt_text_not_found'); 
	    if(empty($notfound_msg)): $notfound_msg = "Sorry, no records were found."; endif;							
	    ?>
	    <p class="mensage"><?php echo $notfound_msg; ?></p>
	
    <?php } ?>
	</div><!-- .entry -->
	
	
	<h5 class="topico stand">Outras Galerias</h5>
	<!-- Start loop do CTP fotos-->
	
	
	<?php $count = 1; ?>
	<?php $newsArgs = array( 'post_type' => 'fotos', 'posts_per_page' => 6, 'orderby' => 'rand');                  
			       
	    $GaleriasLoop = new WP_Query( $newsArgs );                  
	    		       
	    while ( $GaleriasLoop->have_posts() ) : $GaleriasLoop->the_post();              ?>
	    <ul class="list-noticias">
	    <li class="grid_2 <?php if($count == 1) { echo "alpha simple-clear"; }else{ if($count == 4){ echo "omega"; $count = 0; } }  ?> ">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb_post'); ?></a>
		<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="mais">veja as fotos<span class="seta"> </span></a> 
	    </li>
	    </ul>
	    <?php $count++; ?>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
    
	   
	<!-- End loop do CTP fotos -->

    </div><!-- #conteudo -->
    <?php // get_sidebar(); ?>
    <div class="clear"></div>
</div><!-- #centro container_12 --> 	 
             
    
<?php get_footer(); ?>