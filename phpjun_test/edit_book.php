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
	$selected = "";
	$formatOptions = array('A3', 'A4');
	foreach ($formatOptions as $key => $option) {
		if ($option == $book['format']) {
			$selected = "selected";
		}
	}
	if ($_POST) {
		$currentId = $bookId;
		include "upload.php";
		$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	    $author = htmlspecialchars($_POST['author'], ENT_QUOTES);
	    $publishDate = $_POST['publish_date'];
	    $pageCount = htmlspecialchars($_POST['page_count'], ENT_QUOTES);
	    $format = $_POST['format'];
	    $isbn = htmlspecialchars($_POST['isbn'], ENT_QUOTES);
	    $resume = htmlspecialchars($_POST['resume'], ENT_QUOTES);
	    $fileName = $newFileName;
	 
		$sql = "UPDATE books
				SET title = '{$title}',
					author = '{$author}',
					publish_date = '{$publishDate}',
					page_count = '{$pageCount}',
					format = '{$format}',
					isbn = '{$isbn}',
					resume = '{$resume}',
					file_name = '{$fileName}'
				WHERE id = {$bookId}";
		mysqli_query($conn, $sql);
	}
	?>

<?php include_once('includes/html_header.php');?>
	<div class="content">
		<div class="header">
			<table>
		<tr>
			<td><div class="logo"><img src="css/pics/logo.jpg"></div><div class="logo_text"><p>Wapi Bulgaria Library</p></div></td>
			<td>
				<button class="btn" id="all_books">All books <i class="fa fa-book"></i></button>
				<button class="btn logout" id="logout">Logout <i class="fa fa-key"></i></button>
			</td>
		</tr>
	</table>
		</div>
		<div class="mid">
		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl">
				<tr>
					<td><input type="text" class="inp_align" name="title" value="<?php echo $book['title']; ?>" required></td>
					<td><input type="text" name="publish_date" value="<?php echo $book['publish_date']; ?>" required></td>
				</tr>
				<tr>
					<td><input type="text" class="inp_align" name="author" value="<?php echo $book['author']; ?>" required></td>
					<td>
						<select name="format">
							<option value="" <?php echo $selected; ?>>Select Format</option>
							<option value="A4" <?php echo $selected; ?>>A4</option>
							<option value="A3" <?php echo $selected; ?>>A3</option>
						</select>
					</td>
				</tr>
				</table>
				<br>
				<table class="tbl">
				<tr>
					<td><input type="text" class="inp_align" name="page_count" value="<?php echo $book['page_count']; ?>" required></td>
					<td rowspan="2"><textarea name="resume"><?php echo $book['resume']; ?></textarea></td>
				</tr>
				<tr>
					<td><input type="text" class="inp_align" name="isbn" value="<?php echo $book['isbn']; ?>"></td>
					
				</tr>
			</table>
		</div>
		<div class="footer">
		<table class="tbl">
			<tr>
				<td>
					<img src="css/pics/upload_logo.jpg">
					<input type="file" name="fileToUpload" class="fileUpl">
				</td>
				<td><button class="btn subm" type="submit">Submit <i class="fa fa-arrow-right"></i></button></td>
			</tr>
		</table>
			
		</div>
		</form>

		<div>
	
