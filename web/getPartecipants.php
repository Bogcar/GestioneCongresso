<?php
	include '../inc/database.php';
    $connection = Database::getConnection();
    $room = mysqli_real_escape_string($connection, $_POST['room']);

    $query = "select id_partecipant from occupation where id_room = ".$room;

    $result = mysqli_query($connection, $query);

    $rows =  mysqli_fetch_row($result);

  	print json_encode($rows);
?>
