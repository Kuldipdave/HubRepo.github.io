<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=no" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Hotel Online Reservation</a>
			</div>
		</div>
	</nav>	
	<ul id = "menu">
			
		<li><a href = "reservation.php">Make a reservation</a></li> 
	</ul>
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>MAKE A RESERVATION</h3></strong>
				<br />
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "300px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3><?php echo $fetch['room_type']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "Php. ".$fetch['price'].".00";?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-4">
					<form method = "POST" enctype = "multipart/form-data">
						  <li>12 People</li>
						  <li>White Board</li>
						  <li>T con Equipment</li>
						  <li>V con Equipment(4K Screen)</li>
						  <li>Working Lunch Enabled</li>
						  <li>4K Display</li>
						  <li>Projector screen available</li>
						  </br>
						  
						<div class = "form-group">
							<label>Firstname</label>
							<input type = "text" class = "form-control" name = "firstname" required = "required" />
						</div>
						
						<div class = "form-group">
							  <label>Location</label>
							  <select name="roomlocation">
								<option value="India-Bangalore-EC4-T17-4th Flr-Rose">India-Bangalore-EC4-T17-4th Flr-Rose</option>
								<option value="India-Bangalore-EC4-T17-5th Flr-Lily">India-Bangalore-EC4-T17-5th Flr-Lily</option>
								<option value="India-Bangalore-EC4-T17-6th Flr-Blossom">India-Bangalore-EC4-T17-6th Flr-Blossom</option>
								<option value="India-Bangalore-EC4-T17-10th Flr-Cool">India-Bangalore-EC4-T17-10th Flr-Cool</option>
								<option value="India-Bangalore-EC4-T17-11th Flr-Discuss">India-Bangalore-EC4-T17-11th Flr-Discuss</option>
							  </select>
						</div>  
						
						<div class = "form-group">
							<label>Check in</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
						
						<div class = "form-group">
							<label>Start Time</label>
							<input type="time" class = "form-control"  name="time" required = "required" / >
						</div>	

						<div class = "form-group">
							<label>Agenda and Who</label>
							<input type = "text" class = "form-control" name = "agenda" required = "required" />
						</div>
						
						<div class = "form-group">
							<label>Contact No</label>
							<input type = "text" class = "form-control" name = "contactno" required = "required" />
						</div>
						
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_guest"><i class = "glyphicon glyphicon-save"></i> Submit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
	<br />
	<br />
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>