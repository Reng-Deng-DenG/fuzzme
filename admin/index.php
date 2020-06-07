<?php session_start();
include('../config.php');

if(!isset($_SESSION['email']) && !isset($_SESSION['username']))
{
	header('Location: '.$uri.'/login.php');
	exit();
}
elseif(!isset($_SESSION['rank']));
{
	header('Location: '.$uri.'/admin/login.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | Admin Panel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

</body>
</html>
