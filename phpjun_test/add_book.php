<?php 
	session_start();
	include "includes/db_functions.php";

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
		$complete = "display: none";
		if ($_POST) {
			include "includes/db_connect.php";
			
			$sql = "SELECT id FROM books ORDER BY id DESC LIMIT 1";
			$lastID = get_result($sql);
			$currentId = $lastID[0]['id'] + 1;

			include "upload.php";
			
			$complete = "";

			$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	        $author = htmlspecialchars($_POST['author'], ENT_QUOTES);
	        $publishDate = $_POST['publish_date'];
	        $pageCount = htmlspecialchars($_POST['page_count'], ENT_QUOTES);
	        $format = $_POST['format'];
	        $isbn = htmlspecialchars($_POST['isbn'], ENT_QUOTES);
	        $resume = htmlspecialchars($_POST['resume'], ENT_QUOTES);
	        $fileName = $newFileName;

	        $sql = "INSERT INTO books (title, author, publish_date, page_count, format, isbn, resume, file_name)
	                VALUES ('{$title}', '{$author}', '{$publishDate}', '{$pageCount}', '{$format}', '{$isbn}', '{$resume}', '{$fileName}')";
	        mysqli_query($conn, $sql);
        }
		
		
		if (isset($_GET['succsess']) && $_GET['succsess'] == "pass") {
			$complete = "";
		}
		
	
	include_once('includes/html_header.php');
?>
		<div class="complete" style="<?php echo $complete; ?>">
				<p>Book has been added! 
				<?php echo $status; ?></p>
		</div>
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
					<td><input type="text" class="inp_align" placeholder="Book Title" name="title" required><strong class="req">*</strong></td>
					<td><input type="text" placeholder="Publish Date" name="publish_date" required><strong class="req">*</strong></td>
				</tr>
				<tr>
					<td><input type="text" class="inp_align" placeholder="Author" name="author" required><strong class="req">*</strong></td>
					<td>
						<select name="format">
							<option value="">Select Format</option>
							<option value="A4">A4</option>
							<option value="A3">A3</option>
						</select>
					</td>
				</tr>
				</table>
				<br>
				<table class="tbl">
				<tr>
					<td><input type="text" class="inp_align" placeholder="Page Count" name="page_count" required><strong class="req">*</strong></td>
					<td rowspan="2"><textarea name="resume" placeholder="Resume"></textarea></td>
				</tr>
				<tr>
					<td><input type="text" class="inp_align" placeholder="ISBN" name="isbn"></td>
					
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