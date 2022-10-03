<?php
	include $_SERVER['DOCUMENT_ROOT']."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$date = date("Y-m-d", strtotime($_POST["date"]));
		$from = htmlspecialchars($_POST["from"], ENT_QUOTES);
		$to = htmlspecialchars($_POST["to"], ENT_QUOTES);
		$return = htmlspecialchars($_POST["returnBooked"], ENT_QUOTES);
		$capacity = 30;
		$wheelchairBooked = false;

		if ($to == "mallaig" || $to == "eigg") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND (Booking.returnBooked = true OR Booking.reverse = true) AND Route.from = :froms AND Route.to = :to");
		} else if ($return == "yes") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Route.from = :froms AND Route.to = :to");
		} else {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Booking.reverse = false AND Route.from = :froms AND Route.to = :to");
		}

		if ($to == "mallaig" || $to == "eigg") {
			$from = htmlspecialchars($_POST["to"], ENT_QUOTES);
			$to = htmlspecialchars($_POST["from"], ENT_QUOTES);
		}

		// stmt to select row
		$stmt->bindValue(":date", $date, PDO::PARAM_STR);
		$stmt->bindValue(":froms", $from, PDO::PARAM_STR);
		$stmt->bindValue(":to", $to, PDO::PARAM_STR);
		$stmt->execute();

		// Chcek if stmt statement is valid
		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();

			foreach( $result as $row ) {
				$capacity -= $row["numberOfPeople"];

				if ($row["wheelchairBooked"]) {
					$wheelchairBooked = true;
				}
			}
		}

		$values = array($capacity, $wheelchairBooked);

		echo json_encode($values);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>