<!DOCTYPE html>
<html lang="en">
	<?php $title = "Print Page"; include "includes/header.php" ?>
	<body>
		<main>
			<?php
				include "includes/dbCredentials.php";

				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					// Checks if this is the 6th booking made
					$getBookingsTally = $conn->prepare("SELECT bookingID FROM Booking WHERE userID = :id AND cancelled = :cancelled and returnBooked = :return ORDER BY date ASC LIMIT 1 OFFSET 5");
					$getBookingsTally->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
					$getBookingsTally->bindValue(":cancelled", false, PDO::PARAM_BOOL);
					$getBookingsTally->bindValue(":return", true, PDO::PARAM_BOOL);
					$getBookingsTally->execute();

					$tally = $getBookingsTally->fetch();

					// Gets either the booking id in the url or (if absent) the last known booking made by the user to display
					if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
						$id = htmlspecialchars($_GET["id"], ENT_QUOTES);
						$getBooking = $conn->prepare("SELECT Booking.bookingID, date, surcharge, Route.from, Route.to, numberOfPeople, cost, returnBooked, wheelchairBooked, minAge, maxAge, reverse FROM Booking, Trip, RouteFare, Route, Fare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND RouteFare.fareID = Fare.fareID AND userID = :id AND Booking.bookingID = :bookingID AND cancelled = :cancelled");
						$getBooking->bindValue(":bookingID", $id, PDO::PARAM_INT);
					} else {
						$getBooking = $conn->prepare("SELECT Booking.bookingID, date, surcharge, Route.from, Route.to, numberOfPeople, cost, returnBooked, wheelchairBooked, minAge, maxAge, reverse FROM Booking, Trip, RouteFare, Route, Fare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND RouteFare.routeID = Route.routeID AND RouteFare.fareID = Fare.fareID AND userID = :id AND cancelled = :cancelled ORDER BY Booking.bookingID DESC, minAge ASC LIMIT 4");
					}

					$getBooking->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
					$getBooking->bindValue(":cancelled", false, PDO::PARAM_BOOL);
					$getBooking->execute();

					$values = array();

					$result = $getBooking->fetchAll();

					if ($getBooking->rowCount() > 0) {
						foreach( $result as $row ) {
							if ($row["numberOfPeople"] > 0) {
								$discount = "0%";

								if ($tally && $tally["bookingID"] == $row["bookingID"]) {
									$row["cost"] = $row["cost"] * 0.5;
									$discount = "50%";
								} else if (!$row["returnBooked"]) {
									$row["cost"] = $row["cost"] * 0.7;
									$discount = "30%";
								}

								$ageRange = $row["minAge"]." - ".$row["maxAge"];

								if ($row["reverse"]) {
									$from = $row["from"];
									$row["from"] = $row["to"];
									$row["to"] = $from;
								}

								$row["cost"] *= $row["numberOfPeople"];
								array_push($values, array(sprintf("%08d",$row["bookingID"]), $row["date"], $row["wheelchairBooked"], $row["returnBooked"], $row["surcharge"], $row["from"], $row["to"], $row["numberOfPeople"], $ageRange, number_format((float)$row["cost"], 2, ".", ""), $discount));
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
			<!-- Checks values before displaying correct and relelvant information -->
			<div id="printDiv">
				<div id="printHeader">
					<?php 
						echo "<p>ID: ".$values[0][0]."</p>";
						echo "<p>".$values[0][1]."</p>";

						$from = $values[0][5];
						$to = $values[0][6];

						$day = date("w", strtotime($values[0][1]));
						if ($day == 4) {
							if ($from == "Mallaig") {
								$time = "11:00 - 12:45";
							} else {
								$time = "15:45 - 17:30";
							}
						} else if ($from == "Muck" || $from == "Rum") {
							if ($to == "Eigg") {
								$time = "15:30 - 16:00";
							} else {
								$time = "15:30 - 17:30";
							}
						} else if ($from == "Eigg") {
							if ($to == "Muck" || $to == "Rum") {
								$time = "12:30 - 13:30";
							} else {
								$time = "16:30 - 17:30";
							}
						} else {
							if ($to == "Muck" || $to == "Rum") {
								$time = "11:00 - 13:30";
							} else {
								$time = "11:00 - 12:00";
							}
						}

						echo "<p class='printTimes'>".$from." - ".$to." <span></span>".$time."</p>";

						if ($values[0][3]) {
							if ($to == "Eigg") {
								$time = "16:30 - 17:30";
							} else if ($to == "Muck") {
								if ($from == "Mallaig") {
									$time = "15:30 - 17:30";
								} else {
									$time = "15:30 - 16:00";
								}
							} else if ($to == "Rum") {
								if ($day == 4) {
									$time = "15:45 - 17:30";
								} else {
									if ($from == "Mallaig") {
										$time = "15:30 - 17:30";
									} else {
										$time = "15:30 - 16:00";
									}
								}
							}
							echo "<p class='printTimes'>".$to." - ".$from." <span></span>".$time."</p>";
						}
					?>
				</div>
				<div id="printBooked">
					<?php
						echo "<div>";
							echo "<p>Wheelchair Booked:</p>";
							if ($values[0][2]) {
								echo "<p class='printRight'>Yes</p>";
							} else {
								echo "<p class='printRight'>No</p>";
							}
						echo "</div>";

						echo "<div>";
							echo "<p>Return Booked:</p>";
							if ($values[0][3]) {
								echo "<p class='printRight'>Yes</p>";
							} else {
								echo "<p class='printRight'>No</p>";
							}
						echo "</div>";
					?>
				</div>
				<div id="printDetails">
					<table>
						<thead>
							<th>From</th>
							<th>To</th>
							<th>No. of People</th>
							<th>Age Range</th>
							<th>Cost</th>
						</thead>
						<tbody id="printTbody">
							<?php 
								for ($i=0; $i < count($values); $i++) { 
									echo "<tr>";
									for ($j=5; $j < (count($values[$i]) - 1); $j++) { 
										if ($j == 8 && $values[$i][$j] == "17 - 200") {
											echo "<td>17+</td>";
										} else if ($j == 9) {
											echo "<td>??".$values[$i][$j]."</td>";
										} else {
											echo "<td>".$values[$i][$j]."</td>";
										}
									}
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
					<div>
						<?php
							echo "<div class=''>";
								echo "<p>Discount:</p>";
								echo "<p class='printRight'>".$values[0][10]."</p>";
							echo "</div>";

							if ($values[0][4]) {
								$surcharge = 5;
							} else {
								$surcharge = 0;
							}

							$surcharge = number_format((float)$surcharge, 2, ".", "");

							echo "<div>";
								echo "<p>Surcharge:</p>";
								echo "<p class='printRight'>??".$surcharge."</p>";
							echo "</div>";

							echo "<div>";
								echo "<p>VAT:</p>";
								echo "<p class='printRight'>20%</p>";
							echo "</div>";

							$cost = 0;
							for ($i=0; $i < count($values); $i++) { 
								$cost += $values[$i][9];
							}
							$cost += $surcharge;
							$cost *= 1.2;
							$cost = number_format((float)$cost, 2, ".", "");
						?>
						<div id="printCostDiv">
							<p>Total Cost</p>
							<p class='printRight'>??<?php echo $cost ?></p>
						</div>
					</div>
					<button class="albaButton" onclick="window.print()">PRINT</button>
				</div>
			</div>
		</main>
		<?php include "includes/footer.php" ?>
	</body>
</html>