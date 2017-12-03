<?php
$kodedokter = @$_GET['kodedokter'];

mysql_query("delete from tbl_dokter where kode_dokter = '$kodedokter'")
?>

<script type="text/javascript">
	window.location.href="?page=dokter&action=lihat_data_dokter";
</script>