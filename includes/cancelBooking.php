<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		$bookingID = htmlspecialchars($_POST["bookingID"], ENT_QUOTES);

		$checkBooking = $conn->prepare("SELECT date FROM Booking WHERE userID = :id AND bookingID = :bookingID");
		$checkBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$checkBooking->bindValue(":bookingID", $bookingID, PDO::PARAM_INT);
		$checkBooking->execute();


		if ($checkBooking->rowCount() > 0) {
			$result = $checkBooking->fetchAll();

			foreach( $result as $row ) {
				$cancelBooking = $conn->prepare("UPDATE Booking SET cancelled = :cancelled AND surcharge = :surcharge WHERE userID = :id AND bookingID = :bookingID");
				$cancelBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
				$cancelBooking->bindValue(":bookingID", $bookingID, PDO::PARAM_INT);
				$cancelBooking->bindValue(":cancelled", true, PDO::PARAM_BOOL);

				$today = strtotime(date("Y-m-d"));
				$date = strtotime(date("Y-m-d", $row["date"]));

				$check = $today->diff($date);

				if ($check->days == 0 || $check->invert == 0) {
					$cancelBooking->bindValue(":surcharge", true, PDO::PARAM_BOOL);
				} else {
					$cancelBooking->bindValue(":surcharge", false, PDO::PARAM_BOOL);
				}

				$cancelBooking->execute();
			}
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>