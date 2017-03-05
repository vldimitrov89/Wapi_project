<?php 
	
	session_start();

	if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		if ($_GET['bookId']) {
			$id = intval($_GET['bookId']);
		include "includes/db_connect.php";
		$sql = "DELETE FROM books WHERE id = {$id} LIMIT 1";
		mysqli_query($conn, $sql);
		}
	}
	header("Location: books.php");
