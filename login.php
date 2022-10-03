<html lang="en">
	<?php $title = "Login Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>	
	<body id="bgImg">
		<div id="authDiv">
			<!-- Displays login form inputs and submit -->
			<form id="authForm" action="includes/selectDB.php" method="post">
				<h1>Sign In</h1>

				<?php
					// Displays login login fail message when msg is set
					if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
						echo "<p class='warning'>Wrong username / password</p><br>";
					}
				?>

				<input type="text" placeholder="Enter Email" name="email" maxlength="320" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" onblur="checkValid(this)" required>

				<input type="password" placeholder="Enter Password" name="password" maxlength="255" onblur="checkValid(this)" required>

				<input id="checkRemember" type="checkbox" name="remember" value="remember"><label for="checkRemember">Remember me</label>
					
				<button type="submit">Login</button>

				<a href="register.php">CREATE ACCOUNT<span></span></a>
			</form>
		</div>
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