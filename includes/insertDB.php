<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		// Set variables to be used in SELECT statement
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
					header("Location: ../register.php?msg=email");
					break;
				} elseif ($tblList[$i] == $pw1) {
					header("Location: ../register.php?msg=password");
					break;
				} else {
					header("Location: ../register.php?msg=failed");
					break;
				}
			} elseif ($i == (Count($tblList) - 1)) {
				// Checks if it doesn't alread exist
				$checkReg = $conn->prepare("SELECT 1 FROM User WHERE email = :mail");
				$checkReg->bindValue(":mail", $email, PDO::PARAM_STR);
				$checkReg->execute();
				
				$row = $checkReg->fetch(PDO::FETCH_ASSOC);
				if (!$row) {
					$pw = hash("sha512", $pw1);

					// stmt to insert row
					$stmtReg = $conn->prepare("INSERT INTO User (email, password, name, address, city, postcode, avatar)
						VALUES (:mail, :pwd, :name, :address, :city, :post, :avatar)");

					$stmtReg->bindValue(":mail", $email, PDO::PARAM_STR);
					$stmtReg->bindValue(":pwd", $pw, PDO::PARAM_STR);
					$stmtReg->bindValue(":name", $name, PDO::PARAM_STR);
					$stmtReg->bindValue(":address", $address, PDO::PARAM_STR);
					$stmtReg->bindValue(":city", $city, PDO::PARAM_STR);
					$stmtReg->bindValue(":post", $postcode, PDO::PARAM_STR);
					$stmtReg->bindValue(":avatar", "../img/avatar/default.svg");

					$stmtReg->execute();

					$stmt = $conn->prepare("SELECT userid, admin FROM User WHERE email = :email AND password = :pwd");
					$stmt->bindValue(":email", $email, PDO::PARAM_STR);
					$stmt->bindValue(":pwd", $pw, PDO::PARAM_STR);
					$stmt->execute();

					// Chcek if stmt statement is valid (it should be)
					if ($stmt->rowCount() == 1) {
						// Sets sessions to be used later on.
						$result = $stmt->fetchAll();
						foreach( $result as $row ) {
							session_start();
							$_SESSION["authorized"] = TRUE;
							$_SESSION["admin"] = $row["admin"];
							$_SESSION["id"] = $row["userid"];
						}

						header("Location: ../index.php");
					}		
				} else {
					header("Location: ../register.php?msg=used");
				}
			}
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>