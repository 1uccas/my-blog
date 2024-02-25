<?php 

$url = (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT) : "home");
//var_dump($url);


$url = array_filter(explode('/', $url));
//print_r($url);

$arquivo = 'src/pages/'.$url[0].'.php';
//var_dump("<br>".$arquivo);

if (is_file($arquivo)) {
	include $arquivo;
}else{
	include 'src/pages/not-found.html';
}


?>