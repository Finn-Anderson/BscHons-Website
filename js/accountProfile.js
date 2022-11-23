// Check uploaded image is an image before updating the avatar image
function updateProfile(img) {
	if (img.files[0].type.match("image.*")) {
		document.getElementById('avatar').src = window.URL.createObjectURL(img.files[0])
	}
}

// Posts new avatar image to updateAvatar.php
function saveProfile() {
	var $form = $("#avatarForm"),
		url = $form.attr( "action" )

	let formValues = document.getElementById('avatarForm');
	let data = new FormData(formValues);

	$.ajax({
		type: "POST",
		url: url,
		data: data,
		cache: false,
		contentType: false,
		processData: false
	}, 'json');
}