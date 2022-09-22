<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include "includes/header.php" ?>
	<body>
		<div id="intro">
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
			<div id="locationText">
				<h1>Interactable Map</h1>
				<span>Click one of the circles on an island to the right to learn more about that island!</span>
				<a href="">Learn More</a>
			</div>
			<div class="locationPointer">
				<div class="locationLine"></div>
				<div class="locationLine"></div>
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

		var count = 0;

		function lineAnim(id) {
			count += 1;

			if (count >= 2) {
				document.getElementsByClassName("locationPointer")[0].classList.remove("locationLineAnim");
				setTimeout(function() { displayText(id); }, 2000);
				document.getElementById("locationText").style.opacity = "0";
				document.getElementById("locationText").style.transitionDelay = "0s";
			} else {
				displayText(id);
			}
		}

		function displayText(id) {
			if (id == "mallaig") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Lerwick";
				document.getElementById("locationText").childNodes[3].innerHTML = "Lerwick, the capital of Shetland, has a population of around 7,000 people.";

				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(0deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "220px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "123px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "75px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "820px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "119px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "290px");
			} else if (id == "eigg") {
				document.getElementById("locationText").childNodes[1].innerHTML = "Scalloway";
				document.getElementById("locationText").childNodes[3].innerHTML = "Scalloway is the old capital of Shetland. Scalloway has a population of just over 1,000 people. Scalloway is Shetland's second biggest town.";

				document.getElementsByClassName("locationLine")[0].style.setProperty("--rotation", "rotate(46deg)");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--width", "196px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--top", "193px");
				document.getElementsByClassName("locationLine")[0].style.setProperty("--right", "290px");

				document.getElementsByClassName("locationLine")[1].style.setProperty("--width", "656px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--top", "119px");
				document.getElementsByClassName("locationLine")[1].style.setProperty("--right", "454px");
			}

			document.getElementById("locationText").style.opacity = "1";
				document.getElementById("locationText").style.transitionDelay = "1s";
			document.getElementsByClassName("locationPointer")[0].classList.add("locationLineAnim");
		}
	</script>
</html>