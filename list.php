<?php
$items=array();
$conn=mysqli_connect("localhost","root","","invoice");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
    $sql="select * from invoice";
    $results = mysqli_query($conn,$sql);
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
    <nav class="navbar navbar-light bg-light navbar-expand-xl">
          <h1 class="navbar-brand navfont ml-2">Quotation</h1>
        </nav>
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
                <div class="vertical-menu border-right">
                  <a href="web.html">ADD Quotation</a>
                  <a href="#">List Quotation</a>  
                </div>
            </div>
            <div class="col-md-10">
             <form class="" name="form1" method="post" action="display.php"> 
              <h3> List of Customer </h3>
              <table class="table table-borderless table-sm">
                <caption>List of Customer</caption>
                <thead>
                  <tr>
                    <th scope="col">Invoice No.</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Company Name</th>
                  </tr>
                </thead>
                 <?php while($data = mysqli_fetch_assoc($results))
                  {
                ?>  
                <tbody>
                  <tr>
                    <td><?php echo $data['invoice_code'];?></td>
                    <td><?php echo $data['cname'];?></td>
                    <td><?php echo $data['com_name'];?></td>
                    <td> <a class="btn btn-primary" href="display.php?invoice_id=<?php echo $data['invoice_id'] ?>" role="button">View</a>
                    <td> <a class="btn btn-dark" href="print.php?invoice_id=<?php echo $data['invoice_id'] ?>"" role="button">Print</a> </td>
                    <td> <a class="btn btn-success" href="delete.php?invoice_id=<?php echo $data['invoice_id'] ?>"" role="button">Delete</a> </td>
                  </tr>
                </tbody>
              <?php }
              ?>
              </table>
            </div>
          </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
  </body>
</html>