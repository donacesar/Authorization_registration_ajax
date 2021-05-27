<?php
	session_start();
	require_once 'connect.php';
	

	$full_name = $_POST['full_name'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];

	$error_fields = [];

	if ($login === '') {
		$error_fields[] = 'login';
	}

	if ($password === '') {
		$error_fields[] = 'password';
	}

	if ($full_name === '') {
		$error_fields[] = 'full_name';
	}
	if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error_fields[] = 'email';
	}
	if ($password_confirm === '') {
		$error_fields[] = 'password_confirm';
	}
	if (!$_FILES['avatar']) {
		$error_fields[] = 'avatar';
	}

		if (!empty($error_fields)) {
		$response = [
			"staus" => false,
			"type" => 1,
			"message" => 'Не заполнены поля',
			"fields" => $error_fields
		];

		echo json_encode($response);
		die();
	}

	if ($password === $password_confirm) {
		
		$path = 'uploads/' . time() . $_FILES['avatar']['name'];

		if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
			$response = [
			"staus" => false,
			"type" => 2,
			"message" => 'Ошибка при загрузке аватарки',
			];

			echo json_encode($response);
			
		}

		$password = md5($password);

		mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
		$response = [
			"staus" => true,
			"message" => 'Регистрация прошла успешно',
			];

			echo json_encode($response);

	} else {
		$response = [
			"staus" => false,
			"type" => 2,
			"message" => 'Пароли не совпадают',
			];

			echo json_encode($response);
	}
 ?>

 <pre>
 	<?php 
 		print_r($_FILES);
 	 ?>
 </pre>