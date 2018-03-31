			<?php require "db.php"; ?>
			<div class="sidebar">
				<div class="popular-articles">
					<div class="header-popular-articles">
						<h1>Самые популярные записи</h1>
					</div>
					<?php

					$article = $db->query("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");

					while ( $art = $article->fetch(PDO::FETCH_ASSOC) ) {
						?>
						<div class="pop-art-item">
							<div class="pop-art-img">
								<img src="../img/no_image.png" alt="img">
							</div>
							<div class="pop-art-descr">
								<h1><a href="pages/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a></h1>
								<p><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . '...'; ?></p>
								<p>
									<i class="fa fa-eye" aria-hidden="true"></i>
									<span><?php echo $art['views']; ?></span>
								</p>
							</div>
						</div>
						<?php
					}

					?>
				</div>
			</div>
