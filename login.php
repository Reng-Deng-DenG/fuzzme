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
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Please login</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <input type="submit" class="btn btn-success" name="submit" value="Success" >
  </form>
	<br><a href='register.php'>Create a account</a>
</div>

</body>
</html>

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

	if($data == true)// Vérification de l'email
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
