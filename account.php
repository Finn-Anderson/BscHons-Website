<!DOCTYPE html>
<html lang="en">
	<?php $title = "Account Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<main>
			<div id="accountDiv">
				<div>
					<h1 id="accounth1">Account</h1>
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
					</form>

					<p id="name"><?php echo $name ?></p>

					<a id="logoutBtn" href="/includes/logout.php">Logout</a>

					<a id="adminLink" href="/admin.php">ADMIN PAGE<span class="underline"></span></a>
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

		function getBookings(off, cbk) {
			$.ajax({
				type: "POST",
				url: "includes/getBookingsDB.php",
				data: {offset: off},
				dataType: "json"
			}).done(function(response) {
				cbk(response);
			});
		}

		function displayBookings(pageNum) {
			var offset;
			if (pageNum && pageNum != 0) {
				offset = (pageNum - 1) * 10;
				document.getElementById("page").innerHTML = pageNum;
			} else {
				offset = 0;
				document.getElementById("page").innerHTML = 1;
			}

			document.getElementById("next").style.display = "inline-block";
			document.getElementById("prev").style.display = "inline-block";
			if ((offset + 10) >= <?php echo $count ?>) {
				document.getElementById("next").style.display = "none";
			} 

			if (offset == 0) {
				document.getElementById("prev").style.display = "none";
			}
			getBookings(offset, function(response) {
				var tbody = document.getElementById("accountTBody");

				while (tbody.firstChild) {
					tbody.lastChild.remove();
				}

				for (var i = 0; i < response.length; i++) {

					var today = new Date().setHours(0, 0, 0, 0);
					var compare = new Date(response[i][3]).setHours(0, 0, 0, 0);

					var tr = document.createElement("tr");
					tbody.appendChild(tr);

					var del = document.createElement("td");
					if (today < compare) {
						del.innerHTML = "X";
						del.classList.add("delRowBtn");
						del.onclick = (function(i){
							return function(){ if (confirm("Are you sure you want to delete this booking?")) deleteRow(response[i][0]); }
						})(i);
					} else {
						del.innerHTML = "-";
						del.onclick = (function(i){
							return function(){ displayRow(response[i][0]); }
						})(i);
					}
					tr.appendChild(del);

					for (var j = 0; j < (response[i].length - 1); j++) {
						var td = document.createElement("td");
						if (j == 2) {
							surcharge = 0;
							if (response[i][4]) {
								surcharge = 5;
							}
							td.innerHTML = "£" + ((response[i][j] + surcharge) * 1.2).toFixed(2);
						} else {
							td.innerHTML = response[i][j];
						}
						td.onclick = (function(i){
							return function(){ displayRow(response[i][0]); }
						})(i);

						if (j == (response[i].length - 2)) {
							td.classList.add("lastTD");
						}
						tr.appendChild(td);
					}

					if (today < compare) {
						var edit = document.createElement("td");
						edit.innerHTML = "edit";
						edit.classList.add("edit");
						edit.onclick = (function(i){
							return function(){ editRow(response[i][0]); }
						})(i);
						tr.appendChild(edit);
					}
				}
			});
		}
		displayBookings(1);

		function deleteRow(id) {
			$.ajax({
				type: "POST",
				url: "includes/cancelBooking.php",
				data: {bookingID: id}
			}).done(function() {
				displayBookings();
			});
		}

		function displayRow(id) {
			location.href = "print.php?id=" + id;
		}

		function editRow(id) {
			location.href = "editBooking.php?id=" + id;
		}
	</script>
	<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
</html>