<?php
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Авторизация и регистрация</title>
</head>
<body>

	<form>
		<img src="<?= $_SESSION['user']['avatar'] ?>" width="60" alt="">
		<h2><?= $_SESSION['user']['full_name'] ?></h2>
		<a href="#"><?= $_SESSION['user']['email'] ?></a>
		<a href="vendor/logout.php" class="logout">Выход</a>
		

	</form>


	
</body>
</html>