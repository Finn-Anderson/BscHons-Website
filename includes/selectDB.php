<?php
	include $_SERVER['DOCUMENT_ROOT']."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
		$password = htmlspecialchars($_POST["password"], ENT_QUOTES);

		$pw = hash("sha512", $password);

		// stmt to select row
		$stmt = $conn->prepare("SELECT userID FROM User WHERE email = :email AND password = :pwd");
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->bindValue(":pwd", $pw, PDO::PARAM_STR);
		$stmt->execute();

		// Chcek if stmt statement is valid
		if ($stmt->rowCount() == 1) {
			// Sets sessions to be used later on.
			$result = $stmt->fetchAll();
			foreach( $result as $row ) {
				session_start();

				$_SESSION["authorized"] = TRUE;
				$_SESSION["id"] = $row["userID"];

				$stmtCount = $conn->prepare("SELECT bookingID FROM Booking WHERE userID = :id AND returnBooked = :return");
				$stmtCount->bindValue(':return', TRUE);
				$stmtCount->bindValue(':id', $_SESSION['id']);
				$stmtCount->execute();

				$_SESSION["bookingTally"] = $stmtCount->rowCount();

				if (isset($_POST["remember"])) {
					$value = bin2hex(random_bytes(16));
					setcookie("AblaCruisesRemember", $value, time()+60*60*24*30, "/");

					$stmtRemember = $conn->prepare("UPDATE User SET rememberID = :value WHERE userID = :id");
					$stmtRemember->bindValue(':value', $value);
					$stmtRemember->bindValue(':id', $_SESSION['id']);
					$stmtRemember->execute();
				}

				header("Location: ../index.php");
			}
		} else {
			header("Location: ../login.php?msg=failed");
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>
<!doctype html>
<html>
	<head>
	</head>
</html>