<?php 
include_once 'src/php/QueryProcessor/QueryProcessor.php';
if (isset($url[1])) {
	$id = $url[1];
	QueryPostID($id);
} else {
	include 'src/pages/not-found.html';
	die("Status ~> 404");
}



?>