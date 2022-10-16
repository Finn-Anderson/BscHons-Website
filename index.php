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
				<img id="1" src="/img/eiggPanoramic.jpg">
			</div>
		</div>

		<div id="companyInfo">
			<div>
				<h1>About Us</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
			</div>
			<div>
				<h1>The Boat</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida.<span id="wheelchairInfo"> Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. </span>Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
			</div>
			<div>
				<h1>Booking</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
			</div>
		</div>

		<div id="mapDiv">
			<img src="/img/map.png">
			<div id="locationDiv">
				<button id="mallaig" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="eigg" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="muck" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="rum" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<?php if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) { echo "<button id='ceilidh' class='locationBtn' onclick='changeBorderColour(this); lineAnim(this.id)'></button>"; } ?>
			</div>
			<div class="locationPointer">
				<div class="locationLine"></div>
				<div class="locationLine"></div>
			</div>
			<div id="locationSelect">
				<select id="selectTimeout" onchange="fadeText(this.value)">
					<option value="mallaig">Mallaig</option>
					<option value="eigg">Eigg</option>
					<option value="muck">Muck</option>
					<option value="rum">Rum</option>
					<?php if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) { echo "<option value='ceilidh'>Ceilidh</option>"; } ?>
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
		}

		function lineAnim(id) {
			document.getElementById("selectTimeout").disabled = true;

			document.getElementById("locationText").style.opacity = "0";
			document.getElementById("locationText").style.transitionDelay = "0s";

			document.getElementsByClassName("locationPointer")[0].classList.remove("locationLineAnim");

			setTimeout(function() { displayText(id); performAnim(id) }, 2000);
		}

		function fadeText(id) {
			document.getElementById("selectTimeout").disabled = true;

			document.getElementById("locationText").style.opacity = "0";

			setTimeout(function() { displayText(id) }, 2000);
		}

		function displayText(id) {
			if (id == "mallaig") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Mallaig";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.";
				document.getElementById("locationText").childNodes[5].href = "/island/mallaig.php";
			} else if (id == "eigg") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Eigg";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.";
				document.getElementById("locationText").childNodes[5].href = "/island/eigg.php";
			} else if (id == "muck") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Muck";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.";
				document.getElementById("locationText").childNodes[5].href = "/island/muck.php";
			} else if (id == "rum") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Rum";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.";
				document.getElementById("locationText").childNodes[5].href = "/island/rum.php";
			} else if (id == "ceilidh") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Ceilidh";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.";
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