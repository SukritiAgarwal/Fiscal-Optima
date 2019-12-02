<?php
	include 'connection.php';
	if(isset($_SESSION['email'])){
		if(isset($_GET['val'])){
			$email = $_GET['val']; 
		}
		if(isset($_SESSION['email'])){
			$email=$_SESSION['email'];
		}
		$resultsql="SELECT * from userdetails NATURAL JOIN accountstatement where email='$email' ORDER BY tdate DESC";
		$result=$conn->query($resultsql);
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
		<link rel="stylesheet" href="accounthistory.css">
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
        .tablecontainer {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			float: right;
			width: 25%;
			text-align: center;
			position: relative;
			margin: 5% 36% 0 0;
		}
        table, th, td{
			border: 1px solid;
			padding: 7px;
        }
		
		</style>
    </head>
	<body>
		<div id="container">
        <!-- Nav bar -->
			<div id="nav">
				<img src="logo2.png" id="logo"></a>
				<form action="accounthistory.php" method="POST">
					<input id="logout" type="submit" value="Logout" name='logout'>
				</form>
			</div>
			<!-- End of nav -->
	
			<!-- Body  -->


			<!-- Side nav -->

			<div>
			  <div style="margin-left:78%"><?php echo "Welcome, ".$_SESSION['email'] ?></div>
			</div>
			<div>
				<h1 id="title" >Account History</h1>
			</div>
			<div id="sidenav">
				<a class="side_link"  href="accounthistory.php?var=<?php echo $_SESSION['email']?>">
				Account History</a>
				<a class="side_link"  href="paymentsmade.php?var=<?php echo $_SESSION['email']?>">
				Payments Made</a>
				<a  class="side_link" href="paymentsreceived.php?var=<?php echo $_SESSION['email']?>">
				Payments Received</a>
				<a  class="side_link" href="transactions.php?var=<?php echo $_SESSION['email']?>">
				Transactions</a>
				<a  class="side_link" href="monthlystatement.php?var=<?php echo $_SESSION['email']?>">
				Monthly Statement</a>
				<a  class="side_link" href="generateinvoice.php?var=<?php echo $_SESSION['email']?>">
				Generate Invoice</a>
				<a  class="side_link" href="about.php?var=<?php echo $_SESSION['email']?>">About</a>
			</div>

			<!-- End side nav -->


							<div class="tablecontainer">
					<?php
					if($result->num_rows >0){
						$number=1;
						echo "<table><tr><th>#</th><th>Date</th><th>Description</th><th>Amount</th></tr>";
						while($row=$result->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$number++ ."</td><td>".$row["tdate"]. " </td><td>". $row["description"]. "</td><td>" . $row["amount"] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else {
						echo "0 results";
					} 
					?>
				</div>
				
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