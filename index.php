<?php 
	session_start();
	if ($_SESSION['user']) {
		header('Location: profile.php');
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
		<label>Логин</label>
		<input type="text" name="login" placeholder="Введите логин">
		<label>Пароль</label>
		<input type="password" name="password" placeholder="Введите пароль">
		<button type="submit" class="login-btn">Войти</button>
		<p>
			У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a>!
		</p>
		<p class="msg none"></p>

	</form>

<script src="assets/js/jquery-3.6.0.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>