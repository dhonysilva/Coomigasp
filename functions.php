<?php
// Thumbnails Support
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails
    add_image_size( 'thumb_slider', 960, 280, true ); // Thumbnails do Slider Superior a ser usado no CTP Slider
    add_image_size( 'thumb_post', 140, 100, true );
    add_image_size( 'thumb_news', 70, 50, true ); // Thumbnails da Widget de Útimas Notícias
    add_image_size( 'thumb_fotos', 380, 250, true ); // Thumbnails de Chamada do Slider de Fotos
    add_image_size( 'thumb_videos', 300, 130, true ); // Thumbnails do arquivo de Categoria de Vídeos category-videos.php
    add_image_size( 'thumb_fotodestaque', 200, 140, true ); // Thumbnails do álbum de fotos em Destaque
}

// Menu Support
add_theme_support('menus');

// Excerpt Limit
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).' ...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}

// Register Sidebar
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Lateral da HOME',
'before_widget' => '<div class="sidebar-box">',
'after_widget' => '</div>',
'before_title' => '<h3 class="topicwidget">',
'after_title' => '</h3>',
));

// Register Sidebar
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Lateral do Canal de Videos',
'before_widget' => '<div class="sidebar-box">',
'after_widget' => '</div>',
'before_title' => '<h3 class="topicwidget">',
'after_title' => '</h3>',
));

// FOTOS custom content type
function coomigasp_post_type_fotos() {
	
	$labels = array(
		'name' => _x('Fotos', 'post type general name'),
		'singular_name' => _x('Foto', 'post type singular name'),
		'add_new' => _x('Adicionar nova Galeria', 'portfolio item'),
		'add_new_item' => __('Adiconar novo item em Galerias'),
		'edit_item' => __('Editar Galeria'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('Ver Galeria'),
		'search_items' => __('Procurar itens'),
		'not_found' =>  __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_position' => 5,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'fotos', 'with_front' => false ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'register_meta_box_cb' => 'fotos_meta_box', 
		'supports' => array('title','editor','thumbnail')
	  );
		
	register_post_type('fotos', $args );  
	register_taxonomy_for_object_type('category', 'fotos');  
}
add_action('init', 'coomigasp_post_type_fotos');

function fotos_meta_box(){        
        add_meta_box('meta_box_test', __('Meta Box'), 'meta_box_meta_test', 'fotos', 'advanced', 'core');
}

function meta_box_meta_test(){
    global $post;
    $metaBoxValor = get_post_meta($post->ID, 'valor_meta', true);
?>
    <label for="inputValorMeta">Fotos: </label>
    <label for="inputValorMeta">Data: </label>
    <input type="text" name="valor_meta" id="inputValorMeta" value="<?php echo $metaBoxValor; ?>" />
<?php
    }
add_action('save_post', 'save_fotos_post');
    function save_fotos_post(){
	global $post;
	    update_post_meta($post->ID, 'valor_meta', $_POST['valor_meta']);
    }



// Custom Post do Slider Superior
$labels_slider = array(
	'name' => _x('Slider', 'post type general name'),
	'singular_name' => _x('Slider', 'post type singular name'),
	'add_new' => _x('Adicionar Novo', 'Slider'),
	'add_new_item' => __('Adicionar nova imagem no Slider'),
	'edit_item' => __('Editar Slider'),
	'new_item' => __('Nova imagem no Slider'),
	'view_item' => __('Ver Slider'),
	'search_items' => __('Procurar Slider'),
	'not_found' =>  __('Não encontramos Slider'),
	'not_found_in_trash' => __('Não encontramos Slider na lixeira'), 
	'parent_item_colon' => ''
);
$args_slider = array(
	'labels' => $labels_slider,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'menu_position' => 10,
	'supports' => array('title','thumbnail')
);
 
register_post_type('slider', $args_slider);


// Read more: http: www.nerdhead.com.br/como-criar-um-cabecalho-com-imagens-randomicas-no-wordpress/


//Widget Galeria de Vídeos
include_once (TEMPLATEPATH."/gallery-videos.php");



?>