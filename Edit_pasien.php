<fieldset>
    <legend>Edit Data Pasien</legend>
    
    <?php
    $norm = @$_GET['no_rm'];
    $sql = mysql_query("select * from tbl_pasien where no_rm = '$norm' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>No. Rekam Medis</td>
                <td>:</td>
                <td><input type="text" name="no_rm" value="<?php echo $data['no_rm']; ?>" disabled="disabled" /></td>
            </tr>
            
            <tr>
                <td>Tanggal Masuk</td>
                <td>:</td>
                <td><input type="date" name="tgl_msk" style="width: 97%" value="<?php echo $data['tgl_msk']; ?>" /></td>
            </tr>
            
            <tr>
                <td>Nama Pasien</td>  
                <td>:</td>
                <td><input type="text" name="nama_pasien" value="<?php echo $data['nama_pasien']; ?>" /></td>
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
                <td><input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"/></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"/></td>
            </tr>
                        
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="edit" value="Edit" /> <input type="reset" value="Reset" /></td>
            </tr> 
        </table>
     </form>
     
    <?php
    $tgl_msk = @$_POST['tgl_msk'];
    $nama_pasien = @$_POST['nama_pasien'];
    $tgl_lahir = @$_POST['tgl_lahir'];
    $tempat_lahir = @$_POST['tempat_lahir'];
    $jk = @$_POST['jk'];
    $no_hp = @$_POST['no_hp'];
    $alamat = @$_POST['alamat'];
    
     $edit_pasien = @$_POST['edit'];
     if($edit_pasien){
         if($tgl_msk == "" || $nama_pasien == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_hp == "" || $alamat == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_pasien set tgl_msk= '$tgl_msk', nama_pasien = '$nama_pasien', tgl_lahir = '$tgl_lahir' , tempat_lahir = '$tempat_lahir' , jk = '$jk' , no_hp = '$no_hp' , alamat = '$alamat' where no_rm = '$norm'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=pasien&action=lihat_data_pasien";
             </script>
             <?php
         }
     }
     ?>
        
</fieldset>
     