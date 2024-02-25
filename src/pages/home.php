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