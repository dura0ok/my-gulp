<?php require "../include/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Дрова 1</title>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/assets/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">

		<?php include "../include/header.php"; ?>

		<section class="content">

			<?php 

			$article = $db->query("SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

			while ( $art = $article->fetch(PDO::FETCH_ASSOC) ) {
				?>
				<div class="full-article">
					<div class="full-content-article">
						<header>
							<div class="full-art-title">
								<h1><?php echo $art['title']; ?></h1>
								<div class="full-art-date">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span><?php echo $art['pubdate']; ?></span>
								</div>
							</div>
						</header>
						<div class="full-art-descr">
							<div class="full-art-text-preview">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio assumenda ratione tempora, necessitatibus minus itaque magnam ut quis maiores. Laudantium enim eos ad dolore fugit itaque recusandae, quia doloribus placeat!</p>
							</div>
							<div class="full-art-subheaders">
								<h2>Это первый подзаголовок</h2>
							</div>
							<div class="full-art-img">
								<img src="/img/<?php echo $art['img']; ?>" alt="img">
							</div>
							<div class="full-art-text">
								<p><?php echo $art['text']; ?></p>
							</div>
						</div>
						<div class="full-stat-art">
							<div class="full-stat-int">
								<p>
									<i class="fa fa-comment" aria-hidden="true"></i>
									<span>22</span>
								</p>
								<p>
									<i class="fa fa-eye" aria-hidden="true"></i>
									<span><?php echo $art['views']; ?></span>
								</p>
								<p>
									<i class="fa fa-thumbs-up" aria-hidden="true"></i>
									<span><?php echo $art['articles_like']; ?></span>
								</p>
								<p>
									<i class="fa fa-thumbs-down" aria-hidden="true"></i>
									<span><?php echo $art['articles_dislike']; ?></span>
								</p>
							</div>
							<div class="full-art-tags">
								<!-- Тегов может быть не более чем 7, учти это при разработке -->
								<p>Теги: <span>Программирование</span><span>Степан</span><span>PHP7</span></p>
							</div>
						</div>
					</div>
					<div class="full-art-comments">
						<?php

						$data = $_POST;
						$text = $data['text'];
						$name = 'Никита';

						if ( isset($data['do_com']) ) {

							$errors = array();

							if ( trim($text) == '' ) {
								$errors[] = "Введите текст комментария!";
							}

							if ( empty($errors) ) {
								$sql = $db->prepare("INSERT INTO `comments` (`name`, `text`, `articles_id`) VALUES (:name, :text, :articles_id)");
								$sql->bindParam(':name', $name, PDO::PARAM_STR);
								$sql->bindParam(':text', $text, PDO::PARAM_STR);
								$sql->bindParam(':articles_id', $art['id'], PDO::PARAM_INT);
								$sql->execute();
							} else {
								echo '<div class="error">'.$errors['0'].'</div>';
							}

						}

						?>
						<header>
							<h1>Комментарии</h1>
						</header>
						<?php 

						if ( isset($_SESSION['logged_user']) ) {
							?>
								<div class="add-art-comment">
									<form method="POST">
										<div class="avatar-user-comment">
											<img src="/img/no_image.png" alt="img">
										</div>
										<div class="inner-content-comment">
											<textarea name="text" placeholder="Введите ваш комментарий"></textarea>
											<button type="submit" name="do_com">Отправить</button>
										</div>
									</form>
								</div>
							<?php
						} else {
							echo 'Чтобы оставлять комментарии, нужно <a href="/pages/signup.php">зарегистрироваться </a>или <a href="/pages/auth.php">войти</a>';
						}

						?>
						<?php 

						$comments = $db->query("SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC");

						while ( $comment = $comments->fetch(PDO::FETCH_ASSOC) ) {
							?>
							<div class="comment">
								<div class="avatar-comment">
									<img src="/img/no_image.png" alt="img">
								</div>
								<div class="comment-text">
									<div class="top-comment-text">
										<p>
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span><?php echo $comment['pubdate']; ?></span>
										</p>
										<h1><?php echo $comment['name']; ?></h1>
									</div>
									<p><?php echo $comment['text']; ?></p>
								</div>
							</div>
							<?php
						}

						?>
						<div class="add-views-comment">
							<button type="submit">Показать еще</button>
						</div>
					</div>
				</div>
				<?php
			}

			?>
			<?php include "../include/sidebar.php"; ?>
		</section>

		<?php include "../include/footer.php"; ?>

		<!-- jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</div>
</body>
</html>