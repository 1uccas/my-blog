<?php 
include_once 'src/php/QueryProcessor/QueryProcessor.php';
if (isset($url[1])) {
	$fullDate = ($url[1]."-".$url[2]."-".$url[3]);

	$Querys = QueryPostID($fullDate);
	$Post = $Querys['post'];
	$title = $Querys['title_to_post'];
	$content = $Querys['content_type'];
} else {
	include 'src/pages/not-found.html';
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../src/styles/post.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title><?php echo $title; ?></title>
</head>
<body>
	<header class="header">
		<script src="../../public/utils/header.js"></script>
	</header>
	<main class="main_master">
		<?php echo($content) ?>
	</main>
	
	<script src="../../public/utils/footer.js"></script>
</body>
</html>