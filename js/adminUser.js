// Gets offset and all users in database based off of search values
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

// Display all users in a particular format.
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

	// Callback waits for get users to return value(s)
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

			if (response[i][3] != selfCheck) {
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

// Sets user's admin status
function adminRow(value, id) {
	$.ajax({
		type: "POST",
		url: "includes/setAdminDB.php",
		data: {admin: value, userID: id}
	});
}

// Searches for users with that email/username. Search must be submitted via hitting return/enter key
function search(value) {
	if (event.key === "Enter") {
		displayUsers(1, value);
	}
}