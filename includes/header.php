<!-- Header/nav bar is appended to every file -->
<?php include "head.php" ?>
<header>
	<div>
		<a class="booking" href="/booking.php">Booking<span class="underline orange-bg"></span></a>
	</div>
	<div id="homeDiv">
		<a class="home" href="/"></a>
	</div>

	<div>
	<?php 
		if (isset($_SESSION["authorized"])) {
			echo "<a class='auth' href='/account.php'>Account<span class='underline orange-bg'></span></a>";
		} else {
			echo "<a class='auth' href='/login.php'>Login<span class='underline orange-bg'></span></a>";
		}
	?>
	</div>
</header>

<!-- Javascript appends class depending on page user is currently in. Classes affect nav bar colour/shows underline if on linked page -->
<script type="text/javascript">
	var url = window.location.pathname;
	switch(url) {
		case "/login.php":
			document.getElementsByClassName("home")[0].parentElement.classList.toggle("bright");
			document.getElementsByClassName("booking")[0].classList.toggle("bright");
			document.getElementsByClassName("auth")[0].classList.toggle("bright");
			document.getElementsByClassName("auth")[0].classList.toggle("current");
			break;
		case "/": case "/index.php": case "/island/mallaig.php": case "/island/eigg.php": case "/island/muck.php": case "/island/rum.php": case "/island/ceilidh.php": case "/register.php":
			document.getElementsByClassName("home")[0].parentElement.classList.toggle("bright");
			document.getElementsByClassName("booking")[0].classList.toggle("bright");
			document.getElementsByClassName("auth")[0].classList.toggle("bright");
			break;
		case "/booking.php":
			document.getElementsByClassName("booking")[0].classList.toggle("current");
			break;
		case "/account.php":
			document.getElementsByClassName("auth")[0].classList.toggle("current");
			break;
	}
</script>