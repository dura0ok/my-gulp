		<?php require "db.php"; ?>
		<section class="header">
			<header>
				<div class="logo">
					<h1><a href="/">ProgerLife</a></h1>
				</div>
				<div class="menu">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><a href="/pages/about_us.html">О нас</a></li>
						<li><a href="#">Публикации</a></li>
						<li><a href="#">Группы</a></li>
						<li><a href="#">Пользователи</a></li>
						<?php 

						if ( isset($_SESSION['logged_user']) ) {
							?>
								<li>Здравствуйте, <a href="/pages/user.php"><?php echo $_SESSION['logged_user']; ?></a></li>
								<li><a href="/pages/exit.php">Выйти</a></li>
							<?php
						} else {
							?>
								<li><a href="/pages/auth.php">Вход</a></li>
								<li><a href="/pages/signup.php">Регистрация</a></li>
							<?php
						}

						?>
					</ul>
				</div>
			</header>
		</section>