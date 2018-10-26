<?php

$html = '<html lang="en">
  <head>
    <title>Hello, world!</title>
  </head>
  <body>
        <table>
            <thead>
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Item</th>
                    <th scope="col">HSN/SAC</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            </table>
  </body>
</html>';

include("mpdf-master/mpdf.php");
$mpdf=new mPDF('en-GB-x','A4','','',10,10,10,10,6,3);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;

//$stylesheet = file_get_contents('mpdfstyletables.css');
//$mpdf->WriteHTML($stylesheet,1);

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

?>