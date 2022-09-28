<!-- Creating the Database -->
<?php
	$servername = "comp-server.uhi.ac.uk";
	$name = "SH20002219";
	$pass = "20002219";

	try {
		$conn = new PDO("mysql:host=$servername", $name, $pass);
		
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS SH20002219";
		
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "Database created successfully";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>

<?php
	$servername = "comp-server.uhi.ac.uk";
	$name = "SH20002219";
	$pass = "20002219";
	$dbname = "SH20002219";

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Drop table if they exist so that it can be made later on in the code
	try {
		$tblList = array("Trip", "RouteFare", "Route", "Fare", "Booking", "User");

		for ($i=0; $i < Count($tblList); $i++) { 
			$tblDel = "DROP TABLE IF EXISTS ".$tblList[$i];

			$conn->exec($tblDel);

			echo "Dropped table ".$tblList[$i]."\n";
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create user table
	try {
		$tblU = "CREATE TABLE User (
		userID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(320) NOT NULL,
		password CHAR(128) NOT NULL,
		name VARCHAR(50) NOT NULL,
		address VARCHAR(100) NOT NULL,
		city VARCHAR(30) NOT NULL,
		postcode VARCHAR(10) NOT NULL,
		rememberID Char(32)
		)";

		// use exec() because no results are returned
		$conn->exec($tblU);

		echo "User table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create booking table
	try {
		$tblB = "CREATE TABLE Booking (
		bookingID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		userID MEDIUMINT UNSIGNED NOT NULL,
		date DATE NOT NULL,
		surcharge BOOLEAN NOT NULL,
		returnBooked BOOLEAN NOT NULL,
		wheelchairBooked BOOLEAN NOT NULL,
		reverse BOOLEAN NOT NULL,
		FOREIGN KEY (userID) REFERENCES User (userID) ON DELETE CASCADE ON UPDATE CASCADE
		)";

		// use exec() because no results are returned
		$conn->exec($tblB);

		echo "Booking table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create fare table
	try {
		$tblF = "CREATE TABLE Fare (
		fareID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		minAge TINYINT UNSIGNED NOT NULL,
		maxAge TINYINT UNSIGNED NOT NULL
		)";

		// use exec() because no results are returned
		$conn->exec($tblF);

		echo "Fare table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create route table
	try {
		$tblR = "CREATE TABLE Route (
		routeID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		`from` VARCHAR(20) NOT NULL,
		`to` VARCHAR(20) NOT NULL
		)";

		// use exec() because no results are returned
		$conn->exec($tblR);

		echo "Route table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create route fare table
	try {
		$tblRF = "CREATE TABLE RouteFare (
		routeFareID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		fareID MEDIUMINT UNSIGNED NOT NULL,
		routeID MEDIUMINT UNSIGNED NOT NULL,
		cost DECIMAL(4,2) NOT NULL,
		FOREIGN KEY (fareID) REFERENCES Fare (fareID) ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (routeID) REFERENCES Route (routeID) ON DELETE CASCADE ON UPDATE CASCADE
		)";

		// use exec() because no results are returned
		$conn->exec($tblRF);

		echo "RouteFare table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// Create order contents' table
	try {
		$tblT = "CREATE TABLE Trip (
		tripID MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		bookingID MEDIUMINT UNSIGNED NOT NULL,
		routeFareID MEDIUMINT UNSIGNED NOT NULL,
		FOREIGN KEY (bookingID) REFERENCES Booking (bookingID) ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (routeFareID) REFERENCES RouteFare (routeFareID) ON DELETE CASCADE ON UPDATE CASCADE
		)";

		// use exec() because no results are returned
		$conn->exec($tblT);

		echo "Trip table created successfully \n";
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}



	// sql to insert routes
	try {
		$fromList = array("Mallaig", "Eigg");
		$toList = array("Eigg", "Muck", "Rum");

		for ($i=0; $i < count($fromList); $i++) { 
			for ($j=$i; $j < count($toList); $j++) {
				$route = $conn->prepare('INSERT INTO Route (`from`, `to`)
					VALUES (:afrom, :ato)');

				$route->bindValue(':afrom', $fromList[$i]);
				$route->bindValue(':ato', $toList[$j]);

				$route->execute();
			}
		}
			

		echo "All routes created successfully \n";
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// sql to insert fares
	try {
		$minList = array("0", "3", "11", "17");
		$maxList = array("2", "10", "16", "200");

		for ($i=0; $i < count($minList); $i++) { 
			$route = $conn->prepare('INSERT INTO Fare (minAge, maxAge)
				VALUES (:min, :max)');

			$route->bindValue(':min', $minList[$i]);
			$route->bindValue(':max', $maxList[$i]);

			$route->execute();
		}
			

		echo "All fares created successfully \n";
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}


	// sql to insert route fares
	try {
		$routeList = array("1", "2", "3", "4", "5");
		$fareList = array("1", "2", "3", "4");
		$costList = array("18.00", "19.00", "24.00", "10.00", "16.00", "0.00", "7.00", "10.00");

		for ($i=0; $i < count($routeList); $i++) { 
			$routeFare = $conn->prepare('INSERT INTO RouteFare (routeID, fareID, cost)
				VALUES (:routeID, :fareID, :cost)');

			$routeFare->bindValue(':routeID', $routeList[$i]);
			$routeFare->bindValue(':fareID', $fareList[3]);
			$routeFare->bindValue(':cost', $costList[$i]);

			$routeFare->execute();
		}

		for ($i=0; $i < count($routeList); $i++) { 
			$routeFare = $conn->prepare('INSERT INTO RouteFare (routeID, fareID, cost)
				VALUES (:routeID, :fareID, :cost)');

			$routeFare->bindValue(':routeID', $routeList[$i]);
			$routeFare->bindValue(':fareID', $fareList[0]);
			$routeFare->bindValue(':cost', $costList[5]);

			$routeFare->execute();
		}

		for ($i=0; $i < count($routeList); $i++) { 
			$routeFare = $conn->prepare('INSERT INTO RouteFare (routeID, fareID, cost)
				VALUES (:routeID, :fareID, :cost)');

			$routeFare->bindValue(':routeID', $routeList[$i]);
			$routeFare->bindValue(':fareID', $fareList[1]);
			$routeFare->bindValue(':cost', $costList[6]);

			$routeFare->execute();
		}

		for ($i=0; $i < count($routeList); $i++) { 
			$routeFare = $conn->prepare('INSERT INTO RouteFare (routeID, fareID, cost)
				VALUES (:routeID, :fareID, :cost)');

			$routeFare->bindValue(':routeID', $routeList[$i]);
			$routeFare->bindValue(':fareID', $fareList[2]);
			$routeFare->bindValue(':cost', $costList[7]);

			$routeFare->execute();
		}
			

		echo "All route fares created successfully \n";
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>