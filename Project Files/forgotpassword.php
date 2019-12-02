<?php
	include 'connection.php';
	if(isset($_POST['forgot'])){
		if(isset($_POST['email']) && ($_POST['email']!="")){
			$email=$_POST['email'];
			$DOB=$_POST['dob'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)===false){
				$checkemail=mysqli_query($conn,"select * from userdetails where email='$email'");
				$count=mysqli_num_rows($checkemail);
				$row=mysqli_fetch_array($checkemail);
				if($count==1){
					if($DOB==$row['dob']){
						$_SESSION['email']=$email;
						header("location:resetpassword.php");
					}
					else{
						echo '<script language="javascript">';
						echo 'alert("Information invalid")';
						echo '</script>';
					}
				}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Some fields are missing!")';
				echo '</script>';
			}
		}
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
        bottom: -11px;
        height: 50px;
        clear: both;
      }

        body {font-family: Arial, Helvetica, sans-serif;}
      * {box-sizing: border-box;}

      input, select, textarea {
        width: 45%;
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

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .formcontainer {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        /*float: right;*/
        margin: 10% 25%;
        width: 50%;
      }
      #email,#dob{
        width:35%;
        margin-left: 30%;
      }
      label{
        margin-left: 25%;
        font-size: 16pt;
      }

</style>

   </head>
   <body>
      <div id="container">
        <!-- Nav bar -->
         <div id="nav">
            <img src="logo2.png" id="logo"></a>
         </div>
         <!-- End of nav -->


  <!-- Body  -->
  <div>
    <div class="formcontainer">
  <form action="forgotPassword.php" method="POST" >
    <label for="email"> Insert email:</label>
    <input type="email" id="email" name="email" required>
<br>
<br>
    <label for="date"> What is your D.O.B?</label>
<br>
    <input type="date" id="dob" name="dob" required></input>
<br>
    <input type="submit" value="Continue" name="forgot" ">
<br>
  </form>
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