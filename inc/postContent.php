	<section id="footer" class="pt-4">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-6 col-md-3">
					<h5>About Us</h5>
					<hr>
					<ul class="list-unstyled quick-links">
						<li><a href="about_us.php">About</a></li>
						<li><a href="#">Service Times</a></li>
						<li><a href="our_story.php">Our Story</a></li>
						<li><a href="what_we_believe.php">Our Worldview</a></li>
						<li><a href="what_to_expect.php">Plan Your Visit</a></li>
						<li><a href="our_leaders.php">Our Leaders</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<h5>Sermons</h5>
					<hr>
					<ul class="list-unstyled quick-links">
						<li><a href="sermons_and_worship.php">Watch Past Sermons</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<h5>Classes</h5>
					<hr>
					<ul class="list-unstyled quick-links">
						<li><a href="#"></i>Children/Youth</a></li>
						<li><a href="#"></i>Adult</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<h5>Find Us</h5>
					<hr>
					<ul class="list-unstyled quick-links">
						<li><a href="directions.php"></i>Find Us</a></li>
					</ul>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-md-3 mt-2 mt-sm-2 text-center text-white float-left">
					<a class="navbar-brand" href="/index.php"><img src="../img/calvary-header-logo.png" /></a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9 mt-2 mt-sm-2 text-white float-left">
					<div class="col-sm-12 col-md-12 col-lg-6 float-left text-center">
						605 Norman Drive<br>
						Sellersburg, IN 47172<br>
						(812) 246-4383<br>
						<a href="info@calvarychristianchurch.com">info@calvarychristianchurch.com</a>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 float-left mt-4 text-center">
						<ul class="list-unstyled list-inline social text-center">
							<li class="list-inline-item" ><a href="https://www.facebook.com/calvarychristianchurchsellersburg/" target="_blank"><i style="font-size: 40px;" class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item" ><a href="https://www.youtube.com/channel/UC7z_cEyyFvQ0VMAKDm7y9_w" target="_blank"><i style="font-size: 40px;" class="fab fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				</hr>
			</div>			
		</div>
	</section>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
		<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="../js/bootstrap.min.js"></script>
		
		<script type="text/javascript">
			jQuery(window).scroll(function(){
				var fromTopPx;
				var screenWidth = $(window).width();
				
				if (screenWidth > 767px){
					if(location.pathname.replace("/", "") === "index.php") {
						fromTopPx = 800; // distance to trigger
					}else {
						fromTopPx = 512;
					}
					var scrolledFromtop = jQuery(window).scrollTop();
					if(scrolledFromtop > fromTopPx){
						jQuery('#navigate').addClass('bg-blue');
						$('#navImg').attr('src', '../img/calvary-header-logo.png');
					}else{
						jQuery('#navigate').removeClass('bg-blue');
						$('#navImg').attr('src', '../img/ccc-web-logo.png');					
					}
				}
				else {
					jQuery('#navigate').addClass('bg-blue');
					$('#navImg').attr('src', '../img/calvary-web-logo.png');
				}
			});
		</script>


		<svg xmlns="http://www.w3.org/2000/svg" style="left: -100%; top: -100%; display: none; visibility: hidden; position: absolute;" viewBox="0 0 500 500" preserveAspectRatio="none meet" width="500" height="500"><defs><style type="text/css" /></defs><text style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif" x="0" y="25">500x500</text></svg>
</body>
</html>