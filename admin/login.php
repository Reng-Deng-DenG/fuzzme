<?php session_start();
include('../config.php');

if(!isset($_SESSION['email']) && !isset($_SESSION['username']))
{
	header('Location: '.$uri.'/login.php');
	exit();
}


?>
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
		<label> Address Mail </label>
			<input type='email' name='email'><br>
		<label> Password</label>
			<input type='password' name='password'><br>
			<input type='submit' name='submit' value='login'>
	</form>

<?php
include('../db/db.php');

ini_set('display_errors', '1');

$password = $_POST['password'];
$email = $_POST['email'];
$submit = $_POST['submit'];

if(isset($password) && !empty($password) && isset($email) && !empty($email) && isset($submit) && !empty($submit) && $submit === 'login')// Vérification des champs
{


	$r = $db->prepare('SELECT * FROM users WHERE email = ?');
	$r->execute([$email]);
	$data  = $r->fetch();

	if($data == true)// Vérification de l'email
	{

		if(sha1($password) === $data['password'])// Vérification du mot de passe
		{
			if($data['rank'] > 0)// Vérification du rank
			{	
				
				session_unset();
				$_SESSION['email'] = $data['email'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['rank'] = $data['rank'];
				$_SESSION['token'] = $token = random_int(100000000, 10000000000000000) * 7 ;
				header('Location: '.$uri.'/admin/index.php');//Redirection vers l'index du panel
				exit();
			}
			else
			{
				echo '<br><i> Access denied ! </i>';
			}
		}
		else
		{
			echo '<br><i> Email or password incorect !</i>';
		}

	}
	else
	{
		echo '<br><i> Email or password incorect !</i>';
	}

}

?>
</div>

</body>
</html>
