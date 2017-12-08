<?php 
    include('server.php');
    include('validation.php');
    include('information.php'); 
    if (isset($_POST['cancel_book']))
    {
		  header('location: index.php');
	  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fare Chart</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  table 
  {
    border-collapse: collapse;
  }
  th, td 
  {
    padding: 10px;
  }            
</style>
</head>
<body>
	<div class="header" style="width:47%">
		<h2>Fare Chart</h2>
	</div>
	<form method="post" action="farechart.php" style="width:47%">
		<?php include('errors.php'); ?>
    <label>Distance Fare:</label>
    <div class="welcome">
      <table>
        <tr>
          <th></th>
          <th>Bangalore</th>
          <th>Chennai</th>
          <th>Hyderabad</th>
          <th>Kolkata</th>
          <th>Mumbai</th>
          <th>New Delhi</th>
        </tr>
        <tr>
          <th>Bangalore</th>
          <td>-</td>
          <td><?php echo $fetcha1[0] ?></td>
          <td><?php echo $fetcha2[0] ?></td>
          <td><?php echo $fetcha3[0] ?></td>
          <td><?php echo $fetcha4[0] ?></td>
          <td><?php echo $fetcha5[0] ?></td>
        </tr>
        <tr>
          <th>Chennai</th>
          <td><?php echo $fetchb1[0] ?></td>
          <td>-</td>
          <td><?php echo $fetchb2[0] ?></td>
          <td><?php echo $fetchb3[0] ?></td>
          <td><?php echo $fetchb4[0] ?></td>
          <td><?php echo $fetchb5[0] ?></td>
        </tr>
        <tr>
          <th>Hyderabad</th>
          <td><?php echo $fetchc1[0] ?></td>
          <td><?php echo $fetchc2[0] ?></td>
          <td>-</td>
          <td><?php echo $fetchc3[0] ?></td>
          <td><?php echo $fetchc4[0] ?></td>
          <td><?php echo $fetchc5[0] ?></td>
        </tr>
        <tr>
          <th>Kolkata</th>
          <td><?php echo $fetchd1[0] ?></td>
          <td><?php echo $fetchd2[0] ?></td>
          <td><?php echo $fetchd3[0] ?></td>
          <td>-</td>
          <td><?php echo $fetchd4[0] ?></td>
          <td><?php echo $fetchd5[0] ?></td>
        </tr>
        <tr>
          <th>Mumbai</th>
          <td><?php echo $fetche1[0] ?></td>
          <td><?php echo $fetche2[0] ?></td>
          <td><?php echo $fetche3[0] ?></td>
          <td><?php echo $fetche4[0] ?></td>
          <td>-</td>
          <td><?php echo $fetche5[0] ?></td>
        </tr>
        <tr>
          <th>New Delhi</th>
          <td><?php echo $fetchf1[0] ?></td>
          <td><?php echo $fetchf2[0] ?></td>
          <td><?php echo $fetchf3[0] ?></td>
          <td><?php echo $fetchf4[0] ?></td>
          <td><?php echo $fetchf5[0] ?></td>
          <td>-</td>
        </tr>
      </table>
    </div>
    <label>Class Fare:</label>
    <div class="welcome">
      <table>
        <tr>
          <th>General</th>
          <th>Chair Car</th>
          <th>Sleeper</th>
          <th>AC Three Tier</th>
          <th>AC Two Tier</th>
          <th>AC First Class</th>
        </tr>
        <tr>
          <td><?php echo $fetchg1[0] ?></td>
          <td><?php echo $fetchg2[0] ?></td>
          <td><?php echo $fetchg3[0] ?></td>
          <td><?php echo $fetchg4[0] ?></td>
          <td><?php echo $fetchg5[0] ?></td>
          <td><?php echo $fetchg6[0] ?></td>
        </tr>
      </table>
    </div>
    <label>Train Fare:</label>
    <div class="welcome">
      <table>
        <tr>
          <th>Rajdhani Express</th>
          <th>Jan Shatabdi Express</th>
          <th>City Express</th>
        </tr>
        <tr>
          <td><?php echo $fetchh1[0] ?></td>
          <td><?php echo $fetchh2[0] ?></td>
          <td><?php echo $fetchh3[0] ?></td>
        </tr>
      </table>
    </div>
    <label>Citizen Fare:</label>
    <div class="welcome">
      <table>
        <tr>
          <th>Child (Age<=5)</th>
          <th>Adult (Age>5 AND Age<=60)</th>
          <th>Senior Citizen(Age>60)</th>
        </tr>
        <tr>
          <td>0</td>
          <td>100</td>
          <td>50</td>
        </tr>
      </table>
    </div>
    <label>Tax:</label>
    <div class="welcome">
      <label><strong>GST = 5% On (Distance Fare + Class Fare + Train Fare + Citizen Fare)</strong></label>
    </div> 
    <div class="input-group">
        <button type="submit" class="btn" name="cancel_book">Back</button>
        <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
    </div>
  </body>
</html>