<footer>
	<div>
		<p>Residence:<br>Alba Wildlife Cruises<br>Port Mallaig<br>Harbour Road<br>PH41 4QD</p>
	</div>
	<div id="footerContactDiv">
		<h1>Contact Us</h1>
		<button onclick="copyEmail()"><span id="onclickAnim">Copied Email to Clipboard</span></button>
	</div>
	<img src="<?php echo $WEBSITE_ROOT?>img/logoDark.png">
	<p id="cookieP">This site uses essential cookies only</p>
</footer>

<!-- On button click, copyEmail() runs. This shows span and it's text above the button for a second before fading away, along with copying the company email to clipboard -->
<script type="text/javascript">
	var footerEmail = "theonlyscotiaislandcruisesglencross@gmail.com";

	function copyEmail() {
		navigator.clipboard.writeText(footerEmail);

		if (document.getElementById("onclickAnim").classList.contains("footerAnim")) {
			document.getElementById("onclickAnim").classList.remove("footerAnim");
			setTimeout(function() { document.getElementById("onclickAnim").classList.add("footerAnim") }, 1);
		} else {
			document.getElementById("onclickAnim").classList.add("footerAnim");
		}
		
	}
</script>