<!DOCTYPE html>
<html lang="en">
	<?php $title = "Account Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<div id="accountDiv">
			<form id="avatarForm" method="post" action="includes/updateAvatar.php" enctype="multipart/form-data">
				<?php 
					if (pathinfo($img, PATHINFO_EXTENSION) == "svg") {
						echo '<img id="avatar" src="'.$img.'"/>';
					} else {
						echo '<img id="avatar" src="'.$img.'"/>';
					}
				?>
				<input id="fileUpload" type="file" name="avatar" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0]); saveProfile()" accept=".jpg, .jpeg, .png, .gif, .svg">
				<label for="fileUpload">&#9998</label>

				<p><?php echo $name ?></p>

				<a href="/includes/logout.php">Logout</a>

				<table>
					<thead>
						<tr>
							<th>Del</th>
							<th>Booking ID</th>
							<th>No. of People</th>
							<th>Cost</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

								// set the PDO error mode to exception
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								$getBookings = $conn->prepare("SELECT Booking.bookingID, SUM(numberOfPeople) AS numPeople, SUM(numberOfPeople * cost) AS sumCost, date, returnBooked FROM Booking, Trip, RouteFare WHERE Booking.bookingID = Trip.bookingID AND Trip.routeFareID = RouteFare.routeFareID AND userID = :id GROUP BY Trip.bookingID DESC");
								$getBookings->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
								$getBookings->execute();

								$result = $getBookings->fetchAll();

								foreach( $result as $row ) {
									if ($row["bookingID"] && $row["date"]) {
										echo "<tr>";
											echo "<td><button type='button' onclick='deleteRow()'>X</button></td>";
											echo "<td>".$row["bookingID"]."</td>";
											echo "<td>".$row["numPeople"]."</td>";
											if ($row["returnBooked"]) {
												echo "<td>".$row["sumCost"]."</td>";
											} else {
												echo "<td>".$row["sumCost"] * 0.7."</td>";
											}
											echo "<td>".$row["date"]."</td>";
											echo "<td><a>edit</a></td>";
										echo "</tr>";
									}
								}
							}

							catch(PDOException $e) {
								echo $e->getMessage();
							}

							$conn = null;
						?>
					</tbody>
				</table>
			</form>
		</div>
	</body>
	<script>
		function saveProfile() {
			var $form = $("#avatarForm"),
				url = $form.attr( "action" )

			let formValues = document.getElementById('avatarForm');
			let data = new FormData(formValues);

			$.ajax({
				type: "POST",
				url: url,
				data: data,
				cache: false,
				contentType: false,
				processData: false
			}, 'json');
		}

		function deleteRow() {

		}
	</script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>