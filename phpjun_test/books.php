<?php 

session_start();
	include "includes/db_functions.php";
	include "includes/db_connect.php";

	$add = "";
if ($_SESSION['is_admin'] == 1) {
		$add = "<button class='btn' id='add_book'>Add Book</button>";
}

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
	
	$sql = "SELECT * FROM books ORDER BY publish_date DESC";
	$resultBooks = get_result($sql);

	$result = mysqli_query($conn, $sql);

	$numberOfResults = mysqli_num_rows($result);

	$resultsPerPage = 5;

	$numberOfPages = ceil($numberOfResults/$resultsPerPage);
	//var_dump($resultBooks);

?>
<?php include_once('includes/html_header.php');?>
<div class="content">

<div class="header">
			<table>
		<tr>
			
			<td><div class="logo"><img src="css/pics/logo.jpg"></div><div class="logo_text"><p>Wapi Bulgaria Library</p></div></td>
			<td>
				<?php echo $add; ?>
				<button class="btn logout" id="logout">Logout <i class="fa fa-key"></i></button>
			</td>
		</tr>
	</table>
	</div>
<?php
	if (!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$pageFirstResult = ($page-1)*$resultsPerPage;

	$sql = "SELECT * FROM books ORDER BY publish_date DESC LIMIT {$pageFirstResult},{$resultsPerPage}";
	$result = get_result($sql);
	?>
		
	<table class="tbl_books">
		<thead>
			<tr>
				<th>Book Title</th>
				<th>Author</th>
				<th>Publish Date</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach ($result as $key => $book) {
		//echo $book['title'];
		$options = "";
		if ($_SESSION['is_admin'] == 1) {
			$options = "/<a href='delete_book.php?bookId={$book['id']}'>Delete</a>/<a href='edit_book.php?bookId={$book['id']}'>Edit</a>";
		}
		echo "<tr class='clickable-row'>";
		echo "<td>{$book['title']}</td>";
		echo "<td>{$book['author']}</td>";
		echo "<td>{$book['publish_date']}</td>";
		echo "<td><a href='view_book.php?bookId={$book['id']}'>View</a>{$options}</td>";
		echo "</tr>";
		
	}
?>
	</tbody>
	</table>
	<div class="footer">
		
	<div class="pagination">
		
	
<?php
	for ($page=1; $page<=$numberOfPages; $page++) { 
		echo "<a href='books.php?page={$page}'>{$page}</a>";
	}
?>
		</div>
		</div>
	</div>