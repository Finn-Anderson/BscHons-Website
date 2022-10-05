<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		$offset = htmlspecialchars($_POST["offset"], ENT_QUOTES);

		$values = array();

		$getBookings = $conn->prepare("SELECT Booking.bookingID, SUM(numberOfPeople) AS numPeople, SUM(numberOfPeople * cost) AS sumCost, date, returnBooked FROM Booking, Trip, RouteFare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND userID = :id GROUP BY Trip.bookingID DESC LIMIT 10 OFFSET :offset");
		$getBookings->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
		$getBookings->bindValue(":offset", $offset, PDO::PARAM_INT);
		$getBookings->execute();

		$result = $getBookings->fetchAll();

		foreach( $result as $row ) {
			if (!$row["returnBooked"]) {
				$row["sumCost"] = $row["sumCost"] * 0.7;
			}
			array_push($values, array($row["bookingID"], $row["numPeople"], number_format((float)$row["sumCost"], 2, ".", ""), $row["date"]));
		}

		echo json_encode($values);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>