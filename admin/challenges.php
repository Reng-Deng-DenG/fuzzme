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
		<textarea name='description' placeholder='Description'></textarea>
		<input type='text' name='name' placeholder='Name'>
		<input type='url' name='url' placeholder='URL'>

		<select name='challType'>
			<option value='Web'>Web</option>
			<option value='Crypto'>Crypto</option>
			<option value='Reseau'>Réseau</option>
		</select>

		<select name='difficulty'>
			<option value='soEasy'>So easy</option>
			<option value='easy'>Easy</option>
			<option value='medium'>Medium</option>
			<option value='hard'>Hard</option>
		</select>
		<input type='hidden' name='token'>
		<input type='submit' value='OK'>
	</form> 	
</div>


<!---#color: #333 --->
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
