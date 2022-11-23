<!DOCTYPE html>
<html lang="en">
	<?php $title = "Admin Page"; include $_SERVER["DOCUMENT_ROOT"]."/includes/header.php"; include $_SERVER["DOCUMENT_ROOT"]."/includes/accountDB.php" ?>
	<body>
		<main>
			<div id="accountDiv">
				<div id="accountTableDiv">
					<h1>User Search</h1>
					<input id="searchTxt" type="text" placeholder="Search by Email/Name" onkeydown="search(this.value)">
					<div id="userSearchContainer"></div>
					<button id="prev" onclick="displayUsers(parseInt(document.getElementById('page').innerHTML) - 1)"><</button>
					<p id="page"></p>
					<button id="next" onclick="displayUsers(parseInt(document.getElementById('page').innerHTML) + 1)">></button>
				</div>

				<div>
					<h1 id="accounth1">Booking Search</h1>
					<div id="fromToDiv">
						<div>
							<label for="fromSelect">From</label>
							<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required></select>
						</div>
						<div>
							<label for="toSelect">To</label>
							<select id="toSelect" name="island" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required>
								<option value="mallaig">Mallaig</option>
								<option value="eigg">Eigg</option>
								<option value="muck">Muck</option>
								<option value="rum">Rum</option>
								<option value="ceilidh">Ceilidh</option>
							</select>
						</div>
					</div>
					<div id="calendarDiv">

						<!-- Table to display calendar, which is altered in the adminBooking.js -->
						<div id="monthHeader">
							<button type="button" onclick="displayCalendarDays(id - 1)"><</button>
							<h1></h1>
							<button type="button" onclick="displayCalendarDays(parseInt(id) + 1)">></button>
						</div>
						<table id="calendar">
							<thead>
								<tr>
									<th>Mo</th>
									<th>Tu</th>
									<th>We</th>
									<th>Th</th>
									<th>Fr</th>
									<th>Sa</th>
									<th>Su</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
								<tr>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
									<td onclick="inputDate(this)"></td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" name="dateChosen" required>
					</div>
				</div>
				
				<!-- Search based on values selected above and return on day and seasonal average capacity -->
				<button class="albaButton" onclick="getStatus()">Search</button>
				<div id="capacitySearchDiv">
					<h1>Capacity</h1>
					<p class="capacityText"></p>
					<p class="capacityText"></p>
				</div>
			</div>
		</main>
		<script src="js/adminUser.js"></script>
		<script src="js/adminBooking.js"></script>
		<?php include $_SERVER["DOCUMENT_ROOT"]."/includes/footer.php" ?>
	</body>
</html>