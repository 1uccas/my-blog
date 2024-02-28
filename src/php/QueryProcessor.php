<?php 
function queryHomeMyPosts(){
    function takeData($allData){
    	$arrayMounth = ["", "Janeiro", "Fevereiro", "Março", "Abril", "Maio", 
    	"Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

        $data = date("n", strtotime($allData));
        $year = date("Y", strtotime($allData));
        $time = date("H:i", strtotime($allData));

        return array(
	        "month" => $arrayMounth[$data],
	        "year" => $year,
	        "time" => $time
	    );
    }

    require_once 'src/conf/db.php';

    $mysql = new DatabaseConnection();
    $link = $mysql->getLink();

    $sql = "SELECT * FROM my_posts";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row['current_data']; 

            $formatted_data = takeData($data);
            $month = $formatted_data['month'];
            $year = $formatted_data['year'];
            $time = $formatted_data['time'];

            echo "
            <div class='class_time_post'>
            	<h2>$year ~ $month</h2>
        	</div>
            <div class='div_only_post' title='Post in ~ $time'>
                <h3>{$row['title']}</h3> 
                <p>{$row['post']}</p>
            </div>";
        }   
    }
}
?>
