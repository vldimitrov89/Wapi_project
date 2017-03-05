<?php 
	
	function get_result($sql) {
		global $conn;

		$result = mysqli_query($conn, $sql);
		$resultArray = array();
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
		     	array_push($resultArray, $row);
			}
			return $resultArray;
		}
	}