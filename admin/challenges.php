<?php session_start();
include('../config.php');

/*var_dump($_SESSION);

if($_SESSION['rank'] != 1)
{
	header('Location: '.$uri.'/admin/login.php');
	exit();
}
elseif(!isset($_SESSION['email']) && !isset($_SESSION['username']))
{
	header('Location: '.$uri.'/login.php');
	exit();
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Challenges | Admin Panel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/body.css">
</head>
<body>

<div class='AddChallenge'>
	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method='POST'>
		<label>Name</label><br>
			<input type='text' name='name' class='name' size='20'><br>
		<label>Url</label><br>
			<input type='url' name='url' class='url' size='20'><br>
		<label>Description</label><br>
			<textarea name='description' class='description' rows='5' cols='60'></textarea><br>

		<label>Category</label>
		<select name='type'>
			<option value='Web'>Web</option>
			<option value='Crypto'>Crypto</option>
			<option value='Network'>Network</option>
		</select>

		<label>Difficulty</label>
		<select name='difficulty'>
			<option value='Very-Easy'>Very Easy</option>
			<option value='Easy'>Easy</option>
			<option value='Medium'>Medium</option>
			<option value='Hard'>Hard</option>
		</select>

		<label>Points</label>
			<input type='number' name='points' size='10'>
			<input type='hidden' name='token' value='test'><br>
			<input type='submit' name='addChall' value='Add'>
	</form>

<?php

$challName = $_POST['name'];
$challUrl = $_POST['url'];
$challDescription = $_POST['description'];
$challType = $_POST['type'];
$challDifficulty = $_POST['difficulty'];
$challPoints = $_POST['points'];
$token = $_POST['token'];
$submit = $_POST['addChall'];


if(isset($challName) && !empty($challName) && isset($challUrl) && !empty($challUrl) && isset($challDescription) && !empty($challDescription) && isset($challType) && !empty($challType) && isset($challDifficulty) && !empty($challDifficulty) && isset($token) && !empty($token) && isset($challPoints) && !empty($challPoints) && isset($submit))
{
	
	if($_SESSION['token'] === $token)
	{
		if($challType === 'Web' || $challType === 'Crypto' || $challType === 'Network')
		{
			if($challDifficulty === 'Very-Easy' || $challDifficulty === 'Easy' || $challDifficulty === 'Medium' || $challDifficulty === 'Hard')
			{
				if(is_numeric($challPoints))
				{	
					try
					{
						$r = $db->prepare('INSERT INTO `challenges` (name, type, url, difficulty, description, points) VALUES (:name, :type, :url, :difficulty, :description, :points)');
						$r->bindParam(':name', $challName);
						$r->bindParam(':type', $challType);
						$r->bindParam(':url', $challUrl);
						$r->bindParam(':difficulty', $challDifficulty);
						$r->bindParam(':description', $challDescription);
						$r->bindParam(':points', $challPoints);
						$r->execute();
					}
					catch(PDOException $e)
					{
                		echo 'Error <i>'.$e->getMessage().'</i></br>';
                		exit();
            		}

            		echo '<br><i>Challenge create with success ... </i>';

				}
				else
				{
					echo '<br><i>Challenge points must be numeric !</i>';
				}
			}
			else
			{
				echo '<br><i>Invalid difficulty !</i>';
			}
		}
		else
		{
			echo '<br><i>Invalid challenge category ! </i>';
		}
	}
	else
	{
		echo '<br><i>CSRF token invalid !</i>';
	}
}



?>


</div>

<!--------Tableaux-------->

<div class='tableChall'>
<table>
	<thead>
   		<tr>
      		<th>ID</th>
      		<th>Name</th>
      		<th>Description</th>
      		<th>Type</th>
      		<th>Difficulty</th>
      		<th>Points</th>
      		<th>URL</th>
      		<th>Edit</th>
      		<th>Delete</th>
   		</tr>
   	</thead>
   	<tbody>
   		<tr>
      		<td>1</td>
      		<td>Il n'y a pas que la séléction</td>
      		<td> Retrouvé(e) le flag</td>
      		<td>Web</td>
      		<td>Medium</td>
      		<td>50</td>
      		<td>http://fuzzme.org/chall/ch1/</td>
      		<td><button>?</button></td>
      		<td><button>x</button>
   		</tr>
   	</tbody>
</table>
</div>
</body>
</html>
