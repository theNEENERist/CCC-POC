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
					605 NORMAN DRIVE,  SELLERSBURG
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

		<div class="row mt-5 mb-2" style="text-align: center; width: 100%;">
			<div class="col">
				<h1 style="font-size: 60px; font-weight: 700; color: dimgray">Sunday Services</h1>
			</div>
		</div>
		<div class="row justify-content-center m-0" style="width: 100%;">
			<div class="col-lg-5" style="text-align: center;">
				<p class="m-0" style="color: #3376BC; font-size: 18px;">Sunday School</p>
				<h1 style="color: dimgray;">9:30 AM</h1>
				<hr class="show-mobile" style="color: #3376BC;">
			</div>
			<div class="hide-mobile" style="display: none; border-right: 2px solid #3376BC; height:100px;"></div>

			<div class="col-lg-5" style="text-align: center;">
				<p class="m-0" style="color: #3376BC; font-size: 18px;">Worship Service</p>
				<h1 style="color: dimgray;">10:40 AM</h1>
			</div>
		</div>

		<div class="row mt-5 mb-2" style="text-align: center; width: 100%;">
			<div class="col">
				<h1 style="font-size: 60px; font-weight: 700; color: dimgray;">Wednesday Classes</h1>
			</div>
		</div>
		<div class="row mb-5 mr-0 ml-0"  style="width: 100%;">
			<div class="col" style="text-align: center;">
				<p class="m-0" style="color: #3376BC; font-size: 18px;">Bible Study</p>
				<h1 style="color: dimgray;">6:30 PM</h1>
			</div>
		</div>

		<?php
			if(date("w") == 0) {
				$bulletin = "Bulletin " . date("mdY") . ".pdf";
			} else {
				$bulletin = "Bulletin " . date("mdY", strtotime("last Sunday")) . ".pdf";
			}
		?>

		<div class="container mt-5" style="text-align: center;">
			<div class="card-deck mt-4">					
				<div class="card bg-dark text-white m-1 zoom-hover" style="height: 25rem; overflow: hidden; position: relative; background-image: url(../img/ccc-church-building-blue-filter.webp); background-size: 200%; background-position: left center;">
					<a id="help" href="../content/bulletin/<?php echo $bulletin?>" target="_blank">
					<div class="card-img-overlay">
						<h1 class="justify-content-center text-white" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
							Weekly Bulletin
						</h1>
					</div>
					</a>
				</div>
				<div class="card bg-dark text-white m-1 zoom-hover" style="height: 25rem; overflow: hidden; position: relative; background-image: url(../img/ccc-church-building-blue-filter.webp); background-size: 200%; background-position: right center;">
					<a class="planYourVisit" href="what_to_expect.php">
						<div class="card-img-overlay">
							<h1 class="justify-content-center text-white" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
								Plan Your Visit
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="container mt-5" style="text-align: center;">
			<h1 style="font-size: 60px; font-weight: 700;">Children's Worship Services</h1>
			<div class="card-deck mt-4">
				<div class="card bg-dark text-white m-1">
					<img
						src="../img/pexels-alicia-971435.webp"
						class="card-img"
						alt="..."
					/>
					<div class="card-img-overlay">
						<h1 class="justify-content-center" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
							Nursery
						</h1>
					</div>
				</div>
				<div class="card bg-dark text-white m-1">
					<img
						src="../img/pexels-polina-tankilevitch-6743138.webp"
						class="card-img"
						alt="..."
					/>
					<div class="card-img-overlay">
						<h1 class="justify-content-center" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
							Toddlers
						</h1>
					</div>
				</div>
				<div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
				<div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
				<div class="w-100 d-none d-lg-block d-xl-none"><!-- wrap every 4 on lg--></div>
				<div class="w-100 d-none d-xl-block"><!-- wrap every 5 on xl--></div>
				<div class="card bg-dark text-white m-1">
					<img
						src="../img/pexels-photo-3933033.webp"
						class="card-img"
						alt="..."
					/>
					<div class="card-img-overlay">
						<h1 class="justify-content-center" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
							Preschool
						</h1>
					</div>
				</div>
				<div class="card bg-dark text-white m-1">
					<img
						src="../img/pexels-photo-5628756.webp"
						class="card-img"
						alt="..."
					/>
					<div class="card-img-overlay">
						<h1 class="justify-content-center" style="font-size: 60px; background-color: rgb(105,105,105,.6); text-shadow: 0px 2px 2px rgba(0, 0, 0, 1);">
							K-5th
						</h1>
					</div>
				</div>
			</div>
		</div>
		<br/>

		<!-- end -->
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