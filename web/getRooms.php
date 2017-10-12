<?php
	include '../inc/database.php';
    $connection = Database::getConnection();

    $rows = array();

    $room = mysqli_real_escape_string($connection, $_GET['room']);

    $query = "select number, level, places from rooms where number = ".$room.";";

    $result=$connection->query($query);

    while(($row =  mysqli_fetch_assoc($result))) {
    	$rows[] = $row;
	}

  	print json_encode($rows);
?>