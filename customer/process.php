<?php
include_once 'connect.php';


if(isset($_POST['save']))
{	 
	print_r($_POST);
	 $uname = $_POST['uname'];
	 $date = date('Y-m-d');
	 $problem = $_POST['problem'];
	 $description =trim($_POST['message']);
	 $sql = "INSERT INTO incident (username,day,problem,description)
     VALUES ('$uname','$date','$problem','$description')";
     
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

