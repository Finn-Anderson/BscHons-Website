<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include "includes/header.php"?>
	<body>
		<div id="intro">
			<div id="introTxt">
				<h1>Alba Cruises</h1>
				<p>Your escape to island cruising is just one click away</p>
				<a class="albaButton" href="booking.php">Book Now</a>
			</div>

			<!-- Intro image spans whole of intro div -->
			<div id="introImg">
				<img src="img/introImg.jpg">
			</div>
		</div>

		<div id="companyInfo">
			<div>
				<h1>About Us</h1>
				<p>Alba Wildlife Cruises is based in the port of Mallaig on the western coast of Scotland. The company currently has a small holding based around the village harbour. <br><br>Alba Wildlife Cruises operate a single passenger ferry. <br><br>The company only operates in the Summer and Autumn periods, which is May to October inclusive.</p>
			</div>
			<div>
				<h1>The Boat</h1>
				<p>The boat is allowed to operate in the water around Mallaig, which includes the islands Eigg, Rum and Muck. <br><br>The boat is a small passenger ferry which holds up to 30 customers. <span id="wheelchairInfo">Currently, the ferry can only house one wheelchair-bound person out of the 30 customers.</span> <br><br>The boat not only hosts customers, but is also available to carry provisions and mail to the three islands which it supports.</p>
			</div>
			<div>
				<h1>Booking</h1>
				<p>Bookings can be made either through telephone, email (view footer) or through the website's booking form. <br><br>Bookings made from and to an island will have specific times, but will always be in the time field of 11:00 to 17:30. <br><br>If you would like to edit or delete a booking, this can be done in the account page. However, editing a booking within 24 hours of departure will incur a £5.00 surcharge.</p>
			</div>
		</div>

		<div id="mapDiv">
			<img src="img/map.png">

			<!-- Location buttons absoulute positions are set in the javascript in accordance to their location on the map image -->
			<div id="locationDiv">
				<button id="mallaig" class="locationBtn orange-bg" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="eigg" class="locationBtn orange-bg" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="muck" class="locationBtn orange-bg" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="rum" class="locationBtn orange-bg" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<?php if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] >= 6) { echo "<button id='ceilidh' class='locationBtn' onclick='changeBorderColour(this); lineAnim(this.id)'></button>"; } ?>
			</div>

			<!-- Lines are initially hidden, but then are altered and displayed through javascript depending on the button clicked -->
			<div class="locationPointer">
				<div class="locationLine orange-bg"></div>
				<div class="locationLine orange-bg"></div>
			</div>

			<!-- This is displayed if the screen width is not big enough to fit the map & text -->
			<div id="locationSelect">
				<select id="selectTimeout" onchange="lineAnim(this.value)">
					<option value="" selected disabled>Select</option>
					<option value="mallaig">Mallaig</option>
					<option value="eigg">Eigg</option>
					<option value="muck">Muck</option>
					<option value="rum">Rum</option>
					<?php if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] >= 6) { echo "<option value='ceilidh'>Ceilidh</option>"; } ?>
				</select>
			</div>

			<!-- Location text is altered depending on location picked through the index.js script file -->
			<div id="locationText">
				<h1>Location Picker</h1>
				<p>Click one of the circles on an island to the right or select an island from the drop down above to learn more about that island!</p>
				<a class="albaButton" href="">Learn More</a>
			</div>
		</div>
	</body>
	<?php include "includes/footer.php" ?>
	<script src="js/index.js"></script>
</html>