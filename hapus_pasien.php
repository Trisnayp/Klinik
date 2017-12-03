<?php
$norm = @$_GET['norm'];

mysql_query("delete from tbl_pasien where no_rm = '$norm'")
?>

<script type="text/javascript">
	window.location.href="?page=pasien&action=lihat_data_pasien";
</script>