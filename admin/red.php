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
      <div class="block1">
        <?php
        $zapr = $db->query("SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
        	while ( $art = $zapr->fetch(PDO::FETCH_ASSOC) ) {
        ?>
      <input value="<?php echo $art['title']; ?>"></input>
      <textarea><?php echo $art['text']; ?></textarea>
      <input value="<?php echo $art['approved'] ?>"></input>
    <?php } ?>
      </div>
			<?php include "../include/sidebar.php"; ?>
		</section>

		<?php include "../include/footer.php"; ?>

		<!-- jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</div>
</body>
</html>
