<?php
	$brands = array();
	$cars = array();
	$mysqli = new mysqli("localhost", "root", "admin", "mydb");

	$query = "SET NAMES UTF8";
	if ($stmt = $mysqli->prepare($query)) {
		$stmt->execute();
		$stmt->close();
	}

	$query = "SELECT name, id FROM brand;";
	if ($stmt = $mysqli->prepare($query)) {
		$stmt->execute();
		$stmt->bind_result($name, $id);

		while ($stmt->fetch()) {
			$brands[] = array('name' => $name, 'id' => $id);
		}

		$stmt->close();
	}

	 $mysqli->close();
//
//	use Illuminate\Support\Facades\DB;
//
//	$results = DB::select("SELECT name, id FROM brand;");
//	foreach($results as $brand)
//	{
//		$brands[] = array('name' => $brand[0], 'id' => $brand[1]);
//	}
//
//
//	// class UserController extends Controller
//	// {
//	//   /**
//	//    * Показать список всех пользователей приложения.
//	//    *
//	//    * @return Response
//	//    */
//	//   public function index()
//	//   {
//	//     $users = DB::select("SELECT name, id FROM brand;");
//
//	//     return view('user.index', ['users' => $users]);
//	//   }
//	// }

	define('ROOT_DIR', dirname(__FILE__));

	include ROOT_DIR . '/views/main.html';
?>
