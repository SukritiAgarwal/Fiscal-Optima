<?php
	include 'connection.php';
	$fname = $lname= $gender= $companyName=$email=$phone=$password=$cpassword=$dob=""; 
	if(isset($_POST['register'])){
		if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["genderoption"]) || empty($_POST["companyname"]) || empty($_POST["emailaddress"]) || empty($_POST["telphone"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"]) || empty($_POST["dob"])){
			echo '<script language="javascript">';
			echo 'alert("All fields are required!")';
			echo '</script>';
		}
    else{
			$fname = mysqli_real_escape_string($conn,$_POST["firstname"]);
			$lname = mysqli_real_escape_string($conn,$_POST["lastname"]);
			$gender = mysqli_real_escape_string($conn,$_POST["genderoption"]);
			$companyName = mysqli_real_escape_string($conn,$_POST["companyname"]);
			$email = mysqli_real_escape_string($conn,$_POST["emailaddress"]);
			$phone = mysqli_real_escape_string($conn,$_POST["telphone"]);
			$password = mysqli_real_escape_string($conn,$_POST["password"]);
			$cpassword = mysqli_real_escape_string($conn,$_POST["confirmpassword"]);
			$dob=$_POST["dob"];
			if($password == $cpassword){
			//$password = md5($password);
				$sql="INSERT INTO userdetails(fname,lname,gender,companyName,email,phone,password,dob) 
				  VALUES ('$fname','$lname','$gender','$companyName','$email','$phone','$password','$dob')";
				if ($conn->query($sql) === TRUE) {
					$_SESSION['email']=$email;
					header("location: AccountHistory.php");
				} else {
					echo '<script language="javascript">';
					echo 'alert("User already exists! Please Login")';
					echo '</script>';
				}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Passwords do not match")';
				echo '</script>';
			}
		}
    }
	$uname="";
	$pass="";
	if(isset($_POST['login'])) {  
		$uname = mysqli_real_escape_string($conn,$_POST["uname"]);
		$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
		if(!empty($_POST["uname"]) && !empty($_POST["pass"])){
			$result=mysqli_query($conn,"SELECT  * from userdetails where email='$uname' and password='$pass'") or die("Failed to query database");
			$row=mysqli_fetch_array($result);
			if($row['email']==$uname && $row['password']==$pass){
				$_SESSION['email']=$uname;
				header("location: AccountHistory.php");
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Account does not exist")';
				echo '</script>';
			}
		}
		else{
			echo '<script language="javascript">';
				echo 'alert("All fields are needed")';
				echo '</script>';
		}
	}
	
?>


<!DOCTYPE html>
<html>
   <head>
      <title>Fiscal Optima</title>
      <link rel="stylesheet" href="style.css">
      <link rel="icon" href="copy.png">
      <style>
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
      #email{
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        width: 13%;
        margin:-5.5% 30% ;
        cursor: pointer;
        float:right;
      }
      #password{
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        width: 13%;
        margin:-5.5% 13.5% ;
        cursor: pointer;
        float:right;
      }
      .forgotpassword{
        float:right;
        margin: 7% 22% 0;
        color: yellow;
      }
      .forgotpassword:hover {
        color: red;
      }
      .formcontainer {
        border-radius: 5px;
        padding: 20px;
        float: right;
        margin: 10%;
        width: 50%;
      }
      #signup{
        background-color: gray;
      }
      input[type=submit] {
        background-color: gray;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        width: 20%;
        margin-left: 30%;
        cursor: pointer;
      }
  
      #signupmenu,#genderoption{
        margin:2% 30% 0;
      }
      #hexagone{
        margin: 5% 0 -70%;
      }
      #signup{
        margin-top:-5%;
        padding: 5px;
      }
      </style>
   </head>
   <body>
      	<!-- Nav bar -->
         <div id="nav">
            <a class="forgotpassword" href="forgotpassword.php"> Forgot password</a>
            <img src="logo2.png" id="logo"></a>
            <form action="index.php" method="POST">
              <input id="email" placeholder="Email Address" type="text" name="uname" required>
              <input id="password" placeholder="Password" type="password" name="pass" required>
              <input id="logout" type="submit" value="Login" name="login">
            </form>
         </div>
         <!-- End of nav -->

        <div id="hexagone">
          <img src="newhexa.png"> 
        </div>
	<!-- Body  -->
    <div class="formcontainer">
    <form id="signupmenu" action="index.php" method="POST">
      First Name: <input type="text" name="firstname" required="required">
    <br>
    <br>
    <br>
      Last Name: <input type="text" name="lastname" required="required">
    <br>
    <br>
    <br>
     Date of birth: <input type="date" name="dob" required="required">
    <br>
    <br>
    <br>
      <label>Gender Option:
      <input type="radio" name="genderoption" value="M" required>Male
      <input type="radio" name="genderoption" value="F">Female
      <input type="radio" name="genderoption" value="O">Other</label>
    <br>
	<br>
	<br>
      Company Name: <input type="text" name="companyname" required="required">
    <br>
    <br>
    <br> 
      Email Address: <input type="email" name="emailaddress" required="required">
    <br>
    <br>
    <br> 
      Phone Number:  <input type="tel" name="telphone" placeholder="888 888 8888" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12"  title="Ten digits code" required/>
    <br>
    <br>
    <br>
    <label>
      New Password: <input id="newpassword" name="password" type="password" required="required">
    </label>
    <br>
    <br>
    <br>
    <label>
      Confirm Password: <input type="password" name="confirmpassword" id="confirmpassword" required="required">
    </label>
    <br>
    <br>
    <br>
      <input id="signup" type="submit" name="register" value="Signup">
    </form>
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