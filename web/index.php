<!DOCTYPE html>
<html lang="it">

<head>
  <?php
  	define('DEEPNESS', '../');
   	require DEEPNESS."inc/head.php";
	require DEEPNESS."inc/database.php";
	$GLOBALS['page'] = "list";
   ?>
</head>
<body>
  <?php require "../inc/topbar.php"; ?>
  <?php require "../inc/leftnavigation.php"; ?>
  <!--main content start-->
  <section class="main-content container">
    <!--start page content-->
	<div class="panel panel-default collapsed">
		<div class="panel-heading">
            Ordina - Filtra - Cerca
        </div>
		<div class="panel-body">
			<input type="text" class="form-control margin-b-10 input-sm" id="filter"  placeholder="Search in table">
			<?php
		
				$connection=Database::getConnection();

				if($result=$connection->query("select eticket, name, surname, sex, email, country, telephone, date_birth, parents_telephone from partecipants")
				
				) :
			?>
    		<table class="footable table table-hover" data-page-size="100" data-filter=#filter>
        <thead>
        <tr>
            <th>E-Ticket</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Sesso</th>
            <th data-hide="phone, tablet">E-Mail</th>
            <th data-hide="phone, tablet">Paese</th>
            <th>Telefono</th>
            <th data-hide="phone, tablet">Data di nascita</th>
            <th data-hide="phone, tablet">Telefono tutori</th>
        </tr>
        </thead>
        <tbody>

		<?php while ($row = $result->fetch_array(MYSQLI_NUM)): ?>

	        <tr class="gradeX">

				<td ><?php echo $row[0] ?></td>
				<td ><?php echo $row[1] ?></td>
				<td ><?php echo $row[2] ?></td>
				<td ><?php echo $row[3] ?></td>
				<td ><?php echo $row[4] ?></td>
				<td ><?php echo $row[5] ?></td>
				<td ><?php echo $row[6] ?></td>
				<td ><?php echo $row[7] ?></td>
				<td ><?php echo $row[8] ?></td>
	        </tr>

			<?php endwhile; ?>

		</tbody>
        <tfoot>
        <tr>
            <td colspan="5">
                <ul class="pagination pull-right"></ul>
            </td>
        </tr>
        </tfoot>
    </table>
	<?php endif; ?>
		</div>
	</div>
	<!--end page content-->
    <?php require DEEPNESS."inc/footer.php"; ?>
  </section>
  <!--end main content-->
  <?php require DEEPNESS."inc/foot.php"; ?>
  <script>
		$(document).ready(function() {
			$('.footable').footable();
			$('.footable2').footable();
		});
	</script>
</body>
</html>
