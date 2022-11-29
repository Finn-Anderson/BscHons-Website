<!DOCTYPE html>
<html lang="en">
	<?php $title = "Booking Page"; include "includes/header.php" ?>
	<body id="bookingBody">
		<main>
			<div id="bookingIntro">
				<h1>Booking</h1>
				<p class="status">1</p>
				<div id="dashLine"></div>
				<p class="status">2</p>
				<p class="statusBlurb focus">Choose Island</p>
				<p class="statusBlurb">Checkout</p>
			</div>
			<?php
				// Displays booking fail message when msg is set
				if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
					echo "<p class='warning'>Failed to make booking. Please try again.</p><br>";
				}
			?>
			<form action="includes/bookingDB.php" method="post" onchange="changeStatus(2)">
				<div id="islandBookDiv">
					<div id="islandBookEigg">
						<a href="island/eigg.php">
							<h1>Eigg</h1>
							<p>Eigg is an island off the coast of Mallaig. Eigg has a population of 105 people with an area of 11.8 square miles.<br><br>On the island, there is a craft shop, a restaurant and bar, toilet, shower facilities and much, much more.<br><br>You can also explore the island, with it's beautiful beaches, caves and the abandoned village of Grulin, along with other places.<br><br>Current routes dates:<br>Mallaig to Eigg<br>Monday to Wednesday, Friday to Sunday<br>11:00 to 12:00<br><br>Muck to Eigg<br>Monday, Wednesday, Friday and Sunday<br>15:30 to 16:00<br><br>Rum to Eigg<br>Tuesday and Saturday<br>15:30 to 16:30<br><br>Note: we only operate on weekends in June, July and August.</p>
						</a>
						<input id="eigg" type="radio" name="island" value="eigg" onchange="changeStatus(1)">
						<label for="eigg">Book</label>
					</div>
					<div id="islandBookMuck">
						<a href="island/muck.php">
							<h1>Muck</h1>
							<p>Muck is the smallest island off the three. Owned by the MacEwen family, it has a population of 27 in it's 2.125 square miles.<br><br>Whilst there are not a lot of facilities on the island, there are a few historical and geological interests. From multiple cairns to it's deep Norwegian history, much is to be learned and explored on the island.<br><br>Current routes dates:<br>Mallaig to Muck<br>Monday, Wednesday, Friday and Sunday<br>11:00 to 13:30<br><br>Eigg to Muck<br>Monday, Wednesday, Friday and Sunday<br>15:30 to 16:00<br><br>Note: we only operate on weekends in June, July and August.</p>
						</a>
						<input id="muck" type="radio" name="island" value="muck" onchange="changeStatus(1)">
						<label for="muck">Book</label>
					</div>
					<div id="islandBookRum">
						<a href="island/rum.php">
							<h1>Rum</h1>
							<p>Standing at 40.385 square miles with a  population of 40, Rum is the biggest island.<br><br>Rum has a few points of interest. Whilst it also has a large amount of country side of vast hills and coastal waterfalls, you can also explore Kinloch Castle, which was built in the 1900's.<br><br>Current routes dates:<br>Mallaig to Rum<br>Tuesday and Saturday<br>11:00 to 13:30<br><br>Mallaig to Rum<br>Thursday<br>11:00 to 12:45<br><br>Eigg to Rum<br>Tuesday and Saturday<br>12:30 to 13:30<br><br>Note: we only operate on weekends in June, July and August.</p>
						</a>
						<input id="rum" type="radio" name="island" value="rum" onchange="changeStatus(1)">
						<label for="rum">Book</label>
					</div>
					<div id="islandBookMallaig">
						<a href="island/mallaig.php">
							<h1>Mallaig</h1>
							<p>Mallaig is a port in the North West of Scotland. It currently has a population of 660.<br><br>Mallaig has a plethora of local services, ranging from local gift shop to minimarkets to a leisure centre, swimming pool and more. You can also take the A830 road to inner Scotland.<br><br>Current routes dates:<br>Eigg to Mallaig<br>Monday to Wednesday, Friday to Sunday<br>16:30 to 17:30<br><br>Muck to Mallaig<br>Monday, Wednesday, Friday and Sunday<br>15:30 to 17:30<br><br>Rum to Mallaig<br>Tuesday and Saturday<br>15:30 to 17:30<br><br>Rum to Mallaig<br>Thursday<br>15:45 to 17:30<br><br>Note: we only operate on weekends in June, July and August.</p>
						</a>
						<input id="mallaig" type="radio" name="island" value="mallaig" onchange="changeStatus(1)">
						<label for="mallaig">Book</label>
					</div>

					<?php
						// Display Ceilidh if the user has made 6 or more bookings
						if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] >= 6) {
							echo "<div id='islandBookCeilidh'>";
								echo "<a href='island/ceilidh.php'>";
									echo "<h1>Ceilidh</h1>";
									echo "<p>Alba Cruises would like to invite you to a special event now that you have made 6 bookings this season. The event takes place on the 27th of October on the island of Eigg! Don't miss it!<br><br>Current routes Times:<br>Mallaig to Eigg<br>11:00 to 12:00<br><br>Muck to Eigg<br>13:30 to 14:30<br><br>Rum to Eigg<br>15:00 to 16:00</p>";
								echo "</a>";
								echo "<input id='ceilidh' type='radio' name='island' value='ceilidh' onchange='changeStatus(1)'>";
								echo "<label for='ceilidh'>Book</label>";
							echo "</div>";
						}
					?>
				</div>
				<?php include "includes/bookingInputs.php" ?>
			</form>
		</main>
	</body>
	<?php 
		// Checks if the user has logged in for later use
		if (isset($_SESSION["authorized"])) {
			echo "<script>var loginCheck = '".$_SESSION["authorized"]."'</script>";
		} else {
			echo "<script>var loginCheck = false</script>";
		}
	?>;
	<script src="js/bookingStatus.js"></script>
	<?php include "includes/footer.php" ?>
</html>