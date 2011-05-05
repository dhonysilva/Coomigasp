	    <h3 class="widget">vídeos</h3>
	    <div id="galleryvideos">
		<div id="thumbs" class="navigator">
		    <a href="#" class="pageLink prev replace"></a>
			<ul class="thumb-videos">
			    <?php $galeriavideos = get_posts('category_name=videos&posts_per_page=4'); ?>
			    <?php foreach($galeriavideos as $post) :  setup_postdata($post);
				$v = get_post_meta($post->ID, '_tern_wp_youtube_video', true); ?>
			    <?php
			    $a = array(
				'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $v .'/hqdefault.jpg',
				);
			    ?>
				<li>
				    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img src="<?php echo $a['thumbnail'] ?>" alt="" width="70" /></a>			
				    </a>
				</li>
			    <?php endforeach; ?>
			</ul>
		    <a href="#" class="pageLink next replace"></a>
		</div><!-- end #thumbs .navigation -->   
		<div class="selected-feature">
		    <?php $galeriavideos = get_posts('category_name=videos&posts_per_page=4'); ?>
		    <?php foreach($galeriavideos as $post) : setup_postdata( $post );
		    $v = get_post_meta($post->ID, '_tern_wp_youtube_video', true);
		    ?>
		      
		      <?php
			$a = array(
			    'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $v .'/hqdefault.jpg',
			    'player' => '<object width="280" height="240">
					    <param name="movie" value="http://www.youtube.com/v/'. $v .'"></param>
					    <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
					    <embed src="http://www.youtube.com/v/'. $v .'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="280" height="240"></embed>
					</object>',
			    'url' => $url
			);
		      ?>
		    
			<div>
			    <?php echo $a['player'] ?>
			    <h4><a title="<?php the_title() ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h4>
			</div>
		    <?php endforeach; ?>
		</div>
	    </div> <!-- end #galleryvideos --> 