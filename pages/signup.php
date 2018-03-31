<?php require "../include/db.php"; ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ProgerLife</title>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/assets/css/font-awesome.min.css">
</head>
<body>

	<div class="wrapper">
		
		<?php include "../include/header.php"; ?>

		<section class="content">
			<div class="auth">
				<header>
					<h1>Регистрация</h1>
				</header>
				<?php 

				$data = $_POST;
				$login = $data['login'];
				$email = $data['email'];
				$password = $data['password'];
				$password_2 = $data['password_2'];

				if ( isset($data['do_reg']) ) {

					$errors = array();

					if ( trim($login) == '' ) {
						$errors[] = "Введите логин!";
					} else if ( strlen($login) < 6 ) {
						$errors[] = "Логин должен содержать не менее 6 символов!";
					} else if ( strlen($login) > 32 ) {
						$errors[] = "Логин должен содержать не более 32 символов!";
					} else if ( !preg_match("#^[a-z0-9]+$#i", $login) ) {
						$errors[] = "Разрешены только английские символы и цифры!";
					}

					if ( trim($email) == '' ) {
						$errors[] = "Введите Email!";
					}

					if ( trim($password) == '' ) {
						$errors[] = "Введите пароль!";
					} else if ( strlen($password) < 6 ) {
						$errors[] = "Пароль должен содержать не менее 6 символов!";
					} else if ( strlen($password) > 32 ) {
						$errors[] = "Пароль должен содержать не более 32 сомволов!";
					}

					if ( $password_2 != $password ) {
						$errors[] = "Повторный пароль введен неверно!";
					}

					$hash = password_hash($password, PASSWORD_DEFAULT);

					if ( empty($errors) ) {
						$sql = $db->prepare("INSERT INTO `users` (`login`, `password`, `email`) VALUES (:login, :password, :email)");
						$sql->bindParam(':login', $login, PDO::PARAM_STR);
						$sql->bindParam(':password', $hash, PDO::PARAM_STR);
						$sql->bindParam(':email', $email, PDO::PARAM_STR);
						$sql->execute();
						header("location: /pages/auth.php");
					} else {
						echo '<div style="padding: 15px 0 0 15px; color: #FF5959; font-weight: bold;" class="error">'.$errors['0'].'</div>';
					}

				}

				?>
				<form method="POST">
					<div class="form-group">
						<input type="text" name="login" placeholder="Введите логин">
						<input type="email" name="email" placeholder="Введите email">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Введите пароль">
						<input type="password" name="password_2" placeholder="Введите пароль еще раз">
					</div>
					<button type="submit" name="do_reg">Зарегистрироваться</button>
				</form>
			</div>
		</section>

		<?php include "../include/footer.php"; ?>

	</div>
</body>
</html>