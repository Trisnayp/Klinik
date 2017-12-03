<fieldset>
    <legend>Edit Data Obat</legend>
    
    <?php
    $kodeobat = @$_GET['kode_obat'];
    $sql = mysql_query("select * from tbl_obat where kode_obat = '$kodeobat' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode_Obat</td>
                <td>:</td>
                <td><input type="text" name="kode_obat" value="<?php echo $data['kode_obat']; ?>" disabled="disabled" /></td>
            </tr>
            
            <tr>
                <td>Nama Obat</td>  
                <td>:</td>
                <td><input type="text" name="nama_obat" value="<?php echo $data['nama_obat']; ?>" /></td>
            </tr>
            
            <tr>
                <td>Jenis Obat</td>  
                <td>:</td>
                <td><input type="text" name="jenis_obat" value="<?php echo $data['jenis_obat']; ?>" /></td>
            </tr>
            
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"/></td>
            </tr>
            
            <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input type="text" name="stock" value="<?php echo $data['stock']; ?>"/></td>
            </tr>
            <tr>
                <td>Expired</td>
                <td>:</td>
                <td><input type="date" name="expired" style= "width:97%" value="<?php echo $data['expired']; ?>"/></td>
            </tr>
      
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="edit_obat" value="Edit" /> <input type="reset" value="Reset" /></td>
            </tr> 
        </table>
     </form>
     
    <?php
    $nama_obat = @$_POST['nama_obat'];
    $jenis_obat = @$_POST['jenis_obat'];
    $harga = @$_POST['harga'];
    $stock = @$_POST['stock'];
    $expired = @$_POST['expired'];
    
     $edit_obat = @$_POST['edit_obat'];
     if($edit_obat){
         if($nama_obat == "" || $jenis_obat == "" || $harga == "" || $stock == "" || $expired == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_obat set nama_obat = '$nama_obat' , jenis_obat = '$jenis_obat' , harga = '$harga' , stock = '$stock' , expired = '$expired'
                 where kode_obat = '$kodeobat'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=obat&action=lihat_data_obat";
             </script>
             <?php
         }
     }
     ?>
        
</fieldset>
     