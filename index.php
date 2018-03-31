<?php require "include/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ProgerLife</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.min.css">
	<link rel="stylesheet" href="css/assets/css/font-awesome.min.css">
</head>
<body>

	<div class="wrapper">

	<?php include "include/header.php"; ?>

		<section class="content">
			<div class="main-all-article-list">
				<div class="header-posts">
					<h1>Последние опубликованые записи</h1>
				</div>
				<div class="articles-list">
					<ul>
						<?php

						$articles = $db->query("SELECT * FROM `articles` WHERE `approved` = 1 ORDER BY `id` DESC LIMIT 10");

						while ( $art = $articles->fetch(PDO::FETCH_ASSOC) ) {
							?>
							<li class="article-item">
								<article class="article-preview">
									<header>
										<div class="article-title">
											<p><?php echo $art['title']; ?></p>
										</div>
										<div class="article-static">
											<p>
												<i class="fa fa-comment" aria-hidden="true"></i>
												<span>22</span>
											</p>
											<p>
												<i class="fa fa-eye" aria-hidden="true"></i>
												<span><?php echo $art['views']; ?></span>
											</p>
											<p>
												<i class="fa fa-heart" aria-hidden="true"></i>
												<span><?php echo $art['articles_like']; ?></span>
											</p>
										</div>
									</header>
									<div class="article-preview-descr">
										<img class="article-preview-img" src="/img/<?php echo $art['img']; ?>" alt="<?php echo $art['title']; ?>">
										<p><?php echo mb_substr(strip_tags($art['text']), 0, 300, 'utf-8') . '...'; ?></p>
									</div>
									<footer>
										<button><a href="/pages/article.php?id=<?php echo $art['id']; ?>">Продолжить</a></button>
										<p>
											<i class="fa fa-user" aria-hidden="true"></i>
											<a href="#"><?php echo $art['author']; ?></a>
										</p>
									</footer>
								</article>
							</li>
							<?php
						}

						?>
					</ul>
				</div>
			</div>
	<?php include "include/sidebar.php"; ?>
<!-- 			<div class="view-more-article">
				<button type="submit">Показать еще</button>
			</div> -->
<!-- 			<div class="pagination">
				<ul>
					<li>Назад</li>
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li>6</li>
					<li>7</li>
					<li>8</li>
					<li>9</li>
					<li>Вперед</li>
				</ul>
			</div> -->
		</section>

	<?php include "include/footer.php"; ?>

	</div>

	<!-- scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
