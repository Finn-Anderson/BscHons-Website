// Gives a red border around the input if it is invalid. If the input is valid, give it a green border
function checkValid(element) {
	if (!element.validity.valid) {
		element.classList.add("invalid");
	} else if (element.classList.contains("invalid")) {
		element.classList.remove("invalid");
	}
}