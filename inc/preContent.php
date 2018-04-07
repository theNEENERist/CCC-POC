<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/../../../../favicon.ico" rel="icon">

	<title><?php echo isset($title) ? $title : "Calvary Christian Church" ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/../css/carousel.css" rel="stylesheet">
	
	<link href="/../css/main.css" rel="stylesheet">
	
	<script type="text/javascript" src="/../js/jquery-3.3.1.min.js"></script>
	<script defer src="/../js/fontawesome-all.js"></script>
 </head>
 <body>
	<?php include 'header.php'?>
	
	<?php
		if($title != "CCC - Home" && $imgSrc != "")
		{
	?>
		<div class="heroImg">
			<img src="<?php echo $imgSrc; ?>">
		</div>
	<?php
		}
		
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
        
	?>