<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"?>
	<body>
		<div id="intro">
			<div id="introTxt">
				<h1>Alba Cruises</h1>
				<p>Your escape to island cruising is just one click away</p>
				<a class="albaButton" href="booking.php">Book Now</a>
			</div>
			<div id="introImg">
				<img src="/img/introImg.jpg">
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
			<img src="/img/map.png">
			<div id="locationDiv">
				<button id="mallaig" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="eigg" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="muck" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="rum" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<?php if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] >= 6) { echo "<button id='ceilidh' class='locationBtn' onclick='changeBorderColour(this); lineAnim(this.id)'></button>"; } ?>
			</div>
			<div class="locationPointer">
				<div class="locationLine"></div>
				<div class="locationLine"></div>
			</div>
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
			<div id="locationText">
				<h1>Location Picker</h1>
				<p>Click one of the circles on an island to the right or select an island from the drop down above to learn more about that island!</p>
				<a class="albaButton" href="">Learn More</a>
			</div>
		</div>
	</body>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
	<script type="text/javascript">
		function changeBorderColour(element) {
			if (!element.classList.contains("locationClicked")) {
				$(".locationClicked").removeClass("locationClicked");
				element.classList.toggle("locationClicked");
			}
			document.getElementById("selectTimeout").value = element.id;
		}

		function lineAnim(id) {
			document.getElementById("selectTimeout").disabled = true;

			document.getElementById("locationText").style.opacity = "0";
			document.getElementById("locationText").style.transitionDelay = "0s";

			document.getElementsByClassName("locationPointer")[0].classList.remove("locationLineAnim");

			setTimeout(function() { displayText(id); performAnim(id) }, 2000);
		}

		function displayText(id) {
			if (id == "mallaig") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Mallaig";
				document.getElementById("locationText").childNodes[3].innerHTML = "Mallaig is a port in the North West of Scotland. It currently has a population of 660.<br><br>Mallaig has a plethora of local services, ranging from local gift shop to minimarkets to a leisure centre, swimming pool and more. You can also take the A830 road to inner Scotland.<br><br>Mallaig can only be accessed through Eigg and Rum. Mallaig can be travelled to on all days of the week, but times and routes vary. To view these routes and times, please click on learn more.";
				document.getElementById("locationText").childNodes[5].href = "/island/mallaig.php"
			} else if (id == "eigg") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Eigg";
				document.getElementById("locationText").childNodes[3].innerHTML = "Eigg is an island off the coast of Mallaig. Eigg has a population of 105 people with an area of 11.8 square miles.<br><br>On the island, there is a craft shop, a restaurant and bar, toilet, shower facilities and much, much more. You can also explore the island, with it's beautiful beaches, caves and the abandoned village of Grulin, along with other places.<br><br>Both the isles of Muck and Rum, along with Mallaig, are able to access Eigg. If you would like to know the times and days of the week you can access Eigg, please click learn more.";
				document.getElementById("locationText").childNodes[5].href = "/island/eigg.php";
			} else if (id == "muck") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Muck";
				document.getElementById("locationText").childNodes[3].innerHTML = "Muck is the smallest island off the three. Owned by the MacEwen family, it has a population of 27 in it's 2.125 square miles.<br><br>Whilst there are not a lot of facilities on the island, there are a few historical and geological interests. From multiple cairns to it's deep Norwegian history, much is to be learned and explored on the island.<br><br>Muck can be reached through Eigg only. If you would like to know the departure and arrival times, as well as the days you can go, please click on the learn more button.";
				document.getElementById("locationText").childNodes[5].href = "/island/muck.php";
			} else if (id == "rum") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Rum";
				document.getElementById("locationText").childNodes[3].innerHTML = "Standing at 40.385 square miles with a population of 40, Rum is the biggest island.<br><br>Rum has a few points of interest. Whilst it also has a large amount of country side of vast hills and coastal waterfalls, you can also explore Kinloch Castle, which was built in the 1900's. If you wish, you can take a walk to the National Nature Reserve and view deer's and wildlife there, or go fishing out in the waters around it.<br><br>Currently, Rum is accessible via Mallaig and Eigg at alternating times and dates. To view exact times and dates, please click on the learn more button below.";
				document.getElementById("locationText").childNodes[5].href = "/island/rum.php";
			} else if (id == "ceilidh") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Ceilidh";
				document.getElementById("locationText").childNodes[3].innerHTML = "Alba Cruises would like to invite you to a special event now that you have made 6 bookings this season. The event takes place on the 27th of October on the island of Eigg.<br><br>On the island, there is a craft shop, a restaurant and bar, toilet, shower facilities and much, much more. You can also explore the island, with it's beautiful beaches, caves and the abandoned village of Grulin, along with other places.<br><br>Both the isles of Muck and Rum, along with Mallaig, are able to access Eigg. If you would like to know the times and days of the week you can access Eigg, along with further information about this event, please click on the learn more button below.";
				document.getElementById("locationText").childNodes[5].href = "/island/ceilidh.php";
			}

			document.getElementById("locationText").style.opacity = "1";
			document.getElementById("locationText").childNodes[5].style.display = "inline-block";

			document.getElementById("selectTimeout").disabled = false;
		}

		function performAnim(id) {
			if (document.getElementsByClassName("ceilidh")) {
				document.getElementsByClassName("locationLine")[0].classList.remove("ceilidhClicked");
				document.getElementsByClassName("locationLine")[1].classList.remove("ceilidhClicked");
				document.getElementById("locationText").childNodes[5].classList.remove("ceilidhClicked");
			}
				
			if (id == "mallaig") {
				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(14deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "242px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "158px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "119px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "1249px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "354px");
			} else if (id == "eigg") {
				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(46deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "359px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "257px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "421px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "880px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "723px");
			} else if (id == "muck") {
				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(46deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "545px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "324px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "494px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "649px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "954px");
			} else if (id == "rum") {
				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(32deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "100px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "155px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "685px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "828px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "775px");
			} else if (id == "ceilidh") {
				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(46deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "300px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "236px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "422px");
				document.getElementsByClassName("locationLine")[0].classList.add("ceilidhClicked");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "929px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "674px");
				document.getElementsByClassName("locationLine")[1].classList.add("ceilidhClicked");

				document.getElementById("locationText").childNodes[5].classList.add("ceilidhClicked");
			}

			document.getElementById("locationText").style.transitionDelay = "1s";
			document.getElementsByClassName("locationPointer")[0].classList.add("locationLineAnim");
		}
	</script>
</html>