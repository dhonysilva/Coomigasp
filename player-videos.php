<?php
// Seu usuário do YouTube
$usuario = 'playproducoes2010';

// URL do Feed RSS de vídeos de um usuário
$youTube_UserFeedURL = 'http://gdata.youtube.com/feeds/base/users/%s/uploads?orderby=updated&v=2&max-results=3';

// Usa cURL para pegar o XML do feed
$cURL = curl_init(sprintf($youTube_UserFeedURL, $usuario));
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
$resultado = curl_exec($cURL);
curl_close($cURL);

// Inicia o parseamento do XML com o SimpleXML
$xml = new SimpleXMLElement($resultado);

$videos = array();

// Passa por todos vídeos no RSS
foreach ($xml->entry AS $video) {
    $url = (string)$video->link['href'];

    // Quebra a URL do vídeo para pegar o ID
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    $id = $params['v'];

    // Monta um array com os dados do vídeo
    $videos[] = array(
        'id' => $id,
        'titulo' => (string)$video->title,
        'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg',
        'player' => '<object width="280" height="240">
                        <param name="movie" value="http://www.youtube.com/v/'. $id .'"></param>
                        <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
                        <embed src="http://www.youtube.com/v/'. $id .'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="280" height="240"></embed>
                    </object>',
        'url' => $url
    );
}

?>
    

    <div id="channel">
	<ul class="list-videos">
	    <?php $count = 1; ?>
	    <?php foreach ($videos AS $video) { ?>
	    <li class="<?php if($count == 1) { echo "player-object"; }else{ echo "thumb"; }  ?>"><?php if($count == 1) { ?>
		<?php echo $video['player'] ?>
		    <h4 class="chamada-video"><a href="<?php echo $video['url'] ?>" title="<?php echo $video['titulo'] ?>"><?php echo $video['titulo'] ?></a></h4>
		<?php } else { ?>
		    <a href="<?php echo $video['url'] ?>" title="<?php echo $video['titulo'] ?>">
		    <img src="<?php echo $video['thumbnail'] ?>" alt="<?php echo $video['titulo'] ?>" width="70" /></a>
		    <div id="text">
			<h4 class="video-thumb"><a href="<?php echo $video['url'] ?>" title="<?php echo $video['titulo'] ?>"><?php echo $video['titulo'] ?></a></h4>
		    </div>
		<?php } ?>
	    </li>
	    <?php $count++; ?>
	    <?php } ?>
	</ul>
	<div>
            <a href="#" title="Oi" class="mais-videos">mais vídeos<span class="seta"> </span></a>
        </div>
    </div>