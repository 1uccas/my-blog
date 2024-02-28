<?php
include_once 'src/php/QueryProcessor.php';
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../src/styles/home.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Flip ~ Flops · Home</title>
</head>
<body>
	<header class="header">
		<script src="../../public/utils/header.js"></script>
	</header>
	<main class="main_master">
		<div class="class_post">
			<?php queryHomeMyPosts(); ?>
		</div>
	</main>
	
	
	<script src="../../public/utils/footer.js"></script>
</body>