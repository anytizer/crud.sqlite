<?php
require_once "../library/database.php";

$message = "";
if( isset($_POST['insert']) ){
	$name = $_POST['name'];
	$email = $_POST['email'];

	$crud = new crud();
	$result = $crud->students_insert($name, $email);

	if($result)
	{
		$message = "Data is inserted successfully.";
	}
	else
	{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/crud.css">
</head>
<body>
	<div class="wrapper">

		<div class="w3-padding"><?php echo $message; ?></div>

		<table class="w3-table w3-bordered">
			<form name="insert-data" action="insert.php" method="post" autocomplete="off">
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text" value=""></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text" value=""></td>
			</tr>
			<tr>
				<td><a class="w3-btn w3-blue" href="list.php">See Data</a></td>
				<td><input class="w3-btn w3-blue" name="insert" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
<script type="text/javascript">
window.onload = function(){
	document.forms["insert-data"].elements["name"].focus();
};
</script>
</body>
</html>