<?php
require_once 'src/conf/db.php';

$mysql = new DatabaseConnection();
$link = $mysql->getLink();

$sql = "SELECT * FROM my_posts";
$result = $link->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		print_r($row);
		echo "<br>";
	}
	
	
}
echo "Home";

?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog</title>
</head>
<body>

</body>