<?php
	include $_SERVER['DOCUMENT_ROOT']."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$pw = hash("sha512", $pw);

		$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
		$password = htmlspecialchars($_POST["password"], ENT_QUOTES);

		// stmt to select row
		$stmt = $conn->prepare("SELECT userID FROM Users WHERE email = :email AND password = :pwd");
		$stmt->bindValue(":email", $email, PDO::PARAM_INT);
		$stmt->bindValue(":pwd", $pw, PDO::STR);
		$stmt->execute();

		// Chcek if stmt statement is valid
		if ($stmt->rowCount() == 1) {
			// Sets sessions to be used later on.
			$result = $stmt->fetchAll();
			foreach( $result as $row ) {
				session_start();

				$_SESSION["authorized"] = TRUE;
				$_SESSION["id"] = $row["userID"];

				if (isset($_POST["remember"])) {
					$value = bin2hex(random_bytes(16));
					setcookie("AblaCruisesRemember", $value, time()+60*60*24*30, "/");
				}

				header("Location: "$_SERVER['DOCUMENT_ROOT']."/index.php");
			}
		} else {
			header("Location: "$_SERVER['DOCUMENT_ROOT']."/login.php?msg=failed");
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