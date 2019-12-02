<?php
	include 'connection.php';
	if(isset($_GET['var'])){
		$email = $_GET['var']; 
	}
	//logout from the account
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
      <style>
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
        #title{
          text-align: center;
          margin-top: 2%;
        }
        body {font-family: Arial, Helvetica, sans-serif;}
      * {box-sizing: border-box;}

       #paragraph {
        width: 45%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin: 0 35%;
      }
      #sidenav{
        margin-top: -38%;
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
      </style>
   </head>
   <body>
      <div id="container">
      	<!-- Nav bar -->
         <div id="nav">
            <img src="logo2.png" id="logo"></a>
            <form action="about.php?var=<?php echo $email?>" method="POST">
              <input id="logout" type="submit" value="Logout" name='logout'>
            </form>
         </div>
         <!-- End of nav -->


	<!-- Body  -->


		<!-- Side nav -->
    <div>
      <h1 id="title" >About</h1>
    <br><br><br><br><br><br><br>
    <div class="formcontainer">
    <p id="paragraph" style="font-size:110%;text-align: center"> 
    The “FiscalOptima” is a Finance based web application which would help businessman and other small business owners. This application would help users to manage their business well. This application would help our users to find their transactions, view their monthly statements and generate invoices upon request. All this data would be accessible only if the users provide their financial details, all their expenditures, and savings as a detailed transaction.
    Based on the collected information and the data already present in our database (which is located on a web server), our web application would verify user information to produce an accurate invoice which would reflect upon the business’ profits or loss. This application would need access to the Internet and the allocated database to generate results and also produce an update on the user’s account balances. This application would work on multiple web browsers like Google Chrome, Internet Explorer and compatible on all versions.

    </p>
    <br><br><br><br><br><br><br><br>
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