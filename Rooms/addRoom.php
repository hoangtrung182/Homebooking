
<body>
	<section class="main">
		<h2 class="form_title">Form thêm mới sản phẩm</h2>
		<form action="index.php?goto=addRoom" method="post" enctype="multipart/form-data">
			<p class="form_label">Loại Phòng</p>
			<select name="maloai" id="" class="input_second">
				<?php foreach ($listCates as $loaiphong) {
					extract($loaiphong);
					 ?>
					<option value="<?= $ma_lp ?>">
						<?= $ten_lp ?>
					</option>
				<?php } ?>
			</select><br>
			<div class="text_input">
				<input type="hidden" name="iditem" disabled placeholder="Không thay đổi mã loại hàng"
					class="input_second">
			</div>
			<div class="text_input">
				<p class="form_label">Tên Phòng</p>
				<input type="text" name="name" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Giá Phòng</p>
				<input type="number" name="price" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Giảm giá</p>
				<input type="number" name="discount" class="input_second"><br>
			</div>
			<div class="text_input">
				<p class="form_label">Hình ảnh</p>
				<input type="file" name="avatar" class="input_second">
			</div>
			<div class="text_input">
				<p class="form_label">Mô tả</p>
				<textarea name="desc" cols="60" rows="7" class="input_mota input_second"></textarea><br>
				<br>
			</div>
			<div class="button">
				<input type="submit" value="Thêm" name="addNewRoom" class="input_button btn">
				<input type="reset" value="Xóa hết" class="input_button btn">
				<a href="index.php?goto=listItems"><input type="button" value="Danh sách" class="btn"></a>
			</div>
			<?= isset($thongbao) ? $thongbao : '' ?>
		</form>
	</section>
</body>

</html>