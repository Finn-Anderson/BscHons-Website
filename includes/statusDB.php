<?php
	include $_SERVER['DOCUMENT_ROOT']."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		session_start();

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$month = intval($_POST["month"]);
		$year = intval($_POST["year"]);
		$from = htmlspecialchars($_POST["from"], ENT_QUOTES);
		$to = htmlspecialchars($_POST["to"], ENT_QUOTES);
		$return = htmlspecialchars($_POST["returnBooked"], ENT_QUOTES);
		$page = htmlspecialchars($_POST["page"], ENT_QUOTES);

		$values = array();

		$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		if ($to == "mallaig" || $to == "eigg") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked, userID FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND (Booking.returnBooked = true OR Booking.reverse = true) AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled");
		} else if ($return == "true") {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked, userID FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled");
		} else {
			$stmt = $conn->prepare("SELECT numberOfPeople, wheelchairBooked, userID FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Booking.reverse = false AND Route.from = :froms AND Route.to = :to AND cancelled = :cancelled");
		}

		if ($to == "mallaig" || ($to == "eigg" && $from != "mallaig")) {
			$from = htmlspecialchars($_POST["to"], ENT_QUOTES);
			$to = htmlspecialchars($_POST["from"], ENT_QUOTES);
		}

		$stmt->bindValue(":froms", ucfirst($from), PDO::PARAM_STR);
		$stmt->bindValue(":to", ucfirst($to), PDO::PARAM_STR);
		$stmt->bindValue(":cancelled", false, PDO::PARAM_BOOL);
		

		for ($i=1; $i <= $days; $i++) {
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
					if ($page == "booking.php" || $row["userID"] != $_SESSION["id"]) {
						$capacity -= $row["numberOfPeople"];

						if ($row["wheelchairBooked"]) {
							$wheelchairBooked = true;
						}
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