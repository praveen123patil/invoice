<?php
$items=array();
$conn=mysqli_connect("localhost","root","","invoice");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
  if(isset($_GET['invoice_id']))
  {
    $invoice_id=$_GET['invoice_id'];
    $sql="select * from invoice where invoice_id='$invoice_id'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result))
    {
      $cid=$row['cid'];
      $cname=$row['cname'];
      $date=$row['date'];
      $edate=$row['edate'];
      $com_name=$row['com_name'];
      $gstin=$row['gstin'];
      $contact_no=$row['contact_no'];
      $address=$row['address'];
      $sub_total=$row['sub_total'];
      $sgst=$row['sgst'];
      $cgst=$row['cgst'];
      $total=$row['total'];
      $invoice_code=$row['invoice_code'];
    }
   $sql="select * from item where invoice_id='$invoice_id'";
   $results = mysqli_query($conn,$sql);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
  </head>
  <body>
      <!-- <table class="table table-borderless table-sm ">
        <tr>
          <td rowspan="5"><img src="file:///C:/Users/Praveen/Desktop/Project1/logo233.png" widht="150" height="150"> </td>
          </tr>
        <tr>
          <td><h1>WebCreintors Tech Solutions</h1></td>
          <td> Invoice No  <td> : </td>   <td> 123</td>
        </tr>
        <tr>
          <td><h6>OM SAI SWAMI SAMARTH RESDIDENCY FLAT NO:F403 PATHVARDHAN LAYOUT </h6></td>
          <td> GSTIN NO   <td> : </td>  <td> 123456789 </td>
        </tr>
        <tr> 
          <td> MADAVAPUR VADAGAO, CTS NO. 161/1 BELGAUM, 590010, KARNATAKA, INDIA </td> 
          <td>CIN NO  <td> : </td> <td> 123456789</td>
        </tr>
        <tr>
          <td> EMAIL-ID: info@webcreintors.com, CONTACT NO: 7022442379 </td>
          <td>  PAN NO  <td> : </td>  <td>  123456789</td>
        </tr>
        <tr>
          <td> hu </td>
        </tr>
      </table> 
 -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="card border-0">
                  <div class="card-body">
                    <img src="img/logo233.png" widht="150" height="150"> 
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card border-0">
                  <div class="card-body">
                    <h2 class="card-title"><b>WebCreintors Tech Solutions</b></h2>
                    <p class="card-text">OM SHREE SWAMI SAMARTH RESDIDENCY FLAT NO:F403 <br/> PATHVARDHAN LAYOUT MADAVAPUR VADAGAO, <br/>CTS NO. 161/1 BELGAUM, 590010, KARNATAKA, INDIA <br/> EMAIL-ID: info@webcreintors.com, CONTACT NO: 7022442379</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-0">
                  <div class="card-body">
                <br/>
                    <p class="card-text">CIN : 1234567890</p> <p> GSTIN : 1234567890 </p> <p> PAN     :1234567890</p>
                  </div>
                </div>
              </div>
            </div><hr/>
            <div class="row">
              <div class="col-md-4">
                <div class="card border-0">
                  <div class="card-body">
                    <p> <b>Company Name :</b> <?php echo $com_name;?> </p>
                    <p> <b>Address :</b> <?php echo $address;?> </p>
                    <p> <b> GSTIN :</b> <?php echo $gstin;?> </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0">
                  <div class="card-body">
                    <p> <b>Name of the Customer :</b> <?php echo $cname;?> </p>
                    <p> <b>Contact No: :</b> <?php echo $contact_no;?> </p>
                </div>
              </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0">
                  <div class="card-body">
                    <p> <b>Invoice No. :</b> <?php echo $invoice_code;?> </p>
                    <p> <b>Date of Issue :</b><?php echo $date;?></p>
                    <p> <b>Expire Date :</b> <?php echo $edate;?> </p>
                </div>
              </div>
              </div>
            </div> 

        <table class="table table-borderless table-sm">
            <thead>
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Item</th>
                    <th scope="col">HSN/SAC</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
          <?php 
              
              while($data = mysqli_fetch_assoc($results))
              {
            ?>
            <tbody class="tblcls" id="hidden-row">
                <tr>
                    <td class="sno">1</td>
                    <td><?php echo $data['item'];?></td>
                    <td><?php echo $data['hsn_no'];?></td>
                    <td><?php echo $data['description'];?></td>
                    <td><?php echo $data['amount'];?></td>
                </tr>
            </tbody>
          <?php } 
          ?>
            <tfoot>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Sub Total</td>
                    <td><?php echo $sub_total;?></td>
                </tr>
                <tr class="table-borderless">
                    <th></th>
                    <td></td>
                    <td></td>
                    <td>SGST 9%</td>
                    <td><?php echo $sgst;?></td>
                </tr>
                <tr class="table-borderless">
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>CGST 9%</td>
                    <td><?php echo $cgst;?></td>
                </tr>
                <tr class="table-borderless">
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo $total;?></td>
                </tr>
            </tfoot>
        </table> <hr/>
        <div class="row">
              <div class="col-md-6">
                <table class="table table-borderless table-sm">
                  <thead>
                    <tr>
                      <th colspan="3">WebCreintors Tech Solution</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Account No.</td>
                      <td> : </td>
                      <td>1018000546913</td>
                    </tr>
                    <tr>
                      <td>Account Type</td>
                      <td> : </td>
                      <td>Current Account</td>
                    </tr>
                    <tr>
                      <td>Bank Name</td>
                      <td> : </td>
                      <td>Bandhan Bank</td>
                    </tr>
                    <tr>
                      <td>IFSC Code</td>
                      <td> : </td>
                      <td>BDBL0001937</td>
                    </tr>
                    <tr>
                      <td>CIF</td>
                      <td> : </td>
                      <td>180002669074</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <div class="col-md-6"> 
                <div class="card border-0 fonts">
                  <div class="card-body fonts">
                    <span class="text-right"> <h6> for WebCreintors Tech Soultions </h6> <br/> <br/> <br/></span>
                    <span class="text-right"> <h6> Signature </h6> </span>
                  </div>
                </div>
              </div>
            </div> <hr/>
        <div>
          <p> <b>Product/Service Details and Terms </b> </p> <hr/>
          <ul>
            <li> Kindly refer proposer document for product and services, terms details </li>
            <li> All the payment should be in favour of "WebCreintors Tech Solution" only </li>
            <li> Webcreintors own the right og changes in product/services pollicy and pricing </li>
            <li> Quotation is an Estimation of work only, Invoice will be raised based on time and material </li>
            <li> Payment Terms: 25% to 50% advance if an Estimation is less than 50,000/- </li>
          </ul>
        </div> 

      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
