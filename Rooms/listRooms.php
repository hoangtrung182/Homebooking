<body>
	<h2 class="form_title">DANH SÁCH PHÒNG</h2>
	<p class="form_label">Tìm kiếm sản phẩm</p>
	<form action="index.php?search=rooms" method="post">
		<input type="text" name="keyw" id="filter-input" class="input_one" placeholder="Nhập tên sản phẩm.....">
		<select name="ma_lp" id="" class="input_one">
			<option value="0" selected>Tất cả</option>
			<?php foreach ($listCates as $loaiphong) {
				extract($loaiphong); ?>
				<option value="<?= $ma_lp ?>">
					<?= $ten_lp ?>
				</option>
			<?php } ?>
		</select>
		<input type="submit" id="btn-submit_product" class="btn" value="Tìm Kiếm" name="searchRooms">
	</form>
	<?php
	$thongbao = isset($thongbao) ? $thongbao : '';
	$thongbao_xoa = isset($thongbao_delete) ? $thongbao_delete : '';
	$thongbao_sua = isset($thongbao_update) ? $thongbao_update : '';
	?>
	<p class="">
		<?= $thongbao ?>
	</p>
	<p class="">
		<?= $thongbao_xoa ?>
	</p>
	<p class="">
		<?= $thongbao_sua ?>
	</p>
	<!-- Thêm mới -->
	<button class="btn btn-add">
		<a href="index.php?goto=addRooms1">Thêm mới</a>
	</button>

	<!-- Table list products -->
	<table class="table" border="1" cellspacing="0">
		<tr class="row cart-row">
			<th class="type">id</th>
			<th class="type">Tên Phòng</th>
			<th class="type">Giá</th>
			<th class="type">Giảm Giá</th>
			<th class="type">Hình Ảnh</th>
			<th class="type">Mã loại</th>
			<th class="type" colspan="2">Thao tác</th>
		</tr>

		<?php
		foreach ($listRooms as $phong) {
			extract($phong);
			$editRoom = "index.php?goto=editRoom&id=" . $ma_phong;
			$deleteRoom = "index.php?goto=deleteRoom&id=" . $ma_phong;
		?>
			<tr class="row1">
				<td>
					<?= $ma_phong ?>
				</td>
				<td>
					<?= $ten_phong ?>
				</td>
				<td>
					<?= $gia ?>
				</td>
				<td>
					<?= $giam_gia ?>
				</td>
				<td><img src="<?= $avatar ?>" style="width: 150px; height: 150px"></td>
				<?php
				$cate = getOneItem($ma_lp);
				extract($cate);
				?>
				<td>
					<?= $ten_lp ?>
				</td>
				<td class="thaotac">
					<a href="<?= $editRoom ?>">
						<input type="button" value="Cập nhật" class="btn btn_edit">
					</a>
				</td>
				<td class="thaotac">
					<a href="<?= $deleteRoom ?>">
						<input type="button" value="Xóa" class="btn btn_delete" onclick="return confirm('Bạn có chắc chắn muốn xóa không!')">
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>