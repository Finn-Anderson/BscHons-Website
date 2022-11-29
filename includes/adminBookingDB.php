<?php
	include "../includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		session_start();

		// set the PDO error mode to exception and initial values of variables
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$capacity = 0;
		$avgCapacity = 0;
		$reverse = false;

		$from = htmlspecialchars($_POST["from"], ENT_QUOTES);
		$to = htmlspecialchars($_POST["to"], ENT_QUOTES);
		$sqlDate = date("Y-m-d", strtotime($_POST["date"]));
		$yr = date("Y", strtotime($_POST["date"]))."%";

		// Change to locations to work in database. Set reverse based on to location
		if ($to == "ceilidh") {
			$to = "eigg";
		}

		if ($to == "mallaig" || ($to == "eigg" && $from != "mallaig")) {
			$from = htmlspecialchars($_POST["to"], ENT_QUOTES);
			$to = htmlspecialchars($_POST["from"], ENT_QUOTES);
			$reverse = true;
		}
		
		// Get capacity of date selected
		$dayCapacity = $conn->prepare("SELECT numberOfPeople FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Route.from = :froms AND Route.to = :to AND reverse = :reverse");
		$dayCapacity->bindValue(":froms", $from, PDO::PARAM_STR);
		$dayCapacity->bindValue(":to", $to, PDO::PARAM_STR);
		$dayCapacity->bindValue(":date", $sqlDate, PDO::PARAM_STR);
		$dayCapacity->bindValue(":reverse", $reverse, PDO::PARAM_BOOL);
		$dayCapacity->execute();

		if ($dayCapacity->rowCount() > 0) {
			$result = $dayCapacity->fetchAll();

			foreach( $result as $row ) {
				if ($row["numberOfPeople"]) {
					$capacity += $row["numberOfPeople"];
				}
			}
		}

		// Get average capacity over the whole season
		$avgSeasonCapacity = $conn->prepare("SELECT SUM(numberOfPeople) as 'totalNum' FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date LIKE :year AND Route.from = :froms AND Route.to = :to AND reverse = :reverse GROUP BY Booking.date");
		$avgSeasonCapacity->bindValue(":froms", $from, PDO::PARAM_STR);
		$avgSeasonCapacity->bindValue(":to", $to, PDO::PARAM_STR);
		$avgSeasonCapacity->bindValue(":year", $yr, PDO::PARAM_STR);
		$avgSeasonCapacity->bindValue(":reverse", $reverse, PDO::PARAM_BOOL);
		$avgSeasonCapacity->execute();

		if ($avgSeasonCapacity->rowCount() > 0) {
			$result = $avgSeasonCapacity->fetchAll();

			$total = 0;
			$count = 0;

			foreach( $result as $row ) {
				if ($row["totalNum"]) {
					$total += $row["totalNum"];
					$count += 1;
				}
			}

			$avgCapacity = ($total / $count);
		}

		echo json_encode(array($capacity, $avgCapacity));
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>