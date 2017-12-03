<fieldset>
	<legend>Tampil Data Dokter</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="Masukan Nama/spesialis.." style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_dokter" value="Cari" style="padding: 3px;" />
		</form>
	</div>
	

	<table width="100%" border="1px" style="border-collapse: collapse;">
		<tr style="background-color: #09F;">
			<th>No</th>
			<th>Kode Dokter</th>
			<th>Nama Dokter</th>
			<th>Tanggal Lahir</th>
			<th>Tempat Lahir</th>
			<th>Jenis Kelamin</th>
			<th>No Hp</th>
			<th>Alamat</th>
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

		$sql = mysql_query("select * from tbl_dokter LIMIT $posisi, $batas") or die (mysql_error());
		$no = $posisi + 1;

		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_dokter = @$_POST['cari_dokter'];
		if($cari_dokter){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tbl_dokter where nama_dokter like '%$inputan_pencarian%' or spesialis like '%$inputan_pencarian%'") or die(mysql_error());
				} else {
					$sql = mysql_query("select * from tbl_dokter") or die(mysql_error());
				}
		} else {
			$sql = mysql_query("select * from tbl_dokter") or die(mysql_error());
		}

		$cek = mysql_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<td colspan="10" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
			</tr>
			<?php

		} else {

		while ($data = mysql_fetch_array($sql)){
		?>
		
			<tr>
				<td align="center"><?php echo $no++."."; ?></td>
				<td align="center"><?php echo $data['kode_dokter']; ?></td>
				<td align="center"><?php echo $data['nama_dokter']; ?></td>
				<td align="center"><?php echo $data['tgl_lahir']; ?></td>
				<td align="center"><?php echo $data['tempat_lahir']; ?></td>
				<td align="center"><?php echo $data['jk']; ?></td>
				<td align="center"><?php echo $data['no_telp']; ?></td>
				<td align="center"><?php echo $data['alamat']; ?></td>
				<td align="center">
					<a href="?page=dokter&action=edit_dokter&kode_dokter=<?php echo $data['kode_dokter']; ?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=dokter&action=hapus_dokter&kodedokter=<?php echo $data['kode_dokter']; ?>"><button>Hapus</button></a>
				</td>
			</tr>
		<?php
		}
	}
?>
	</table>
	<div style="margin-top: 10px; float: left;">
		<?php 
		$jml = mysql_num_rows(mysql_query("select * from tbl_dokter"));
		echo "Jumlah Data : <b>".$jml."</b>"; ?>
	</div>

</fieldset>