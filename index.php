<?php $title = "CCC - Home" ?>
<?php include 'inc/preContent.php'?>

	<main role="main" style="margin-bottom: -30px;">
	<div class="jumbotron" style="width:100%;overflow: hidden; height: 50rem; padding: 0; margin: 0;">
		<img src="../img/ccc-cross-image.png" alt="Jumbotron" style="height: 50rem;min-width: 100%;"/>
		<div style="position: absolute;top: 125px;right: 15%;left: 15%;z-index: 10;padding-top: 40px;padding-bottom: 20px;color: #fff;text-align: center;">
			<h1 id="welcomeText">Welcome to Calvary Christian</h1>
			<p class="jumbotronInnerContent">
				<input type="text" class="col-xs-12 col-s-12 col-md-12 col-lg-3" style="height: 60px; line-height: 40px; padding: 8px; top: 2px; margin-bottom: 10px;" id="address" name="address" placeholder="Enter Your Address">
				<!-- <a class="btn btn-lg btn-primary col-3" style="height: 60px; line-height: 40px;" role="button" href="#">Find Us</a> -->
				<a id="btnFindUs" class="btn btn-lg btn-primary col-xs-12 col-s-12 col-md-12 col-lg-3" style="height: 60px; line-height: 40px;" role="button" onclick="findUs()">FIND US</a>	
			</p>
			<p style="font-size: 22px; font-weight: 400;">
				<!-- https://www.google.com/maps/dir/?api=1&origin=6045+21st+Century+Dr&destination=Calvary+Christian+Church,+605+S+Norman+Dr,+Sellersburg,+IN+47172 -->
			<!-- <a href="javascript:(function(){document.body.innerHTML+=%22<style>*{background:%20#000%20!important;color:%20#0f0%20!important;outline:%20solid%20#f00%201px%20!important;}</style>%22;})();">Ghost CSS</a><br/> -->
				605 NORMAN DRIVE<br/>
				<span style="font-weight: 600;">SUNDAYS @ 10:40 AM</span>
			</p>
		</div>
	</div>
	<a class="planYourVisit" href="what_to_expect.php"<div style="overflow: hidden;">
		<div class="bg-blue text-white" style="height: 40rem;">
			<div class="homeContent">
				<p style="font-size: 90px;">PLAN YOUR<br/>VISIT</p>
			</div>					
		</div>
	</a>

	<a href="../content/bulletin/Bulletin 04222018.pdf" target="_blank"	>
		<div style="height: 50rem; overflow: hidden;">
			<img src="../img/ccc-church-building-blue-filter.png" alt="Calvary Christian Church Building" style="height: 50rem; min-width: 100%;" />
			<div id="thirdFeature">
				<h1>WEEKLY BULLETIN</h1>
			</div>
		</div>
	</a>

	  </div><!-- /.container -->
	</main>

	<script type="text/javascript">
		function findUs() {
			var address = $('#address').val()

			if (address.length > 0){
				//window.open('https://www.google.com/maps/dir/?api=1&origin=' + ($('#address').val() + '6045+21st+Century+Dr&destination=Calvary+Christian+Church,+605+S+Norman+Dr,+Sellersburg,+IN+47172', "_blank")
				window.open('https://www.google.com/maps/dir/?api=1&origin=' + $('#address').val() + '&destination=Calvary+Christian+Church,+605+S+Norman+Dr,+Sellersburg,+IN+47172', "_blank")
				$('#address').val('')
			}
			else {
				$('#address').addClass('alert-danger')
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