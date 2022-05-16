<!DOCTYPE html>
<html lang="en">
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Datetimepicker - Add Date-Time Picker to Input Field by SemicolonWorld</title>
<!-- Minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Minified Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/custom.min.css">
<link href="css/bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="js/date-and-time/bootstrap-datetimepicker.min.js"></script>
</head>
<body>

<div class="date-and-time">
<div class="container">

<?php
if(isset($_POST['submit']) && !empty($_POST['event_name']) && !empty($_POST['event_datetime'])){

	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'semicolan';
	

	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	

	$name = $db->real_escape_string($_POST['event_name']);
	$datetime = $db->real_escape_string($_POST['event_datetime']);
	$insert = $db->query("INSERT INTO events (name,datetime) VALUES ('".$name."', '".$datetime."')");
	

	if($insert){
		echo 'Event data inserted successfully. Event ID: '.$db->insert_id;
	}else{
		echo 'Failed to insert event data.';
	}
}
?>

<h1>Welcome to Kaye Bakes</h1>
<h2>Select date & time of delivery</h2>
<form method="post" action="">
    Date & Time: <input size="16" type="text" name="event_datetime" class="form-control" id="form_datetime" readonly>

	<h3>Select Location</h3>
	Province: <select name="province" id="province">
    <option value="" selected="selected">Select province</option>
  	</select>
  	<br><br>

  	Municipality: <select name="municipality" id="municipality">
    <option value="" selected="selected">Please select district first</option>
  	</select>
  	<br><br>

  	City: <select name="city" id="city">
    <option value="" selected="selected">Please select municipality first</option>
  	</select>
  	<br><br>
  		
	<input type="submit" value="Submit">
</form>

<script type="text/javascript">
$(function () {
    var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	var time = today.getHours() + ":" + today.getMinutes();
	var dateTime = date+' '+time;
    $("#form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
		autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
});
</script>

<script>
var subjectObject = {
  "Metro Manila": {
    "HTML": ["Links", "Images", "Tables", "Lists"],
    "CSS": ["Borders", "Margins", "Backgrounds", "Float"],
    "JavaScript": ["Variables", "Operators", "Functions", "Conditions"]    
  },
  "Cavite": {
    "PHP": ["Variables", "Strings", "Arrays"],
    "SQL": ["SELECT", "UPDATE", "DELETE"]
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("province");
  var topicSel = document.getElementById("municipality");
  var chapterSel = document.getElementById("city");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
	//empty Chapters- and Topics- dropdowns
	chapterSel.length = 1;
	topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  
  topicSel.onchange = function() {
	//empty Chapters dropdown
	chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>


</div>
</div>
</body>
</html>