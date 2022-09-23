<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include "includes/header.php" ?>
	<body>
		<div id="intro">
			<img id="1" src="/img/eiggPanoramic.jpg">
			<div id="introTxt">
				<h1>Alba Cruises</h1>
				<p>Sample</p>
			</div>
		</div>

		<div id="mapDiv">
			<img src="/img/map.png">
			<div id="locationDiv">
				<button id="mallaig" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="eigg" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="muck" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
				<button id="rum" class="locationBtn" onclick="changeBorderColour(this); lineAnim(this.id)"></button>
			</div>
			<div class="locationPointer">
				<div class="locationLine"></div>
				<div class="locationLine"></div>
			</div>
			<div id="locationText">
				<h1>Interactable Map</h1>
				<span>Click one of the circles on an island to learn more about that island!</span>
				<a href="">Learn More</a>
			</div>
		</div>
	</body>
	<?php include "includes/footer.php" ?>
	<script type="text/javascript">
		function changeBorderColour(element) {
			if (!element.classList.contains("locationClicked")) {
				$('.locationClicked').removeClass('locationClicked');
				element.classList.toggle("locationClicked");
			}
		}

		function lineAnim(id) {
			document.getElementById("locationText").style.opacity = "0";
			document.getElementById("locationText").style.transitionDelay = "0s";

			document.getElementsByClassName("locationPointer")[0].classList.remove("locationLineAnim");

			setTimeout(function() { displayText(id); }, 2000);
		}

		function displayText(id) {
			if (id == "mallaig") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Mallaig";
				document.getElementById("locationText").childNodes[3].innerHTML = "Text";
				document.getElementById("locationText").childNodes[5].href = "/island/mallaig.php";

				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(13.5deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "240px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "157px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "119px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "1250px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "354px");
			} else if (id == "eigg") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Eigg";
				document.getElementById("locationText").childNodes[3].innerHTML = "Text";
				document.getElementById("locationText").childNodes[5].href = "/island/eigg.php";

				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(46deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "359px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "257px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "421px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "883px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "125px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "723px");
			}

			document.getElementById("locationText").childNodes[5].style.display = "block";
			document.getElementById("locationText").style.opacity = "1";
			document.getElementById("locationText").style.transitionDelay = "1s";
			document.getElementsByClassName("locationPointer")[0].classList.add("locationLineAnim");
		}
	</script>
</html>