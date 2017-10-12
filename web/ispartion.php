<?php
  	include '../inc/database.php';
    $connection = Database::getConnection();
    if(isset($_POST['search'])) :
        $room = mysqli_real_escape_string($connection, $_POST['room']);
       
       if($result=$connection->query("select number, level, places from rooms where number = ".$room.";")) : ?>

       <TABLE border='1'>
                <TR>
                    <TH>Number</TH>
                    <TH>Level</TH>
                    <TH>Places</TH>
                </TR>
                <?php while ($row = $result->fetch_array(MYSQLI_NUM)): ?>
                    <TR>
                        <TD><?php echo $row[0] ?></TD>
                        <TD><?php echo $row[1] ?></TD>
                        <TD><?php echo $row[2] ?></TD>
                    </TR>
                <?php endwhile; ?>
        </TABLE>
        <?php endif; ?>
    <?php endif; ?>
<html>
<head>
</head>
<body>
 <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<div class="form-group">
		<label for="password">Stanza</label>
		<div class="group-icon">
		<input id="password" type="text" placeholder="Stanza" name="room" class="form-control">
		<span class="icon-lock text-muted icon-input"></span>
	</div>
	<input type="submit" class="btn btn-block btn-primary" value="Cerca" name="search">
</form>
</div>
</div>
</body>
</html>