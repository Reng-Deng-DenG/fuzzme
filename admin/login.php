<!DOCTYPE html>
<html>
<head>
	<title>Admin Area</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1> Admin panel </h1>

<div class='login'>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
		<label> Username </label>
			<input type='text' name='username'><br>
		<label> Password</label>
			<input type='password' name='password'><br>
			<input type='submit' name='submit' value='login'>
	</form>

<?php
include('../db/db.php');

ini_set('display_errors', '1');

$password = sha1($_POST['password']);
$username = $_POST['username'];
$submit = $_POST['submit'];

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$referer = $_SERVER['HTTP_REFERER'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($password) && !empty($password) && isset($username) && !empty($username) && isset($submit) && !empty($submit) && $submit === 'login')
{


	$r = $db->prepare('SELECT username,password FROM users WHERE username = :username and password = :password');
	$r->bindParam(':username', $username);
	$r->bindParam(':password', $password);
	$r->execute();
	$userExist = $r->rowCount();

	if($userExist > 0)
	{
		$r = $db->prepare('SELECT rank,username FROM users WHERE username = :username');
		$r->bindParam(':username', $username);
		$r->execute();
		$data = $r->fetchAll();

		var_dump($data);
	}
	else
	{
		echo '<br><i>Incorrect credential</i>';
	}
}

?>
</div>

</body>
</html>
