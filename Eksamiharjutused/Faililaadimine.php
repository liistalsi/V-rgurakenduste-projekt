<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Faililaadimine</title>

	</head>

	<body>

		<form method="post" action="?" enctype="multipart/form-data">
		Vali üleslaetav fail: <input type="file" name="laetavFail" id="laetavFail"><br>
		<input type="submit" name="submit" value="Laadi üles!">
		</form>

	<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$target_dir = "failid/";
			$target_file = $target_dir . basename($_FILES["laetavFail"]["name"]);
			$uploadOk = 1;
			$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

			// Check if file already exists
			if (file_exists($target_file)) {

			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["laetavFail"]["size"] > 500000) {

			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($fileType != "txt") {

			    echo "Sorry, only TXT files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {

			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {

			    if (move_uploaded_file($_FILES["laetavFail"]["tmp_name"], $target_file)) {

			        echo "The file ". basename( $_FILES["laetavFail"]["name"]). " has been uploaded.";
			    } else {

			        echo "Sorry, there was an error uploading your file.";
			    }
			}

		}

		echo count(glob("failid/*"));
	
	?>

	</body>

</html>