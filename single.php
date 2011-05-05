<?php get_header(); ?>    

<div id="centro" class="container_12">
    
    <div id="conteudo" class="grid_8">

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
	
     <?php }else{ ?>
    
	    <?php 
	    $notfound_msg = get_option('nt_text_not_found'); 
	    if(empty($notfound_msg)): $notfound_msg = "Sorry, no records were found."; endif;							
	    ?>
	    <p class="mensage"><?php echo $notfound_msg; ?></p>
	
    <?php } ?>
	</div><!-- .entry -->  

    </div><!-- #conteudo -->
    
    
    <?php if(in_category('5')) { 
	get_sidebar("video"); 
    } else {
	    get_sidebar(); 
    } ?>
    
</div><!-- #centro container_12 --> 	 
             
    
<?php get_footer(); ?>