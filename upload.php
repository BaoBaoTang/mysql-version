<?php
	$allowedExts = array("xml");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	$path_parts = pathinfo($_FILES["file"]["name"]);
	$FileName = $path_parts["filename"];
	$uniqueID = uniqid('uploadfile_').".xml";
	if (($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)){
//				echo $_FILES["file"]["tmp_name"]; 
//		$moved = move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/graphs2/".$uniqueID);
		      $moved = move_uploaded_file($_FILES["file"]["tmp_name"], getcwd()."/graphs2/".$uniqueID);
		      if($moved){
//				echo "moved successfully";
		      		$new_xml = "graphs2/" .$uniqueID;
		  } else {
		  	$new_xml="junk";
		  }
	}
	else {
		echo "Invalid file";
	}
	setcookie("userID", $_POST['userid'], time()+3600);
	$userID = $_POST['userid'];
	header("Location: review1Scenario.php?xmlfile=$new_xml&userID=$userID");

?>
