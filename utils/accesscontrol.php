<?php $title = "CCC - Admin" ?>
<?php include '../inc/adminPreContent.php'?>
<?php
include_once 'db.php';

session_start();
  $showError = false;
  
  if(isset($_POST['username'])) {
    $username = $_POST['username'];
  }
  if(isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
  }

if(!isset($username)) {
  ?>
  <body id="LoginForm">
    <div class="container">
      <div class="login-form">
         <div class="main-div col-xs-12 col-s-12 col-md-12 col-lg-5">
            <img style="background: #0066ff; width: 60%;" class="mb-3" alt="Calvary Christian Chuch" src="../../img/finalLogo.jpg" />
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
  </body>

  <?php
  exit;
}
// $mysqli = dbConnect("ccc");
// $dhhost = 'localhost:3306';
// $dbuser = 'root';
// $dbpass = DBPASS;
// $dbname = 'ccc';
// $mysqli = new mysqli('calvar.fatcowmysql.com:3306', 'calvar', 'narnia3#', 'ccc'); 
// $mysqli = new mysqli('localhost:3306', 'root', 'narnia3#', 'ccc'); 

    if (!$mysqli) { 
        die('Could not connect: ' . mysqli_error()); 
    } 
    mysqli_select_db(ccc);

if ($stmt = $mysqli->prepare("SELECT * FROM ccc.users WHERE username = ?;")) {
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $stmt->bind_result($id, $un, $pwd);
   $stmt->fetch();
   $stmt->close();
}
if (password_verify($password, $pwd) == 1) {
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
} else {
  ?>
    <body id="LoginForm">
      <div class="container">
        <div class="login-form">
          <div class="main-div col-xs-12 col-s-12 col-md-12 col-lg-5">
              <img style="background: #0066ff; width: 60%;" class="mb-3" alt="Calvary Christian Chuch" src="../../img/finalLogo.jpg" />
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
                <div class="alert alert-danger mt-2" role="alert">
                    You entered an invalid username or password.
                </div>
              </form>
          </div>
        </div>
      </div>
    </body>
  <?php
  exit;
}
?>

<?php include '../inc/adminPostContent.php'?>