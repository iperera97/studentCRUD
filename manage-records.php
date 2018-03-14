<?php 

###LOAD DB CONNECTION
require "db_connection.php";

$err = array();

#success
if( ( isset($_GET["func"]) ||
		isset($_GET["func"]) ) && isset($_GET["Sid"]) ){

	#edit
	function edit(){
		global $db_connection; global $err;
		$success = null;

		$studentId = $_GET["Sid"];
		$searchStudent = "SELECT name, email FROM studentinfo WHERE student_id = \"$studentId\"";

		$studentDetails = $db_connection->query($searchStudent);

		#failed
		if( !$studentDetails ){
			$err["invalid_student"] = $db_connection->error;
		}else{
		#success
			$studentResult = $studentDetails->fetch_assoc();

			###show name & email in edit form
			$showName = $studentResult["name"];
			$showEmail = $studentResult["email"];

			###edit form
			if( !empty($_POST) ){

				$editStName = $_POST["stName"];
				$editStEmail = $_POST["stEmail"];
	
				$editQ = "UPDATE studentinfo SET name = \"$editStName\", email = \"$editStEmail	\" WHERE student_id = \"$studentId\" ";
	
				$editR = $db_connection->query($editQ);
	
				#faild
				if( !$editR ){
					$err["edit_faild"] = $db_connection->error;
				}else{
				###success
					$success = "<h1 class=\"success\" > $studentId has been successfully edited</h1>";
				}

			}

			return [
				"showName" => $showName,
				"showEmail" => $showEmail,
				"success" => $success
			];
		}

	}

	#delete
	function delete(){
		global $db_connection; global $err;

		$studentId = $_GET["Sid"];

		$deletQ = "DELETE FROM studentinfo WHERE student_id = \"$studentId\"";
		$deletR = $db_connection->query($deletQ);

		#failed
		if( !$deletR ){
			$err["delet_err"] = $db_connection->error;
		}else{
		#success
			$success = "<h1 class=\"success\" > $studentId has been successfully deleted</h1>";
			
			return [
				"success" => $success
			];
		}
	}

#error
}else{
	$err["invalid parameter"] = "please enter valid parameters";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- edit view -->
	<?php 

		#show err
		if( !empty($err) ){
			
			$allErrors = array_values($err);
			foreach ($allErrors as $error) {
				echo "<h1 class=\"err\">$error</h1>";
			}

		}else{
		#success

			if( $_GET["func"] === "edit" ){

				$editR = edit();
	
				echo <<<EDIT
					<form method="POST" id="edit">
						<fieldset>
							<input 
								type="text" 
								name="stName" 
								required="" 
								placeholder="$editR[showName]">
						</fieldset>
						<fieldset>
							<input 
								type="email" 
								name="stEmail" 
								required="" 
								placeholder="$editR[showEmail]">
						</fieldset>
						<fieldset>
							<input type="submit" value="EDIT">
						</fieldset>
					</form>
EDIT;

				#success
				echo $editR["success"];

			}else if( $_GET["func"] === "delete"){

				$deletR = delete();

				echo <<<DELETE
						<div id="delete">
							$deletR[success]
						</div>
DELETE;
			}
		}

		echo "<a id=\"go_records\"href=\"student-records.php\">GO TO STUDENT RECORDS</a>";
	?>


</body>
</html>