<?php $title = "CCC - Sermons & Worship" ?>
<?php include 'inc/preContent.php'?>

<div class="heroImg">
	<img src="../img/crappy_live_streams.jpg">
</div>

<div class="container">
	<h1>Live Stream</h1>
	<?php
		require_once 'vendor/autoload.php';
		
		$API_KEY = 'AIzaSyBJTOixAJ1-Wn5F7oDd3tcx08eFPIW15Cg';
		$ChannelID = 'UC9C4hm7oda7bYNqmyxwMtEg';

		//https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UC9C4hm7oda7bYNqmyxwMtEg&type=video&eventType=completed&key=AIzaSyBJTOixAJ1-Wn5F7oDd3tcx08eFPIW15Cg
		$channelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=live&key='.$API_KEY;
		$liveStreamInfo = 'https://www.youtube.com/embed/live_stream?channel='.$ChannelID;
		
		$extractInfo = file_get_contents($channelInfo);
		$extractInfo = str_replace('},]',"}]",$extractInfo);
		$showInfo = json_decode($extractInfo, true);

		if($showInfo['pageInfo']['totalResults'] > 0)
		{
	?>
		<div class="container">
			<p>We are Live!</p>
			
			<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" src="<?php echo $liveStreamInfo; ?>"></iframe>
			</div>
		</div>
	<?php
		} else {
	?>
		<div class="container">
			
	<?php
			echo "We aren't currently live :(.  Our morning services are streamed live starting at 10:40 AM.  Check back then!";
		}
	?>
		</div>
	<?php
		// $API_KEY = 'AIzaSyBJTOixAJ1-Wn5F7oDd3tcx08eFPIW15Cg';
		// $ChannelID = 'UC9C4hm7oda7bYNqmyxwMtEg';
		
		$client = new Google_Client();
		$client->setDeveloperKey($API_KEY);

		// Define an object that will be used to make all API requests.
		$youtube = new Google_Service_YouTube($client);
		
		try {

			// Call the search.list method to retrieve results matching the specified
			// query term.
			$searchResponse = $youtube->search->listSearch('id,snippet', array(
			  'eventType' =>  'completed',
			  'maxResults' => '25',
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
		
		// $ChannelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=completed&key='.$API_KEY.'&maxResults=25';
		
		// $searchResponse = file_get_contents($channelInfo);
		
		foreach ($searchResponse['items'] as $searchResult) {
		  // echo $searchResult['snippet']['title'];
		
    
	?>
	<h1>Past Services</h1>
	
	<div class="container" style="overflow: hidden;">
		<div>
			<h3>
				<?php
					echo $searchResult['snippet']['title'];		
				?>
			</h3>
		</div>
		<div class="col-sm-3 col-md-6 col-lg-4 media-col">
			<!--<hr style="margin-top:0;">-->
			<strong>
			<?php
				$date = new DateTime($searchResult['snippet']['publishedAt']);
				echo $date->format('F d, Y');
			?>
			</strong>
			<br/>
			
			<?php
				//echo $searchResult['snippet']['description'];
				echo 'this is livestream content description text.  i hope this works and contains enough text. Rachael is awesome and deserves ice cream.';
				
				$videoURL = 'https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'?autoplay=0&origin=http://calvarychristianchurch.com';
			?>
		</div>
		
		<div class="col-sm-3 col-md-6 col-lg-8 media-col">
			<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" allowFullScreen='allowFullScreen' src="<?php echo $videoURL; ?>" frameborder="0"></iframe>
			</div>
		</div>
		
	</div>
	<hr>
	<?php } ?>
	
	<!--delete this code -->
	
	<div class="container" style="overflow: hidden;">
		<div>
			<h2>
				<?php
					echo $searchResult['snippet']['title'];		
				?>
			</h2>
		</div>
		<div class="col-sm-3 col-md-6 col-lg-4 media-col">
			<strong>
			<?php
				$date = new DateTime($searchResult['snippet']['publishedAt']);
				echo $date->format('F d, Y');
			?>
			</strong>
			<br/>
			
			<?php
				//echo $searchResult['snippet']['description'];
				echo 'this is livestream content description text.  i hope this works and contains enough text.';
				
				$videoURL = 'https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'?autoplay=0&origin=http://calvarychristianchurch.com';
			?>
		</div>
		
		<div class="col-sm-3 col-md-6 col-lg-8 media-col">
			<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" allowFullScreen='allowFullScreen' src="<?php echo $videoURL; ?>" frameborder="0"></iframe>
			</div>
		</div>
		
	</div>
	
	<!--delete this code -->
	<!--<div class="col-sm-3 col-md-6 col-lg-8 media-col">
			<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/?listType=user_uploads&list=CCCMediaTube"></iframe>
			</div>
		</div>-->

</div>	
<?php include 'inc/postContent.php'?>