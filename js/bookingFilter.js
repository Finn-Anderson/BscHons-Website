// Gets current or next year if season is over
var responseArray = [];
var year = new Date().getFullYear();
if (new Date().getMonth() > 9 || (new Date().getMonth() == 9 && new Date().getDate() >= 27)) {
	year += 1;
}

// Displays calendar with relevant filters
function displayCalendarDays(month) {
	// Get month if not set
	if (!month) {
		if (year != new Date().getFullYear()) {
			month = 4;
		} else {
			month = new Date().getMonth();
		}
	}
	// Make sure month is in a season (between May-October inclusive)
	if (month > 3 && month < 10) {
		const table = document.getElementById("calendar");

		// Clear all pre-set elements and set initial values
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
		var dayUntouched = new Date(year, month, 1);
		var day = new Date(year, month, 1);

		const monthName = day.toLocaleString('default', { month: 'long' });
		document.getElementById("monthHeader").querySelector("h1").innerHTML = monthName + " " + year;

		const buttons = document.getElementById("monthHeader").querySelectorAll("button");
		for (var i = 0; i < buttons.length; i++) {
			buttons[i].id = month;
			buttons[i].disabled = true;
		}

		// Wait for calendar to fully load by disabling elements
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

		// Start on a monday, always
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

		// Callback to wait for data (capacity and if wheelchair is booked) to return from getStatus()
		getStatus(dayUntouched.getMonth() + 1, dayUntouched.getFullYear(), function(response) {
			while (!table.rows[6].cells[6].innerHTML) {
				var cell;
				if (day.getDay() == 0) {
					cell = 6;
				} else {
					cell = day.getDay() - 1;
				}

				table.rows[row].cells[cell].innerHTML = day.getDate();

				// If in month, set to darker grey, else set to lighter grey. If selectable day, apply it's relevant colour
				if (day.getMonth() == month) {
					responseArray.push([response[(day.getDate() - 1)][0], response[(day.getDate() - 1)][1]]);

					const targetDate = new Date(year, 9, 27);

					if (response[(day.getDate() - 1)][0] > 0 && day >= currentDate) {
						if (dayList && dayList.includes(day.getDay()) && day < targetDate) {
							// Weekends can only be selected in certain months (June, July, August)
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

			// Calls function for edit booking only if it exists
			if (typeof editSelectDate === "function") {
				editSelectDate();
			}

			if (month != 4) {
				buttons[0].disabled = false;
			}

			if (month != 9) {
				buttons[1].disabled = false;
			}

			// Undisable certain elements
			for (var i = 0; i < disableArray.length; i++) {
				var disableElement = document.getElementById(disableArray[i]);
				if (disableElement && !(disableArray[i] == "wheelchairYes" || disableArray[i] == "returnYes")) {
					disableElement.disabled = false;
				}
			}
		});
	}
}

// Set applicable to locations based off of from location selected
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

// Set applicable days that can be selected based off of from and to locations. This is used in the calendar
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

// Display departure times based off of from and to location
function displayDepartureTimes() {
	var to;
	if (document.querySelector("input[name='island']:checked")) {
		to = document.querySelector("input[name='island']:checked").value;
	} else {
		to = document.getElementById("toSelect").value;
	}

	if (to == "ceilidh") {
		to = "eigg";
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
			time = "16:30 - 17:30";
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

	// Show return route if checked
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

	tallyCost()
}

// Applies calendar colours based on from island selected
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

// Saves date selected in hidden input dateChosen and makes selected date orange
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

// Used to update max number of people selectable between the ages (max is 30 people between all ages. Can be lower if people have already booked before on that day)
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

// Checks capacity, if returnable and if wheelchair has been booked for that date and from and to locations
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
		tallyCost()
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

// Tallies cost of all ages selected by capacity. Appends discount if return not booked
function tallyCost() {
	var childCost = document.getElementsByClassName("ageSelect")[1].value * 7;
	var teenagerCost = document.getElementsByClassName("ageSelect")[2].value * 10;

	var routes = document.querySelectorAll(".departureRoute")[0].innerHTML.split(" - ");
	var discount = 1.0;

	if (routes[1] == "Ceilidh") {
		routes[1] = "Eigg";
	}

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

// Gets capacity and wheelchair booked status for all days in that month, depending on from and to islands selected
function getStatus(m, y, cbk) {
	if (m, y) {
		var fromIsland = document.getElementById("fromSelect").value;
		var toIsland;

		if (document.getElementById("toSelect")) {
			toIsland = document.getElementById("toSelect").value;
		} else {
			toIsland = document.querySelector("input[name='island']:checked").value;
		}
		var returnIsland = document.querySelector("input[name='return']:checked").value;

		var id;
		if (document.getElementById("bookingID")) {
			let idTxt = document.getElementById("bookingID").innerHTML;
			var idSplit = idTxt.split(" ");
			id = idSplit[1];
		} else {
			id = 0;
		}

		$.ajax({
			type: "POST",
			url: "includes/statusDB.php",
			data: {month: m, year: y, from: fromIsland, to: toIsland, returnBooked: returnIsland, bookingID: id},
			dataType: "json"
		}).done(function(response) {
			cbk(response);
		});
	}
}