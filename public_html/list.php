<?php
require_once "../library/database.php";

$crud = new crud();
$students = $crud->students_list();
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
			<?php foreach($students as $student){?>
			<tr>
				<td><?php echo $student['name']; ?></td>
				<td><?php echo $student['email']; ?></td>
				<td>
					<a class="w3-btn w3-blue" href="update.php?rid=<?php echo $student['rowid']; ?>">Edit</a> 
					<a class="w3-btn w3-red"  href="delete.php?rid=<?php echo $student['rowid']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</body>
</html>