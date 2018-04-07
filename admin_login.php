<?php
   session_start();
   
   global $variable;
	$imgSrc = "";
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<?php $title = "CCC - Prayer Requests" ?>
<?php include 'inc/preContent.php'?>

<div class="container mt-5">      
      <h2>Enter Username and Password</h2> 
      <div class="container">
         
        <?php
		echo crypt('asdf', 'st');
		$error = '';
            if($_SERVER["REQUEST_METHOD"] == "POST") {
			  // username and password sent from form 
			  
			  $mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
				or die ('Could not connect to the database server' . mysqli_connect_error());
			  
			  $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
			  $mypassword = crypt(mysqli_real_escape_string($mysqli,$_POST['password']), 'st');
			  
			  $sql = "SELECT id FROM ccc.users WHERE username = '$myusername' and password = '$mypassword'";
			  echo $sql;
			  $result = mysqli_query($mysqli,$sql);
			  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			  
			  $count = mysqli_num_rows($result);
			  
			  // If result matched $myusername and $mypassword, table row must be 1 row
				
			  if($count == 1) {
				 $_SESSION['login_user'] = $myusername;
				 
				 header("location: welcome.php");
			  }else {
				 $error = "Your Login Name or Password is invalid";
			  }
			}

         ?>
      </div> <!-- /container -->
      
      <div>
         <form role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            <input type="text" class="form-control col-3" name="username" required autofocus></br>
            <input type="password" class="form-control col-3" name="password" placeholder required>
            <button type="submit" class="btn btn-default mt-2">Login</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div>
</div>
<?php include 'inc/postContent.php'?>