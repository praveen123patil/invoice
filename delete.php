<?php
$conn=mysqli_connect("localhost","root","","invoice");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
  if(isset($_GET['invoice_id']))
  {
    $invoice_id=$_GET['invoice_id'];
    $sql="delete from invoice where invoice_id='$invoice_id'";
    if(mysqli_query($conn,$sql))
    {
      $sql="delete from item where invoice_id='$invoice_id'";
      if(mysqli_query($conn,$sql))
      {
        header("location: list.php");
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }   
    } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
  }  
    
?>