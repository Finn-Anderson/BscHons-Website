// Get bookings data from database
function getBookings(off, cbk) {
	$.ajax({
		type: "POST",
		url: "includes/getBookingsDB.php",
		data: {offset: off},
		dataType: "json"
	}).done(function(response) {
		cbk(response);
	});
}

// Displays bookings in booking table
function displayBookings(pageNum) {
	var offset;
	if (pageNum && pageNum != 0) {
		offset = (pageNum - 1) * 10;
		document.getElementById("page").innerHTML = pageNum;
	} else {
		offset = 0;
		document.getElementById("page").innerHTML = 1;
	}

	document.getElementById("next").style.display = "inline-block";
	document.getElementById("prev").style.display = "inline-block";
	if ((offset + 10) >= <?php echo $count ?>) {
		document.getElementById("next").style.display = "none";
	} 

	if (offset == 0) {
		document.getElementById("prev").style.display = "none";
	}

	// Callback waits for getBookings data
	getBookings(offset, function(response) {
		var tbody = document.getElementById("accountTBody");

		while (tbody.firstChild) {
			tbody.lastChild.remove();
		}

		for (var i = 0; i < response.length; i++) {

			var today = new Date().setHours(0, 0, 0, 0);
			var compare = new Date(response[i][3]).setHours(0, 0, 0, 0);

			var tr = document.createElement("tr");
			tbody.appendChild(tr);

			var del = document.createElement("td");
			if (today < compare) {
				del.innerHTML = "X";
				del.classList.add("delRowBtn");
				del.onclick = (function(i){
					return function(){ if (confirm("Are you sure you want to delete this booking?")) deleteRow(response[i][0]); }
				})(i);
			} else {
				del.innerHTML = "-";
				del.onclick = (function(i){
					return function(){ displayRow(response[i][0]); }
				})(i);
			}
			tr.appendChild(del);

			for (var j = 0; j < (response[i].length - 1); j++) {
				var td = document.createElement("td");
				if (j == 2) {
					surcharge = 0;
					if (response[i][4]) {
						surcharge = 5;
					}
					td.innerHTML = "£" + ((response[i][j] + surcharge) * 1.2).toFixed(2);
				} else {
					td.innerHTML = response[i][j];
				}
				td.onclick = (function(i){
					return function(){ displayRow(response[i][0]); }
				})(i);

				if (j == (response[i].length - 2)) {
					td.classList.add("lastTD");
				}
				tr.appendChild(td);
			}

			if (today < compare) {
				var edit = document.createElement("td");
				edit.innerHTML = "edit";
				edit.classList.add("edit");
				edit.onclick = (function(i){
					return function(){ editRow(response[i][0]); }
				})(i);
				tr.appendChild(edit);
			}
		}
	});
}
displayBookings(1);

// Delete row based on row selected
function deleteRow(id) {
	$.ajax({
		type: "POST",
		url: "includes/cancelBooking.php",
		data: {bookingID: id}
	}).done(function() {
		displayBookings();
	});
}

// Link to print based on row selected
function displayRow(id) {
	location.href = "print.php?id=" + id;
}

// Link to edit booking based on row selected
function editRow(id) {
	location.href = "editBooking.php?id=" + id;
}