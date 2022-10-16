<!DOCTYPE html>
<html lang="en">
	<?php $title = "Booking Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php" ?>
	<body id="bookingBody">
		<main>
			<div id="bookingIntro">
				<h1>Booking</h1>
				<p class="status">1</p>
				<div id="dashLine"></div>
				<p class="status">2</p>
				<p class="statusBlurb focus">Choose Island</p>
				<p class="statusBlurb">Checkout</p>
			</div>
			<?php
				// Displays booking fail message when msg is set
				if (isset($_GET["msg"]) && $_GET["msg"] == "failed") {
					echo "<p class='warning'>Failed to make booking. Please try again.</p><br>";
				}
			?>
			<form action="includes/bookingDB.php" method="post" onchange="changeStatus(2)">
			<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/bookingInputs.php" ?>
		</main>
	</body>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>