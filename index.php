<?php $title = "CCC - Home" ?>
<?php include 'inc/preContent.php'?>

	<main role="main" style="margin-bottom: -30px;">
		<div class="jumbotron" style="width:100%;overflow: hidden; height: 50rem; padding: 0; margin: 0;">
			<img src="../img/ccc-cross-image.png" alt="Jumbotron" style="height: 50rem;min-width: 100%;"/>
			<div style="position: absolute;top: 125px;right: 15%;left: 15%;z-index: 10;padding-top: 40px;padding-bottom: 20px;color: #fff;text-align: center;">
				<h1 id="welcomeText">Welcome to Calvary Christian</h1>
				<div class="jumbotronInnerContent">
					<div class="address">
						<input type="text" aria-label="Address" class="col-xs-12 col-s-12 col-md-12 col-lg-5" style="margin-left: -7px; height: 60px; line-height: 40px; padding: 8px 35px 8px 0; margin-bottom: 10px;" id="address" name="address" placeholder="Enter Your Address">
						<a onclick="locateDirections()" style="color: #0066ff; font-size: 35px; margin-left: -35px; z-index: 3; position: relative;" class="map-icon">
							<i title="Directions from my location" class="fas fa-map-marker-alt map-icon clickable" style="margin-bottom: -10px; cursor: pointer;"></i>
						</a>
					</div>
					<!-- <div class="find-us"> -->
						<a id="btnFindUs" class="btn btn-lg btn-primary col-xs-12 col-s-12 col-md-12 col-lg-5" style="height: 60px; line-height: 40px;" role="button" onclick="findUs()">FIND US</a>
					<!-- </div> -->
				</div>
				<p style="font-size: 22px; font-weight: 400;">
					605 NORMAN DRIVE<br/>
					<span style="font-weight: 600;">SUNDAYS @ 10:40 AM</span>
				</p>
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
			<div style="height: 50rem; overflow: hidden;">
				<img src="../img/ccc-church-building-blue-filter.png" alt="Calvary Christian Church Building" style="height: 50rem; min-width: 100%;" />
				<div id="thirdFeature">
					<h1>WEEKLY BULLETIN</h1>
				</div>
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
	</script>

<?php include 'inc/postContent.php'?>