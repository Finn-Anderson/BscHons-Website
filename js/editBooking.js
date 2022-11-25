// Set/get intial values to use later or to send into functions
document.getElementById("toSelect").value = editArr[0][1].toLowerCase();
populateSelect(document.getElementById("toSelect").value);

document.getElementById("fromSelect").value = editArr[0][2].toLowerCase();

var currentBookingDate = new Date(editArr[0][3]);
var year = currentBookingDate.getFullYear();
displayCalendarDays(currentBookingDate.getMonth());

// Set values to values selected from database query
function editSelectDate() {
	var firstDay = new Date(year, (currentBookingDate.getMonth() - 1), 0).getDay();

	if (firstDay == 0) {
		firstDay = 7;
	}

	var tdIndex = currentBookingDate.getDate() + firstDay;

	var row = Math.floor((tdIndex / 7)) + 1;
	var cell = (tdIndex % 7) - 1;
	
	const table = document.getElementById("calendar");
	inputDate(table.rows[row].cells[cell]);

	if (editArr[0][4]) {
		document.getElementById("wheelchairYes").checked = true;
	}
	if (editArr[0][5]) {
		document.getElementById("returnYes").checked = true;
	}


	var ageSelects = document.getElementsByClassName("ageSelect");
	var index = 0;
	for (var i = 0; i < ageSelects.length; i++) {
		if (ageSelects[i].name == "baby") {
			ageSelects[i].value = Number(editArr[i][6]);
		} else if (ageSelects[i].name == "child") {
			ageSelects[i].value = Number(editArr[i][6]);
		} else if (ageSelects[i].name == "teenager") {
			ageSelects[i].value = Number(editArr[i][6]);
		} else if (ageSelects[i].name == "adult") {
			ageSelects[i].value = Number(editArr[i][6]);
		}
	}

	if (document.querySelectorAll('.selectedDate')[0]) {
		checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1);
	}
	displayDepartureTimes();
	tallyCost();
}