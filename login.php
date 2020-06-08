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


$email = $_POST['email'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$submit = $_POST['submit'];

if(isset($email) && !empty($email) && isset($password) && !empty($password) && isset($submit))
{
	$r = $db->prepare('SELECT * FROM users WHERE email = ?');
	$r->execute([$email]);
	$data = $r->fetch();

	if($data === true)// Vérification de l'email
	{
		if(sha1($password) === $data['password'])
		{
			try
			{
				$r = $db->prepare("UPDATE `users` SET ip = '$ip' WHERE email = '$email'");
			}
			catch(PDOException $e)
			{
                echo 'Error "<i>'.$e->getMessage().'</i></br>';
                exit();
            }

            $_SESSION['email'] = $data['email'];
            $_SESSION['username'] = $data['username'];
	    $_SESSION['token'] = $token = random_int(100000000, 10000000000000000) * 7 ;
            header('Location: '.$uri.'/index.php');
            exit();
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
