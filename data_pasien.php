<fieldset>
	<legend>Tampil Data Pasien</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="Masukan No. RM/nama.." style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_pasien" value="Cari" style="padding: 3px;" />
		</form>
	</div>
	

	<table width="100%" border="1px" style="border-collapse: collapse;">
		<tr style="background-color: #09F;">
			<th>No</th>
			<th>No Rekam Medis</th>
			<th>Tanggal Masuk</th>
			<th>Nama Pasien</th>
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

		$sql = mysql_query("select * from tbl_pasien LIMIT $posisi, $batas") or die (mysql_error());
		$no = $posisi + 1;

		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_pasien = @$_POST['cari_pasien'];
		if($cari_pasien){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tbl_pasien where nama_pasien like '%$inputan_pencarian%' or no_rm like '%$inputan_pencarian%'") or die(mysql_error());
				} else {
					$sql = mysql_query("select * from tbl_pasien") or die(mysql_error());
				}
		} else {
			$sql = mysql_query("select * from tbl_pasien") or die(mysql_error());
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
				<td align="center"><?php echo $data['no_rm']; ?></td>
				<td align="center"><?php echo $data['tgl_msk']; ?></td>
				<td align="center"><?php echo $data['nama_pasien']; ?></td>
				<td align="center"><?php echo $data['tgl_lahir']; ?></td>
				<td align="center"><?php echo $data['tempat_lahir']; ?></td>
				<td align="center"><?php echo $data['jk']; ?></td>
				<td align="center"><?php echo $data['no_hp']; ?></td>
				<td align="center"><?php echo $data['alamat']; ?></td>
				<td align="center">
					<a href="?page=pasien&action=edit&no_rm=<?php echo $data['no_rm']; ?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=pasien&action=hapus&norm=<?php echo $data['no_rm']; ?>"><button>Hapus</button></a>
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