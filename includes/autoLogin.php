<?php
	if (isset($_COOKIE["AblaCruisesRemember"])) {
		include_once('dbCredentials.php');

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$remID = $_COOKIE["AblaCruisesRemember"];

			// stmt to select row
			$stmt = $conn->prepare("SELECT userID FROM User WHERE rememberID = :remID");
			$stmt->bindValue(':remID', $remID);
			$stmt->execute();

			// Chcek if stmt statement is valid
			if ($stmt->rowCount() == 1) {
				// Sets sessions to be used later on.
				$result = $stmt->fetchAll();
				foreach( $result as $row ) {
					session_start();

					$_SESSION['authorized'] = TRUE;
					$_SESSION['id'] = $row["userID"];
				}
			} else {
				setcookie("AblaCruisesRemember", "", time()-3600, "/");
			}
		}

		catch(PDOException $e) {
			echo $e->getMessage();
		}

		$conn = null;
	}
?>