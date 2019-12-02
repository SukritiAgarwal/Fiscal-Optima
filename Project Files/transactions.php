<?php
	include 'connection.php'; 
	if(isset($_GET['var'])){
		$email=$_GET['var'];
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

        table,th {
          position:relative;
    
          border: 1px solid black;
          margin: 0 30%;
          width: 40%;
        }

        #sidenav{
          margin-top: -3%;
        }
        #modify,#delete{
          padding: 10px 30px;
          font-family:verdana;
          font-size:100;
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
            <form action="transactions.php" method="POST">
              <input id="logout" type="submit" value="Logout" name="logout">
            </form>
         </div>
         <!-- End of nav -->


	<!-- Body  -->

  <div>
      <h1 id="title" >Transactions</h1>
  </div>
  <br>

  <table>
    <tr>
      <th id="modify"><a href="modify.php?var=<?php echo $email?>"> <div>Modify</div> </a></th>
      <th id="delete"><a href="delete.php?var=<?php echo $email?>"> <div> Delete</div> </a></th> 
    </tr>
  </table>

		<!-- Side nav -->
		
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