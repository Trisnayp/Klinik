<fieldset>
	<legend>Tambah Data Dokter</legend>

	<?php
	$carikode = mysql_query("select max(kode_dokter) from tbl_dokter") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "R".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "R001";
	}
	?>

	<form action="" method="post">
		<table>
			<tr>
				<td>Kode Dokter</td>
				<td>:</td>
				<td><input type="text" name="kode_dokter" value="<?php echo $hasilkode; ?>"</td>
			</tr>
			<tr>
				<td>Nama Dokter</td>
				<td>:</td>
				<td><input type="text" name="nama_dokter" style="width: 97%"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="date" name="tgl_lahir" style="width: 97%"></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input type="text" name="tempat_lahir" style="width: 97%"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><input type="radio" name="jk" value="Laki-laki" checked>Laki-laki<input type="radio" name="jk" value="Perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td>:</td>
				<td><input type="text" name="no_telp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah" /> <input type="reset" value="Batal" /></td>
			</tr>
		</table>
	</form>

	<?php
	$kode_dokter = @$_POST['kode_dokter'];
	$nama_dokter = @$_POST['nama_dokter'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$tempat_lahir = @$_POST['tempat_lahir'];
	$jk = @$_POST['jk'];
	$no_telp = @$_POST['no_telp'];
	$alamat = @$_POST['alamat'];

	$tambah_dokter = @$_POST['tambah'];

	if($tambah_dokter) {
		if($kode_dokter == "" || $nama_dokter == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_telp == "" || $alamat == "") {
			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong !");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_dokter values('$kode_dokter', '$nama_dokter', '$tgl_lahir', '$tempat_lahir', '$jk', '$no_telp', '$alamat')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data pasien berhasil !");
				window.location.href="?page=dokter&action=lihat_data_dokter";
			</script>
			<?php
		}
	}
	?>
</fieldset>