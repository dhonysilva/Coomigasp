<?php if(have_posts()){ the_post(); ?>                    
    
    <h5 class="topico stand">Destaque</h5>
    
	<div class="entry-meta">
		<span class="entry-date">em <?php the_time(__('j \d\e F \d\e Y')) ?> as <strong><?php the_time(__('H:i')) ?></strong></span>
	</div><!-- .entry-meta -->
      
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
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