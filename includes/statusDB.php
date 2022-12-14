<?php
	include "../includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		session_start();

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Setting variables
		$month = intval($_POST["month"]);
		$year = intval($_POST["year"]);
		$from = htmlspecialchars($_POST["from"], ENT_QUOTES);
		$to = htmlspecialchars($_POST["to"], ENT_QUOTES);
		$return = htmlspecialchars($_POST["returnBooked"], ENT_QUOTES);
		$bookingID = htmlspecialchars($_POST["bookingID"], ENT_QUOTES);

		$values = array();

		$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		if ($to == "ceilidh") {
			$to = "eigg";
		}

		// Get capacity and if wheelchair is booked
		if ($to == "mallaig" || $to == "eigg") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND (Booking.returnBooked = true OR Booking.reverse = true) AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled AND Booking.bookingID != :bookingID");
		} else if ($return == "true") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled AND Booking.bookingID != :bookingID");
		} else {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Booking.reverse = false AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled AND Booking.bookingID != :bookingID");
		}

		if ($to == "mallaig" || ($to == "eigg" && $from != "mallaig")) {
			$from = htmlspecialchars($_POST["to"], ENT_QUOTES);
			$to = htmlspecialchars($_POST["from"], ENT_QUOTES);
		}

		$stmt->bindValue(":froms", ucfirst($from), PDO::PARAM_STR);
		$stmt->bindValue(":to", ucfirst($to), PDO::PARAM_STR);
		$stmt->bindValue(":cancelled", false, PDO::PARAM_BOOL);
		$stmt->bindValue(":bookingID", $bookingID, PDO::PARAM_INT);
		
		// Apply capacity and if the wheelchair is booked for each day to an array to be used later
		for ($i = 1; $i <= $days; $i++) {
			$dateString = $year."-".$month."-".$i;
			$date = date("Y-m-d", strtotime($dateString));

			$stmt->bindValue(":date", $date, PDO::PARAM_STR);
			$stmt->execute();

			$capacity = 30;
			$wheelchairBooked = false;

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

			array_push($values, array($capacity, $wheelchairBooked));
		}

		echo json_encode($values);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>