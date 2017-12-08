<?php 
	session_start(); 
	include("validation.php");
    if (isset($_GET['logout']))
    {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<script type="text/javascript">     
	function redirbook()
	{
        var x=document.getElementById("booktkt").value;
        window.location="booking.php"+x;
    }
    function redircancel()
	{
        var y=document.getElementById("canceltkt").value;
        window.location="cancel.php"+y;
    }
    function redirpnr()
	{
        var z=document.getElementById("pnrtkt").value;
        window.location="pnr.php"+z;
    }
    function redirchart()
	{
        var w=document.getElementById("farechart").value;
        window.location="farechart.php"+w;
	}
	</script>
	<div class="header">
		<h2>Indian Railways</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="welcome" >
				<p>Welcome <strong><?php echo $_SESSION['username']; ?>!</strong></p>
			</div>
		<?php endif ?>
		<div>
			<button type="submit" class="options bookbtn" name="booktkt" id="booktkt" style="width:48%" onclick="javascript:redirbook()">Book Ticket</button>
			<button type="submit" class="options bookbtn" name="canceltkt" id="canceltkt" style="width:48%" onclick="javascript:redircancel()">Cancel Ticket</button>
			<button type="submit" class="options bookbtn" name="pnrtkt" id="pnrtkt" style="width:48%" onclick="javascript:redirpnr()">PNR Status</button>
			<button type="submit" class="options bookbtn" name="farechart" id="farechart" style="width:48%" onclick="javascript:redirchart()">Fare Chart</button>
		</div>
		<div>
			<button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
		</div>
	</div>	
</body>
</html>