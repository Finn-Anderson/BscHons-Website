<!DOCTYPE html>
<html lang="en">
	<?php $title = "Account Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<div id="accountDiv">
			<form id="avatarForm" method="post" action="includes/updateAvatar.php" enctype="multipart/form-data">
				<?php 
					if (pathinfo($img, PATHINFO_EXTENSION) == "svg") {
						echo '<img id="avatar" src="'.$img.'"/>';
					} else {
						echo '<img id="avatar" src="'.$img.'"/>';
					}
				?>
				<input id="fileUpload" type="file" name="avatar" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0]); saveProfile()" accept=".jpg, .jpeg, .png, .gif, .svg">
				<label for="fileUpload">&#9998</label>

				<p><?php echo $name ?></p>

				<?php
					// Setup getting all users bookings and displaying info in table. 
				?>
			</form>
		</div>
	</body>
	<script>
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
	</script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>