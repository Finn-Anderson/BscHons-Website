<!DOCTYPE html>
<html lang="en">
	<?php $title = "Booking Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>
	<body>
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
		<form action="includes/bookingDB.php" method="post" onsubmit="changeStatus(2)">
			<div id="islandBookDiv">
				<div id="islandBookEigg">
					<h1>Eigg</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="eigg" type="radio" name="island" value="eigg" onchange="changeStatus(1)">
					<label for="eigg">Book</label>
				</div>
				<div id="islandBookMuck">
					<h1>Muck</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="muck"  type="radio" name="island" value="muck" onchange="changeStatus(1)">
					<label for="muck">Book</label>
				</div>
				<div id="islandBookRum">
					<h1>Rum</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="rum"  type="radio" name="island" value="rum" onchange="changeStatus(1)">
					<label for="rum">Book</label>
				</div>
				<div id="islandBookMallaig">
					<h1>Mallaig</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam  id="eigg" sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>
					<input id="mallaig" type="radio" name="island" value="mallaig" onchange="changeStatus(1)">
					<label for="mallaig">Book</label>
				</div>
				
				<?php 
					if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) {
						echo "<div id='islandBookCeilidh'>";
							echo "<h1>Ceilidh</h1>";
							echo "<p></p>";
							echo "<input id='ceilidh' type='radio' name='island' value='ceilidh'>";
							echo "<label for='ceilidh' onclick='changeStatus(1, this.parentElement.id)'>Book</label>";
						echo "/div>";
					}
				?>
			</div>

			<div id="checkoutDiv">
				<label for="fromSelect">From</label>
				<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required>
						
				</select>
				<div id="calendarDiv">
					<div id="monthHeader">
						<button type="button" onclick="displayCalendarDays(id - 1)"><</button>
						<h1></h1>
						<button type="button" onclick="displayCalendarDays(parseInt(id) + 1)">></button>
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

				<div>
					<div class="bookingRadio">
						<p>Book Return?</p>
						<input id="returnYes" type="radio" name="return" value="true" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)">
						<label for="returnYes">Yes</label>

						<input id="returnNo" type="radio" name="return" value="false" checked="checked" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)">
						<label for="returnNo">No</label>
					</div>

					<div class="bookingRadio">
						<p>Wheelchair?</p>
						<input id="wheelchairYes" type="radio" name="wheelchair" value="true" disabled onchange="displayDepartureTimes()">
						<label for="wheelchairYes">Yes</label>

						<input id="wheelchairNo" type="radio" name="wheelchair" value="false" checked="checked" onchange="displayDepartureTimes()">
						<label for="wheelchairNo">No</label>
					</div>

					<a href="/#wheelchairInfo">Why can't I select wheelchair</a>
				</div>

				<div id="ageDiv">
					<p>Age</p>
					<label>0-2</label>
					<select class="ageSelect" name="baby" onchange="checkStatus()"></select>
					<label>3-10</label>
					<select class="ageSelect" name="child" onchange="checkStatus()"></select>
					<label>11-16</label>
					<select class="ageSelect" name="teenager" onchange="checkStatus()"></select>
					<label>17+</label>
					<select class="ageSelect" name="adult" onchange="checkStatus()"></select>
				</div>

				<div id="bookingCost">
					<div id="timeDiv">
						<p class="departureRoute"></p>
						<p class="departureTime"></p>
						<p class="departureRoute"></p>
						<p class="departureTime"></p>
					</div>
					<button id="priceBtn">
						<p id="priceTxt">Book</p>
						<p id="price">£0.00</p>
					</button>
				</div>
			</div>
		</form>
	</body>
	<?php 
		if (isset($_SESSION["authorized"])) {
			echo "<script>var loginCheck = '".$_SESSION["authorized"]."'</script>";
		} else {
			echo "<script>var loginCheck = false</script>";
		}
	?>;
	<script>
		function changeStatus(num) {
			if (loginCheck) {
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

				document.getElementById("checkoutDiv").classList.add("bookingAnim")
			} else {
				window.location.href = "/login.php";
			}
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
				document.getElementById("monthHeader").querySelector("h1").innerHTML = monthName + " " + year;

				if (day.getDay() != 1) {
					day = new Date(year, month, 2 - day.getDay());
				}

				populateSelect(island);
				checkReturn();
				const dayList = getDayList(island);
				checkStatus();

				const buttons = document.getElementById("monthHeader").querySelectorAll("button");
				for (var i = 0; i < buttons.length; i++) {
					buttons[i].id = month;
				}

				var row = 1;

				var dayCheck = day.getDate() + "/" + day.getMonth() + "/" + day.getYear();
				getStatus(dayCheck, function(response) {
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
							
							if (response[0] > 0) {
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
									table.rows[row].cells[cell].style.setProperty("--colour", "#ffd750");
								}
							}
						} else {
							table.rows[row].cells[cell].classList.add("outsideColour");
						}

						if (day.getDay() == 0) {
							row += 1;
						}
						
						day.setDate(day.getDate() + 1);
					}
				});
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
			from = from.replace(from[0], from[0].toUpperCase());
			to = to.replace(to[0], to[0].toUpperCase());

			var pRoute = document.querySelectorAll(".departureRoute");
			var pTime = document.querySelectorAll(".departureTime");
			var time;

			pRoute[0].innerHTML = "";
			pRoute[1].innerHTML = "";
			pTime[0].innerHTML = "";
			pTime[1].innerHTML = "";

			if (from == "Mallaig") {
				if (to == "Rum") {
					time = "11:00 - 12:45";
				} else {
					time = "11:00 - 12:00";
				}
			} if (from == "Eigg") {
				if (to == "Mallaig") {
					time = "16:30 - 17:30";
				} else {
					time = "12:30 - 13:30";
				}
			} else if (from == "Muck") {
				time = "15:30 - 16:00";
			} else if (from == "Rum") {
				if (to == "Mallaig") {
					time = "15:45 - 17:30";
				} else {
					time = "15:30 - 16:00";
				}
			}

			pRoute[0].innerHTML = from + " - " + to;
			pTime[0].innerHTML = time;

			if (document.querySelector("input[name='return']:checked").value == "true") {
				if (to == "Eigg") {
					time = "16:30 - 17:30";
				} else if (to == "Muck") {
					if (from == "Mallaig") {
						time = "15:30 - 17:30";
					} else {
						time = "15:30 - 16:00";
					}
				} else if (to == "Rum") {
					var date = document.querySelector("[name='dateChosen']").value;
					var dateArray = date.split("/");
					var day = new Date(dateArray[2], dateArray[1] - 1, dateArray[0]);

					if (day.getDay() == 4) {
						time = "15:45 - 17:30";
					} else {
						if (from == "Mallaig") {
							time = "15:30 - 17:30";
						} else {
							time = "15:30 - 16:00";
						}
					}
				}
				pRoute[1].innerHTML = to + " - " + from;
				pTime[1].innerHTML = time;
			}
		}

		function applyCalendarColours(island, elem) {
			if (island == "eigg") {
				elem.classList.add("eiggColour");
				elem.classList.add("validDate");
				elem.style.setProperty("--colour", "#50d0ff");
			} else if (island == "muck") {
				elem.classList.add("muckColour");
				elem.classList.add("validDate");
				elem.style.setProperty("--colour", "#36B13A");
			} else if (island == "rum") {
				elem.classList.add("rumColour");
				elem.classList.add("validDate");
				elem.style.setProperty("--colour", "#ff5079");
			} else if (island == "mallaig") {
				elem.classList.add("mallaigColour");
				elem.classList.add("validDate");
				elem.style.setProperty("--colour", "#7f50ff");
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

				var date = d + "/" + month + "/" + year;

				if (date != document.querySelector("[name='dateChosen']").value) {
					document.querySelector("[name='dateChosen']").value = date;
				}

				var dates = document.querySelectorAll(".selectedDate");
				for (var i = 0; i < dates.length; i++) {
					dates[i].classList.remove("selectedDate");
				}

				day.classList.add("selectedDate");

				checkStatus();
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

		function appendAgeOptions(num) {
			var selects = document.getElementsByClassName("ageSelect");
			var tally;
			var storeValues = [0, 0, 0, 0];

			for (var i = 0; i < selects.length; i++) {
				if (selects[i].value) {
					storeValues[i] = parseInt(selects[i].value);
				}
				while (selects[i].firstChild) {
					selects[i].removeChild(selects[i].lastChild);
				}
			}

			for (var i = 0; i < selects.length; i++) {
				tally = storeValues[i] + num;

				for (var j = 0; j <= tally; j++) {
					var option = document.createElement("option");
					option.value = j;
					option.innerHTML = j;
					selects[i].appendChild(option);
				}
				selects[i].value = storeValues[i];
			}
		}

		function checkStatus() {
			var select = document.getElementsByClassName("ageSelect");
			getStatus(document.querySelector("[name='dateChosen']").value, function(response) {
				var numTally = 0;

				if (response[0]) {
					if (select[0].value) {
						for (var i = 0; i < select.length; i++) {
							numTally += parseInt(select[i].value);
						}
					}
					numTally = response[0] - numTally;

					if (numTally < 0) {
						numTally = response[0];
						for (var i = 0; i < select.length; i++) {
							select[i].value = 0;
						}
					}

					appendAgeOptions(numTally);
					tallyCost();
				} else {
					for (var i = 0; i < select.length; i++) {
						while (select[i].firstChild) {
							select[i].removeChild(select[i].lastChild);
						}
					}
				}

				if (response[1]) {
					document.querySelectorAll("input[name='wheelchair']")[0].disabled = true;
				} else {
					document.querySelectorAll("input[name='wheelchair']")[0].disabled = false;
				}
			});
		}

		function tallyCost() {
			var childCost = document.getElementsByClassName("ageSelect")[1].value * 7;
			var teenagerCost = document.getElementsByClassName("ageSelect")[2].value * 10;

			var routes = document.querySelectorAll(".departureRoute")[0].innerHTML.split(" - ");
			var discount = 1.0;

			if (document.querySelector("input[name='return']:checked").value == "false") {
				discount = 0.7;
			}

			var adultCost = document.getElementsByClassName("ageSelect")[3].value;
			if (routes[0] == "Mallaig" || routes[1] == "Mallaig") {
				if (routes[0] == "Eigg" || routes[1] == "Eigg") {
					adultCost *= 18;
				} else if (routes[0] == "Muck" || routes[1] == "Muck") {
					adultCost *= 19;
				} else if (routes[0] == "Rum" || routes[1] == "Rum") {
					adultCost *= 24;
				}
			} else if (routes[0] == "Eigg" || routes[1] == "Eigg") {
				if (routes[0] == "Muck" || routes[1] == "Muck") {
					adultCost *= 10;
				} else if (routes[0] == "Rum" || routes[1] == "Rum") {
					adultCost *= 16;
				}
			}

			var cost = parseInt(adultCost + childCost + teenagerCost);
			cost *= discount;

			document.getElementById("price").innerHTML = "£" + cost.toFixed(2);
		}

		function getStatus(day, cbk) {
			if (day) {
				var fromIsland = document.getElementById("fromSelect").value;
				var toIsland = document.querySelector("input[name='island']:checked").value;
				var returnIsland = document.querySelector("input[name='return']:checked").value;
				$.ajax({
					type: "POST",
					url: "includes/statusDB.php",
					data: {date: day, from: fromIsland, to: toIsland, returnBooked: returnIsland},
					dataType: "json"
				}).done(function(response) {
					cbk(response);
				});
			}
		}
	</script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>