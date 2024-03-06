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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title></title>
	<title></title>
</head>
<body>

</body>
</html>