<!DOCTYPE html>
<html lang="en">
	<?php $title = "Admin Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<main>
			<div id="accountDiv">
				<div id="accountTableDiv">
					<h1>User Search</h1>
					<input id="searchTxt" type="text" placeholder="Search by Email/Name" onkeydown="search(this.value)">
					<div id="userSearchContainer"></div>
					<button id="prev" onclick="displayUsers(parseInt(document.getElementById('page').innerHTML) - 1)"><</button>
					<p id="page"></p>
					<button id="next" onclick="displayUsers(parseInt(document.getElementById('page').innerHTML) + 1)">></button>
				</div>

				<div>
					<h1 id="accounth1">Booking Search</h1>
					<div id="fromToDiv">
						<div>
							<label for="fromSelect">From</label>
							<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required></select>
						</div>
						<div>
							<label for="toSelect">To</label>
							<select id="toSelect" name="island" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required>
								<option value="mallaig">Mallaig</option>
								<option value="eigg">Eigg</option>
								<option value="muck">Muck</option>
								<option value="rum">Rum</option>
								<option value="ceilidh">Ceilidh</option>
							</select>
						</div>
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
				</div>
				<button class="albaButton" onclick="getStatus()">Search</button>
				<div id="capacitySearchDiv">
					<h1>Capacity</h1>
					<p></p>
					<p></p>
				</div>
			</div>
		</main>
		<script>
			function getUsers(off, data, cbk) {
				$.ajax({
					type: "POST",
					url: "includes/getUsersDB.php",
					data: {offset: off, search: data},
					dataType: "json"
				}).done(function(response) {
					cbk(response);
				});
			}

			function displayUsers(pageNum, search) {
				var offset;
				if (pageNum && pageNum != 0) {
					offset = (pageNum - 1) * 20;
					document.getElementById("page").innerHTML = pageNum;
				} else {
					offset = 0;
					document.getElementById("page").innerHTML = 1;
				}

				document.getElementById("next").style.display = "inline-block";
				document.getElementById("prev").style.display = "inline-block";

				if (offset == 0) {
					document.getElementById("prev").style.display = "none";
				}

				document.getElementById("prev").disabled = true;
				document.getElementById("next").disabled = true;

				getUsers(offset, search, function(response) {
					if ((offset + 20) >= response[0]) {
						document.getElementById("next").style.display = "none";
					} 

					document.getElementById("prev").disabled = false;
					document.getElementById("next").disabled = false;

					var container = document.getElementById("userSearchContainer");

					while (container.firstChild) {
						container.lastChild.remove();
					}

					for (var i = 1; i < response.length; i++) {
						var div = document.createElement("div");
						container.appendChild(div);

						for (var j = 1; j < (response[i].length - 1); j++) {
							if (j == 2) {
								var header = document.createElement("h2");
								header.innerHTML = "Email";
								div.appendChild(header);

								var data = document.createElement("p");
							} else {
								var data = document.createElement("h1");
							}

							data.innerHTML = response[i][j];
							div.appendChild(data);
						}

						var header = document.createElement("h2");
						header.innerHTML = "Admin";
						header.classList.add("adminH2")
						div.appendChild(header);

						if (response[i][3] != <?php echo $_SESSION["id"] ?>) {
							var adminSelect = document.createElement("input");
							adminSelect.type = "checkbox";
							adminSelect.name = response[i][3];
							adminSelect.onchange = (function(i) {
								return function() { adminRow(this.checked, this.name) }
							})(i);

							var adminVal;
							if (response[i][0] === 1) {
								adminVal = true;
							} else {
								adminVal = false;
							}
							adminSelect.checked = adminVal;
						} else {
							var adminSelect = document.createElement("p");
							adminSelect.innerHTML = "Switch accounts to change.";
							adminSelect.classList.add("warning");
						}

						div.appendChild(adminSelect);
					}
				});
			}
			displayUsers(1);

			function adminRow(value, id) {
				$.ajax({
					type: "POST",
					url: "includes/setAdminDB.php",
					data: {admin: value, userID: id}
				});
			}

			function search(value) {
				if (event.key === "Enter") {
					displayUsers(1, value);
				}
			}

			var year = new Date().getFullYear();
			function displayCalendarDays(month) {
				if (month < 0) {
					year -= 1;
					month = 11;
				} else if (month > 11) {
					year += 1;
					month = 0;
				}

				const table = document.getElementById("calendar");

				for (var i = 1; i < 7; i++) {
					for (var j = 0; j < 7; j++) {
						table.rows[i].cells[j].innerHTML = "";
						table.rows[i].cells[j].classList.remove("eiggColour", "muckColour", "rumColour", "mallaigColour", "ceilidhColour", "validDate", "outsideColour", "selectedDate");
					}
				}
				document.querySelector("[name='dateChosen']").value = "";

				var dayUntouched = new Date(year, month, 1);
				var day = new Date(year, month, 1);

				const monthName = day.toLocaleString('default', { month: 'long' });
				document.getElementById("monthHeader").querySelector("h1").innerHTML = monthName + " " + year;

				const buttons = document.getElementById("monthHeader").querySelectorAll("button");
				buttons[0].id = month;
				buttons[0].disabled = true;
				buttons[1].id = month;
				buttons[1].disabled = true;

				var disableArray = ["fromSelect", "toSelect"];
				for (var i = 0; i < disableArray.length; i++) {
					var disableElement = document.getElementById(disableArray[i]);
					if (disableElement) {
						disableElement.disabled = true;
					}
				}

				if (day.getDay() != 1) {
					day = new Date(year, month, 2 - day.getDay());
				}

				var island = document.getElementById("toSelect").value;

				populateSelect(island);

				var from = document.getElementById("fromSelect").value;

				const dayList = getDayList(island, from);

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
						const targetDate = new Date(year, 9, 27);

						if (month > 3 && month < 10) {
							if (dayList && dayList.includes(day.getDay()) && day < targetDate) {
								if (day.getDay() == 0 || day.getDay() == 6) {
									if (day.getMonth() == 5 || day.getMonth() == 6 || day.getMonth() == 7) {
										applyCalendarColours(island, table.rows[row].cells[cell]);
									}
								} else {
									applyCalendarColours(island, table.rows[row].cells[cell]);
								}
							} else if (island == "ceilidh" && day.toDateString() == targetDate.toDateString()) {
								applyCalendarColours(island, table.rows[row].cells[cell]);
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

				buttons[0].disabled = false;
				buttons[1].disabled = false;

				for (var i = 0; i < disableArray.length; i++) {
					var disableElement = document.getElementById(disableArray[i]);
					if (disableElement) {
						disableElement.disabled = false;
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

			function getDayList(destination, from) {
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
				} else if (island == "ceilidh") {
					elem.classList.add("ceilidhColour");
					elem.classList.add("validDate");
					elem.style.setProperty("--colour", "#ffc603");
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
				}
			}

			var timer = 0;
			function getStatus() {
				var fromIsland = document.getElementById("fromSelect").value;
				var toIsland = document.getElementById("toSelect").value;
				var selectedDate = document.querySelector("[name='dateChosen']").value;
				
				const p = document.querySelectorAll("p");
				p[1].style.opacity = "0";
				p[2].style.opacity = "0";

				$.ajax({
					type: "POST",
					url: "includes/adminBookingDB.php",
					data: {date: selectedDate, from: fromIsland, to: toIsland},
					dataType: "json"
				}).done(function(response) {
					setTimeout(
						function() {
							p[1].innerHTML = "On Day: " + response[0];
							p[2].innerHTML = "Seasonal Average: " + response[1];

							p[1].style.opacity = "1";
							p[2].style.opacity = "1";	
						}, timer
					);
				});

				timer = 400
			}

			displayCalendarDays(new Date().getMonth());
		</script>
		<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
	</body>
</html>