<?php
	$mysqli = new mysqli("localhost", "root", "admin", "mydb");
	
	if (mysqli_connect_errno()) {
		echo "err";
	    exit();
	}

	$query = "SET NAMES UTF8";
	if ($stmt = $mysqli->prepare($query)) {
	    $stmt->execute();
	    $stmt->close();
	}

 	$query = "	SELECT model.id, brand.name, model.name, model.power, discription.text  
				FROM brand, model, discription 
				WHERE model.id_brand = brand.id 
				AND model.id = discription.id_model 
				AND brand.id =  '". $_POST["brand"] ."'  
				AND model.name = '". $_POST["model"] ."';";

 	if ($stmt = $mysqli->prepare($query)) {
	    $stmt->execute();
	    $stmt->bind_result($id, $brand, $model, $power, $discription);
	    while ($stmt->fetch()) {
	    	$car = array('id' => $id, 'brand' => $brand, 'model' => $model, 'power' => $power, 'discription' => $discription);
	    }
	    $stmt->close();
	}
	
	$mysqli->close();
	echo $car['id'] ." ". $car['brand'] ." ". $car['model'] ." ". $car['power'] ."<br>";
	echo "<p>". $car['discription'] ."</p>";
?>