<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		$offset = htmlspecialchars($_POST["offset"], ENT_QUOTES);

		if (isset($_POST["search"]) && !empty($_POST["search"])) {
			$search = htmlspecialchars($_POST["search"], ENT_QUOTES);
		} else {
			$search = "%";
		}

		$values = array();

		$userTally = $conn->prepare("SELECT * FROM User WHERE email LIKE :search OR name LIKE :search");
		$userTally->bindValue(":search", $search, PDO::PARAM_STR);
		$userTally->execute();

		$tally = $userTally->rowCount();
		array_push($values, $tally);

		$getUsers = $conn->prepare("SELECT admin, name, email, userID FROM User WHERE email LIKE CONCAT('%', :search, '%') OR name LIKE CONCAT('%', :search, '%') LIMIT 20 OFFSET :offset");
		$getUsers->bindValue(":offset", $offset, PDO::PARAM_INT);
		$getUsers->bindValue(":search", $search, PDO::PARAM_STR);
		$getUsers->execute();

		$result = $getUsers->fetchAll();

		foreach( $result as $row ) {
			array_push($values, array($row["admin"], $row["name"], $row["email"], $row["userID"]));
		}

		echo json_encode($values);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>