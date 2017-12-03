<?php
$kodeobat = @$_GET['kodeobat'];

mysql_query("delete from tbl_obat where kode_obat = '$kodeobat'")
?>

<script type="text/javascript">
	window.location.href="?page=obat&action=lihat_data_obat";
</script>