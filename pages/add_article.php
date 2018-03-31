<?php require "../include/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ProgerLife</title>
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/assets/css/font-awesome.min.css">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>

	<div class="wrapper">
		
		<?php include "../include/header.php"; ?>

		<section class="content">
			<div class="add-article">
				<textarea></textarea>
			</div>
		</section>

		<?php include "../include/footer.php"; ?>

	</div>

	<script>
		ttinymce.init({
		  selector: "textarea",  // change this value according to your HTML
		  plugins: "visualblocks",
		  menubar: "view",
		  toolbar: "visualblocks"
		  visualblocks_default_state: true
		});
	</script>

</body>
</html>