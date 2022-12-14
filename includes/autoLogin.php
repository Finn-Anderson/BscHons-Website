<?php
	// Starts session if not already started
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
	// Checks if the remember me cookie has been set and the user is not logged in
	if (isset($_COOKIE["AblaCruisesRemember"]) && !isset($_SESSION["authorized"])) {
		include_once('dbCredentials.php');

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$remID = $_COOKIE["AblaCruisesRemember"];

			// stmt to select row
			$stmt = $conn->prepare("SELECT userID, admin FROM User WHERE rememberID = :remID");
			$stmt->bindValue(':remID', $remID);
			$stmt->execute();

			// Chcek if stmt statement returns a value
			if ($stmt->rowCount() == 1) {
				// Sets sessions to be used later on.
				$result = $stmt->fetchAll();
				foreach( $result as $row ) {

					$_SESSION["authorized"] = TRUE;
					$_SESSION["admin"] = $row["admin"];
					$_SESSION["id"] = $row["userID"];

					$stmtCount = $conn->prepare("SELECT bookingID FROM Booking WHERE userID = :id AND returnBooked = :return AND year(date) = :year");
					$stmtCount->bindValue(":return", TRUE);
					$stmtCount->bindValue(":id", $_SESSION["id"]);
					$stmtCount->bindValue(":year", date("Y"));
					$stmtCount->execute();

					$_SESSION["bookingTally"] = $stmtCount->rowCount();
				}
			} else {
				// Delete cookie if database returns null
				setcookie("AblaCruisesRemember", "", time()-3600, "/");
			}
		}

		catch(PDOException $e) {
			echo $e->getMessage();
		}

		$conn = null;
	}
?>