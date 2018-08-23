<?php
require_once "../library/database.php";

$message = ""; // initial message 
if( isset($_POST['insert']) ){
	$name = $_POST['name'];
	$email = $_POST['email'];

	$crud = new crud();
	$result = $crud->students_insert($name, $email);

	if($result){
		$message = "Data is inserted successfully.";
	}else{
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

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="post" autocomplete="on">
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text"></td>
			</tr>
			<tr>
				<td><a class="w3-btn w3-blue" href="list.php">See Data</a></td>
				<td><input class="w3-btn w3-blue" name="insert" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>