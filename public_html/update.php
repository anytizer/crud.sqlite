<?php
require_once "../library/database.php";

$crud = new crud();

$message = "";
if( isset($_POST['update']) )
{
	$rid = $_POST['rid'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$result = $crud->students_update($rid, $name, $email);
	if($result)
	{
		$message = "Data is updated successfully.";
	}
	else
	{
		$message = "Sorry, data is not updated.";
	}
}

$rid = $_REQUEST['rid'];

$data = $crud->students_details($rid);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/crud.css">
</head>
<body>
<div class="wrapper">

	<div class="w3-padding"><?php echo $message; ?></div>

	<table class="w3-table w3-bordered">
		<form name="update-data" action="?" method="post" autocomplete="off">
		<input type="hidden" name="rid" value="<?php echo $data['rowid']; ?>">
		<tr>
			<td>Name:</td>
			<td><input name="name" type="text" value="<?php echo $data['name']; ?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input name="email" type="text" value="<?php echo $data['email']; ?>"></td>
		</tr>
		<tr>
			<td><a class="w3-btn w3-blue" href="list.php">List Data</a></td>
			<td><input class="w3-btn w3-blue" name="update" type="submit" value="Update Data"></td>
		</tr>
		</form>
	</table>
</div>
<script type="text/javascript">
window.onload = function(){
	document.forms["update-data"].elements["name"].focus();
};
</script>
</body>
</html>