<?php session_start();  

if (!isset($_SESSION['username'])) {
	?>
	 	<div class="content">
			<div class="not_valid">
				<p>Please login!</p>
			</div>
			<button class="btn" id="go_back">Back</button>
		</div>
		<?php
}
	include "includes/db_connect.php";
	include "includes/db_functions.php";
	$bookId = (int)$_GET['bookId'];

	$sql = "SELECT * FROM books WHERE id = {$bookId}  limit 1";
	$book = get_result($sql);
	$book = end($book);
		$cover = "<p>No cover</p>";
	if ($book['file_name'] != NULL){
		$cover = "<img src='uploads/covers/{$book['file_name']}'>";
	}
	?>

<?php include_once('includes/html_header.php');?>
	<div class="content">
	<div class="header">
		<table>
			<tr>
				<td><div class="logo"><img src="css/pics/logo.jpg"></div><div class="logo_text"><p>Wapi Bulgaria Library</p></div></td>
				<td>
					<button class="btn" id="go_back">Back</button>
				</td>
			</tr>
		</table>
	</div>
	
		<table class="tbl">
			<tr>
				<td rowspan="7"><div class="cover"><?php echo $cover; ?></div></td>
				<td>Title: <strong><?php echo $book['title']; ?></strong></td>
			</tr>
			<tr>
				
				<td>Author: <strong><?php echo $book['author']; ?></strong></td>
			</tr>
			<tr>
				
				<td>Publish Date: <strong><?php echo $book['publish_date']; ?></strong></td>
			</tr>
			<tr>
				
				<td>Format: <strong><?php echo $book['format']; ?></strong></td>
			</tr>
			<tr>
				
				<td>Page Count: <strong><?php echo $book['page_count']; ?></strong></td>
			</tr>
			<tr>
				
				<td>ISBN: <strong><?php echo $book['isbn']; ?></strong></td>
			</tr>
			<tr>
				
				<td><label for="resume">Resume: </label>
				<textarea name="resume" id="resume" disabled="disabled" cols="50" rows="20"><?php echo $book['resume']; ?></textarea></td>
			</tr>
		</table>
	</div>