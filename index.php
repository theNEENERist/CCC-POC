<?php $title = "CCC - Home" ?>
<?php include 'inc/preContent.php'?>

	<main role="main" style="margin-bottom: -30px;">
		<div class="jumbotron parallax" style="width:100%;overflow: hidden; height: 50rem; padding: 0; margin: 0;">
			<div style="position: absolute;top: 125px;right: 15%;left: 15%;z-index: 10;padding-top: 40px;padding-bottom: 20px;color: #fff;text-align: center;">
				<h1 id="welcomeText" style="text-shadow: 1px 1px #808080;">Welcome to Calvary Christian</h1>
				<div class="jumbotronInnerContent">
					<div class="address">
						<input type="text" aria-label="Address" class="col-xs-12 col-s-12 col-md-12 col-lg-5" style="margin-left: -7px; height: 60px; line-height: 40px; padding: 8px 35px 8px 8px; margin-bottom: 10px;" id="address" name="address" placeholder="Enter Your Address">
						<a onclick="locateDirections()" style="color: #0066ff; font-size: 35px; margin-left: -35px; z-index: 3; position: relative;" class="map-icon">
							<i title="Directions from my location" class="fas fa-map-marker-alt map-icon clickable" style="margin-bottom: -10px; cursor: pointer;"></i>
						</a>
					</div>
					<a id="btnFindUs" class="btn btn-lg btn-primary col-xs-12 col-s-12 col-md-12 col-lg-5" style="height: 60px; line-height: 40px;" role="button" onclick="findUs()">FIND US</a>
				</div>
				<p style="font-size: 22px; font-weight: 400; text-shadow: 1px 1px #808080;">
					605 NORMAN DRIVE<br/>
					<span style="font-weight: 600;">SUNDAYS @ 10:40 AM</span>
				</p>
			</div>
		</div>

		<div class="modal fade cc-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Church Center</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p><span style="font-size: 24px;">Check us out on Church Center</span></p>
						<p>Calvary Christian Church is now on Church Center!  Check out the app to see announcments and classes, give online, and view a directory of fellow members. You can get the app from your favorite app store or check us out on the web at <a href="https://cccsellersburg.churchcenter.com" target="new">https://cccsellersburg.churchcenter.com</a>!</p>
							<div class="uikit-y52hxi">
								<a href="https://itunes.apple.com/us/app/my-church-center/id1357742931?mt=8&amp;ls=1&amp;ign-mpt=uo%3D4" class="uikit-1jl7zfp">
									<img height="40" alt="Download on iOS App Store" src="../img/cc-apple-store.svg">
								</a>
								<a href="https://play.google.com/store/apps/details?id=com.ministrycentered.churchcenter" class="uikit-1jl7zfp">
									<img height="40" alt="Download on Google Play" src="../img/cc-play-store.svg">
								</a>
							</div>
					</div>
				</div>
			</div>
		</div>

		<a class="planYourVisit" href="what_to_expect.php">
			<div style="overflow: hidden;">
				<div class="bg-blue text-white" style="height: 40rem;">
					<div class="homeContent">
						<p style="font-size: 90px;">PLAN YOUR<br/>VISIT</p>
					</div>
				</div>
			</div>
		</a>

		<?php
			if(date("w") == 0) {
				$bulletin = "Bulletin " . date("mdY") . ".pdf";
			} else {
				$bulletin = "Bulletin " . date("mdY", strtotime("last Sunday")) . ".pdf";
			}
		?>

		<a id="help" href="../content/bulletin/<?php echo $bulletin?>" target="_blank">
			<div style="height: 50rem; overflow: hidden; position: relative;">
				<div id="thirdFeature">
					<h1>WEEKLY BULLETIN</h1>
				</div>
				<img src="../img/ccc-church-building-blue-filter.png" alt="Calvary Christian Church Building" style="height: 50rem; min-width: 100%;" />
			</div>
		</a>
	</main>

	<script type="text/javascript">
	var lat;
	var long;
		function findUs() {
			var address = $('#address').val();

			if (address.length > 0){
				window.open('https://www.google.com/maps/dir/?api=1&origin=' + $('#address').val() + '&destination=Calvary+Christian+Church,+605+S+Norman+Dr,+Sellersburg,+IN+47172', "_blank");
				$('#address').val('');
			}
			else {
				$('#address').addClass('alert-danger')
			}
		}

		function locateDirections() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					lat = position.coords.latitude;
					long = position.coords.longitude;
					window.open('https://www.google.com/maps/dir/' + lat + ',' + long + '/Calvary+Christian+Church,+South+Norman+Drive,+Sellersburg,+IN/@38.4017976,-85.7532368,14z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x88697023a13f2369:0x3722ef092e4f5ba!2m2!1d-85.7587944!2d38.3857649', "_blank")
				});
			} else {
				alert("Geolocation is not supported by this browser.");
			}
		}

		$('#address').keydown(function (e){
			$('#address').removeClass('alert-danger')

			if(e.keyCode == 13){
				findUs()
			}
		})

		window.addEventListener('scroll', () => {
			let page = this;
			let pageTop = this.scrollY;
			let pageHeight = this.outerHeight / 2 ;
			
			let frames = document.querySelectorAll('.scrollAnim');
			frames.forEach( frame => {
				let frameTop = frame.offsetTop;
				let frameHeight = frame.offsetHeight;
				
				if ( pageTop  >= frameTop - pageHeight &&
					pageTop  < frameTop + frameHeight/2 ){
					frame.classList.add('anim');
				}else{
					frame.classList.remove('anim');
				}
			});
			});
	</script>

<?php include 'inc/postContent.php'?>