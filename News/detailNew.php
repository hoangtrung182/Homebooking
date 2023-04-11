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
				<!-- <img src=".//<?= $hinh_anh ?>" alt=""> -->
				<img src="https://picsum.photos/500/250" alt="">
			</div>
			<p class="main-desc"><?= $noi_dung ?></p>
			<p class="main-desc">Với quy định này, việc có thưởng cho người lao động hay không sẽ được xác định dựa trên kết quả sản xuất, kinh doanh, mức độ hoàn thành công việc của người đó. Điều này được quyết định bởi người sử dụng lao động.</p>
			<p class="main-desc">Do đó, doanh nghiệp có thể lựa chọn thưởng hoặc không thưởng cho người lao động nhân dịp nghỉ ngày Chiến thắng 30/4 và Quốc tế lao động 1/5.

			Tuy nhiên, nếu quy chế thưởng của doanh nghiệp hoặc trong các thỏa thuận khác với người lao động có ghi nhận về việc thưởng tiền hoặc hiện vật vào dịp này, doanh nghiệp phải thực hiện theo đúng cam kết.

			Mức thưởng và hình thức thưởng cũng do chủ sử dụng lao động quyết định. Các khoản tiền thưởng dịp 30/4 và 01/5 sẽ không có mức cố định. Tùy vào nguồn tài chính của doanh nghiệp mà người sử dụng lao động có thể thưởng nhiều tiền hoặc thưởng ít tiền cho người lao động.

			Bên cạnh đó, nếu có sự thỏa thuận, người lao động đồng ý đi làm vào ngày Giỗ tổ Hùng Vương, ngày 30/4 và 1/5 thì được xem là làm thêm giờ.

			Cụ thể, người lao động được trả lương ít nhất bằng 300% tiền lương tính theo đơn giá tiền lương hoặc tiền lương thực trả cho công việc đang làm, chưa kể tiền lương ngày lễ, tết, ngày nghỉ có hưởng lương đối với người lao động hưởng lương ngày.</p>
		</section>
		<footer class="new-footer">
			<span>Tác giả: <?= $ho_ten ?></span>
		</footer>
	</div>
</body>
</html>