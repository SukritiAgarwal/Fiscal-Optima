<?php
	include 'connection.php';
	if(isset($_GET['var'])){
		$email = $_GET['var']; 
	}
	if(isset($_POST['generate'])){
		require "fpdf.php";
		class myPDF extends FPDF{
			function header(){
				$this->Image('logo.jpeg',100,6,100,30);
				$this->Ln(30);
				$this->SetFont('Arial','B',20);
				$this->Cell(286,5,'INVOICE',0,0,'C');
				$this->Ln();
				$this->Ln(20);
			}
			function footer(){
				$this->SetY(-15);
				$this->SetFont('Arial','',8);
				$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			}
			function viewTable(){
				$this->SetFont('Times','B',14);
				$this->Cell(200,10,'',2,0,'C');
				$this->Cell(30,10,'Date :',2,0,'C');
				$this->SetFont('Times','',12);
				$this->Cell(20,10,$_POST['date'],2,0,'C');
				$this->Ln(10);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(40,12,'Sold To:',2,0,'C');
				$this->SetFont('Times','',12);
				$this->Cell(10,12,$_POST['soldto'],2,0,'C');
				$this->Ln(15);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(40,12,'Description:',2,0,'C');
				$this->SetFont('Times','',12);
				$this->Cell(40,12,$_POST['description'],2,0,'C');
				$this->Ln(15);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(40,12,'Quantity',2,0,'C');
				$this->SetFont('Times','',12);
				$this->Cell(10,12,$_POST['quantity'],2,0,'C');
				$this->Ln(15);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(40,12,'Price/Quantity',2,0,'C');
				$this->SetFont('Times','',12);
				$this->Cell(10,12,'$ '.$_POST['price/quantity'],2,0,'C');
				$this->Ln(15);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(30,10,'Sub total:',2,0,'C');
				$this->Cell(50,10,'$ '.$_POST['price/quantity']*$_POST['quantity'],2,0,'C');
				$this->Ln(10);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(30,10,'Tax ( 10% ):',2,0,'C');
				$this->Cell(50,10,'$ '.$_POST['price/quantity']*$_POST['quantity']*0.1,2,0,'C');
				$this->Ln(10);
				$this->Cell(30,10,'',2,0,'C');
				$this->SetFont('Times','B',14);
				$this->Cell(30,10,'Total Cost:',2,0,'C');
				$this->Cell(50,10,'$ '.(($_POST['price/quantity']*$_POST['quantity']*0.1)+($_POST['price/quantity']*$_POST['quantity'])),2,0,'C');
				$this->Ln(20);
				$this->Cell(280,10,'Thank you for your purchase!',2,0,'C');
			}
		}
		
		$pdf=new myPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('L','A4',0);
		//$pdf->headerTable();
		$pdf->viewTable();
		$pdf->Output();
	}
    if(isset($_POST['logout'])) {  
    session_destroy();
    header('Location: index.php');
    exit;
    }
 ?>
<!DOCTYPE html>
<html>
   <head>
    <meta name="viewreport" content="width=device-width, initial-scale=1">
      <title>Fiscal Optima</title>
      <link rel="stylesheet" href="style.css">
      <link rel="icon" href="copy.png">
      <style >
        footer {
        display: block;
        position: relative;
        width: 100%;
        background-color: #dbdb0d;
        text-align: center;
        height: 7vh;
      
        bottom: 0;
        width: 100%;
        height: 50px;
        clear: both;
      }
  
        #dollar:before{
          content: "$";
        }
        #paymentform{
          float: right;
          position: relative;
          text-align: center;
        }

        body {font-family: Arial, Helvetica, sans-serif;}
      * {box-sizing: border-box;}

      input, select, textarea {
        width: 85%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        margin-left: 2%;
        resize: vertical;
      }

      textarea{
        height: 400%;
      }
      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        width: 20%;
        margin-left: 40%;
        cursor: pointer;
      }

     /* input[type=submit]:hover {
        background-color: #45a049;
      }*/

      .formcontainer {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        float: right;
        margin: 10%;
        width: 50%;
      }
      #amount:before{
        content: "$"
      }
      #amount{
        width: 20%; 
      }
      #date{
        width:35%;
      }
      #soldto, #quantity, #pricequantity{
        width: 35%;
      }
      #title{
        float: right;
        margin-right: -30%;
        margin-top: 1%;
      }
      #logout{
        float: right;
        margin-top:-5%;
        padding: 5px;
      }
      input[type=submit] {
        background-color: gray;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        width: 20%;
        margin-left: 40%;
        cursor: pointer;
      }
      #sidenav{
        margin-top: 6%;
      }

</style>

   </head>
   <body>
      <div id="container">
      	<!-- Nav bar -->
         <div id="nav">
            <img src="logo2.png" id="logo"></a>
            <form action="generateinvoice.php" method="POST">
              <input id="logout" type="submit" value="Logout" name='logout'>
            </form>
         </div>
         <!-- End of nav -->


	<!-- Body  -->
  <div>
    <div class="formcontainer">
  <form action="" method="POST" >

    <label for="date"> Date:</label>
<br>
    <input type="date" id="date" name="date" required>
<br>
    <label for="soldto"> Sold To:</label>
<br>
    <input type="text" id="soldto" name="soldto" required>
<br>
    <label for="description">Description:</label>
<br>
    <textarea id="description" name="description" rows="10" maxlength="250"required>
    </textarea>
<br>
    <label for="quantity"> Quantity:</label>
<br>
    <input type="number" name="quantity" id="quantity"required>
<br>
    <label for="price/quantity"> Price/Quantity:</label>
<br>
    <td>$<input type="number" name="price/quantity" id="pricequantity"required></td>

<br>
    <input type="submit" value="Generate Invoice" name="generate">
<br>
  </form>
  </div>


		<!-- Side nav -->
    <div>
      <h1 id="title" >Generate An Invoice</h1>
    </div>
			<div id="sidenav">
				<a class="side_link"  href="accounthistory.php?var=<?php echo $email?>">
        Account History</a>
				<a class="side_link"  href="paymentsmade.php?var=<?php echo $email?>">
        Payments Made</a>
				<a  class="side_link" href="paymentsreceived.php?var=<?php echo $email?>">
        Payments Received</a>
				<a  class="side_link" href="transactions.php?var=<?php echo $email?>">
        Transactions</a>
				<a  class="side_link" href="monthlystatement.php?var=<?php echo $email?>">
        Monthly Statement</a>
				<a  class="side_link" href="generateinvoice.php?var=<?php echo $email?>">
        Generate Invoice</a>
				<a  class="side_link" href="about.php?var=<?php echo $email?>">About</a>
			</div>

		<!-- End side nav -->


	<!-- End body -->

         <!-- Start footer -->
			<footer>
			  <p>Copyright&#9400; 2019 <a href="mailto:Fiscal.Optima@gmail.com">
			  FiscalOptima</a> All rights reserved.</p>
			</footer>
		<!-- end footer -->

      </div>
   </body>
</html>