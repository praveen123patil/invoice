<?php
// Create connection
$conn=mysqli_connect("localhost","root","","invoice");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

	if(isset($_POST['Submit']))
 {
	$cid=$_POST['cid'];
	$cname=$_POST['cname'];
	$date=$_POST['date'];
	$edate=$_POST['edate'];
	$com_name=$_POST['com_name'];
	$gstin=$_POST['gstin'];
	$contact_no=$_POST['contact_no'];
	$address=$_POST['address'];
	$sub_total=$_POST['sub_total'];
	$sgst=$_POST['sgst'];
	$cgst=$_POST['cgst'];
	$total=$_POST['total'];


	$sql="insert into invoice (invoice_id,cid,cname,date,edate,com_name,gstin,contact_no,address,sub_total,sgst,cgst,total) values(NULL,'".$cid."','".$cname."','".$date."','".$edate."','".$com_name."','".$gstin."','".$contact_no."','".$address."','".$sub_total."','".$sgst."',".$cgst.",'".$total."')";

	if (mysqli_query($conn,$sql)) {
		$item=$_POST['item'];
		$hsn_no=$_POST['hsn_no'];
		$desc=$_POST['desc'];
		$amount=$_POST['amount'];
		$invoice_id = mysqli_insert_id($conn);
		$invoice_code = 'WCTS07'.$invoice_id;
		$sql="update invoice set invoice_code='".$invoice_code."' where invoice_id=$invoice_id";
		if(mysqli_query($conn,$sql))
		{
			foreach ($item as $key => $value) {	
				if(!empty($item[$key]) && !empty($hsn_no[$key]) && !empty($desc[$key]) && !empty($amount[$key])){
					$sql="insert into item (invoice_id,item,hsn_no,description,amount,item_id) values(".$invoice_id.",'".$item[$key]."','".$hsn_no[$key]."','".$desc[$key]."','".$amount[$key]."',NULL)";
					if(mysqli_query($conn,$sql)) {
						header("location: display.php?invoice_id=".$invoice_id);
					} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					} 	
				}
			}
		} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		} 
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

 	}
	
?>