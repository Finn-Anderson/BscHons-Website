<!DOCTYPE html>
<html lang="en">
	<?php $title = "Home Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>
	<body>
		<div id="bookingIntro">
			<h1>Booking</h1>
			<p class="status">1</p>
			<div id="dashLine"></div>
			<p class="status">2</p>
			<p class="statusBlurb focus">Choose Island</p>
			<p class="statusBlurb">Checkout</p>
		</div>
		<form onsubmit="addColour(2)">
			<div id="islandBookDiv">
				<div id="islandBookEigg">
					<h1>Eigg</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="eigg" type="radio" name="island" value="eigg" onchange="addColour(1)">
					<label for="eigg">Book</label>
				</div>
				<div id="islandBookMuck">
					<h1>Muck</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="muck"  type="radio" name="island" value="muck" onchange="addColour(1)">
					<label for="muck">Book</label>
				</div>
				<div id="islandBookRum">
					<h1>Rum</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="rum"  type="radio" name="island" value="rum" onchange="addColour(1)">
					<label for="rum">Book</label>
				</div>
				<div id="islandBookMallaig">
					<h1>Mallaig</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam  id="eigg" sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="mallaig" type="radio" name="island" value="mallaig" onchange="addColour(1)">
					<label for="mallaig">Book</label>
				</div>
				
				<?php 
					if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) {
						echo "<div id='islandBookCeilidh'>";
							echo "<h1>Ceilidh</h1>";
							echo "<p></p>";
							echo "<input id='ceilidh' type='radio' name='island' value='ceilidh'>";
							echo "<label for='ceilidh' onclick='addColour(1, this.parentElement.id)'>Book</label>";
						echo "/div>";
					}
				?>
			</div>

			<div id="checkoutDiv">
				<div id="calendarDiv">
					<div id="monthHeader">
						<h1></h1>
						<button type="button" onclick="displayCalendarDays(id - 1)"></button>
						<button type="button" onclick="displayCalendarDays(parseInt(id) + 1)"></button>
					</div>
					<table id="calendar">
						<thead>
							<tr>
								<th>Mo</th>
								<th>Tu</th>
								<th>We</th>
								<th>Th</th>
								<th>Fr</th>
								<th>Sa</th>
								<th>Su</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
							<tr>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
								<td onclick="inputDate(this)"></td>
							</tr>
						</tbody>
					</table>
					<input type="hidden" name="dateChosen" required>
				</div>
				<p class="departureTime"></p>
				<p class="departureTime"></p>
				<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required>
						
				</select>

				<label>Yes</label>
				<input type="radio" name="return" value="yes" onchange="displayDepartureTimes()">

				<label>No</label>
				<input type="radio" name="return" value="no" checked="checked" onchange="displayDepartureTimes()">
			</div>
		</form>
	</body>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
	<script>
		function addColour(num) {
			if (num == 1) {
				document.getElementsByClassName("status")[0].classList.add("valid");
				document.getElementsByClassName("statusBlurb")[0].classList.remove("focus");
				document.getElementsByClassName("statusBlurb")[1].classList.add("focus");

				var month = 8;
				if (document.getElementById("monthHeader").querySelector("button").id) {
					month = parseInt(document.getElementById("monthHeader").querySelector("button").id);
				}

				displayCalendarDays(month);
			} else {
				document.getElementsByClassName("status")[1].classList.add("valid");
				document.getElementsByClassName("statusBlurb")[1].classList.remove("focus");
			}

			document.getElementById("checkoutDiv").style.maxHeight = "100%";
			document.getElementById("checkoutDiv").style.opacity = "1";
		}

		function displayCalendarDays(month) {
			if (month > 3 && month < 10) {
				const table = document.getElementById("calendar");

				for (var i = 1; i < 7; i++) {
					for (var j = 0; j < 7; j++) {
						table.rows[i].cells[j].innerHTML = "";
						table.rows[i].cells[j].classList.remove("eiggColour", "muckColour", "rumColour", "mallaigColour", "ceilidhColour", "validDate", "outsideColour", "selectedDate");
					}
				}
				document.querySelector("[name='dateChosen']").value = "";


				var island = document.querySelector("input[name='island']:checked").value;

				if (island == "ceilidh") {
					month = 9;
				}

				const year = new Date().getFullYear();
				var day = new Date(year, month, 1);

				const monthName = day.toLocaleString('default', { month: 'long' });
				document.getElementById("monthHeader").querySelector("h1").innerHTML = monthName + ", " + year;

				if (day.getDay() != 1) {
					day = new Date(year, month, 2 - day.getDay());
				}

				populateSelect(island);
				checkReturn();
				const dayList = getDayList(island);

				const buttons = document.getElementById("monthHeader").querySelectorAll("button");
				for (var i = 0; i < buttons.length; i++) {
					buttons[i].id = month;
				}

				var row = 1;
				while (!table.rows[6].cells[6].innerHTML) {

					var cell;
					if (day.getDay() == 0) {
						cell = 6;
					} else {
						cell = day.getDay() - 1;
					}

					table.rows[row].cells[cell].innerHTML = day.getDate();

					if (day.getMonth() == month) {
						const targetDate = new Date(2022, 9, 27);

						if (dayList && dayList.includes(day.getDay())) {
							if (day.getDay() == 0 || day.getDay() == 6) {
								if (day.getMonth() == 5 || day.getMonth() == 6 || day.getMonth() == 7) {
									applyCalendarColours(island, table.rows[row].cells[cell]);
								}
							} else {
								applyCalendarColours(island, table.rows[row].cells[cell]);
							}
						} else if (day.toDateString() == targetDate.toDateString() && island == "ceilidh") {
							table.rows[row].cells[cell].classList.add("ceilidhColour");
							table.rows[row].cells[cell].classList.add("validDate");
						}
					} else {
						table.rows[row].cells[cell].classList.add("outsideColour");
					}

					if (day.getDay() == 0) {
						row += 1;
					}
					
					day.setDate(day.getDate() + 1);
				}
			}
		}

		var destinationCheck;
		function populateSelect(destination) {
			if (destinationCheck != destination) {
				destinationCheck = destination;

				var list = document.getElementById("fromSelect");
				for (var i = list.options.length; i >= 0; i--) {
					list.remove(i);
				}

				if (destination == "eigg" || destination == "ceilidh") {
					var option = document.createElement("option");
					option.text = "Mallaig";
					option.value = "mallaig";
					list.add(option);

					var option = document.createElement("option");
					option.text = "Muck";
					option.value = "muck";
					list.add(option);
					
					var option = document.createElement("option");
					option.text = "Rum";
					option.value = "rum";
					list.add(option);
				} else if (destination == "muck" || destination == "rum") {
					var option = document.createElement("option");
					option.text = "Mallaig";
					option.value = "mallaig";
					list.add(option);

					var option = document.createElement("option");
					option.text = "Eigg";
					option.value = "eigg";
					list.add(option);
				} else if (destination == "mallaig") {
					var option = document.createElement("option");
					option.text = "Eigg";
					option.value = "eigg";
					list.add(option);

					var option = document.createElement("option");
					option.text = "Muck";
					option.value = "muck";
					list.add(option);
					
					var option = document.createElement("option");
					option.text = "Rum";
					option.value = "rum";
					list.add(option);
				}
			} 
		}

		function getDayList(destination) {
			var from = document.getElementById("fromSelect").value;
			var returnBooked = document.querySelector("input[name='return']:checked").value;
			var list = [];
			var index = 0;

			if (destination == "eigg") {
				list = [1, 2, 3, 5, 6, 0];
				if (from == "muck") {
					index = list.indexOf(2);
					list.splice(index, 1);

					index = list.indexOf(6);
					list.splice(index, 1);
				} else if (from == "rum") {
					index = list.indexOf(1);
					list.splice(index, 1);

					index = list.indexOf(3);
					list.splice(index, 1);

					index = list.indexOf(5);
					list.splice(index, 1);

					index = list.indexOf(0);
					list.splice(index, 1);
				}
			} else if (destination == "muck") {
				list = [1, 3, 5, 0];
			} else if (destination == "rum") {
				list = [2, 4, 6];

				if (from == "eigg") {
					index = list.indexOf(4);
					list.splice(index, 1);
				}
			} else if (destination == "mallaig") {
				list = [1, 2, 3, 4, 5, 6, 0];

				if (from == "muck") {
					index = list.indexOf(2);
					list.splice(index, 1);

					index = list.indexOf(4);
					list.splice(index, 1);

					index = list.indexOf(6);
					list.splice(index, 1);
				} else if (from == "rum") {
					index = list.indexOf(1);
					list.splice(index, 1);

					index = list.indexOf(3);
					list.splice(index, 1);

					index = list.indexOf(5);
					list.splice(index, 1);

					index = list.indexOf(0);
					list.splice(index, 1);
				} else if (from == "eigg") {
					index = list.indexOf(4);
					list.splice(index, 1);
				}
			}

			return list;
		}

		function displayDepartureTimes() {
			var from = document.getElementById("fromSelect").value;
			var to = document.querySelector("input[name='island']:checked").value;

			var paragraphs = document.querySelectorAll(".departureTime");
			var time;

			paragraphs[0].innerHTML = "";
			paragraphs[1].innerHTML = "";

			if (from == "mallaig") {
				time = "11:00";
			} if (from == "eigg") {
				if (to == "mallaig") {
					time = "16:30";
				} else {
					time = "12:30";
				}
			} else if (from == "muck") {
				time = "15:30";
			} else if (from == "rum") {
				if (to == "mallaig") {
					time = "15:45";
				} else {
					time = "15:30";
				}
			}

			paragraphs[0].innerHTML = from + " Departure: " + time;

			if (document.querySelector("input[name='return']:checked").value == "yes") {
				if (to == "eigg") {
					time = "16:30";
				} else if (to == "muck") {
					time = "15:30";
				} else if (to == "rum") {
					var date = new Date(2022, parseInt(document.getElementById("monthHeader").querySelector("button").id), document.querySelector("[name='dateChosen']").value);

					if (date.getDay() == 4) {
						time = "15:45";
					} else {
						time = "15:30";
					}
				}
				paragraphs[1].innerHTML = to + " Departure: " + time;
			}
		}

		function applyCalendarColours(island, elem) {
			if (island == "eigg") {
				elem.classList.add("eiggColour");
				elem.classList.add("validDate");
			} else if (island == "muck") {
				elem.classList.add("muckColour");
				elem.classList.add("validDate");
			} else if (island == "rum") {
				elem.classList.add("rumColour");
				elem.classList.add("validDate");
			} else if (island == "mallaig") {
				elem.classList.add("mallaigColour");
				elem.classList.add("validDate");
			}
		}

		function inputDate(day) {
			if (day.classList.contains("validDate")) {
				var d = day.innerHTML;
				if (d < 10) {
					d = "0" + d;
				}

				var month = parseInt(document.getElementById("monthHeader").querySelector("button").id) + 1;
				if (month < 10) {
					month = "0" + month;
				}

				var year = new Date().getFullYear();

				document.querySelector("[name='dateChosen']").value = d + "/" + month + "/" + year;

				var dates = document.querySelectorAll(".selectedDate");
				for (var i = 0; i < dates.length; i++) {
					dates[i].classList.remove("selectedDate");
				}

				day.classList.add("selectedDate");

				displayDepartureTimes();
			}
		}

		function checkReturn() {
			var from = document.getElementById("fromSelect").value;
			var to = document.querySelector("input[name='island']:checked").value;
			var returnInputs = document.querySelectorAll("input[name='return']");

			if ((from != "mallaig" && from != "eigg") || to == "mallaig") {
				returnInputs[0].disabled = true;
				returnInputs[1].checked = true;
			} else {
				returnInputs[0].disabled = false;
			}

			displayDepartureTimes();
		}
	</script>
</html>