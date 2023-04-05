<h2 class="form_title">BẢN TIN HẰNG NGÀY</h2>
<?php
foreach ($listNews as $News) {
	extract($News);
	$user = getOneAccount($ma_tk);
	extract($user);
	?>
	<li class="new-item">
		<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
			<img src=".//<?= $hinh_anh ?>" alt="">
		</a>
		<div class="new-info">
			<div class="">
				<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
					<h3>
						<?= $tieu_de ?>
					</h3>
				</a>
				<em>
					<?= $mo_ta ?>
				</em>
			</div>
			<div class="">
				<p>Tác giả:
					<?= $ten_tk ?>
				</p>
			</div>
		</div>
	</li>
	<?php
}
?>