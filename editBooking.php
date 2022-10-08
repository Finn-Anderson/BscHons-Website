<!DOCTYPE html>
<html lang="en">
	<?php $title = "Edit Booking Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>
	<?php 
		include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
				$id = htmlspecialchars($_GET["id"], ENT_QUOTES);
				$getBooking = $conn->prepare("SELECT Booking.bookingID, date, Route.from, Route.to, numberOfPeople, returnBooked, wheelchairBooked, minAge, maxAge FROM Booking, Trip, RouteFare, Route, Fare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND RouteFare.fareID = Fare.fareID AND userID = :id AND Booking.bookingID = :bookingID AND cancelled = :cancelled");
				$getBooking->bindValue(":bookingID", $id, PDO::PARAM_INT);
			} else {
				header("Location: ../account.php");
			}

			$getBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
			$getBooking->bindValue(":cancelled", false, PDO::PARAM_BOOL);
			$getBooking->execute();

			$values = array();

			$result = $getBooking->fetchAll();

			if ($getBooking->rowCount() > 0) {
				foreach( $result as $row ) {
					$compare = new DateTime("now", new DateTimeZone("Europe/London"));
					if (date("Y-m-d", strtotime($row["date"])) > $compare->format('Y-m-d')) {
						if ($row["numberOfPeople"] > 0) {
							$ageRange = $row["minAge"]." - ".$row["maxAge"];

							array_push($values, array(sprintf("%08d",$row["bookingID"]), $row["to"], $row["from"], $row["date"], $row["wheelchairBooked"], $row["returnBooked"], $row["numberOfPeople"], $ageRange));
						}
					} else {
						header("Location: ../account.php");
					}
				}
			} else {
				header("Location: ../account.php");
			}
		}

		catch(PDOException $e) {
			echo $e->getMessage();
		}

		$conn = null;
	?>
	<body>
		<div id="bookingIntro">
			<h1>ID: <?php echo $values[0][0] ?></h1>
		</div>
		<?php
			// Displays booking fail message when msg is set
			if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
				echo "<p class='warning'>Failed to edit booking. Please try again.</p><br>";
			}
		?>
		<form action="includes/editBookingDB.php" method="post">
			<input type="hidden" name="bookingID" value="<?php echo $values[0][0] ?>">
		<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/bookingInputs.php" ?>
	</body>
	<script>
		document.getElementById("toSelect").value = "<?php echo strtolower($values[0][1]) ?>";
		populateSelect(document.getElementById("toSelect").value);

		document.getElementById("fromSelect").value = "<?php echo strtolower($values[0][2]) ?>";

		var currentBookingDate = new Date(<?php echo date('Y,m,d', strtotime($values[0][3])) ?>);
		displayCalendarDays(currentBookingDate.getMonth() - 1);

		function editSelectDate() {
			var firstDay = new Date(currentBookingDate.getFullYear(), (currentBookingDate.getMonth() - 1), 0).getDay();

			if (firstDay == 0) {
				firstDay = 7;
			}

			var tdIndex = currentBookingDate.getDate() + firstDay;

			var row = Math.floor((tdIndex / 7)) + 1;
			var cell = (tdIndex % 7) - 1;
			
			const table = document.getElementById("calendar");
			inputDate(table.rows[row].cells[cell]);


			if (<?php echo $row["wheelchairBooked"]; ?>) {
				document.getElementById("wheelchairYes").checked = true;
			}
			if (<?php echo $row["returnBooked"]; ?>) {
				document.getElementById("returnYes").checked = true;
			}


			var ageSelects = document.getElementsByClassName("ageSelect");
			for (var i = 0; i < ageSelects.length; i++) {
				if (ageSelects[i].name == "baby") {
					ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '0 - 2') { echo $values[$i][6]; } }?>");
				} else if (ageSelects[i].name == "child") {
					ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '3 - 10') { echo $values[$i][6]; } }?>");
				} else if (ageSelects[i].name == "teenager") {
					ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '11 - 16') { echo $values[$i][6]; } }?>");
				} else if (ageSelects[i].name == "adult") {
					ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '17 - 200') { echo $values[$i][6]; } }?>");
				}
			}

			if (document.querySelectorAll('.selectedDate')[0]) {
				checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1);
			}
			displayDepartureTimes();
			tallyCost();
		}
	</script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>