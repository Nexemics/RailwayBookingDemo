<?php 
    include('server.php');
    include('validation.php');
    include('farecalculate.php');
    if (isset($_POST['cancel_book']))
    {
		header('location: index.php');
    }
    if (isset($_POST['viewtkt']))
    {
		header('location: viewone.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Billing</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header" style="width:40%">
		<h2>Billing</h2>
	</div>
	<form method="post" action="bill.php" style="width:40%">
		<?php include('errors.php'); ?>
        <div class="success">
            <label>Payment Complete!</label>
        </div>
        <div class="success">
            <label>Your Transaction Details has been sent to your email.</label>
        </div>
        <div class="welcome">
            <label>Your Bill Reciept:</label>
        </div>
        <div class="welcome">        
            <label><strong>Distance Fare ( <?php echo $_SESSION['fromstn']; ?> - <?php echo $_SESSION['tostn']; ?> ): <?php echo $fetchdist[0]; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>Class Fare ( <?php echo $_SESSION['class']; ?> ): <?php echo $fetchclass[0]; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>Train Fare ( <?php echo $_SESSION['traintype']; ?> ): <?php echo $fetchtrain[0]; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>Citizen Fare ( <?php echo $_SESSION['passage']; ?> ): <?php echo $ageprice; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>Total: <?php echo $result; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>GST 5%: <?php echo $resultgst; ?></strong></label>
        </div>
        <div class="welcome">
            <label><strong>Grand Total: <?php echo ($result+$resultgst); ?></strong></label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="cancel_book">Home</button>
            <button type="submit" class="btn" name="viewtkt">View</button>
            <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
        </div>
    </form>
</body>
</html>