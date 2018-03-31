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
					<h1>Вход</h1>
				</header>
				<?php

				$data = $_POST;
				$login = $data['login'];
				$password = $data['password'];

				if ( isset($data['do_auth']) ) {

					$errors = array();

					if ( trim($login) == '' ) {
						$errors[] = "Введите логин!";
					}

					if ( trim($password) == '' ) {
						$errors[] = "Введите пароль!";
					}

					if ( empty($errors) ) {

						$sql = $db->query("SELECT * FROM `users` WHERE `login` = '$login'");
						$user = $sql->fetch(PDO::FETCH_ASSOC);
						$count_user = $sql->execute();

						if ( $count_user > 0 ) {

							if ( password_verify($password, $user['password']) ) {
								$_SESSION['logged_user'] = $user['login'];
								header("location: /");
							} else {
								echo "Произошла ошибка во время авторизации";
							}
						
						} else {
							echo "Такого пользователя не найдено!";
						}

					} else {
						echo '<div style="padding: 15px 0 0 15px; color: #FF5959; font-weight: bold;" class="error">'.$errors['0'].'</div>';
					}

				}

				?>
				<form method="POST">
					<div class="form-group">
						<input type="text" name="login" placeholder="Введите логин!">
						<input type="password" name="password" placeholder="Введите пароль!">
					</div>
					<button type="submit" name="do_auth">Вход</button>
					<a href="/pages/signup.php">Еще не зарегистрированы?</a>
				</form>
			</div>
		</section>

		<?php include "../include/footer.php"; ?>

	</div>
</body>
</html>