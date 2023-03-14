<section class="main">
	<h2 class="form_title">Chỉnh sửa loại phòng</h2>

	<?php extract($item); ?>		
	<form action="index.php?goto=editedCate" method="post">
		<!-- <p>Mã loại</p> -->
		<input type="hidden" name="maloai" disabled="" 
				class="input_second" 
				placeholder="Không được thay đổi mã loại">
		<p class="form_label">Tên Loại</p>
		<input type="text" name="tenloai"
			   placeholder="Nhập tên loại hàng..." 
			   class="input_second"
			   value="<?= $ten_lp ?>">
		<div class="button">
			<input type="hidden" name="id" value="<?= $ma_lp ?>"> 
			<input type="submit" value="Lưu lại" name="updateCate" class="input_submit btn">
			<input type="reset" value="Xóa hết" class="input_reset btn">
			<a href="index.php?goto=listCates"><input type="button" value="Danh sách" class="btn"></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>
	