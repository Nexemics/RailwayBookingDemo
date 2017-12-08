<?php 
    include('server.php');
    include('validation.php');
    if (isset($_POST['cancel_book']))
    {
		  header('location: index.php');
	  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cancel Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>Cancel Ticket</h2>
	</div>
	<form method="post" action="cancel.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Enter PNR Number:</label>
			<input type="text" name="pnrcancel">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="cancel_check">Proceed</button>
      <button type="submit" class="btn" name="cancel_book">Cancel</button>
      <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
    </div>
  </form>
  </body>
  </html>