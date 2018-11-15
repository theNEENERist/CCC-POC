<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Calvary Christian Church. 605 Norman Drive, Sellersburg, IN 47172. (812) 246-4383. info@calvarychristianchurch.com">
  	<meta name="theme-color" content="#0066ff"/>
   <meta name="author" content="">
   <link href="/../../../../favicon.ico" rel="icon">
	<?php
			date_default_timezone_set('America/New_York');
	?>

	<title><?php echo isset($title) ? $title : "Calvary Christian Church" ?></title>

    <!-- Bootstrap core CSS -->
   <link href="/../css/bootstrap.min.css" rel="stylesheet">

	<link href="/../css/admin.css" media="screen" rel="stylesheet">

	<script type="text/javascript" src="/../js/jquery-3.3.1.min.js"></script>
	<script defer src="/../js/fontawesome-all.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118367769-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-118367769-1');
	</script>

 </head>
 <body>
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
        
	?>