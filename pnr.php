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
	<title>Check PNR</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>Check PNR</h2>
	</div>
	<form method="post" action="PNR.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Enter PNR Number:</label>
			<input type="text" name="pnrno">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="pnr_check">Check</button>
      <button type="submit" class="btn" name="cancel_book">Cancel</button>
      <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
    </div>
  </form>
  </body>
  </html>