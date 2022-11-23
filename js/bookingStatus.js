// If the user is logged in, go from status 1 to status 2 and display the calendar at a specific month
function changeStatus(num) {
	if (loginCheck) {
		if (num == 1) {
			document.getElementsByClassName("status")[0].classList.add("valid");
			document.getElementsByClassName("statusBlurb")[0].classList.remove("focus");
			document.getElementsByClassName("statusBlurb")[1].classList.add("focus");

			var month;
			if (document.querySelector("input[name='island']:checked").value == "ceilidh") {
				month = 9;
			} else if (document.getElementById("monthHeader").querySelector("button").id) {
				month = parseInt(document.getElementById("monthHeader").querySelector("button").id);
			}

			displayCalendarDays(month);
		} else {
			var inputs = document.getElementsByClassName("ageSelect");
			var count = 0;

			// Check if all values have been inputted
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

		// Checks if on booking page before performing an animation
		if (window.location.href.split(/[\\/]/).pop() == "booking.php" || window.location.href.split(/[\\/]/).pop() == "booking.php?msg=failed") {
			document.getElementById("checkoutDiv").classList.add("bookingAnim")
		}
	} else {
		window.location.href = "/login.php";
	}
}