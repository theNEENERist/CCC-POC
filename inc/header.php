<header>
	 <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navigate">
		<!--<a class="navbar-brand" href="/index.php">Calvary Christian Church</a>-->
		<a class="navbar-brand" href="/index.php"><img id="navImg" alt="Calvary Christian Chuch" src="../img/ccc-web-logo.png" /></a>
		<button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav ml-auto pr-4 navbar-right">
					<li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle" href="#" class="aboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  I'M NEW
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="/about_us.php">About Us</a>
					  <a class="dropdown-item" href="/our_story.php">Our Story</a>
					  <a class="dropdown-item" href="/our_leaders.php">Our Leadership</a>
					  <a class="dropdown-item" href="/what_we_believe.php">Our Worldview</a>
					  <a class="dropdown-item" href="/what_to_expect.php">Plan Your Visit</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						CONNECT
					</a>
					<div class="dropdown-menu" aria-labelleddby="navbarDropdown">
						<a class="dropdown-item" target="_blank" href="https://calendar.google.com/calendar/embed?title=Calvary+Christian+Calendar&src=calvarychristiancalendar@gmail.com">Calendar <i class="fas fa-external-link-alt" style="color: #0066ff"></i></a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" class="aboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MEDIA</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/Media/live_stream.php">Live Stream</a>
						<a class="dropdown-item" href="/Media/past_services.php">Past Services</a>
					</div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="classes.php">Classes</a>
				</li> -->
				<!-- <li class="nav-item dropdown">
					 <a class="nav-link dropdown-toggle" href="#" id="prayerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Prayer
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="prayer_list.php">Prayer List</a>
					  <a class="dropdown-item" href="submit_prayer_request.php">Submit a Request</a>
					</div>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="/directions.php">FIND US</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<script type="text/javascript">
		var aboutPages = ['about_us.php', 'our_leaders.php', 'our_story.php', 'what_to_expect.php', 'what_we_believe.php'];
		var isAboutPage = (aboutPages.indexOf(location.pathname.replace("/", "")) > -1);
		
		if(isAboutPage) {
			$(".aboutDropdown").addClass("active");
		}
			$("a[href*='" + location.pathname.replace("/", "") + "']").addClass("active");
			
		var prayerPages = ['prayer_requests.php', 'submit_prayer_request.php'];
		var isPrayerPage = (prayerPages.indexOf(location.pathname.replace("/", "")) > -1);
		
		if(isPrayerPage) {
			$("#prayerDropdown").addClass("active");
		}
			$("a[href*='" + location.pathname.replace("/", "") + "']").addClass("active");
		
	</script>
	
</header>