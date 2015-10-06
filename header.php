<?php 

$conn = new mysqli("localhost", "root", "", "EshopDB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "error";
}

?>
<?php
		//session_start();
		//include_once 'dbconnect.php';
		if(isset($_SESSION['user']))
		{
		 header("Location: header.php");
		 die();
		}
		

		if(isset($_POST['signin']))
		{
		 $uname = mysql_real_escape_string($_POST['usernameid']);
		 $upass = mysql_real_escape_string($_POST['passwordinput']); //textfield
		// $sql = "SELECT * FROM Users WHERE '$uname'=Username";
		$sql = "SELECT * FROM Users WHERE Username= '$uname'";
		$result = $conn->query($sql);
		$row = $result->fetch_array();
		$pass=$row['Password'];

		if ($result->num_rows > 0) 
		{	
			

			if($upass==$pass )//password_verify('$upass',$pass))
			{
					    $_SESSION['user'] = $row['Username'];
		  		        $sql = "SELECT * FROM Users WHERE Username= '$uname'";
						$result = $conn->query($sql);
						$row = $result->fetch_array();
						echo "string";
						
			}
			else
				{
				echo '<div class="bs-example">
			    <div class="alert alert-danger fade in " class="alert">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> Please enter a correct password
			    </div>
				</div>';




						

				}


		} 
		else
		{
			//header('Location: flash.php');
			include 'flash.php';

			
			//include 'testsss.js'
			//echo 'msgChange($(\'#div-login-msg\'), $(\'#icon-login-msg\'), $(\'#text-login-msg\'), "error", "glyphicon-remove", "Login error")';
			echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> PLease sign up first
			    </div>
				</div>';
			echo ". $conn->error";
		}

		}
	
		if(isset($_POST['confirmsignup']))
		{
		 $uname = mysql_real_escape_string($_POST['usernameid_s']);
		 $email = mysql_real_escape_string($_POST['emailid_s']);
		 //$p=mysql_real_escape_string($_POST['passwordid_s']);
		 $upass = mysql_real_escape_string($_POST['passwordid_s']);//password_hash('$p',PASSWORD_BCRYPT, array('cost'=>10));
		 $firstname = (mysql_real_escape_string($_POST['firstnameid_s']));
		 $lastname = (mysql_real_escape_string($_POST['lastnameid_s']));
		 $confirmpass = mysql_real_escape_string($_POST['reenterpassword']);
		//search for the user in db if count is greater than 0 
		 // exception pick a unique username
		 //confirm password
		 //email format validations 

		 if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
		 {
		$sql = "SELECT Username FROM Users WHERE Username= '$uname'";
		$result = $conn->query($sql);
		$row = $result->fetch_array();
		if ($result->num_rows > 0) 
		{
		    
		  		       echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> This username name is already exists.Please enter a different username
			    </div>
				</div>';
		} 
		elseif($upass != $confirmpass)
		{

			echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> Please re-enter your password
			    </div>
				</div>';
		}
		elseif(strlen($upass)<8)
		{

			echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> Your password should be more than 7 characters
			    </div>
				</div>';
		}
		else 
		{
		   
		 $sql = "INSERT INTO Users(Username,Email,Password,firstname,lastname) VALUES('$uname','$email','$upass','$firstname',' $lastname')";


		if ($conn->query($sql) === TRUE) 
			{
	    		echo '<div class="alert alert-success fade in">
				    <a href="#" class="close" data-dismiss="alert">&times;</a>
				    <strong>Success!</strong> Your account has been created successfully.
					</div>';
			} 
			else 
			{
	    		echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> Please try again
			    </div>
				</div>';

	    	}	
	    	}

		}
		else {
	    		echo '<div class="bs-example">
			    <div class="alert alert-danger fade in fade out">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Error!</strong> Invalid email address
			    </div>
				</div>';
	    	}	
	    }

		/////logout
?>