	<?php
		if (basename($_SERVER["PHP_SELF"]) == "booking.php") {
			echo "<div id='islandBookDiv'>";
				echo "<div id='islandBookEigg'>";
					echo "<h1>Eigg</h1>";
					echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>";
					echo "<input id='eigg' type='radio' name='island' value='eigg' onchange='changeStatus(1)'>";
					echo "<label for='eigg'>Book</label>";
				echo "</div>";
				echo "<div id='islandBookMuck'>";
					echo "<h1>Muck</h1>";
					echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>";
					echo "<input id='muck' type='radio' name='island' value='muck' onchange='changeStatus(1)'>";
					echo "<label for='muck'>Book</label>";
				echo "</div>";
				echo "<div id='islandBookRum'>";
					echo "<h1>Rum</h1>";
					echo"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>";
					echo "<input id='rum' type='radio' name='island' value='rum' onchange='changeStatus(1)'>";
					echo "<label for='rum'>Book</label>";
				echo "</div>";
				echo "<div id='islandBookMallaig'>";
					echo "<h1>Mallaig</h1>";
					echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Turpis egestas pretium aenean pharetra magna ac. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Diam phasellus vestibulum lorem sed risus ultricies. Sed risus pretium quam vulputate dignissim suspendisse in est. Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Semper risus in hendrerit gravida. Massa massa ultricies mi quis. Nec ultrices dui sapien eget mi proin sed libero enim. Sed egestas egestas fringilla phasellus faucibus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vitae justo eget magna fermentum iaculis eu non diam. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque elit. Sodales ut etiam sit amet nisl purus in mollis. Quis blandit turpis cursus in hac. Ut eu sem integer vitae justo eget magna.</p>";
					echo "<input id='mallaig' type='radio' name='island' value='mallaig' onchange='changeStatus(1)'>";
					echo "<label for='mallaig'>Book</label>";
				echo "</div>";
				
				if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) {
					echo "<div id='islandBookCeilidh'>";
						echo "<h1>Ceilidh</h1>";
						echo "<p></p>";
						echo "<input id='ceilidh' type='radio' name='island' value='ceilidh'>";
						echo "<label for='ceilidh' onclick='changeStatus(1, this.parentElement.id)'>Book</label>";
					echo "/div>";
				}
			echo "</div>";
		}
	?>

	<div id="checkoutDiv">
		<div id="fromToDiv">
			<div>
				<label for="fromSelect">From</label>
				<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required></select>
			</div>
			<?php 
				if (basename($_SERVER["PHP_SELF"]) == "editBooking.php") {
					echo "<div>";
						echo "<label for='toSelect'>To</label>";
						echo "<select id='toSelect' name='island' onchange='displayCalendarDays(document.getElementById(\"monthHeader\").querySelector(\"button\").id)' required>
								<option value='mallaig'>Mallaig</option>
								<option value='eigg'>Eigg</option>
								<option value='muck'>Muck</option>
								<option value='rum'>Rum</option>
								<option value='mallaig'>Mallaig</option>";
							if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] > 6) {
								echo "<option value='ceilidh'>Ceilidh</option>";
							}
						echo "</select>";
					echo "</div>";
				}
			?>
		</div>
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
				<input id="returnYes" type="radio" name="return" value="true" disabled onchange="displayDepartureTimes()">
				<label for="returnYes">Yes</label>

				<input id="returnNo" type="radio" name="return" value="false" checked="checked" onchange="displayDepartureTimes()">
				<label for="returnNo">No</label>
			</div>

			<div class="bookingRadio">
				<p>Wheelchair?</p>
				<input id="wheelchairYes" type="radio" name="wheelchair" value="true" disabled>
				<label for="wheelchairYes">Yes</label>

				<input id="wheelchairNo" type="radio" name="wheelchair" value="false" checked="checked">
				<label for="wheelchairNo">No</label>
			</div>

			<a href="/#wheelchairInfo">Why can't I select wheelchair</a>
		</div>

		<div id="ageDiv">
			<p>Age</p>
			<label>0-2</label>
			<select class="ageSelect" name="baby" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			<label>3-10</label>
			<select class="ageSelect" name="child" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			<label>11-16</label>
			<select class="ageSelect" name="teenager" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			<label>17+</label>
			<select class="ageSelect" name="adult" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
		</div>

		<div id="bookingCost">
			<div id="timeDiv">
				<p class="departureRoute"></p>
				<p class="departureTime"></p>
				<p class="departureRoute"></p>
				<p class="departureTime"></p>
			</div>
			<button id="priceBtn">
				<p id="priceTxt"><?php if (basename($_SERVER["PHP_SELF"]) == "booking.php") { echo "Book"; } else { echo "Edit"; } ?></p>
				<p id="price">£0.00</p>
			</button>
		</div>
	</div>
