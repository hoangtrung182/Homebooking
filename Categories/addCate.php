
<section class="main">
	<h2 class="form_title">Tạo Mới Loại Phòng </h2>
	<form action="index.php?goto=addCate2" method="post">
		<!-- <p>Mã loại phòng</p> -->
		<input type="hidden" name="maloai" disabled="" class="input_second"  placeholder="Không được thay đổi mã loại" >
		<p class="form_label">Tên Loại Phòng</p>
		<input type="text"
			 name="tenloai"
			 placeholder="Nhập tên loại hàng..." 
			 class="input_second">
		<div class="button">
			<input type="submit" value="Thêm" name="addNewCate" class="input_submit btn">
			<input type="reset" value="Xóa hết" class="input_reset btn">
			<a href="index.php?goto=listCates"><input type="button" value="Danh sách" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>