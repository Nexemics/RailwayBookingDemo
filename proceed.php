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
	<title>Cancellation Status</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>Cancellation Status</h2>
	</div>
	<form method="post" action="proceed.php">
		<?php include('errors.php'); ?>
        <div class="success">
            <label>Ticket Cancelled!</label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="cancel_book">Home</button>
            <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
        </div>
    </form>
</body>
</html>