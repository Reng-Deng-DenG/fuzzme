<?php session_start();
include('config.php');

if(!isset($_SESSION['email']) && !isset($_SESSION['username']))
{
	header('Location: '.$uri.'/login.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
</head>
<body>

<?php
include('includes/header.php');
echo '<h1> TEST </h1>';
echo htmlspecialchars($_SESSION['email']);
echo '<br>';
echo htmlspecialchars($_SESSION['username']);

htmlspecialchars(var_dump($_SESSION));

?>

</body>
</html>
