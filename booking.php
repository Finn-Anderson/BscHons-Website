<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>
	<body>
		<div id="bookingIntro">
			<h1>Booking</h1>
			<p class="status">1</p>
			<div id="dashLine"></div>
			<p class="status">2</p>
			<p class="statusBlurb">Choose Island</p>
			<p class="statusBlurb">Checkout</p>
		</div>
		<form onsubmit="addColour(2)">
			<div id="islandBookDiv">
				<div id="islandBookEigg">
					<h1>Eigg</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="eigg" type="radio" name="island" value="eigg">
					<label for="eigg" onclick="addColour(1)">Book</label>
				</div>
				<div id="islandBookMuck">
					<h1>Muck</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="muck"  type="radio" name="island" value="muck">
					<label for="muck" onclick="addColour(1)">Book</label>
				</div>
				<div id="islandBookRum">
					<h1>Rum</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="rum"  type="radio" name="island" value="rum">
					<label for="rum" onclick="addColour(1)">Book</label>
				</div>
				<div id="islandBookMallaig">
					<h1>Mallaig</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam  id="eigg" sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="mallaig" type="radio" name="island" value="mallaig">
					<label for="mallaig" onclick="addColour(1)">Book</label>
				</div>
				
				<?php 
					if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 4) {
						echo "<div id='islandBookCeilidh'>";
							echo "<h1>Ceilidh</h1>";
							echo "<p></p>";
							echo "<input id='ceilidh' type='radio' name='island' value='ceilidh'>";
							echo "<label for='ceilidh'>Book</label>";
						echo "/div>";
					}
				?>
			</div>

			<div>
				<div id="calendar"></div>
			</div>
		</form>
	</body>
	<script>
		function addColour(num) {
			if (num == 1) {
				document.getElementsByClassName("status")[0].classList.add("valid");
			} else {
				document.getElementsByClassName("status")[1].classList.add("valid");
			}
		}

		$(function() {
			$("#calendar").datepicker({
				firstDay: 1,
				dateFormat: "dd-mm-yy",
				numberOfMonths: 1,
				minDate: "16-05-2022",
				maxDate: "21-10-2022",
				beforeShowDay: function(date) {
					if (date.getMonth() != 4 || date.getMonth() != 8 || date.getMonth() != 9) {
						if (date.getDay() == 0 || date.getDay() == 6) {
							return [false, ''];
						}
						return [true, ''];
					}
					return [true, ''];
				},
				onSelect: function(selected,evnt) {
					alert(selected);
				}
			});
		})
		$("#ui-datepicker-div").css("clip", "auto");
	</script>
</html>