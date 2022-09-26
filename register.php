<html lang="en">
	<?php $title = "Register Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>	
	<body>
		<!-- Displays register form inputs and submit -->
		<div id="authDiv">
			<form id="authForm" action="includes/insertDB.php" method="post">
				<h1>Register</h1>

				<?php
					// Displays register fail message if msg is set
					if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
						echo "<p class='failMsg'>Invalid values inputted</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "used") {
						echo "<p class='failMsg'>Email already in use</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "email") {
						echo "<p class='failMsg'>Invalid email inputted</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "password") {
						echo "<p class='failMsg'>Invalid passwords inputted</p><br>";
					}
				?>

				<input type="text" placeholder="Email" name="email" maxlength="320" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" onblur="checkValid(this)" required>

				<input type="password" placeholder="Password" name="password1" maxlength="255" onblur="checkValid(this)" required>

				<input type="password" placeholder="Verify Password" name="password2" maxlength="255" onblur="checkValid(this)" required>

				<input type="text" placeholder="Name" name="name" maxlength="50" onblur="checkValid(this)" required>

				<input type="text" placeholder="Street Address" name="street" maxlength="100" onblur="checkValid(this)" required>

				<input type="text" placeholder="City" name="city" maxlength="30" onblur="checkValid(this)" required>

				<input type="text" placeholder="Postcode" name="postcode" maxlength="10" onblur="checkValid(this)" required>
					
				<button type="submit">Create Account</button>
			</div>
		<div>
	</body>
	<script type="text/javascript">
		function checkValid(element) {
			if (!element.validity.valid) {
				element.classList.add("invalid");
			} else if (element.classList.contains("invalid")) {
				element.classList.remove("invalid");
			}
		}
	</script>
</html>