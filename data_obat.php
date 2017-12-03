<fieldset>
	<legend>Tampil Data Obat</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="Masukan Jenis/Nama.." style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_obat" value="Cari" style="padding: 3px;" />
		</form>
	</div>


	<table width="100%" border="1px" style="border-collapse: collapse;">
		<tr style="background-color: #09F;">
			<th>No.</th>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Jenis Obat</th>
			<th>Harga</th>
			<th>Stock</th>
			<th>Expired</th>
			<th>opsi</th>
		</tr>

		<?php
		$no = 1;

		$batas = 3;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal - 1) * $batas;
		}



		$sql = mysql_query("select * from tbl_obat LIMIT $posisi, $batas") or die (mysql_error());
		$no = $posisi + 1;

		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_obat = @$_POST['cari_obat'];
		if($cari_obat){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tbl_obat where jenis_obat like '%$inputan_pencarian%' nama_obat like '%$inputan_pencarian%'") or die(mysql_error());
				} else {
					$sql = mysql_query("select * from tbl_obat") or die(mysql_error());
				}
		} else {
			$sql = mysql_query("select * from tbl_obat") or die(mysql_error());
		}

		$cek = mysql_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<td colspan="8" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
			</tr>
			<?php

		} else {


		while ($data = mysql_fetch_array($sql)){
		?>
		
			<tr>
				<td align="center"><?php echo $no++."."; ?></td>
				<td align="center"><?php echo $data['kode_obat']; ?></td>
				<td align="center"><?php echo $data['nama_obat']; ?></td>
				<td align="center"><?php echo $data['jenis_obat']; ?></td>
				<td align="center"><?php echo $data['harga']; ?></td>
				<td align="center"><?php echo $data['stock']; ?></td>
				<td align="center"><?php echo $data['expired']; ?></td>
				<td align="center">
					<a href="?page=obat&action=edit_obat&kode_obat=<?php echo $data['kode_obat']; ?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=obat&action=hapus_obat&kodeobat=<?php echo $data['kode_obat']; ?>"><button>Hapus</button></a>
				</td>
			</tr>
		<?php
			}
		}
			
	?>

	</table>

	<div style="margin-top: 10px; float: left;">
		<?php 
		$jml = mysql_num_rows(mysql_query("select * from tbl_obat"));
		echo "Jumlah Data : <b>".$jml."</b>"; ?>
	</div>

</fieldset>