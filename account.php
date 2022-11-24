<!DOCTYPE html>
<html lang="en">
	<?php $title = "Account Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<main>
			<div id="accountDiv">
				<div>
					<h1 id="accounth1">Account</h1>
					<form id="avatarForm" method="post" action="includes/updateAvatar.php" enctype="multipart/form-data">
						<img id="avatar" src="<?php echo $img ?>"/>
						<input id="fileUpload" type="file" name="avatar" onchange="updateProfile(this); saveProfile()" accept=".jpg, .jpeg, .png, .gif, .svg">
						<label for="fileUpload">&#9998</label>
					</form>

					<p id="name"><?php echo $name ?></p>

					<a class="albaButton" href="/includes/logout.php">Logout</a>

					<?php 
						if ($admin) {
							$_SESSION["admin"] = $admin;
							echo "<a id='adminLink' href='/admin.php'>ADMIN PAGE<span class='underline orange-bg'></span></a>";
						}
					?>
					
				</div>

				<div id="accountTableDiv">
					<h1>Bookings</h1>
					<?php
						// Displays booking success message when user successfully edits booking.
						if (isset($_GET["msg"]) && $_GET["msg"] == "success") {
							echo "<p class='success'>Booking editted</p><br>";
						}
					?>
					<table id="accountTable" cellspacing="0">
						<thead>
							<tr>
								<th>Del</th>
								<th>ID</th>
								<th>People</th>
								<th>Cost</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody id="accountTBody">
						</tbody>
					</table>
					<button id="prev" onclick="displayBookings(parseInt(document.getElementById('page').innerHTML) - 1)"><</button>
					<p id="page"></p>
					<button id="next" onclick="displayBookings(parseInt(document.getElementById('page').innerHTML) + 1)">></button>
				</div>
			</div>
		</main>
	</body>
	<script type="text/javascript">
		var pageCount = <?php echo $count ?>
	</script>
	<script src="js/accountProfile.js"></script>
	<script src="js/accountBooking.js"></script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>