<fieldset>
	<legend>Rekam Medis Pasien</legend>

	<form action="" method="post">
		<table>
			<tr>
				<td>No. Rekam Medis</td>
				<td>:</td>
				<td><select style="width: 57%">
					<option value="">--No. Rekam Medis--</option>
					<option value="">R001</option>
					<option value="">R001</option>
				</select></td>
			</tr>

			<tr>
				<td>Nama Dokter</td>
				<td>:</td>
				<td><input type="text" name="nm_dokter"></td>
			</tr>

			<tr>
				<td>Nama Pasien</td>
				<td>:</td>
				<td><input type="text" name="nm_pasien"></td>
			</tr>

			<tr>
				<td>Tanggal Periksa</td>
				<td>:</td>
				<td><input type="date" name="tgl_periksa" style="width: 55%"></td>
			</tr>

			<tr>
				<td>Keluhan</td>
				<td>:</td>
				<td><textarea name="keluhan" cols="40" rows="4">
					
				</textarea>
				</td>
			</tr>


			<tr>
				<td>Diagnosa</td>
				<td>:</td>
				<td><input type="text" name="diagnosa"></td>
			</tr>

			<tr>
				<td>Resep</td>
				<td>:</td>
				<td><textarea name="resep" cols="40" rows="4"></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah" /> <input type="reset" value="Batal" /></td>
			</tr>
		</table>
	</form>
</fieldset>