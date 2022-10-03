<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		$target_dir = "../img/avatar/";
		$avatar = $target_dir . $_SESSION['id'] . basename($_FILES['avatar']['name']);

		$avatarType = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
		$typeList = array('jpg', 'jpeg', 'png', 'gif', 'svg');

		$checkAvatar = $conn->prepare("SELECT avatar FROM User WHERE userID = :id");
		$checkAvatar->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$checkAvatar->execute();

		$result = $checkAvatar->fetchAll();
		foreach( $result as $row ) {
			$img = $row["avatar"];
			if ($avatar != $img AND !empty($avatar) AND in_array($avatarType, $typeList)) {
				if (basename($img) != 'default.svg') {
					unlink($img);
				}
				move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
			} else {
				$avatar = $img;
			}
		}

		$updateAvatar = $conn->prepare("UPDATE User SET avatar = :avatar WHERE userID = :id");
		$updateAvatar->bindValue(':avatar', $avatar);
		$updateAvatar->bindValue(':id', $_SESSION['id']);
		$updateAvatar->execute();
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>