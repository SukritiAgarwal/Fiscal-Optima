<?php
	include 'connection.php';
	if(isset($_GET['var'])){
		$email=$_GET['var'];
	}
	if(isset($_POST['paymentsreceived'])){
		$date=$_POST['Date'];
		$customer=$_POST['From'];
		$amount=$_POST['amount'];
		$description=$_POST['description'];
		if($date!="" && $amount!="" && $description!="" && $customer!=""){
			$sql="INSERT INTO accountstatement(email,tdate,customer,description,amount) VALUES ('$email','$date','$customer','$description','$amount') ";
			//$addtransaction=mysqli_query($conn,$sql);
			if(mysqli_query($conn,$sql)){
				header("location:paymentsreceived.php?var='$email'");
				echo '<script language="javascript">';
				echo 'alert("Successfully added the payment received to the database!")';
				echo '</script>';
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful!")';
				echo '</script>';
			}
		}
		else{
		}
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
	height: 20%;
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

/*input[type=submit]:hover {
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
#title{
	text-align: center;
	margin-top: 2%;
}
#logout{
  float: right;
  margin-top:-5%;
  padding: 5px;
  background-color: gray;
}
</style>

   </head>
   <body>
      <div id="container">
      	<!-- Nav bar -->
         <div id="nav">
            <img src="logo2.png" id="logo"></a>
            <form action="paymentsreceived.php?var=<?php echo $email?>" method="POST">
              <input id="logout" type="submit" value="Logout" name="logout">
            </form>
         </div>
         <!-- End of nav -->


	<!-- Body  -->

<div>

<h1 id="title" >
	Payments Received</h1>
<div class="formcontainer">
  <form action="paymentsreceived.php?var=<?php echo $email?>" method="POST" >

    <label for="date">Date:</label>
<br>
    <input type="date" id="date" name="Date">
<br>
    <label for="description">From:</label>
<br>
    <input type="text" id="text" name="From">
<br>
    <label for="description">Description:</label>
<br>
    <textarea id="description" name="description" rows="10" maxlength="250">
    </textarea>
<br>
  	<label for="amount"> Amount:</label>
<br>
  	<td>$<input type="number" name="amount" id="amount"></td>
<br>
    <input type="submit" value="Submit" name="paymentsreceived">
<br>
  </form>
</div>




</div>
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