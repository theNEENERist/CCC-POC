<?php $title = "CCC - Admin" ?>
<?php include '../inc/adminPreContent.php'?>

<?php include '../utils/accesscontrol.php'; ?>

<div class="container">
	<div class="col-sm-3 col-md-6 col-lg-12 overflow-auto mt-4">
      <h1>Admin</h1>
	</div>
	
	<div class="col-5 overflow-auto">
      <h4>File Uploads</h4>
      <h5>Bulletin</h5>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
         <div class="custom-file">
            <input type="file" class="custom-file-input" name="fileToUpload" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
         </div>
         <input class="mt-1" type="submit" value="Upload Bulletin" name="submit">
         <?php
            if(isset($_POST["submit"])) {
               $target_dir = "../content/bulletin/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               $errorMessage = '';

               if (file_exists($target_file)) {
                  $errorMessage = "Sorry, file already exists.";
                  $uploadOk = 0;
               }

               if($fileType != "pdf") {
                  $errorMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
               }

               if($uploadOk == 1) {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         ?>
         <div class="alert alert-success mt-2" role="alert">
            <?php echo basename( $_FILES["fileToUpload"]["name"]) ?> has been uploaded successfully.
         </div>
         <?php
                  } else {
         ?>
            <div class="alert alert-danger mt-2" role="alert">
               Sorry, there was an error uploading your file.
            </div>
         <?php
                  }
               } else {
         ?>
            <div class="alert alert-danger mt-2" role="alert">
               <?php echo $errorMessage; ?>
            </div>
         <?php
               }
               
            }
         ?>
      </form>
      <hr/>

      <!-- <h5>Bible Study Audio</h5>
      <div class="custom-file">
         <input type="file" class="custom-file-input" id="customFile">
         <label class="custom-file-label" for="customFile">Choose file</label>
      </div> -->
	</div>

<?php include '../inc/adminPostContent.php'?>