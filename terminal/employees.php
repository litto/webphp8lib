<?php 
include("header.php"); 
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>Datatables</title>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/datatables/css/editor.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
	<script type="text/javascript" language="javascript" src="../assets/datatables/js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	editor = new $.fn.dataTable.Editor( {
		"ajax": "../controllers/employees.php",
		"table": "#example",
		"fields": [ {
				"label": "First name:",
				"name": "first_name"
			}, {
				"label": "Last name:",
				"name": "last_name"
			}, {
				"label": "Position:",
				"name": "position"
			}, {
				"label": "Office:",
				"name": "office"
			}, {
				"label": "Extension:",
				"name": "extn"
			}, {
				"label": "Start date:",
				"name": "start_date",
				"type": "datetime"
			}, {
				"label": "Salary:",
				"name": "salary"
			}
		]
	} );

	$('#example').DataTable( {
		dom: "Bfrtip",
		ajax: {
			url: "../controllers/employees.php",
			type: "POST"
		},
		serverSide: true,
		columns: [
			{ data: "first_name" },
			{ data: "last_name" },
			{ data: "position" },
			{ data: "office" },
			{ data: "extn" },
			{ data: "start_date" },
			{ data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
		],
		select: true,
		buttons: [
			{ extend: "create", editor: editor },
			{ extend: "edit",   editor: editor },
			{ extend: "remove", editor: editor }
		]
	} );
} );



	</script>
</head>
<body class="dt-example php">
	<div class="container">
		<section>
			<h1>Editor example <span>Server-side processing</span></h1>

			<div class="demo-html">
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>First name</th>
							<th>Last name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Extn</th>
							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>First name</th>
							<th>Last name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Extn</th>

							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</tfoot>
				</table>
			</div>

		</section>
	</div>
</body>
</html>