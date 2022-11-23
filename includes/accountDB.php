<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Gets all relevant user information from logged in user to be used later
		$getAvatar = $conn->prepare("SELECT avatar, name, COUNT(bookingID) as count, admin FROM User, Booking WHERE User.userID = Booking.userID AND User.userID = :id");
		$getAvatar->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$getAvatar->execute();
		$result = $getAvatar->fetchAll();

		foreach( $result as $row ) {
			$img = $row["avatar"];
			$name = $row["name"];
			$count = $row["count"];
			$admin = $row["admin"];
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>