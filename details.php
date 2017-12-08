<?php 
    include('server.php');
    include('validation.php');
    include('farecalculate.php'); 
    if (isset($_POST['cancel_book']))
    {
        $query="DELETE FROM bookings ORDER BY bookid DESC LIMIT 1";
        mysqli_query($db, $query);
		header('location: index.php');
    }
    if (isset($_POST['nextstep']))
    {
		header('location: bill.php');
    }
?>
<!doctype html>
<html>
<head>
    <title>Ticket Booking</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
<body>
	<div class="header">
		<h2>Ticket Details</h2>
    </div>
    <form method="post" action="details.php">
        <div class="welcome" >
				<p>Your Ticket Details Are:</p>
		</div>
        <div class="welcome">
		    <label>PNR Number: <strong><?php echo $_SESSION['bookid']; ?></strong></label>
        </div>
	    <div class="welcome">
		    <label>Journey Date: <strong><?php echo $_SESSION['journeydate']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>From Station: <strong><?php echo $_SESSION['fromstn']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>To Station: <strong><?php echo $_SESSION['tostn']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Train Type: <strong><?php echo $_SESSION['traintype']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Class: <strong><?php echo $_SESSION['class']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Train: <strong><?php echo $_SESSION['fromstn']; ?>-<?php echo $_SESSION['tostn']; ?> <?php echo $_SESSION['traintype']; ?> Express</strong> </label>
        </div>
        <div class="welcome">
            <label>Departure Time: <strong>9:15 PM</strong></label>
        </div>
        <div class="welcome">
            <label>Name: <strong><?php echo $_SESSION['passname']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Age: <strong><?php echo $_SESSION['passage']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Gender: <strong><?php echo $_SESSION['gender']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Seat Number: <strong>SN0<?php echo $_SESSION['seatnumber']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Date/Time of Booking: <strong><?php echo $_SESSION['created']; ?></strong></label>
        </div>
        <div class="welcome">
            <label>Travel Fare: <strong><?php echo $result ?> + <?php echo $resultgst ?> (GST=5%) = <?php echo ($result+$resultgst) ?></strong> </label>
        </div>
        <div class="input-group">
            <button style="width:35%" type="submit" class="btn" name="nextstep">Confirm Payment</button>
            <button type="submit" class="btn" name="cancel_book">Cancel</button>
            <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
        </div>
    </form>
</body>
</html>