<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.webp";
?>

<?php $title = "CCC - What to Expect" ?>
<?php include 'inc/preContent.php'?>

<?php
	$url = 'https://api.planningcenteronline.com/calendar/v2/event_instances?include=event&filter=future';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERPWD, "695585a2192848e037da7e6e45946f71fb036ded0d44550183e2debeff60d976:991a1e9365d87eb1ee3de75ce0756c2defa308205b20757778fafef0c2873dfe");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($response);
?>

<div class="container">
	<div class="col overflow-auto mt-4">
		<h1 style="margin-left: -20px;">Events</h1>
	</div>

	<?php
		foreach($json->data as $key => $data) {
			$eventId = $data->relationships->event->data->id;

			$includes = (object) array_filter($json->included, function($include) use ($eventId) {
				return $include->id == $eventId;
			});

			foreach($includes as $included) {
				$startTime = strtotime($data->attributes->starts_at.' UTC');
				$startTimeInLocal = date("g:i a", $startTime);

				$eventDate = date("m/d/Y", $startTime);

				$endTime = strtotime($data->attributes->ends_at.' UTC');
				$endTimeInLocal = date("g:i a", $endTime);
	?>

	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Event",
		"name": "<?php echo $included->attributes->name ?>",
		"startDate": "<?php echo $data->attributes->starts_at ?>",
		"endDate": "<?php echo $data->attributes->ends_at ?>",
		"eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
		"eventStatus": "https://schema.org/EventScheduled",
		"location": {
			"@type": "Place",
			"name": "Calvary Christian Church",
			"address": {
			"@type": "PostalAddress",
			"streetAddress": "605 S Norman Dr",
			"addressLocality": "Sellersburg",
			"postalCode": "47172",
			"addressRegion": "IN",
			"addressCountry": "US"
			}
		},
		"image": [
			"<?php echo $included->attributes->image_url; ?>"
		],
		"description": "<?php echo $included->attributes->description ?>"
	}
	</script>


		<div class="d-none d-md-flex row mb-3">
			<div class="col-4">
				<img src="<?php echo $included->attributes->image_url; ?>" style="width: 100%;">
			</div>

			<div class="col-8">
				<h2 style="color: #3376BC"><?php echo $included->attributes->name ?></h2>
				<h5><b><?php echo $eventDate ?></b></h5>
				<h6><i><?php echo $startTimeInLocal ?> - <?php echo $endTimeInLocal ?></i></h6>
				<p><?php echo $included->attributes->summary ?></p>
				<!-- <div class="card bg-dark" style="font-size: 14px">
					<div class="card-body">
						<?php echo $included->attributes->description ?>
					</div>
				</div> -->
			</div>
		</div>
		
		<div class="d-md-none row mb-3">
			<div class="col-12">
				<img src="<?php echo $included->attributes->image_url; ?>" style="width: 100%;">
			</div>

			<div class="col-12">
				<h2 style="color: #3376BC"><?php echo $included->attributes->name ?></h2>
				<h5><b><?php echo $eventDate ?></b></h5>
				<h6 class="mb-2" style="font-size: 16px;"><i><?php echo $startTimeInLocal ?> - <?php echo $endTimeInLocal ?></i></h6>
				<p><?php echo $included->attributes->summary ?></p>
				<!-- <div class="card bg-dark" style="font-size: 14px;">
					<div class="card-body">
						<?php echo $included->attributes->description ?>
					</div>
				</div> -->
			</div>
		</div>

		<hr style="background-image: radial-gradient(#3376BC, #FFF), radial-gradient(#3376BC, #FFF)" />

	<?php
			}
		}

	?>
</div>

<?php include 'inc/postContent.php'?>