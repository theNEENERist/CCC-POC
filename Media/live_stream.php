<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.png";
?>

<?php $title = "CCC - Sermons & Worship" ?>
<?php include '../inc/preContent.php'?>

<div class="container">
	<h1>Live Stream</h1>
	<?php
        require_once '../vendor/autoload.php';

        $API_KEY = 'AIzaSyD1EcCt1yL5hA0CGjDpfe5x29IQnl5R3pE';
		$ChannelID = 'UC7z_cEyyFvQ0VMAKDm7y9_w';
		
		$client = new Google_Client();
		$client->setDeveloperKey($API_KEY);

		// Define an object that will be used to make all API requests.
		$youtube = new Google_Service_YouTube($client);
        
		try {

			// Call the search.list method to retrieve results matching the specified
			// query term.
			$searchResponse = $youtube->search->listSearch('id,snippet', array(
			  'eventType' =>  'live',
			  'type' => 'video',
			  'channelId' => $ChannelID,
			));
		} catch (Google_Service_Exception $e) {
			$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
			htmlspecialchars($e->getMessage()));
		} catch (Google_Exception $e) {
			$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
			htmlspecialchars($e->getMessage()));
		}
		
		/* Joel's Credentials */
		// $API_KEY = 'AIzaSyBJTOixAJ1-Wn5F7oDd3tcx08eFPIW15Cg';
		// $ChannelID = 'UC9C4hm7oda7bYNqmyxwMtEg';

		$channelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=live&key='.$API_KEY;
		
		
		
		
		if($searchResponse['pageInfo']['totalResults'] > 0)
		{
			//https://www.youtube.com/embed/lNCKY5HSZKM?autoplay=0&origin=http://calvarychristianchurch.com
			foreach ($searchResponse['items'] as $searchResult) {
				$liveStreamInfo = 'https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'?autoplay=0&origin=http://calvarychristianchurch.com';
			}
	?>
		<div class="container">
			<p>We are Live!</p>
			
			<!--<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" src="<?php echo $liveStreamInfo; ?>"></iframe>
			</div>-->
			
			<div class="col-sm-3 col-md-6 col-lg-12 media-col">
				<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
					<iframe class="embed-responsive-item" allowFullScreen='allowFullScreen' src="<?php echo $liveStreamInfo; ?>" frameborder="0"></iframe>
				</div>
			</div>
		</div>
	<?php
		} else {
	?>
		<div class="container" style="overflow: auto;">
			
	<?php
			echo "We aren't currently live :(.  Our morning services are streamed live starting at 10:40 AM.  Check back then!";
		}
	?>
	
		</div>
	</div>
</div>
<?php include '../inc/postContent.php'?>