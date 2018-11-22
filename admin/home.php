<?php $title = "CCC - Admin" ?>
<?php 
      include '../inc/adminPreContent.php';
      include '../utils/accesscontrol.php'; 
      
      $bulletin = "Bulletin " . date("mdY", strtotime("next Sunday")) . ".pdf";
?>
<div class="container">
	<div class="col-sm-3 col-md-6 col-lg-12 overflow-auto mt-4">
            <h1>Admin</h1>
	</div>
	
      <div class="col">
            <h4>File Uploads</h4>
            <h5>Bulletin</h5>
            <p style="font-size: 14px;">File name should be in the format "Bulletin MMDDYYYY.pdf" for the respective Sunday.<br/>The following Sunday should be <strong><?php echo $bulletin ?></strong>.</p>
            <div class="col-lg-5 col-md-5 col-sm-12 overflow-auto pl-0">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                  <input type="file" class="bulletin-file-input" name="fileToUpload" id="bulletinFile" onClick="setFileName()">
                  <input type="hidden" name="username" value=<?php echo $_SESSION["username"] ?>>
                  <input type="hidden" name="password" value=<?php echo $_SESSION["password"]?>>
                  <label class="custom-file-label" for="bulletinFile">Choose file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-1">Upload File</button>
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
                        $errorMessage = "Sorry, only PDF files are allowed.";
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
            </div>

      <!-- <h5>Bible Study Audio</h5>
      <div class="custom-file">
         <input type="file" class="bulletin-file-input" id="customFile">
         <label class="custom-file-label" for="customFile">Choose file</label>
      </div> -->
	</div>
      </div>

      <script type="text/javascript">
      $("#bulletinFile").change(function() {
            var fileUpload = document.getElementById("bulletinFile");
            jQuery("label[for='bulletinFile']").html(fileUpload.value.replace("C:\\fakepath\\",""));
      });
      </script>

<?php include '../inc/adminPostContent.php'?>