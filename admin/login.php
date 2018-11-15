<?php 
	global $variable;
	$imgSrc = "";
?>
<?php $title = "CCC - Admin" ?>
<?php include '../inc/adminPreContent.php'?>
<?php // accesscontrol.php
// include_once 'common.php';
include_once 'db.php';

session_start();

$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

if(!isset($uid)) {
?>

<body id="LoginForm">
   <div class="container">
      <div class="login-form">
         <div class="main-div col-xs-12 col-s-12 col-md-12 col-lg-5">
            <img style="background: #0066ff; width: 60%;" class="mb-3" alt="Calvary Christian Chuch" src="../../img/FINAL LOGO.jpg" />
            <div class="panel">
               <h2>Admin Login</h2>
               <p>Please enter your email and password</p>
            </div>
            <form id="Login" method="post" action="<?=$_SERVER['PHP_SELF']?>">
               <div class="form-group">
                  <input type="email" class="form-control" id="username" placeholder="Email Address">
               </div>
               <div class="form-group">
                  <input type="password" class="form-control" id="password" placeholder="Password">
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
            </form>
         </div>
      </div>
   </div>
</div>

<?php
$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
      or die ('Could not connect to the database server' . mysqli_connect_error());

      //password_hash($password, PASSWORD_DEFAULT);

   $sql = "SELECT 
               username
            FROM ccc.users
            WHERE username = 'joel.b.leach@gmail.com'
            AND password = PASSWORD('narnia3#');";

   $result = $mysqli->query($sql);
?>

<?php include '../inc/adminPostContent.php'?>