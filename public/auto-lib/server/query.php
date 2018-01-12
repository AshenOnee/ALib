<?php
	$mysqli = new mysqli("localhost", "root", "admin", "mydb");
	$cars = array();

	$query = "SET NAMES UTF8";
	if ($stmt = $mysqli->prepare($query)) {
	    $stmt->execute();
	    $stmt->close();
	}

	$query = "	SELECT model.id, brand.name, brand.id, model.name, model.power 
				FROM brand, model 
				WHERE model.id_brand = brand.id 
				AND brand.id = ". $_GET['id_brand'] .";";

	if ($stmt = $mysqli->prepare($query)) {
		$stmt->execute();
		$stmt->bind_result($id, $brand, $id_brand, $model, $power);
		while ($stmt->fetch()) {
			$cars[] = array('id' => $id, 'brand' => $brand, 'id_brand' => $id_brand,
							'model' => $model, 'power' => $power);
		}
		$stmt->close();
	}

	$mysqli->close();

	echo json_encode($cars);
?>