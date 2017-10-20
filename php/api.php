<?php  
	// $page = $_POST['page'];
	$json = file_get_contents("http://api.dataoke.com/index.php?r=Port/index&type=paoliang&appkey=6vj196du5m&v=2");
	echo $json;
?>