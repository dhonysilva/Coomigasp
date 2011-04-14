<?php get_header(); ?>    
                        
    <div id="content" class="container_16">
    
        <div class="grid_11">
            <h2 class="entry-title font-render"><?php single_cat_title(); ?></h2>			
			<?php get_template_part('loop'); ?>        
        </div>       
    
    	<?php get_sidebar(); ?>  
    
    </div>          
    
<?php get_footer(); ?>