<?php 
    include('server.php');
    include('validation.php');
    if (isset($_POST['cancel_book']))
    {
		header('location: index.php');
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket Booking</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script type="text/javascript" src="js/script.js"></script>
    <script>
        $(document).ready(function () 
        {
            $("#addpassenger").click(function(e) 
            {
                e.preventDefault();
                $("#dataTable").append('<tr><td style="width:40% padding:2px"><input type="text" style="width:80%" name="passname[]" id="passname[]"></td><td style="width:20% padding:2px"><input type="text" style="width:80%" name="passage[]" id="passage[]"></td><td style="width:31%"><select name="Gender[]" id="Gender[]"><option value="">Select Gender:</option><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option></select></td>><td style="width:9%"><button type="submit" class="btn1" id="removefield" style="width:100%">X</button></td></tr>');
            });
            $('#dataTable').on('click','#removefield',function() 
            { 
                $(this).closest("tr").remove();
            });
        });
    </script>
</head>
<body>
	<div class="header">
		<h2>Ticket Booking</h2>
	</div>
	<form method="post" action="booking.php">
    <?php include('errors.php'); ?>
	    <div class="input-group">
		    <label>Journey Date:</label>
		    <input type="text" id="journeydate" name="journeydate">
	    </div>
	    <div class="input-group selectbox">
	    	<label>From Station:</label>
	    	<select onChange="stationfunc(this.id,'tstation','traintype')" id="fstation" name="fstation">
                <option value="selfromstn">Select From Station:</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Chennai">Chennai</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Mumbai">Mumbai</option>
                <option value="New Delhi">New Delhi</option>
            </select>
    	</div>
        <div class="input-group selectbox">
	    	<label>To Station:</label>
	    	<select id="tstation" name="tstation">
                <option value="seltostn">Select To Station:</option>
            </select>
        </div>
        <div class="input-group selectbox">
	    	<label>Train:</label>
	    	<select id="traintype" name="traintype">
                <option value="seltraintype">Select Train Type:</option>
            </select>
        </div>
        <div class="input-group selectbox">
	    	<label>Class:</label>
	    	<select id="class" name="class">
                <option value="selclass">Select Class:</option>
                <option value="General">General</option>
                <option value="Chair Car">Chair Car</option>
                <option value="Sleeper">Sleeper</option>
                <option value="AC Three Tier">AC Three Tier</option>
                <option value="AC Two Tier">AC Two Tier</option>
                <option value="AC First Class">AC First Class</option>
            </select>
        </div>
        <hr></hr>
        <div class="input-group selectbox">
            <label>Passenger Details:</label>
            <div>
                <table class="dataTable" id="dataTable" name="dataTable">
                    <tr>
                        <td><label>Name:</label></td>
                        <td><label>Age:</label></td>
                        <td><label>Gender:</label></td>
                    </tr>
                    <tr>
                        <td style="width:40% padding:2px"><input type="text" style="width:80%" name="passname[]" id="passname[]"></td>
                        <td style="width:20% padding:2px"><input type="text" style="width:80%" name="passage[]" id="passage[]"></td>
                        <td style="width:31%"><select name="Gender[]" id="Gender[]">
                                                    <option value="selgender">Select Gender:</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select></td>
                        <td style="width:9%"></td>
                    </tr>
                </table>
            </div>
            <p>
                <button style="width:35%" type="submit" class="btn" name="addpassenger" id="addpassenger">Add Passenger</button>
            </p>
        </div>
        <hr></hr>
    	<div class="input-group">
	    	<button type="submit" class="btn" name="book_ticket">Confirm</button>
            <button type="submit" class="btn" name="cancel_book">Cancel</button>
            <button type="submit" class="btn1"><a href="index.php?logout='1'">Logout</a></button>
    	</div>
	</form>
</body>
</html>


