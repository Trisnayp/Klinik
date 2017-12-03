<?php
@session_start();
include "koneksi.php";

if(@$_SESSION['dokter']){
	header("location: index_dokter.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
<style type="text/css">
body{
	font-family: arial;
	font-size: 14px;
	background-color: #222;
}

#utama{
	width: 300px;
	margin: 0 auto;
	margin-top: 12%;
	
}

#judul{
	padding: 15px;
	text-align: center;
	color: #fff;
	font-size: 25px;
	background-color: #69d2e7;
	border-top-right-radius: 15px;
	border-top-left-radius: 15px;
	border-bottom: 5px solid #0AA;
}

#inputan{
	background-color: #e0e4cc;
	padding: 20px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;

}

input{
	padding: 10px;
	border: 0;

}

.lg{
	width: 240px;
	cursor: pointer;
}

.btn{
	background-color: #69d2e7;
	border-radius: 5px;
	color: #fff;

}

.btn:hover{
	background-color:   #a7dbd8;
	cursor: pointer;

}
</style>
</head>
<body>

<div id="utama"  style="background: url(image/bc3.jpg);">
	<div id="judul">
		Login Admin
	</div>

	<div id="inputan">
	<form action="" method="post">
		<div>
			<input type="text" name="user" placeholder="Username" class="lg" />
		</div>
		<div style="margin-top: 10px;">
			<input type="password" name="pass" placeholder="Password" class="lg" />
		</div>
		<div style="margin-top: 10px;">
			<input type="submit" name="login" value="Login" class="btn" />
		</div>
	</form>

	<?php
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	$login = @$_POST['login'];

	if($login){
		if ($user == "" || $pass == "") {
			?><script type="text/javascript">alert ("Username / password tidak boleh kosong");</script><?php
		} else{
			$sql = mysql_query("select * from tbl_login where username = '$user' and password = md5('$pass')") or die (mysql_error());
			$data = mysql_fetch_array($sql);
			$cek = mysql_num_rows($sql);
			if($cek >=1 ){
				@$_SESSION['dokter'] = $data['kode_user'];
				header("location: index_dokter.php");
			} else {
				echo "Login Gagal";
			}
		}
	}

	?>
	</div>
</div>

</body>
</html>

<?php
}
?>

