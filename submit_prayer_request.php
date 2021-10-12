<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.webp";
?>

<?php $title = "CCC - Prayer Requests" ?>
<?php include 'inc/preContent.php'?>

<div class="container">
	<h1> Submit a Prayer Request</h1>
	<form method="post" id="prayerRequest" onsubmit="validateForm();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form-group col-md-4">
			<label for="name">Name:</label>
			<input  data-rule-required="true" data-msg-required="Name is required" required="true" type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group col-md-4">
			<label for="email">Email address:</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
		</div>
		<div class="form-group col-md-4">
			<label for="phone">Phone Number:</label>
			<input type="tel" class="form-control" id="phone" name="phone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="123-456-7890" maxLength="12" placeholder="123-456-7890">
		</div>
		<div class="form-group col-md-4">
			<label for="requestFor">Prayer Request For:</label>
			<input type="text" class="form-control" id="requestFor" name="requestFor">
		</div>
		<div class="form-group col-md-6">
			<label for="prayerRequest">Prayer Request</label>
			<textarea class="form-control" id="prayerRequest" rows="3" name="prayerRequest"></textarea>
		</div>
		<div class="form-check col-2" style="padding-left: 35px; margin-bottom: 15px;">
			<input type="checkbox" class="form-check-input" id="contactMe" name="contactMe" onchange="contactMeChanged();">
			<label class="form-check-label" for="contactMe">Contact Me</label>
		</div>
		<div class="form-group col-md-4" id="pmc" style="display: none; margin-top: 10px;">
			<label for="preferredContactMethod">Preferred Method of Contact</label>
			<select id="preferredContactMethod" name="preferredContactMethod" class="form-control">
				<option>Email<option>
				<option>Phone</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default" style="margin-left: 15px;">Submit</button>
	</form>
	
</div>

<script type="text/javascript">
	$('#phone').keyup(function(){
		// $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3'))
		var phone = $(this).val();
		
		var patt = new RegExp("\\d{3}");
		var patt2 = new RegExp("\\d{3}\-?\\d{3}");
		
		if (phone.length == 3)
		{
			if (patt.test(phone))
			{
				phone += "-";
			}
		} else if (phone.length == 7)
		{
			if (patt2.test(phone))
			{
				phone += "-";
			}
		} else if (phone.length == 12 && phone.indexOf("-") == -1) 
		{
			phone = phone.substring(0,10).replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3')
		}
		
		
		// $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3'))
		
		$(this).val(phone);
	});

	function validateForm() 
	{
		if($('#contactMe').is(":checked"))
		{
			var pcm = $('#preferredContactMethod').val();
			
		}
	}

	function contactMeChanged()
	{	
		if($('#contactMe').is(":checked"))
			$("#pmc").show();
		else
			$("#pmc").hide();
	}
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$error = "";
	
	if(array_key_exists('phone', $_POST))
	{
		if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
		{
			$error = 'Invalid Number!';
		}
	}

	echo $error;
	if (strcmp($error, "") == 0)
	{
		$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());

		// $sql = "INSERT INTO ccc.prayerRequest
				// (
					// name
					// ,email
					// ,phone
					// ,requestFor
					// ,request
					// ,contact
					// ,preferredContactMethod
				// )
				// VALUES
				// (
					// '". $_POST["name"] ."'
					// ,'". $_POST["email"] ."'
					// ,'". $_POST["phone"] ."'
					// ,'". $_POST["requestFor"] ."'
					// ,'". $_POST["prayerRequest"] ."'
					// ,'". isset($_POST['contactMe']) ."'
					// ,'". $_POST["preferredContactMethod"] ."'
					
				// )";
		
		$sql = "CALL ccc.insertPrayerRequest
			(
				'". $_POST["name"] ."'
				,'". $_POST["email"] ."'
				,'". $_POST["phone"] ."'
				,'". $_POST["requestFor"] ."'
				,'". $_POST["prayerRequest"] ."'
				,'". isset($_POST['contactMe']) ."'
				,'". $_POST["preferredContactMethod"] ."'				
			);";
		
		if ($mysqli->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}		   	   
	   
		mysqli_close($mysqli);
	} else
	{
		echo $error;
	}
}		

// define variables and set to empty values
// $nameErr = $emailErr = $genderErr = $websiteErr = "";
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // if (empty($_POST["name"])) {
    // $nameErr = "Name is required";
  // } else {
    // $name = test_input($_POST["name"]);
    // // check if name only contains letters and whitespace
    // if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      // $nameErr = "Only letters and white space allowed"; 
    // }
  // }

  // if (empty($_POST["email"])) {
    // $emailErr = "Email is required";
  // } else {
    // $email = test_input($_POST["email"]);
    // // check if e-mail address is well-formed
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // $emailErr = "Invalid email format"; 
    // }
  // }

  // if (empty($_POST["website"])) {
    // $website = "";
  // } else {
    // $website = test_input($_POST["website"]);
    // // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    // if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      // $websiteErr = "Invalid URL"; 
    // }
  // }

  // if (empty($_POST["comment"])) {
    // $comment = "";
  // } else {
    // $comment = test_input($_POST["comment"]);
  // }

  // if (empty($_POST["gender"])) {
    // $genderErr = "Gender is required";
  // } else {
    // $gender = test_input($_POST["gender"]);
  // }
// }
?>

<?php include 'inc/postContent.php'?>