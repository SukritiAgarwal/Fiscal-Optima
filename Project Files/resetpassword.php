<?php
	include 'connection.php';
	if(isset($_POST['reset'])){
		$pass=$_POST['password'];
		$cpass=$_POST['confirmpassword'];
		$email=$_SESSION['email'];
		if($pass==$cpass){
			$updatePasswordQuery=mysqli_query($conn,"UPDATE userdetails SET password='$pass' WHERE email='$email' ");
			if(mysqli_affected_rows($conn)==1){
				echo '<script language="javascript">';
				echo 'alert("Password reset was successful!")';
				echo '</script>';
				header("location:index.php");
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Password reset was unsuccessful!")';
				echo '</script>';
			}
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("passwords do not match!")';
			echo '</script>';
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
      #newpassword,#confirmpassword{
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
  <form action="resetpassword.php" method="POST" >
    <label for="password"> Enter new-password:</label>
    <input type="password" id="newpassword" name="password" >
<br>
<br>
    <label for="confirmpassword"> Confirm-password:</label>
<br>
    <input type="password" id="confirmpassword" name="confirmpassword"></input>
<br>
    <input type="submit" value="Confirm Password" name="reset">
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