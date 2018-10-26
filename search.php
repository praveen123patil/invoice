<?php
// Create connection
$conn=mysqli_connect("localhost","root","root","invoice");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['search']))
 {	
	$cid=$_POST['cid'];
	$sql="select * from invoice where cid='$cid'"; 		
	if (mysqli_query($conn,$sql)) {
		
		header("location: invoice.html");
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
