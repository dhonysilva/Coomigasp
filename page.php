<?php get_header(); ?>    

<div id="centro" class="container_12">
    
    <div id="conteudo" class="grid_8">

    <?php if(have_posts()){ the_post(); ?>
	<div class="entry">
	    <div class="entry-meta">
		    <span class="entry-date"></span>
	    </div><!-- .entry-meta -->
	    <h2 class="entry-title"><?php the_title(); ?></h2>
	    
	    <hr class="page post" />
	    
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
    <?php get_sidebar(); ?>
</div><!-- #centro container_12 --> 	 
             
    
<?php get_footer(); ?>