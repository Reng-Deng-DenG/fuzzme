<?php session_start();
include('config.php');

if(isset($_SESSION['email']) && isset($_SESSION['username']))
{
	header('Location: '.$uri.'/login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>
<body>

<div class='register'>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
		<label>Username</label>
			<input type='text' name='username'><br>
		<label>Mail</label>
			<input type='mail' name='email'><br>
		<label>Password</label>
			<input type='password' name='password'><br>
		<label> Confirm Password</label>
			<input type='password' name='cpassword'><br>
			<input type='submit' name='submit' value='register'><br>
	</form>

</div>
<?php
ini_set('display_errors', '1');
include('db/db.php');
include('config.php');


$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$referer = $_SERVER['HTTP_REFERER'];
$ip = $_SERVER['REMOTE_ADDR'];


if(isset($username) && !empty($username) && isset($password) && !empty($password) && isset($email) && !empty($email))
{
	if(strlen($username) > 3  && strlen($username) < 25)// Vérification que l'username et entre 4 et 24 caractères
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE)// Vérification d'une address mail valide
		{
			if($password === $cpassword)// Vérification que les mots de passes correpondes
			{
				if(strlen($password) >= 8)// Vérification que que le mot de passe est supérieur à 8 caractères
				{
					if(strlen($email) < 60)// SQL path truncation protection
					{
						$r = $db->prepare('SELECT email FROM users WHERE email = ?');
						$r->execute([$email]);
						$emailExist = $r->rowCount();

						if($emailExist === 0)// Vérification que l'address mail n'existe pas
						{	
							try
							{
								$r = $db->prepare("INSERT INTO `users` (username, password, email, ip, referer, userAgent, points, rank) VALUES (:username, :password, :email, :ip, :userAgent, :referer, 0, 0)");

								$r->bindParam(':username', $username);
								$r->bindParam(':password', sha1($password));
								$r->BindParam(':email', $email);
								$r->BindParam(':ip', $ip);
								$r->BindParam(':userAgent', $user_agent);
								$r->BindParam(':referer', $referer);
								$r->execute();
							}
							catch(PDOException $e)
							{
                					echo "Erreur : " . $e->getMessage();
                					exit();
            				}

            				header('Location: '.$uri.'/login.php');
            				exit();
            			}
						else
						{
							echo '<br><i>Address email already exist ! </i>';
						}
					}
					else
					{
						echo '<br><i>Address mail incorrect ! </i>';
					}
				}
				else
				{
					echo '<br><i>Password must contain at least 8 characters ! </i>';
				}
			}
			else
			{
				echo '<br><i> Password doesn\'t match</i>';
			}
		}
		else
		{
			echo '<br><i>Address mail incorrect !</i>';
		}
	}
	else
	{
		echo '<br><i>Username must be enter 4 and 24 !s</i> ';
	}
}

?>

</body>
</html>
