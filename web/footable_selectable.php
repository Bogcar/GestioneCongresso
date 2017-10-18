<!DOCTYPE html>
<html lang="it">

<head>
	<?php
  define("DEEPNESS",'');
  require DEEPNESS."inc/database.php";
  require DEEPNESS."inc/head.php";
	$GLOBALS['page'] = "_blank";
   ?>
</head>

<body>
	<?php require DEEPNESS."inc/topbar.php"; ?>
	<?php require DEEPNESS."inc/leftnavigation.php"; ?>
	<!--main content start-->
	<section class="main-content container">
		<!--page header start-->
		<div class="page-header">

		</div>
		<!--page header end-->
		<!--start page content-->
		<div class="panel panel-default collapsed col-md-5">
			<div class="panel-heading">
				Ordina - Cerca
			</div>
			<div class="panel-body">
				<?php $connection=Database::getConnection(); ?>
				<input type="text" class="form-control margin-b-10 input-sm" id="filter" placeholder="Search in table">
				<?php if($result=$connection->query("select name, surname,sex from partecipants")) : ?>
				<table class="footable table table-hover" data-page-size="10" data-filter=#filter>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Cognome</th>
							<th>Sesso</th>
						</tr>
					</thead>
					<tbody id="table-list">
						<?php while ($row = $result->fetch_array(MYSQLI_NUM)): ?>
						<tr class="gradeX">
							<td><?php echo $row[0] ?></td>
							<td><?php echo $row[1] ?></td>
							<td><?php echo $row[2] ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
					<tfoot>
						<tr class="no-activable">
							<td colspan="5">
								<ul class="pagination pull-right"></ul>
							</td>
						</tr>
					</tfoot>
				</table>
			<?php endif; ?>
			</div>
		</div>
		<div class="col-md-2 col-arrows">
			<a id="ttl"><i class="fa fa-arrow-left"></i></a>
			<br><br>
			<a id="ttr"><i class="fa fa-arrow-right"></i></a>
		</div>
		<div class="panel panel-default collapsed col-md-5">
			<div class="col-sm-12">
				<fieldset class="jquery-Ui-fieldset">
					<label for="simple-button">
						<div>
                                <small class="pull-right" id="max_person">5/10 Persone</small>
                            </div>
					</label>
						<?php if ($result = $connection->query("select number from rooms;")):?>
							<select name="simple" id="simple" style="display: none;">
								<?php while ($row = $result->fetch_array(MYSQLI_NUM)): ?>
									<option><?php echo $row[0] ?></option>
			                <?php endwhile; ?>
			                <?php endif; ?>
	                		</select>
							<br>
					<div class="progress progress-mini margin-t-20">
                        <div style="width: 50%;" class="progress-bar"></div>
                    </div>
				</fieldset>
			</div>
			<table class="footable2 table table-hover" data-page-size="5" data-filter=#filter>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Sesso</th>
					</tr>
				</thead>
				<tbody id="table-active">
				</tbody>
				<tfoot>
					<tr class="no-activable">
						<td colspan="5">
							<ul class="pagination pull-right"></ul>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
		<!--end page content-->
		<?php require DEEPNESS."inc/footer.php"; ?>
	</section>
	<!--end main content-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<?php require DEEPNESS."inc/foot.php"; ?>

<script>

	var room = "101";

	function ajax_getRoomInfo(){
		$.ajax({
		type: "POST",
		url: "rooms/getRooms.php",
		datatype: "json",
		cache: false,
		data: {'room': room},
		success: function(datas) {
			console.log(datas);
			var all_data = $.parseJSON(datas);
			$("#max_person").text("5/"+all_data[2]+" Persone");
		  }
	  });
	}

	function ajax_getPartecipants(){
		$.ajax({
		type: "POST",
		url: "rooms/getPartecipants.php",
		datatype: "json",
		cache: false,
		data: {'room': room},
		success: function(datas) {
			console.log(datas);
			var all_data = $.parseJSON(datas);
			for (var i = 0; i < all_data.length; i++) {
				$("#table-active").appendTo('<tr class="gradeX"><td>Trident 2</td></tr>');
			}
		  }
	  });
	}

	function ajax_controlRoom(){
		$.ajax({
		type: "POST",
		url: "rooms/controlRoom.php",
		datatype: "json",
		cache: false,
		data: {'room': room},
		success: function(datas) {
			console.log(datas);
			var all_data = $.parseJSON(datas);
			for (var i = 0; i < all_data.length; i++) {
				$("#table-active").appendTo('<tr class="gradeX"><td>Trident 2</td></tr>');
			}
		  }
	  });
	}

	$(function() {
		$("#simple").selectmenu();
	});
	$(document).ready(function() {
		$('.footable').footable();
		$('.footable2').footable();

		$( "#simple" ).on( "selectmenuchange", function( event, ui ) {
			room = ui.item.label;
			ajax_getRoomInfo();
		} );
	});
	$("#table-list").on( "click", "tr", function() {
		if (!$(this).hasClass("no-activable")) {
			$(this).toggleClass("table-list-tr-active");
		}
	});
	$("#table-active").on( "click", "tr", function() {
		if (!$(this).hasClass("no-activable")) {
			$(this).toggleClass("table-active-tr-active");
		}
	});
	$("#ttr").click(function(){
		$(".table-list-tr-active").clone().appendTo("#table-active").removeClass("table-list-tr-active");
		$(".table-list-tr-active").remove();
		$('.footable').footable();
		$('.footable2').footable();
	});
	$("#ttl").click(function(){
		$(".table-active-tr-active").clone().appendTo("#table-list").removeClass("table-active-tr-active");
		$(".table-active-tr-active").remove();
		$('.footable').footable();
		$('.footable2').footable();
	});
	</script>
</body>

</html>
