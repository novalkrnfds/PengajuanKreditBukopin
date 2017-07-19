<?php
	session_start();
?>

<html>
<body>
<form action="tambah.php" method="post">
	<input name="nama" type="text"/><br/>
	<textarea name="pesan"></textarea><br/>
	<img align="left" src="gambar.php"><br/>
	<input type="text" name="captcha" on-click="window.location.reload();"><br/>
	<input type="submit" value="Submit"/>
</form>
<?php echo $_SESSION['image_random_value']; ?>
</body>
</html>