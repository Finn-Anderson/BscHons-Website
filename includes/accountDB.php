<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$getAvatar = $conn->prepare("SELECT avatar, name FROM User WHERE userID = :id");
		$getAvatar->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$getAvatar->execute();
		$result = $getAvatar->fetchAll();

		foreach( $result as $row ) {
			$img = $row["avatar"];
			$name = $row["name"];
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>