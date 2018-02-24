<?php $title = "CCC - Sermons & Worship" ?>
<?php include 'inc/preContent.php'?>
<div class="container">

<?php
	require_once 'vendor/autoload.php';
	
	$API_KEY = 'AIzaSyBJTOixAJ1-Wn5F7oDd3tcx08eFPIW15Cg';
	$ChannelID = 'UC9C4hm7oda7bYNqmyxwMtEg';

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
	}
?>
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
    }
    
?>
<div class="container">
	<div class="col-sm-3 col-md-6 col-lg-4 media-col">
	
	<?php
		echo $searchResult['snippet']['title'];
		
		// $date = DateTime::createFromFormat($searchResult['snippet']['publishedAt']->date);
		// $converteddate = $date->format('M d,Y');
		// echo $converteddate;
		
		// echo DateTime::createFromFormat("d#M#y H#i#s*A", $searchResult['snippet']['publishedAt']);
		
		$date = new DateTime($searchResult['snippet']['publishedAt']);
		echo $date->format('m-d-Y');
		// echo $date;
		
		// $date = DateTime::createFromFormat("j-M-Y", $searchResult['snippet']['publishedAt']);
		// $converteddate = $date->format('M d,Y');
		
		// echo date('Y-m-d H:i:s',$searchResult['snippet']['publishedAt']);
		// echo $date->format('Y-m-d');
	?>
	</div>
	<div class="col-sm-3 col-md-6 col-lg-8 media-col">
		<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
			<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/?listType=user_uploads&list=CCCMediaTube"></iframe>
		</div>
	</div>
</div>

</div>	
<?php include 'inc/postContent.php'?>

