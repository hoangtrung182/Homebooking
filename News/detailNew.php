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
	<div class="box-news">
		<h1><?= $tieu_de ?></h1>
		<p><?= $mo_ta ?></p>

		<img src=".//<?= $hinh_anh ?>" width="800px" alt="">
		<p><?= $noi_dung ?></p>
		<span>Tác giả: <?= $Ho_ten ?></span>
	</div>

	<!-- Comments -->
	<div class="row_product">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script>
			$(document).ready(function () {
				$("#comment").load("../Binhluan/formBinhLuan.php", { idpro:} )
			});
		</script>
		<div>
			<span id="comment"></span>
		</div>
	</div>
</body>
</html>