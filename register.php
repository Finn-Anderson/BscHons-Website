<html lang="en">
	<?php $title = "Register Page"; "includes/header.php" ?>	
	<body id="bgImg">
		<!-- Displays register form inputs and submit -->
		<div id="authDiv">
			<form id="authForm" action="includes/insertDB.php" method="post">
				<h1>Register</h1>

				<?php
					// Displays register fail message if msg is set
					if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
						echo "<p class='warning'>Invalid values entered</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "used") {
						echo "<p class='warning'>Email already in use</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "email") {
						echo "<p class='warning'>Invalid email</p><br>";
					} elseif (isset($_GET["msg"]) && $_GET["msg"] == "password") {
						echo "<p class='warning'>Invalid passwords</p><br>";
					}
				?>

				<input type="text" placeholder="Email" name="email" maxlength="320" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" onblur="checkValid(this)" required>

				<input type="password" placeholder="Password" name="password1" maxlength="255" onblur="checkValid(this)" required>

				<input type="password" placeholder="Verify Password" name="password2" maxlength="255" onblur="checkValid(this)" required>

				<input type="text" placeholder="Name" name="name" maxlength="50" onblur="checkValid(this)" required>

				<input type="text" placeholder="Street Address" name="address" maxlength="100" onblur="checkValid(this)" required>

				<input type="text" placeholder="City" name="city" maxlength="30" onblur="checkValid(this)" required>

				<input type="text" placeholder="Postcode" name="postcode" maxlength="10" onblur="checkValid(this)" required>
					
				<button type="submit">Create Account</button>
			</div>
		<div>
	</body>
	<script src="js/auth.js"></script>
</html>