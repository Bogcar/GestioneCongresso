<!DOCTYPE html>
<html lang="it">
	
<head>
  <?php
  	define('DEEPNESS', '../');
   	require DEEPNESS."inc/head.php";
	require DEEPNESS."inc/database.php";
	$GLOBALS['page'] = "staff";
   ?>
</head>
<body>
	<?php require DEEPNESS."inc/topbar.php"; ?>
    <?php require DEEPNESS."inc/leftnavigation.php"; ?>
  <!--main content start-->
  <section class="main-content container">
    <!--start page content-->
	<div class="panel panel-default collapsed">
		<div class="panel-heading">
            <?php echo STAFF_TITLE ?>
        </div>
		<div class="panel-body">
			<input type="text" class="form-control margin-b-10 input-sm" id="filter"  placeholder="Search in table">
			<?php
				$connection=Database::getConnection();
				if($result=$connection->query("select id, name, surname, sex, email, telephone, state from counselors")) :
			?>
    		<table class="footable table table-hover" data-page-size="100" data-filter=#filter>
        <thead>
        <tr>
            <th><?php echo STAFF_ID ?></th>
            <th><?php echo STAFF_NAME ?></th>
            <th><?php echo STAFF_SURNAME ?></th>
            <th><?php echo STAFF_SEX ?></th>
            <th data-hide="phone, tablet"><?php echo STAFF_MAIL ?></th>
            <th><?php echo STAFF_PHONE ?></th>
            <th><?php echo STAFF_STATE ?></th>
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
