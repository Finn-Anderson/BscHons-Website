<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		// Set target directory to save image to so that it can be referenced later on
		$target_dir = "../img/avatar/";
		$avatar = $target_dir . $_SESSION["id"] . basename($_FILES["avatar"]["name"]);

		// Get inputted image type and create type list
		$avatarType = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
		$typeList = array("jpg", "jpeg", "png", "gif", "svg");

		// Get current avatar
		$checkAvatar = $conn->prepare("SELECT avatar FROM User WHERE userID = :id");
		$checkAvatar->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$checkAvatar->execute();

		// Check if inputted avatar is not the same as the current and image type in type list. If true, upload image, remove prior one (unless default image), and update database reference.
		$result = $checkAvatar->fetchAll();
		foreach( $result as $row ) {
			$img = $row["avatar"];
			if ($avatar != $img AND !empty($avatar) AND in_array($avatarType, $typeList)) {
				if (basename($img) != "default.svg") {
					unlink($img);
				}
				move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar);

				$updateAvatar = $conn->prepare("UPDATE User SET avatar = :avatar WHERE userID = :id");
				$updateAvatar->bindValue(":avatar", $avatar);
				$updateAvatar->bindValue(":id", $_SESSION["id"]);
				$updateAvatar->execute();
			}
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>