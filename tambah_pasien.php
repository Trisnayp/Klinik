<fieldset>
	<legend>Tambah Data Pasien</legend>

	<?php
	$carikode = mysql_query("select max(no_rm) from tbl_pasien") or die (mysql_error());
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
				<td>No Rekam Medis</td>
				<td>:</td>
				<td><input type="text" name="no_rm" value="<?php echo $hasilkode; ?>"</td>
			</tr>
			<tr>
				<td>Tanggal Masuk</td>
				<td>:</td>
				<td><input type="date" name="tgl_msk" style="width: 97%"></td>
			</tr>
			<tr>
				<td>Nama Pasien</td>
				<td>:</td>
				<td><input type="text" name="nama_pasien"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="date" name="tgl_lahir" style="width: 97%"></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input type="text" name="tempat_lahir"></td>
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
				<td><input type="text" name="no_hp"></td>
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
	$no_rm = @$_POST['no_rm'];
	$tgl_msk = @$_POST['tgl_msk'];
	$nama_pasien = @$_POST['nama_pasien'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$tempat_lahir = @$_POST['tempat_lahir'];
	$jk = @$_POST['jk'];
	$no_hp = @$_POST['no_hp'];
	$alamat = @$_POST['alamat'];

	$tambah_pasien = @$_POST['tambah'];

	if($tambah_pasien) {
		if($no_rm == "" || $tgl_msk == "" || $nama_pasien == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_hp == "" || $alamat == "") {
			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong !");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_pasien values('$no_rm', '$tgl_msk', '$nama_pasien', '$tgl_lahir', '$tempat_lahir', '$jk', '$no_hp', '$alamat')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data pasien berhasil !");
				window.location.href="?page=pasien&action=lihat_data_pasien";
			</script>
			<?php
		}
	}
	?>
</fieldset>