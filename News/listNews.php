<body>
	<h2 class="form_title">DANH SÁCH TIN TỨC</h2>

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
	<button class="btn">
		<a href="index.php?goto=addNews1">Thêm mới</a>
	</button>

	<!-- Table list products -->
	<table class="table" border="1" cellspacing="0">
		<tr class="row cart-row">
			<th class="type">Mã tin</th>
			<th class="type">Tiêu đề</th>
			<th class="type">hình ảnh</th>
			<th class="type">Mô tả</th>
			<th class="type">Nội dung</th>
			<th class="type">Ngày đăng</th>
			<th class="type" colspan="2">Thao tác</th>
		</tr>

		<?php
		foreach ($listNews as $tintuc) {
			// var_dump($listNews);
			extract($tintuc);
			// var_dump($ngaydang);
			$editNews = "index.php?goto=editNews&id=" . $ma_tin;
			$deleteNews = "index.php?goto=deleteNews&id=" . $ma_tin;
			?>
			<tr class="row1">
				<td>
					<?= $ma_tin ?>
				</td>
				<td>
					<?= $tieu_de ?>
				</td>
				<td>
					<img src="<?= $hinh_anh ?>" style="width: 150px; height: 150px">
				</td>
				<td>
					<?= $mo_ta ?>
				</td>
				<td>
					<?= $noi_dung ?>
				</td>
				<td>
					<?= $ngay_dang ?>
				</td>

				<td class="thaotac">
					<a href="<?= $editNews ?>">
						<input type="button" value="Cập nhật" class="btn btn_edit">
					</a>
				</td>
				<td class="thaotac">
					<a href="<?= $deleteNews ?>">
						<input type="button" value="Xóa" class="btn btn_delete"
							onclick="return confirm('Bạn có chắc chắn muốn xóa không!')">
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>