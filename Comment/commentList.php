<p class=""><?= isset($thongbao) ? $thongbao : '' ?></p>
<p class=""><?= isset($thongbao_xoa) ? $thongbao_xoa : '' ?></p>

<h2 class="form_title">DANH SÁCH BÌNH LUẬN</h2>
<table border="" cellspacing="0">
	<tr class="row">
		<th class="type"></th>
		<th class="type">ID</th>
		<th class="type">Nội Dung</th>
		<th class="type">IdUser</th>
		<th class="type">Tên phòng</th>
		<th class="type">Thời Gian</th>
		<th colspan="2" class="type">Thao Tác</th>
	</tr>
	<?php
	foreach ($listBinhluan as $binhluan) {
		extract($binhluan);
		$deleteBinhluan = "index.php?goto=deleteBinhluan&id=" . $ma_bl;
		$xemchitiet = "../index.php?goto=detaiRooms_booking&id=" . $ma_phong;
		$item = getOneRoom($ma_phong);
		extract($item);
	?>
		<tr class="row1">
			<td>
				<a href="<?= $xemchitiet ?>">
					<input type="button" value="Xem chi tiết" class="cart-row btn">
				</a>
			</td>
			<td><?= $ma_bl ?></td>
			<td><?= $noi_dung ?></td>
			<td><?= $ma_tk ?></td>
			<td><?= $ten_phong ?></td>
			<td><?= $thoi_gian ?></td>
			<td>
				<a href="<?= $deleteBinhluan ?>">
					<input type="button" value="Delete" class="btn btn_delete">
				</a>
			</td>
		</tr>
	<?php  }  ?>
</table>