<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		// Check if posts are valid before doing databse queries
		$count = 0;
		foreach($_POST as $key => $value){
			if(empty($value) AND !is_numeric($value) AND !is_bool($value)) {
				header("Location: ../booking.php?msg=failed");
			} else {
				$count += 1 ;
			}
		}

		if ($count == count($_POST)) {
			$to = htmlspecialchars($_POST["island"], ENT_QUOTES);
			$from = htmlspecialchars($_POST["departure"], ENT_QUOTES);
			$date = date("Y-m-d", strtotime($_POST["dateChosen"]));
			$return = filter_var(htmlspecialchars($_POST["return"], ENT_QUOTES), FILTER_VALIDATE_BOOLEAN);
			$wheelchair = filter_var(htmlspecialchars($_POST["wheelchair"], ENT_QUOTES), FILTER_VALIDATE_BOOLEAN);
			$baby = htmlspecialchars($_POST["baby"], ENT_QUOTES);
			$child = htmlspecialchars($_POST["child"], ENT_QUOTES);
			$teenager = htmlspecialchars($_POST["teenager"], ENT_QUOTES);
			$adult = htmlspecialchars($_POST["adult"], ENT_QUOTES);

			if ($to == "ceilidh") {
				$to = "eigg";
			}

			$reverse = false;

			// Swap from and to if travelling backwards
			if ($to == "mallaig" || ($to == "eigg" && $from != "mallaig")) {
				$from = htmlspecialchars($_POST["island"], ENT_QUOTES);
				$to = htmlspecialchars($_POST["departure"], ENT_QUOTES);
				$reverse = true;
			}

			// Set initial variable values to use later
			$tally = $baby + $child + $teenager + $adult;
			$capacity = 30 - $tally;
			$surcharge = false;
			$compare = new DateTime("now", new DateTimeZone("Europe/London"));

			// Checks if all inputs are valid
			$tblList = array($to, $from, $date, $return, $wheelchair, $baby, $child, $teenager, $adult, $tally);
			for ($i=0; $i < Count($tblList); $i++) {
				if (($tblList[$i] == $to AND $to == $from) OR (is_numeric($tblList[$i])) AND ($tblList[$i] < 0 OR $tblList[$i] > 30) OR ($tblList[$i] == $return AND $return == true AND $reverse == true) OR $tally <= 0 OR ($tblList[$i] == $date AND date("Y-m-d", strtotime($date)) <= $compare->format('Y-m-d'))) {
					header("Location: ../booking.php?msg=failed");
					break;
				} elseif ($i == (Count($tblList) - 1)) {
					// Check if capacity sent is greater than capacity allowed
					$checkCapacity = $conn->prepare("SELECT numberOfPeople FROM Booking, Trip, RouteFare, Route WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND Booking.date = :date AND Route.from = :froms AND Route.to = :to AND Booking.returnBooked = :return AND Booking.reverse = :reverse");
					$checkCapacity->bindValue(":date", $date, PDO::PARAM_STR);
					$checkCapacity->bindValue(":froms", $from, PDO::PARAM_STR);
					$checkCapacity->bindValue(":to", $to, PDO::PARAM_STR);
					$checkCapacity->bindValue(":return", $return, PDO::PARAM_BOOL);
					$checkCapacity->bindValue(":reverse", $reverse, PDO::PARAM_BOOL);
					$checkCapacity->execute();
					
					if ($checkCapacity->rowCount() > 0) {
						$result = $checkCapacity->fetchAll();

						foreach( $result as $row ) {
							$capacity -= $row["numberOfPeople"];
						}
					}

					if ($capacity >= 0) {
						// Insert new booking and get it's relevant data to use in the trip table
						$stmtBooking = $conn->prepare("INSERT INTO Booking (userID, date, surcharge, returnBooked, wheelchairBooked, reverse, cancelled)
							VALUES (:id, :date, :surcharge, :returnBooked, :wheelchairBooked, :reverse, :cancelled)");
						$stmtBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
						$stmtBooking->bindValue(":date", $date, PDO::PARAM_STR);
						$stmtBooking->bindValue(":surcharge", $surcharge, PDO::PARAM_INT);
						$stmtBooking->bindValue(":returnBooked", $return, PDO::PARAM_BOOL);
						$stmtBooking->bindValue(":wheelchairBooked", $wheelchair, PDO::PARAM_BOOL);
						$stmtBooking->bindValue(":reverse", $reverse, PDO::PARAM_BOOL);
						$stmtBooking->bindValue(":cancelled", false, PDO::PARAM_BOOL);
						$stmtBooking->execute();

						$getBookingID = $conn->prepare("SELECT bookingID FROM Booking WHERE userID = :id ORDER BY bookingID DESC LIMIT 1");
						$getBookingID->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
						$getBookingID->execute();
						$bookingID = $getBookingID->fetchColumn();

						$getRouteFareIDs = $conn->prepare("SELECT routeFareID, minAge, maxAge FROM RouteFare, Fare, Route WHERE RouteFare.routeID = Route.routeID AND RouteFare.fareID = Fare.fareID AND Route.from = :froms AND Route.to = :to");
						$getRouteFareIDs->bindValue(":froms", $from, PDO::PARAM_STR);
						$getRouteFareIDs->bindValue(":to", $to, PDO::PARAM_STR);
						$getRouteFareIDs->execute();

						$result = $getRouteFareIDs->fetchAll();
						foreach( $result as $row ) {
							$choice = 0;

							// Sort into choices
							if ($row["minAge"] == 0 && $row["maxAge"] == 2) {
								$choice = $baby;
							} else if ($row["minAge"] == 3 && $row["maxAge"] == 10) {
								$choice = $child;
							} else if ($row["minAge"] == 11 && $row["maxAge"] == 16) {
								$choice = $teenager;
							} else if ($row["minAge"] >= 17) {
								$choice = $adult;
							}

							// Insert values into trip table
							$stmtTrip = $conn->prepare("INSERT INTO Trip (bookingID, routeFareID, numberOfPeople)
								VALUES (:bookingID, :routeFareID, :numberOfPeople)");
							$stmtTrip->bindValue(":bookingID", $bookingID, PDO::PARAM_INT);
							$stmtTrip->bindValue(":routeFareID", $row["routeFareID"], PDO::PARAM_INT);
							$stmtTrip->bindValue(":numberOfPeople", $choice, PDO::PARAM_INT);
							$stmtTrip->execute();
						}

						$_SESSION["bookingTally"] += 1;

						header("Location: ../print.php");
					} else {
						header("Location: ../booking.php?msg=failed");
					}
				}
			}
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>