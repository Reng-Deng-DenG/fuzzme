<?php session_start();
ini_set('display_errors', '1');
include('config.php');

if(isset($_SESSION['email']) && isset($_SESSION['username']))
{
	header('Location: '.$uri.'/index.php');
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>
<body>

<h1> Login </h1>

<div class='login'>
	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method='POST'>
		<label> Email </label>
			<input type='email' name='email'><br>
		<label> Password </label>
			<input type='password' name='password'><br>
			<input type='submit' name='submit'>
	</form>

<?php

include('db/db.php');

?>
</div>

</body>
</html>
