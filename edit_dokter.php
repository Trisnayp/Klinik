<fieldset>
    <legend>Edit Data Dokter</legend>
    
    <?php
    $kodedokter = @$_GET['kode_dokter'];
    $sql = mysql_query("select * from tbl_dokter where kode_dokter = '$kodedokter' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode Dokter</td>
                <td>:</td>
                <td><input type="text" name="kode_dokter" value="<?php echo $data['kode_dokter']; ?>" disabled="disabled" /></td>
            </tr>
            
            <tr>
                <td>Nama Dokter</td>  
                <td>:</td>
                <td><input type="text" name="nama_dokter" value="<?php echo $data['nama_dokter']; ?>" /></td>
            </tr>
            
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" style="width: 97%" value="<?php echo $data['tgl_lahir']; ?>"/></td>
            </tr>
            
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"/></td>
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
                <td><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>"/></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"/></td>
            </tr>
                        
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="edit_dokter" value="Edit" /> <input type="reset" value="Reset" /></td>
            </tr> 
        </table>
     </form>
     
    <?php
    $nama_dokter = @$_POST['nama_dokter'];
    $tgl_lahir = @$_POST['tgl_lahir'];
    $tempat_lahir = @$_POST['tempat_lahir'];
    $jk = @$_POST['jk'];
    $no_telp = @$_POST['no_telp'];
    $alamat = @$_POST['alamat'];
    
     $edit_dokter = @$_POST['edit_dokter'];
     if($edit_dokter){
        if($nama_dokter == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_telp == "" || $alamat == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_dokter set nama_dokter= '$nama_dokter',  tgl_lahir = '$tgl_lahir' , tempat_lahir = '$tempat_lahir' , jk = '$jk' , no_telp = '$no_telp' , alamat = '$alamat' where kode_dokter = '$kodedokter'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=dokter&action=lihat_data_dokter";
             </script>
             <?php
         }
     }
     ?>
        
</fieldset>
     