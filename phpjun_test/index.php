<?php
	session_start(); 

	$notValid = "display: none";


	if ($_POST) {

	include "includes/db_connect.php";
	include "includes/db_functions.php";

	$username = addslashes($_POST['username']);
	$password = md5($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
	$results = get_result($sql);
		
		if (!is_null($results) && count($results) == 1) {
			$user_id = end($results)['id'];
			$_SESSION['username'] = $user_id;
			$_SESSION['is_admin']= end($results)['isAdmin'];
			header("Location: books.php");
		} else {
			$notValid = "";
		}
	}
?>
<?php include_once('includes/html_header.php');?>
<div class="logform">
<div class="header">
	<table>
		<tr>
			<td><div class="logo"><img src="css/pics/logo.jpg"></div><div class="logo_text"><p>Wapi Bulgaria Library</p></div></td>
		</tr>
	</table>
</div>
<div class="mid">
<div class="not_valid" style="<?php echo $notValid ?>">
	<p>Wrong username or password</p>
</div>
	<form action="" method="POST">
	<table class="tbl">
		<tr>
			<td class="loglabel"><label for="username">Username:</label></td>
			<td><input class="lgn" type="text" name="username"><br></td>
		</tr>
		<tr>
			<td class="loglabel"><label for="password">Password:</label></td>
			<td><input type="password" name="password"><br></td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn subm" type="submit">Login</button></td>
		</tr>
	</table>
	</form>
</div>
</div>
