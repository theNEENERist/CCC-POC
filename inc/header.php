<header>
	 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="/index.php">Calvary Christian Church</a>
		<button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  About Us
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="about_us.php">About Us</a>
					  <a class="dropdown-item" href="our_leaders.php">Our Leaders</a>
					  <a class="dropdown-item" href="our_story.php">Our Story</a>
					  <a class="dropdown-item" href="what_to_expect.php">What to Expect</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="sermons_and_worship.php">Sermons & Worship</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="calendar.php">Calendar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="directions.php">Directions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="classes.php">Classes</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<script type="text/javascript">
		var aboutPages = ['about_us.php', 'our_leaders.php', 'our_story.php', 'what_to_expect.php'];
		
		var isAboutPage = (aboutPages.indexOf(location.pathname.replace("/", "")) > -1);
		
		if(isAboutPage) {
			$("#aboutDropdown").addClass("active");
		}
			$("a[href*='" + location.pathname.replace("/", "") + "']").addClass("active");
		
	</script>
	
</header>