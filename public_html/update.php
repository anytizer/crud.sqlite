<?php
require_once "../library/database.php";

$crud = new crud();

$message = "";
if( isset($_POST['update']) )
{
	$rid = $_POST['rid'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	if($crud->students_update($rid, $name, $email))
	{
		$message = "Data is updated successfully.";
	}
	else
	{
		$message = "Sorry, Data is not updated.";
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

		<div><?php echo $message; ?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="?" method="post" autocomplete="off">
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
				<td><a class="w3-btn w3-blue" href="list.php">Back</a></td>
				<td><input class="w3-btn w3-blue" name="update" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>