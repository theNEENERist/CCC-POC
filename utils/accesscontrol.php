<?php $title = "CCC - Admin" ?>
<?php include '../inc/adminPreContent.php'?>
<?php // accesscontrol.php
// include_once 'common.php';
include_once 'db.php';

session_start();

if((isset($_SESSION['username']) &&  isset($_SESSION['password'])) || (isset($_POST['username']) && isset($_POST['password']))) {
  $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
  $password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password'];
}

if(!isset($username)) {
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
                  <input type="email" class="form-control" name="username" id="username" placeholder="Email Address">
               </div>
               <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
            </form>
         </div>
      </div>
   </div>

  <?php
  exit;
}
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$hash = password_hash('narnia3#', PASSWORD_DEFAULT);
// echo($hash);

$conn = dbConnect("ccc");
$sql = "SELECT * FROM ccc.users WHERE
          username = 'joel.b.leach@gmail.com';";
$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);
echo(password_verify('narnia3#', $row['password']));

if (!$result) {
  error('A database error occurred while checking your '.
        'login details.\\nIf this error persists, please '.
        'contact you@example.com.');
}

if (mysqli_num_rows($result) == 0) {
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  ?>
  <h1> Access Denied </h1>
  <p>Your user ID or password is incorrect, or you are not a
     registered user on this site. To try logging in again, click
     <a href="<?=$_SERVER['PHP_SELF']?>">here</a>. To register for instant
     access, click <a href="signup.php">here</a>.</p>
  <?php
  exit;
}

// $username = mysql_result($result,0,'fullname');
?>

<?php include '../inc/adminPostContent.php'?>