<?php
	require_once 'admin/connect.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		
		$agenda = $_POST['agenda'];
		$contactno = $_POST['contactno'];
		$roomlocation = $_POST['roomlocation'];
		$time = $_POST['time'];
		$checkin = $_POST['date'];
		$conn->query("INSERT INTO `guest` (firstname, agenda, contactno, roomlocation, time) VALUES('$firstname', '$agenda', '$contactno', '$roomlocation', '$time')") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `contactno` = '$contactno' && `roomlocation` = '$roomlocation' && `time` = '$time' && `agenda` = '$agenda'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'") or die(mysqli_error());
		$row = $query2->num_rows;
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Not Available Date</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
											
										</li>
									</ul>";
									echo "<script>alert('The Slot is booked by some one please try to book other slot')</script>";
							}
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')") or die(mysqli_error());
							header("location:reply_reserve.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>