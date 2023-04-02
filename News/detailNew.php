<?php 
	extract($new);
	$user = getOneAccount($ma_tk); 
    extract($user);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="new-container">
		<header class="new-header">
			<h1><?= $tieu_de ?></h1>
		</header>
		<section class="new-main">
			<p class="main-desc"><?= $mo_ta ?></p>
			<div class="main-image">
				<img src=".//<?= $hinh_anh ?>" alt="">
			</div>
			<p class="main-desc"><?= $noi_dung ?></p>
		</section>
		<footer class="new-footer">
			<span>Tác giả: <?= $ten_tk ?></span>
		</footer>
	</div>
</body>
</html>