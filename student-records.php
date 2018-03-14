<?php 


###load database
require_once "db_connection.php";

### [GET]
$searchBy = (isset($_GET["searchBy"]))?
				filter_input(INPUT_GET, "searchBy",FILTER_SANITIZE_SPECIAL_CHARS) : "all";
$searchValue = (isset($_GET["searchVal"]))?
				filter_input(INPUT_GET, "searchVal", FILTER_SANITIZE_SPECIAL_CHARS): null;
$start = ( isset($_GET["start"]) )? filter_input(INPUT_GET, "start",									FILTER_SANITIZE_SPECIAL_CHARS): 0;
$recordsPerPage = 20;


### [Query]
$totalCountQ = "SELECT COUNT(*) FROM studentinfo";
$tableNameQ = "SHOW TABLES";
$eachRecordsQ = "SELECT * FROM studentinfo LIMIT $recordsPerPage OFFSET $start";
$searchQ = "SELECT * FROM studentinfo WHERE $searchBy LIKE \"$searchValue%\"";


### [Results]
$totalCountR = $db_connection->query($totalCountQ);
$tableNameR = $db_connection->query($tableNameQ);
$eachRecordsR = $db_connection->query($eachRecordsQ);



### COUNT ALL RECORDS
#failed
if( !$totalCountR ){

	$err["total_count_err"] = $db_connection->error;
}else{
#success
	$countResults = $totalCountR->fetch_assoc();
	$counter = $countResults["COUNT(*)"];
}

###SHOW TABLE NAME
#failed
if( !$tableNameR ){

	$err["table_not_found"] = $db_connection->error;
}else{
#success
	$tableName = $tableNameR->fetch_assoc();
	$tableName = $tableName["Tables_in_students"];
	$tableName = strtoupper($tableName);
}

###SHOW ALL RECORDS (default)
if( $searchBy == "all" ){

	#failed
	if( !$eachRecordsR ){
		$err["records_not_found"] = $db_connection->error;
	}else{
	###success
		$tR = "";
		$recordCount = 1;

		while ( $record = $eachRecordsR->fetch_assoc() ){

			$name = ucwords($record["name"]);

			$tR .= <<<TR
					<tr>
						<td>R$recordCount</td>
						<td>$record[id]</td>
						<td>$name</td>
						<td>$record[email]</td>
						<td>$record[student_id]</td>
						<td>
							<a 	
								class="edit"
								href="manage-records.php?func=edit&Sid=$record[student_id]">
								Edit
							</a>
							<a
								class="delete"
								href="manage-records.php?func=delete&Sid=$record[student_id]
								">Delete
							</a>
						</td>
					</tr>
TR;
			$recordCount++;
		}

	}

}else if( ( $searchBy === "name" ||
				$searchBy === "email" ||
					$searchBy === "student_id") && $searchValue ){
	
	$searchR = $db_connection->query($searchQ);

	#search query failed
	if( !$searchR ){
		$err["search_query_faild"] = $db_connection->error;
	}else{
	###success
		$matches = $searchR->num_rows;

		###empty results
		if( $matches === 0 ){

			$err["empty_results"] = "cannot find $searchBy field in \"$searchValue\"";
		}else{

			$recordCount = 1;
			$tR = "";

			while ( $searchRecord = $searchR->fetch_assoc() ){
			$tR .= <<<TR
					<tr>
						<td>R$recordCount</td>
						<td>$searchRecord[id]</td>
						<td>$searchRecord[name]</td>
						<td>$searchRecord[email]</td>
						<td>$searchRecord[student_id]</td>
						<td>
							<a 
								class = "edit"
								href="manage-records.php?func=edit&Sid=$searchRecord[student_id]">
								Edit
							</a>
							<a
								class = "delete"
								href="manage-records.php?func=delete&Sid=$searchRecord[student_id]
								">Delete
							</a>
						</td>
					</tr>
TR;
			$recordCount++;
			}
		}
	}
}else{
	$err["search_value"] = "searched value is empty, please enter correct student details";
}





###CREATE PAGINATION
$paginationCount = 1;

function createPagination( $allRecords, $recordsPerPage, $id ){
	global $start;
	global $paginationCount;
	$currentPage = basename($_SERVER["PHP_SELF"]);

	$pagination = "<ul id=\"$id\">";

	for( $i = 0; $i < $allRecords; $i+=$recordsPerPage ){		
		
		$active = ($start == $i)? "active" : null;

		$pagination .= <<<PAGINATION
						<li>
							<a class="$active" href="$currentPage?start=$i">$paginationCount</a>
						</li>
PAGINATION;
		$paginationCount++;
	}
	
	$pagination .= "</ul>";
	return $pagination;
};

###return pagination
$countRows = ( isset($matches) )? $matches : $counter;
$pagination = createPagination($countRows, $recordsPerPage, "pagination");


?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT RECORDS CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="delete.js"></script>
</head>
<body>

	<!-- header goes here -->
	<header>
		<h1>Total Students <?php echo $counter ?></h1>
		<h1>Table Name <?php echo $tableName ?></h1>
	</header>

	<!-- search bar goes here -->
	<form id="search">
		<select required="" name="searchBy">
			<option disabled="" selected="" value="">Search By</option>
			<option value="name">Name</option>
			<option value="email">Email</option>
			<option value="student_id">Student Id</option>
		</select>
		<input type="text" name="searchVal" required="">
		<input type="submit" value="SEARCH">
	</form>

	<?php 

	if( !empty($err) ){
		
		$allErrors = array_values( $err );

		foreach ($allErrors as $err) {
			echo "<h2 class=\"err\">$err</h2>";
		}

		echo "<a id=\"go_records\"href=\"student-records.php\">GO TO STUDENT RECORDS</a>";

	}else{

		#when search items matches
		if( isset($matches) ) echo "<h2 class=\"match\">$matches matches found for <span>$searchValue</span></h2>";

		#table goes here
		echo <<<TABLE
			<table>
				<tr>
					<th></th>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Student Id</th>
					<th>Option</th>
				</tr>
				{$tR}
			</table>
TABLE;
	
		#pagination goes here
		print_r($pagination);

		#when search items
		if($searchBy !== "all") echo "<a id=\"go_records\"href=\"student-records.php\">GO TO STUDENT RECORDS</a>";
	}

	?>
	</body>
</html>