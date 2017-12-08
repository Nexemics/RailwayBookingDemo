<?php 
    include('server.php');
    include('validation.php');
    if (isset($_POST['cancel_book']))
    {
		header('location: index.php');
    }
    if (isset($_POST['viewtkt']))
    {
		header('location: viewtwo.php');
    }
    if (!isset($_SESSION['pnrno'])) 
    {
		$_SESSION['msg'] = "Enter PNR Number first!";
		header('location: pnr.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>PNR Status</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>PNR Status</h2>
	</div>
	<form method="post" action="confirm.php">
		<?php include('errors.php'); ?>
        <div class="success">
            <label>Ticket Number <strong><?php echo $_SESSION['pnrno'] ?></strong> is already booked!</label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="cancel_book">Home</button>
            <button type="submit" class="btn" name="viewtkt">View</button>
            <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
        </div>
    </form>
</body>
</html>