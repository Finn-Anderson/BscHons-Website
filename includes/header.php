<!-- Header/nav bar is appended to every file -->
<?php include "head.php" ?>
<header>
	<div>
		<a class="booking" href="<?php echo $WEBSITE_ROOT?>booking.php">Booking<span class="underline orange-bg"></span></a>
	</div>
	<div id="homeDiv">
		<a class="home" href="<?php echo $WEBSITE_ROOT?>index.php"></a>
	</div>

	<div>
	<?php
		if (isset($_SESSION["authorized"])) {
			echo "<a class='auth' href='{$WEBSITE_ROOT}account.php'>Account<span class='underline orange-bg'></span></a>";
		} else {
			echo "<a class='auth' href='{$WEBSITE_ROOT}login.php'>Login<span class='underline orange-bg'></span></a>";
		}
	?>
	</div>
</header>
<script type="text/javascript">
	// Sets class of header items which alters header colouring depending on url location.
	function setClass() {
		var url = window.location.pathname;
		url = url.split('/').pop();
		switch(url) {
			case "login.php":
				document.getElementsByClassName("home")[0].parentElement.classList.toggle("bright");
				document.getElementsByClassName("booking")[0].classList.toggle("bright");
				document.getElementsByClassName("auth")[0].classList.toggle("bright");
				document.getElementsByClassName("auth")[0].classList.toggle("current");
				break;
			case "": case "index.php": case "mallaig.php": case "eigg.php": case "muck.php": case "rum.php": case "ceilidh.php": case "register.php":
				document.getElementsByClassName("home")[0].parentElement.classList.toggle("bright");
				document.getElementsByClassName("booking")[0].classList.toggle("bright");
				document.getElementsByClassName("auth")[0].classList.toggle("bright");
				break;
			case "booking.php":
				document.getElementsByClassName("booking")[0].classList.toggle("current");
				break;
			case "account.php":
				document.getElementsByClassName("auth")[0].classList.toggle("current");
				break;
		}
	}

	setClass();
</script>