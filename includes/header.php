<?php include "head.php" ?>
<header>
	<a class="booking" href="booking.php">Booking<span></span></a>
	<div>
		<a class="home" href="/"></a>
	</div>
	<a class="account" href="account.php">Account<span></span></a>
</header>
<script type="text/javascript">
	var url = window.location.pathname;
	switch(url) {
		case "/":
			document.getElementsByClassName("home")[0].parentElement.classList.toggle("bright");
			document.getElementsByClassName("booking")[0].classList.toggle("bright");
			document.getElementsByClassName("account")[0].classList.toggle("bright");
			break;
		case "/booking.php":
			document.getElementsByClassName("booking")[0].classList.toggle("current");
			break;
		case "/account.php":
			document.getElementsByClassName("account")[0].classList.toggle("current");
			break;
	}
</script>