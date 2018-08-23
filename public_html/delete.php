<?php
require_once "../library/database.php";

$rid = 0;
if(!empty($_GET["rid"]))
{
	$rid = (int)$_GET["rid"];
}

$crud = new crud();
$result = $crud->students_delete($rid);

if($result)
{
	$message = "Record is deleted successfully.";
}
else
{
	$message = "Sorry, Record is not deleted.";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Data</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/crud.css">
</head>
<body>
	<div class="wrapper">
		<div class="w3-padding"><?php echo $message; ?></div>
		<div><a class="w3-btn w3-blue" href="list.php">Back to List</a></div>
	</div>
</body>
</html>
