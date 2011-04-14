<div id="sidebar" class="grid_4">
    
            
	    <h3 class="widget">vídeos</h3>
	    <!-- Chama o arquivo que tem toda a apresentação da galeria de vídes -->
	    <?php // get_template_part('player-videos'); ?>
	    	    
            
	    
	    <h3 class="widget">personalidades</h3>
	    
	    <!-- Inserindo widgets -->
	    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) :?>
		<div class="widget">
			<h3 class="widget">Widgets</h3>
		    Configure your Widgets in Wordpress from the Appearance menu > Widgets > Sidebar Area
		</div>
	    <?php endif; ?>
            
</div><!-- sidebar -->
<div class="clear"></div>
