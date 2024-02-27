<?php
function queryMyPosts(){
	require_once 'src/conf/db.php';

	$mysql = new DatabaseConnection();
	$link = $mysql->getLink();

	$sql = "SELECT * FROM my_posts";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "
				<h3>$row[title]</h3>
				<p>$row[post]</p>
				";
				
		}	
	}
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../src/styles/home.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Flip ~ Flops · Home</title>
</head>
<body>
	<script src="../../public/utils/header.js"></script>
	<div class="class_post">
		<?php queryMyPosts(); ?>
	</div>
	
	<script src="../../public/utils/footer.js"></script>
</body>