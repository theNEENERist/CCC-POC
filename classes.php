<?php 
	global $variable;
	$imgSrc = "../img/crappy_live_streams.jpg";
?>

<?php $title = "CCC - Sermons & Worship" ?>
<?php include 'inc/preContent.php'?>
	
	<div class="container">
		<div class="col-sm-3 col-md-6 col-lg-12 overflow-auto mt-4">
			<h1>Our Classes</h1>
			<p>We have classes available on Sunday and Thursday mornings; as well as Wednesday evenings.</p>
		</div>
		<div>
		
		<?php
		   $dbhost = '127.0.0.1:3036';
		   $dbuser = 'root';
		   $dbpass = 'narnia3#';
		   $database = 'ccc';
		   
			$host="localhost";
			$port=3306;
			$socket="";
			$user="root";
			$password="";
			$dbname="";

			$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
				or die ('Could not connect to the database server' . mysqli_connect_error());

			//$con->close();

		   
		   // if(! $conn ) {
			  // die('Could not connect: ' . mysql_error());
		   // }
		   
		   // @mysql_select_db($database) or die( "Unable to select database");
		   
		   $sql = 'SELECT 
				teacher
				,topic
				,classType
			FROM ccc.class';

			$result = $mysqli->query($sql);
			foreach ($result as $row)
			{
				echo $row['teacher'] . "<br/>";
				echo $row['topic'] . "<br/>";
				echo $row['classType'] . "<br/>";
			}
			


// $mysqli->query($sql);
		   // $retval = mysql_query( $sql, $conn );
		   
		   // if(! $retval ) {
			  // die('Could not get data: ' . mysql_error());
		   // }
		   
		   
		   
		   
		   mysqli_close($mysqli);
		?>
			
			<!--<div class="col-sm-3 col-md-6 col-lg-4 float-left text-center">
				<h4>Sunday - 9:30 AM</h4>
				<hr/>
				<div>
					Learn the Bible in 24 Hours
					<br/>
					Jack Warner
				</div>
			</div>
			
			<div class="col-sm-3 col-md-6 col-lg-4 float-left text-center">
				<h4>Wednesday - 6:30 PM</h4>
				<hr/>
			</div>
			
			
			<div class="col-sm-3 col-md-6 col-lg-4 float-left text-center">
				<h4>Thursday - 10:00 PM</h4>
				<hr/>
			</div>-->
			
		</div>
	<div>

<?php include 'inc/postContent.php'?>