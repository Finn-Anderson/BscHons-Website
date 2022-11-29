<!DOCTYPE html>
<html lang="en">
	<?php $title = "Edit Booking Page"; include "includes/header.php" ?>
	<?php 
		include "includes/dbCredentials.php";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Send user back to account page if there is no id in url. Else, get booking via id
			if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
				$id = htmlspecialchars($_GET["id"], ENT_QUOTES);
				$getBooking = $conn->prepare("SELECT Booking.bookingID, date, Route.from, Route.to, numberOfPeople, returnBooked, wheelchairBooked, minAge, maxAge FROM Booking, Trip, RouteFare, Route, Fare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND RouteFare.fareID = Fare.fareID AND userID = :id AND Booking.bookingID = :bookingID AND cancelled = :cancelled");
				$getBooking->bindValue(":bookingID", $id, PDO::PARAM_INT);
			} else {
				header("Location: account.php");
			}

			$getBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
			$getBooking->bindValue(":cancelled", false, PDO::PARAM_BOOL);
			$getBooking->execute();

			$values = array();

			$result = $getBooking->fetchAll();

			// Put data into array if row present and date is greater than today's date. Else send back to account page
			if ($getBooking->rowCount() > 0) {
				foreach( $result as $row ) {
					$compare = new DateTime("now", new DateTimeZone("Europe/London"));
					if (date("Y-m-d", strtotime($row["date"])) > $compare->format('Y-m-d')) {
						if ($row["numberOfPeople"] > 0) {
							$ageRange = $row["minAge"]." - ".$row["maxAge"];

							if ($row["date"] == "2022-10-27") {
								$row["to"] = "ceilidh";
							}

							array_push($values, array(sprintf("%08d",$row["bookingID"]), $row["to"], $row["from"], $row["date"], $row["wheelchairBooked"], $row["returnBooked"], $row["numberOfPeople"], $ageRange));
						}
					} else {
						header("Location: account.php");
					}
				}
			} else {
				header("Location: account.php");
			}
		}

		catch(PDOException $e) {
			echo $e->getMessage();
		}

		$conn = null;
	?>
	<body>
		<div id="bookingIntro">
			<h1 id="bookingID">ID: <?php echo $values[0][0] ?></h1>
		</div>
		<?php
			// Displays on fail to edit booking
			if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
				echo "<p class='warning'>Failed to edit booking. Please try again.</p><br>";
			}
		?>
		<form action="includes/editBookingDB.php" method="post">
			<input type="hidden" name="bookingID" value="<?php echo $values[0][0] ?>">
			<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/bookingInputs.php" ?>
		</form>
	</body>
	<script type="text/javascript">
		var editArr = <?php echo json_encode($values) ?>
	</script>
	<script src="js/editBooking.js"></script>
	<?php include "includes/footer.php" ?>
</html>