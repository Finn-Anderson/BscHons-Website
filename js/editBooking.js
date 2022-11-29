// Set/get intial values to use later or to send into functions
document.getElementById("toSelect").value = editArr[0][1].toLowerCase();
populateSelect(document.getElementById("toSelect").value);

document.getElementById("fromSelect").value = editArr[0][2].toLowerCase();

var currentBookingDate = new Date(editArr[0][3]);
var year = currentBookingDate.getFullYear();
displayCalendarDays(currentBookingDate.getMonth());

// Set values to values selected from database query
function editSelectDate() {
	var firstDay = new Date(year, currentBookingDate.getMonth(), 0).getDay();

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
		for (var j = 0; j < editArr.length; j++) {
			if (ageSelects[i].name == "baby" && editArr[j][7] == "0 - 2") {
				ageSelects[i].value = Number(editArr[j][6]);
			} else if (ageSelects[i].name == "child" && editArr[j][7] == "3 - 10") {
				ageSelects[i].value = Number(editArr[j][6]);
			} else if (ageSelects[i].name == "teenager" && editArr[j][7] == "11 - 16") {
				ageSelects[i].value = Number(editArr[j][6]);
			} else if (ageSelects[i].name == "adult" && editArr[j][7] == "17 - 200") {
				ageSelects[i].value = Number(editArr[j][6]);
			}
		}
	}

	if (document.querySelectorAll('.selectedDate')[0]) {
		checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1);
	}
	displayDepartureTimes();
	tallyCost();
}