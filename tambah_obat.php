<fieldset>
	<legend>Tambah Data Obat</legend>

	<?php
	$carikode = mysql_query("select max(kode_obat) from tbl_obat") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "B".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "B001";
	}
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kode Obat</td>
				<td>:</td>
				<td><input type="text" name="kode_obat" value="<?php echo $hasilkode; ?>"</td>
			</tr>
			
			<tr>
				<td>Nama Obat</td>
				<td>:</td>
				<td><input type="text" name="nama_obat" /></td>
			</tr>
			
			<tr>
				<td>Jenis Obat</td>
				<td>:</td>
				<td><input type="text" name="jenis_obat" /></td>
			</tr>
			
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="text" name="harga" /></td>
			</tr>
			
			<tr>
				<td>Stock Obat</td>
				<td>:</td>
				<td><input type="text" name="stock" /></td>
			</tr>
			
			<tr>
				<td>Expired</td>
				<td>:</td>
				<td><input type="date" name="expired" style="width: 97%" /></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah" /> <input type="submit" name="reset" value="Batal"></td>
			</tr>
		</table>
	</form>

	<?php
	$kode_obat = @$_POST['kode_obat'];
	$nama_obat = @$_POST['nama_obat'];
	$jenis_obat = @$_POST['jenis_obat'];
	$harga = @$_POST['harga'];
	$stock = @$_POST['stock'];
	$expired = @$_POST['expired'];

	$tambah_obat = @$_POST['tambah'];

	if($tambah_obat) {
		if($kode_obat == "" || $nama_obat == "" || $jenis_obat == "" || $harga == "" || $stock == "" || $expired == "") {
			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong!");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_obat values ('$kode_obat', '$nama_obat', '$jenis_obat', '$harga', '$stock', '$expired')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data obat berhasil");
				window.location.href="?page=obat&action=lihat_data_obat";
			</script>
			<?php
		}
	}
	?>
</fieldset>