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
      <div class="redm">
       <a id="black" href="../menu.php">Добавить еще статью</a>

   <?php
   $menuser = $db->query("SELECT * FROM `articles` ORDER BY `id`");

        while ( $tester = $menuser->fetch(PDO::FETCH_ASSOC) ) {
        $id = $tester['id'];
       ?>
       <div class="men">
                   <h2>Название меню- <?php echo $tester['title']  ?></h2>
           <a id="orange" href="red.php?id=<?php echo $id; ?>">Редактировать</a><br>
            <a id="red" href="delete.php?id=<?php echo $id; ?>">Удалить</a><br>


       </div>
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
