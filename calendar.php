<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.webp";
?>

<?php $title = "CCC - Calendar" ?>
<?php include 'inc/preContent.php'?>

<div class="container">
	<div class="col overflow-auto mt-4">
		<h1>Church Calendar</h1>
	</div>
	
	<div class="col text-center calendar">
		<iframe src="https://calendar.google.com/calendar/embed?title=Calvary+Christian+Calendar&src=calvarychristiancalendar@gmail.com" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</div>
</div>

<?php include 'inc/postContent.php'?>