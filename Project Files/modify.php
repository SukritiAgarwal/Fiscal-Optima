<?php
	include 'connection.php'; 
	
	if(isset($_GET['var'])){
		$email=$_GET['var'];
	}
	
	if(isset($_POST['modify'])){
		$date=$_POST['date'];
		$newamount=$_POST['newamount'];
		$amount=$_POST['amount'];
		$description=$_POST['description'];
		if($date!="" && $amount!="" && $description!="" && $newamount!=""){
			$sql="UPDATE accountstatement SET amount='$newamount',description='$description' WHERE email='$email' AND amount='$amount' AND tdate='$date' ";
			
			//$addtransaction=mysqli_query($conn,$sql);
			if(mysqli_query($conn,$sql)){
				echo '<script language="javascript">';
				echo 'alert("Successfully modified the transaction in the database!")';
				echo '</script>';
				header("location:modify.php?var=$email");
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful!")';
				echo '</script>';
			}
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("All fields are required for modifing a transaction!")';
			echo '</script>';
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
          margin-top: -18%;
        }
        #modify{
          padding: 10px 30px;
          font-family:verdana;
          font-size:100;
        }
        #delete{
          padding: 10px 30px;
          font-family:verdana;
          font-size:100;
        }
        body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input, select, textarea{
  width: 65%;
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
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  width: 20%;
  margin-left: 40%;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.formcontainer {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: 0 30%;
  margin-bottom: -23%;
  width: 40%;
}
#amount, #newamount{
  width: 25%;
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

#date_tab{
  width: 35%;
}


      </style>
   </head>
   <body>
      <div id="container">
        <!-- Nav bar -->
         <div id="nav">
            <img src="logo2.png" id="logo"></a>
            <form action="modify.php?var=<?php echo $email?>" method="POST">
              <input id="logout" type="submit" value="Logout" name='logout'>
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
      <th id="modify"><a href="modify.php?var=<?php echo $email?>"> <div><strong>Modify</strong></div> </a></th>
      <th id="delete"><a href="delete.php?var=<?php echo $email?>"> <div> Delete</div> </a></th> 
    </tr>
  </table>



  <div class="formcontainer">
  <form action="modify.php?var=<?php echo $email?>" method="POST" >

    <label>Date:</label>
<br>
    <input type="date" id="date_tab" name="date">
<br>
    <label for="description">New description:</label>
<br>
    <textarea id="description" name="description" rows="10" maxlength="250">
    </textarea>
<br>
    <label for="amount"> Amount:</label>
<br>
    <td>$<input type="number" name="amount" id="amount"></td>
<br>
    <label for="newamount"> New Amount:</label>
<br>
    <td>$<input type="number" name="newamount" id="newamount"></td>
<br>
    <input type="submit" value="Modify" name="modify">
<br>
  </form>
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