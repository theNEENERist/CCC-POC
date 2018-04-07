<?php 
	global $variable;
	$imgSrc = "../img/crappy_live_streams.jpg";
?>

<?php $title = "CCC - Prayer Requests" ?>
<?php include 'inc/preContent.php'?>

<div class="container overflow-auto">
	<h1>Prayer List</h1>
	<p>Please consider these requests in your prayers. Click on a request for more information.</p>
	
	<?php
		$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
					or die ('Could not connect to the database server' . mysqli_connect_error());

				$sql = "select 
							Request
							,RequestFor
						from ccc.prayerRequest
						WHERE Request IS NOT NULL
						AND Request <> ''
						ORDER BY RequestFor";

				$result = $mysqli->query($sql);

				$counter = 0;

				foreach($result as $row)
				{
				?>
				<div class="prayerColumn col-xs-12 col-sm-6 col-md-4 col-lg-3 float-left text-left px-2 mt-2" id="prayerColumn<?php echo $i ?>">	
					<button type="button" class="btn btn-link text-left" style="white-space: normal;" data-toggle="modal" data-target="#modal_<?php echo $counter ?>"><i class="fas fa-hand-spock spock"></i> <?php echo $row['RequestFor']; ?></button>
					<div class="modal fade" id="modal_<?php echo $counter;?>" role="dialog" aria-labelledby="modal_<?php echo $counter;?>" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalLabel"><?php echo $row['RequestFor']; ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php echo $row['Request']; ?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$counter++;
				}
				mysqli_close($mysqli);
			?>
</div>
<?php include 'inc/postContent.php'?>
this request for is much l