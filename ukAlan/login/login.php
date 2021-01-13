<?php

session_start();

$koneksi=mysql_connect("localhost", "root", "");

mysql_select_db("ukalan",$koneksi);

$username=$_POST['username'];
$password=md5($_POST['password']);

$query="select * from admin where username='$username' and password='$password'";
$hasil=mysql_query("$query") or die (mysql_error());

$kode=mysql_fetch_array($hasil);

$cek=mysql_num_rows($hasil);

if ($cek==1){
$_SESSION['username']=$kode['username'];
?>
<script language=javascript>document.location.href="../admin/";</script>
<?php
}else{
?>
<script>alert("Login Gagal!");document.location.href="../admin/"</script>
<?php

}
?>