
<body>
	<section class="main">
		<h2 class="form_title">Sửa tin tức</h2>
		<form action="index.php?goto=editedNews" method="post" enctype="multipart/form-data">	
		<?php extract($news) ?>
			<div class="text_input">
				<p class="form_label">Tiêu đề</p>
				<input type="text" name="tieu_de" value="<?= $tieu_de ?>" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Hình ảnh</p>
				<input type="file" name="hinh_anh" value="<?= $hinh_anh ?>" class="input_second">
			</div>
			<div class="text_input">
				<p class="form_label">Mô tả</p>
				<input type="text" name="mo_ta" value="<?= $mo_ta ?>" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Nội dung</p>
				<input type="text" name="noi_dung" value="<?= $noi_dung ?>" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">ngày đăng</p>
				<input type="date" name="ngay_dang" value="<?= $ngay_dang ?>" class="input_second"><br>
			</div>
			<br>
			
			<div class="button">
				<input type="hidden" name="id" value="<?= $ma_tin ?>" > 	
				<input type="submit" value="Cập nhật" name="updateNews" class="input_button btn">
				<input type="reset" value="Xóa hết" class="input_button btn">
				<a href="index.php?goto=listNews"><input type="button" value="Danh sách" class="btn"></a>
			</div>
			<?= isset($thongbao) ? $thongbao : '' ?>
        </form>
	</section>
</body>

</html>