</form>
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

				var month = new Date().getMonth();

				if (document.querySelector("input[name='island']:checked").value == "ceilidh") {
					month = 9;
				} else if (document.getElementById("monthHeader").querySelector("button").id) {
					month = parseInt(document.getElementById("monthHeader").querySelector("button").id);
				}

				displayCalendarDays(month);
			} else {
				var inputs = document.getElementsByClassName("ageSelect");
				var count = 0;
				for (var i = 0; i < inputs.length; i++) {
					if (!isNaN(inputs[i].value) && inputs[i].value) {
						count += 1;
					}
				}

				if (count == 4 && document.getElementsByClassName("status")[1]) {
					document.getElementsByClassName("status")[1].classList.add("valid");
					document.getElementsByClassName("statusBlurb")[1].classList.remove("focus");
				}	
			}
			if (window.location.href.split(/[\\/]/).pop() == "booking.php" || window.location.href.split(/[\\/]/).pop() == "booking.php?msg=failed") {
				document.getElementById("checkoutDiv").classList.add("bookingAnim")
			}
		} else {
			window.location.href = "/login.php";
		}
	}

	var responseArray = [];
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

			var pRoute = document.querySelectorAll(".departureRoute");
			var pTime = document.querySelectorAll(".departureTime");

			pRoute[0].innerHTML = "&#8203;";
			pRoute[1].innerHTML = "";
			pTime[0].innerHTML = "";
			pTime[1].innerHTML = "";

			const year = new Date().getFullYear();
			var dayUntouched = new Date(year, month, 1);
			var day = new Date(year, month, 1);

			const monthName = day.toLocaleString('default', { month: 'long' });
			document.getElementById("monthHeader").querySelector("h1").innerHTML = monthName + " " + year;

			const buttons = document.getElementById("monthHeader").querySelectorAll("button");
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].id = month;
				buttons[i].disabled = true;
			}

			var disableArray = ["eigg", "muck", "rum", "mallaig", "ceilidh", "fromSelect", "toSelect", "wheelchairYes", "returnYes"];
			for (var i = 0; i < disableArray.length; i++) {
				var disableElement = document.getElementById(disableArray[i]);
				if (disableElement) {
					disableElement.disabled = true;
				}
				if (disableArray[i] == "wheelchairYes" || disableArray[i] == "returnYes") {
					var getID = disableArray[i].slice(0, -3) + "No";
					document.getElementById(getID).checked = true;
				}
			}

			if (day.getDay() != 1) {
				day = new Date(year, month, 2 - day.getDay());
			}

			var island;
			if (document.querySelector("input[name='island']:checked")) {
				island = document.querySelector("input[name='island']:checked").value;
			} else {
				island = document.getElementById("toSelect").value;
			}
			var from = document.getElementById("fromSelect").value;

			populateSelect(island);
			const dayList = getDayList(island, from);

			var row = 1;

			const currentDate = new Date();

			getStatus(dayUntouched.getMonth() + 1, dayUntouched.getFullYear(), function(response) {
				while (!table.rows[6].cells[6].innerHTML) {
					var cell;
					if (day.getDay() == 0) {
						cell = 6;
					} else {
						cell = day.getDay() - 1;
					}

					table.rows[row].cells[cell].innerHTML = day.getDate();

					if (day.getMonth() == month) {
						responseArray.push([response[(day.getDate() - 1)][0], response[(day.getDate() - 1)][1]]);

						const targetDate = new Date(2022, 9, 27);

						if (day.toDateString() == targetDate.toDateString() && island == "ceilidh") {
							table.rows[row].cells[cell].classList.add("ceilidhColour");
							table.rows[row].cells[cell].classList.add("validDate");
							table.rows[row].cells[cell].style.setProperty("--colour", "#ffd750");
						} else if (response[(day.getDate() - 1)][0] > 0 && day >= currentDate) {
							if (dayList && dayList.includes(day.getDay())) {
								if (day.getDay() == 0 || day.getDay() == 6) {
									if (day.getMonth() == 5 || day.getMonth() == 6 || day.getMonth() == 7) {
										applyCalendarColours(island, table.rows[row].cells[cell]);
									}
								} else {
									applyCalendarColours(island, table.rows[row].cells[cell]);
								}
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

				if (typeof editSelectDate === "function") {
					editSelectDate();
				}

				buttons[0].disabled = false;
				buttons[1].disabled = false;

				for (var i = 0; i < disableArray.length; i++) {
					var disableElement = document.getElementById(disableArray[i]);
					if (disableElement && !(disableArray[i] == "wheelchairYes" || disableArray[i] == "returnYes")) {
						disableElement.disabled = false;
					}
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

	function getDayList(destination, from) {
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
		var to;
		if (document.querySelector("input[name='island']:checked")) {
			to = document.querySelector("input[name='island']:checked").value;
		} else {
			to = document.getElementById("toSelect").value;
		}
		var from = document.getElementById("fromSelect").value;

		from = from.replace(from[0], from[0].toUpperCase());
		to = to.replace(to[0], to[0].toUpperCase());

		var pRoute = document.querySelectorAll(".departureRoute");
		var pTime = document.querySelectorAll(".departureTime");
		var time;

		var span1 = document.createElement("span");
		var span2 = document.createElement("span");

		var date = document.querySelector("[name='dateChosen']").value;
		var dateArray = date.split("-");
		var day = new Date(dateArray[2], dateArray[1] - 1, dateArray[0]);

		pRoute[0].innerHTML = "&#8203;";
		pRoute[1].innerHTML = "";
		pTime[0].innerHTML = "";
		pTime[1].innerHTML = "";

		if (day.getDay() == 4) {
			if (from == "Mallaig") {
				time = "11:00 - 12:45";
			} else {
				time = "15:45 - 17:30";
			}
		} else if (from == "Muck" || from == "Rum") {
			if (to == "Eigg") {
				time = "15:30 - 16:00";
			} else {
				time = "15:30 - 17:30";
			}
		} else if (from == "Eigg") {
			if (to == "Muck" || to == "Rum") {
				time = "12:30 - 13:30";
			} else {
				$time = "16:30 - 17:30";
			}
		} else {
			if (to == "Muck" || to == "Rum") {
				time = "11:00 - 13:30";
			} else {
				time = "11:00 - 12:00";
			}
		}

		pRoute[0].innerHTML = from + " - " + to;
		pTime[0].innerHTML = time;
		pTime[0].prepend(span1);

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
			pTime[1].prepend(span2);
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

			var date = d + "-" + month + "-" + year;

			if (date != document.querySelector("[name='dateChosen']").value) {
				document.querySelector("[name='dateChosen']").value = date;
			}

			var dates = document.querySelectorAll(".selectedDate");
			for (var i = 0; i < dates.length; i++) {
				dates[i].classList.remove("selectedDate");
			}

			day.classList.add("selectedDate");

			checkStatus(day.innerHTML - 1);
			displayDepartureTimes();
		}
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

	function checkStatus(day) {
		var select = document.getElementsByClassName("ageSelect");

		var numTally = 0;

		if (responseArray[day][0]) {
			if (select[0].value) {
				for (var i = 0; i < select.length; i++) {
					numTally += parseInt(select[i].value);
				}
			}
			numTally = responseArray[day][0] - numTally;

			if (numTally < 0) {
				numTally = 0;
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

		if (responseArray[day][1]) {
			document.querySelectorAll("input[name='wheelchair']")[0].disabled = true;
		} else {
			document.querySelectorAll("input[name='wheelchair']")[0].disabled = false;
		}

		var returnInputs = document.querySelectorAll("input[name='return']");

		var to;
		if (document.querySelector("input[name='island']:checked")) {
			to = document.querySelector("input[name='island']:checked").value;
		} else {
			to = document.getElementById("toSelect").value;
		}
		var from = document.getElementById("fromSelect").value;

		if ((from != "mallaig" && from != "eigg") || to == "mallaig") {
			returnInputs[0].disabled = true;
			returnInputs[1].checked = true;
		} else {
			returnInputs[0].disabled = false;
		}
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
		cost *= 1.2;

		document.getElementById("price").innerHTML = "£" + cost.toFixed(2);
	}

	function getStatus(m, y, cbk) {
		if (m, y) {
			var fromIsland = document.getElementById("fromSelect").value;
			var toIsland;

			if (document.getElementById("toSelect")) {
				var toIsland = document.getElementById("toSelect").value;
			} else {
				var toIsland = document.querySelector("input[name='island']:checked").value;
			}
			var returnIsland = document.querySelector("input[name='return']:checked").value;

			var currentPage = window.location.href.split(/[\\/]/).pop();
			$.ajax({
				type: "POST",
				url: "includes/statusDB.php",
				data: {month: m, year: y, from: fromIsland, to: toIsland, returnBooked: returnIsland, page: currentPage},
				dataType: "json"
			}).done(function(response) {
				cbk(response);
			});
		}
	}
</script>