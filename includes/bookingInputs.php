<div id="checkoutDiv">
	<div id="fromToDiv">
		<div>
			<label for="fromSelect">From</label>
			<select id="fromSelect" name="departure" onchange="displayCalendarDays(document.getElementById('monthHeader').querySelector('button').id)" required></select>
		</div>
		<?php 
			// Display to select if in the edit booking page
			if (basename($_SERVER["PHP_SELF"]) == "editBooking.php") {
				echo "<div>";
					echo "<label for='toSelect'>To</label>";
					echo "<select id='toSelect' name='island' onchange='displayCalendarDays(document.getElementById(\"monthHeader\").querySelector(\"button\").id)' required>
							<option value='mallaig'>Mallaig</option>
							<option value='eigg'>Eigg</option>
							<option value='muck'>Muck</option>
							<option value='rum'>Rum</option>";
						if (isset($_SESSION["bookingTally"]) && $_SESSION["bookingTally"] >= 6) {
							echo "<option value='ceilidh'>Ceilidh</option>";
						}
					echo "</select>";
				echo "</div>";
			}
		?>
	</div>

	<!-- Used to display calendar -->
	<div id="calendarDiv">
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

	<div id="bookingRadioDiv">
		<div class="bookingRadio">
			<p>Book Return?</p>
			<input id="returnYes" type="radio" name="return" value="true" disabled onchange="displayDepartureTimes()">
			<label for="returnYes">Yes</label>

			<input id="returnNo" type="radio" name="return" value="false" checked="checked" onchange="displayDepartureTimes()">
			<label for="returnNo">No</label>
		</div>

		<div class="bookingRadio">
			<p>Wheelchair?</p>
			<input id="wheelchairYes" type="radio" name="wheelchair" value="true" disabled>
			<label for="wheelchairYes">Yes</label>

			<input id="wheelchairNo" type="radio" name="wheelchair" value="false" checked="checked">
			<label for="wheelchairNo">No</label>
		</div>

		<a href="/#wheelchairInfo">Why can't I select wheelchair</a>
	</div>

	<div id="ageDiv">
		<p>Age</p>
		<div>
			<div>
				<label>0-2</label>
				<select class="ageSelect" name="baby" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			</div>
			<div>
				<label>3-10</label>
				<select class="ageSelect" name="child" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			</div>
			<div>
				<label>11-16</label>
				<select class="ageSelect" name="teenager" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			</div>
			<div>
				<label>17+</label>
				<select class="ageSelect" name="adult" onchange="checkStatus(document.querySelectorAll('.selectedDate')[0].innerHTML - 1)" required></select>
			</div>
		</div>
	</div>

	<div id="bookingCost">
		<div id="timeDiv">
			<!-- Displays route and time based on what locations are selected and if return is selected -->
			<p class="departureRoute"></p>
			<p class="departureTime"></p>
			<p class="departureRoute"></p>
			<p class="departureTime"></p>
		</div>
		<button id="priceBtn">
			<p id="priceTxt"><?php if (basename($_SERVER["PHP_SELF"]) == "booking.php") { echo "Book"; } else { echo "Edit"; } ?></p>
			<p id="price">£0.00</p>
		</button>
	</div>
</div>
<script src="bookingFilter.js"></script>