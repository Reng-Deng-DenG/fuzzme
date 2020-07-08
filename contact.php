<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Contact</h2>
  <h4>Please fill in all the fields</h4>  
  <form>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username">
    </div>
    <div class="form-group">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject">
    </div>
  </form>
</div>
<div class="container">
  <form>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea class="form-control" rows="5" id="message"></textarea>
      <br>
      <button type="button" class="btn btn-primary">Send</button>
    </div>
  </form>
</div>

</body>
</html>


<?php
ini_set('display_errors', '1');
if (isset($_POST['username']) && isset($_POST['sujet']) && isset($_POST['message'])) {
	// code
     
}
?>
