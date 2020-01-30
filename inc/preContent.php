<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Calvary Christian Church. 605 Norman Drive, Sellersburg, IN 47172. (812) 246-4383. info@calvarychristianchurch.com">
  	<meta name="theme-color" content="#0066ff"/>
   <meta name="author" content="">
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo isset($title) ? $title : "Calvary Christian Church" ?>" />
	<meta property="og:url" content="<?php echo 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:image" content="https://www.calvarychristianchurch.com/img/finalLogo.jpg" />
	<meta property="og:description" content="Calvary Christian Church is a nondenominational, Bible-believing church within the fellowship of the Restoration Movement." />
 	<link href="/../img/favicon.ico" rel="icon">
	
	<?php
		date_default_timezone_set('America/New_York');
	?>

	<title><?php echo isset($title) ? $title : "Calvary Christian Church" ?></title>

    <!-- Bootstrap core CSS -->
   <link href="/../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <link href="/../css/carousel.css" rel="stylesheet">
	
	<link href="/../css/main.css" media="screen" rel="stylesheet">

	<!-- <link rel="stylesheet" media="print" href="css/print.css"/> -->
	
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
	<?php include 'header.php'?>
	
	<?php
		if($title != "CCC - Home" && $imgSrc != "")
		{
	?>
	<div class="marginForHiding">
		<div class="jumbotron hideMobile" style="width:100%;overflow: hidden; height: 32rem; padding: 0; margin: 0;">
			<img src="<?php echo $imgSrc; ?>" alt="Jumbotron" style="height: 50rem;min-width: 100%;"/>
		</div>
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