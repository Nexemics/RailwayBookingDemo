<?php
session_start();
$username = "";
$email = "";
$errors = array(); 
$_SESSION['success'] = "";
$db = mysqli_connect('localhost','root','','railwayreservation');
if (isset($_POST['reg_user']))
 {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    if (empty($username)) 
    {
         array_push($errors, "Username is required!"); 
    }
    if (empty($email)) 
    {
         array_push($errors, "Email is required!");
    }
    if (empty($password_1)) 
    { 
        array_push($errors, "Password is required!"); 
    }
    if ($password_1 != $password_2) 
    {
		array_push($errors, "The Passwords do not match!");
	}
    if (count($errors) == 0) 
    {
		$password = md5($password_1);
		$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in!";
		header('location: index.php');
	}
}
if (isset($_POST['login_user'])) 
{
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) 
    {
		array_push($errors, "Username is required!");
	}
    if (empty($password))
    {
		array_push($errors, "Password is required!");
	}
    if (count($errors) == 0) 
    {
		$password = md5($password);
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1)
        {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in!";
			header('location: index.php');
        }else 
        {
			array_push($errors, "Wrong Username/Password combination!");
		}
	}
}
if(isset($_POST['book_ticket']))
{
	$journeydate = mysqli_real_escape_string($db, $_POST['journeydate']);
	$fstation = mysqli_real_escape_string($db, $_POST['fstation']);
	$tstation = mysqli_real_escape_string($db, $_POST['tstation']);
	$class = mysqli_real_escape_string($db, $_POST['class']);
	$traintype = mysqli_real_escape_string($db, $_POST['traintype']);
	$passname = mysqli_real_escape_string($db, $_POST['passname']);
	(int)$passage = mysqli_real_escape_string($db, $_POST['passage']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$seatno = 1;
	$query4 = "SELECT seatnumber FROM bookings WHERE journeydate='$journeydate' AND fromstn='$fstation' AND tostn='$tstation' AND traintype='$traintype' AND class='$class' ORDER BY seatnumber DESC LIMIT 1";
	$result1 = mysqli_query($db, $query4);
	$fetchseat = mysqli_fetch_row($result1);
	if(mysqli_num_rows($result1)>0)
	{
		$seatno=$fetchseat[0]+$seatno;
	}
	if($seatno>2)//Change value to set seat limit
	{
		array_push($errors, "Train Full!");
	}
	if (empty($journeydate)) 
    {
		array_push($errors, "Date of Journey is required!");
	}
	if ($fstation === 'selfromstn')
    {
		array_push($errors, "Please Select Source Station!");
	}
	if ($tstation === 'seltostn')
    {
		array_push($errors, "Please Select Destination Station!");
	}
	if ($traintype === 'seltraintype')
    {
		array_push($errors, "Please Select Train Type!");
	}
	if ($class === 'selclass')
    {
		array_push($errors, "Please Select Travel Class!");
	}
	if(empty($passname))
	{
		array_push($errors, "Missing Name Field!"); 
	}
	if(empty($passage))
	{
		array_push($errors, "Missing Age Field!"); 
	}
	if($gender == "selgender")
	{
		array_push($errors, "Please Select Gender!"); 
	}
	if(count($errors) == 0)
	{
		$query = "INSERT INTO bookings (journeydate, fromstn, tostn, traintype, class, seatnumber) VALUES('$journeydate', '$fstation', '$tstation', '$traintype', '$class', '$seatno')";
		mysqli_query($db, $query);
		$_SESSION['journeydate'] = $journeydate;
		$_SESSION['fromstn'] = $fstation;
		$_SESSION['tostn'] = $tstation;
		$_SESSION['class'] = $class;
		$_SESSION['traintype'] = $traintype;
		$bookid = mysqli_insert_id($db);
		$query2 = "INSERT INTO passengers (passname, passage, gender, bookid) VALUES('$passname','$passage','$gender','$bookid')";
		mysqli_query($db, $query2);
		$query3 = "SELECT created FROM bookings WHERE bookid = '$bookid'";
		$result = mysqli_query($db, $query3);
		$created = mysqli_fetch_assoc($result);
		$_SESSION['passname'] = $passname;
		$_SESSION['passage'] = $passage;
		$_SESSION['gender'] = $gender;
		$_SESSION['bookid'] = $bookid;
		$_SESSION['seatnumber'] = $seatno;
		$_SESSION['created'] = $created['created'];
		header('location: details.php');
	}
}
if(isset($_POST['pnr_check']))
{
	(int)$pnrno = mysqli_real_escape_string($db, $_POST['pnrno']);
	$query = "SELECT bookid FROM bookings WHERE bookid='$pnrno'";
	$res = mysqli_query($db, $query);
	$results = mysqli_fetch_row($res);
	if (empty($pnrno) || ($pnrno != $results[0])) 
    {
		array_push($errors, "Ticket Invalid!");
	}
	if(count($errors) == 0)
	{
		$_SESSION['pnrno']=$pnrno;
		header('location: confirm.php');
	}
}
if(isset($_POST['cancel_check']))
{
	(int)$pnrcancel = mysqli_real_escape_string($db,$_POST['pnrcancel']);
	$query = "SELECT bookid FROM bookings WHERE bookid='$pnrcancel'";
	$res = mysqli_query($db, $query);
	$results = mysqli_fetch_row($res);
	if(empty($pnrcancel) || ($pnrcancel != $results[0]))
	{
		array_push($errors, "PNR Number Invalid!");
	}
	if(count($errors) == 0)
	{
		$query1 = "CALL deleteQuery('$pnrcancel')";
		mysqli_query($db, $query1);
		header('location: proceed.php');
	}
}
?>
