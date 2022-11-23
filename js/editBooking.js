// Set/get intial values to use later or to send into functions
document.getElementById("toSelect").value = "<?php echo strtolower($values[0][1]) ?>";
populateSelect(document.getElementById("toSelect").value);

document.getElementById("fromSelect").value = "<?php echo strtolower($values[0][2]) ?>";

var currentBookingDate = new Date(<?php echo date('Y,m,d', strtotime($values[0][3])) ?>);
var year = currentBookingDate.getFullYear();
displayCalendarDays(currentBookingDate.getMonth() - 1);

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


	if (<?php echo $row["wheelchairBooked"]; ?>) {
		document.getElementById("wheelchairYes").checked = true;
	}
	if (<?php echo $row["returnBooked"]; ?>) {
		document.getElementById("returnYes").checked = true;
	}


	var ageSelects = document.getElementsByClassName("ageSelect");
	for (var i = 0; i < ageSelects.length; i++) {
		if (ageSelects[i].name == "baby") {
			ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '0 - 2') { echo $values[$i][6]; } }?>");
		} else if (ageSelects[i].name == "child") {
			ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '3 - 10') { echo $values[$i][6]; } }?>");
		} else if (ageSelects[i].name == "teenager") {
			ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '11 - 16') { echo $values[$i][6]; } }?>");
		} else if (ageSelects[i].name == "adult") {
			ageSelects[i].value = Number("<?php for ($i = 0; $i < count($values); $i++) { if ($values[$i][7] == '17 - 200') { echo $values[$i][6]; } }?>");
		}
	}

	if (document.querySelectorAll('.selectedDate')[0]) {
		checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1);
	}
	displayDepartureTimes();
	tallyCost();
}