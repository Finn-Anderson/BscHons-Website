<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		// set $username and $password to be used in SELECT
		$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
		$pw1 = htmlspecialchars($_POST["password1"], ENT_QUOTES);
		$pw2 = htmlspecialchars($_POST["password2"], ENT_QUOTES);
		$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
		$address = htmlspecialchars($_POST["address"], ENT_QUOTES);
		$city = htmlspecialchars($_POST["city"], ENT_QUOTES);
		$postcode = htmlspecialchars($_POST["postcode"], ENT_QUOTES);

		// Checks if all inputs are valid
		$tblList = array($email, $pw1, $name, $address, $city, $postcode);
		for ($i=0; $i < Count($tblList); $i++) {
			if ((empty($tblList[$i]) AND !is_numeric($tblList[$i])) OR ($tblList[$i] == $email AND !filter_var($tblList[$i], FILTER_VALIDATE_EMAIL)) OR ($pw1 != $pw2)) {
				if ($tblList[$i] == $email) {
					header("Location: "$_SERVER["DOCUMENT_ROOT"]."/register.php?msg=email");
					break;
				} elseif ($tblList[$i] == $pw1) {
					header("Location: "$_SERVER["DOCUMENT_ROOT"]."/register.php?msg=password");
					break;
				} else {
					header("Location: "$_SERVER["DOCUMENT_ROOT"]."/register.php?msg=failed");
					break;
				}
			} elseif ($i == 11) {
				//Check it doesn't alread exist. Output determines whether msg is fail or success (success input register data)
				$checkReg = $conn->prepare("SELECT 1 FROM User WHERE email = :mail");
				$checkReg->bindValue(":mail", $email, PDO::STR);
				$checkReg->execute();
				
				$row = $checkReg->fetch(PDO::FETCH_ASSOC);
				if (!$row) {
					$pw = hash("sha512", $pw1);

					// stmt to insert row
					$stmtReg = $conn->prepare("INSERT INTO User (email, password, name, address, city, postcode)
						VALUES (:mail, :pwd, :name, :address, :city, :post)");

					$stmtReg->bindValue(":mail", $email, PDO::STR);
					$stmtReg->bindValue(":pwd", $pw, PDO::STR);
					$stmtReg->bindValue(":name", $forename, PDO::STR);
					$stmtReg->bindValue(":address", $address, PDO::STR);
					$stmtReg->bindValue(":city", $city, PDO::STR);
					$stmtReg->bindValue(":post", $postcode, PDO::STR);

					$stmtReg->execute();

					$stmt = $conn->prepare("SELECT userid FROM User WHERE email = :email AND password = :pwd");
					$stmt->bindValue(":email", $email);
					$stmt->bindValue(":pwd", $pw);
					$stmt->execute();

					// Chcek if stmt statement is valid
					if ($stmt->rowCount() == 0) {
						header("Location: "$_SERVER["DOCUMENT_ROOT"]."/login.php");
					} else {
						// Sets sessions to be used later on.
						$result = $stmt->fetchAll();
						foreach( $result as $row ) {
							session_start();
							$_SESSION["authorized"] = TRUE;
							$_SESSION["powers"] = $row["powers"];
							$_SESSION["id"] = $row["userid"];
						}

						header("Location: " $_SERVER["DOCUMENT_ROOT"]."/index.php");
					}		
				} else {
					header("Location: "$_SERVER["DOCUMENT_ROOT"]."/register.php?msg=used");
				}
			}
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>