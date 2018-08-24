<?php
require_once "../library/database.php";

$crud = new crud();
$records = $crud->students_list();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data List</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/crud.css">
</head>
<body>
<div class="wrapper">
	<div class="w3-padding"><a class="w3-btn w3-blue" href="insert.php">Add New</a></div>
	<table class="w3-table w3-bordered">
		<thead class="w3-black">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($records as $record){?>
			<tr>
				<td><?php echo $record['name']; ?></td>
				<td><?php echo $record['email']; ?></td>
				<td>
					<a class="w3-btn w3-blue" href="update.php?rid=<?php echo $record['rowid']; ?>">Edit</a> 
					<a class="w3-btn w3-red"  href="delete.php?rid=<?php echo $record['rowid']; ?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script>
	function ask(rid=0)
	{
		value = confirm("Are you sure to delete this record?");
		return value;
	}

	/**
	 * Attach on-delete
	 */
	as = document.getElementsByTagName("a");
	var length = as.length;
	for(var i=0; i<length; ++i)
	{
		if(as[i].href.match(/delete/g))
		{
			as[i].onclick = ask;
		}
	}
</script>
</body>
</html>