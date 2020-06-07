<html>
<head>
	<title>Ton titre</title>
	<meta charset='utf-8'>
	<link rel='stylesheet' href='css/body.css'>
</head>
<body>
	<form method='post'>
	Username : <input type='text' name='username' placeholder='Username'><br>
	Subject : <input type='text' name='sujet' placeholder='Sujet...'><br>
	<p>Message :</p> <textarea rows='4' cols='50' name='message' type='text' form='usrform'>Message...</textarea><br>
	<br>
	<input type='submit' value='Send'>
	</form>
</body>
</html>

<?php
ini_set('display_errors', '1');
if (isset($_POST['username']) && isset($_POST['sujet']) && isset($_POST['message'])) {
	// code
     
}
?>
