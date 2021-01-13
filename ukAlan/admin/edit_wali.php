<?php
session_start();
	
if(isset($_SESSION['username'])){
	$nama = $_SESSION['username'];
?>

<?php require_once('../Connections/koneksi.php'); ?>
<?php
$Result1="";
$pesan="";

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE wali_murid SET NISN=%s, Nama_ayah=%s, Pekerjaan_ayah=%s, Nama_ibu=%s, Pekerjaan_ibu=%s, Alamat_wali=%s, Telp_wali=%s WHERE Kode_wali=%s",
                       GetSQLValueString($_POST['NISN'], "char"),
                       GetSQLValueString($_POST['Nama_ayah'], "text"),
                       GetSQLValueString($_POST['Pekerjaan_ayah'], "text"),
                       GetSQLValueString($_POST['Nama_ibu'], "text"),
                       GetSQLValueString($_POST['Pekerjaan_ibu'], "text"),
                       GetSQLValueString($_POST['Alamat_wali'], "text"),
                       GetSQLValueString($_POST['Telp_wali'], "text"),
                       GetSQLValueString($_POST['Kode_wali'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
}

if($Result1){
	$pesan = "Input Data Berhasil.";
	}

$colname_wali_murid = "-1";
if (isset($_GET['Kode_wali'])) {
  $colname_wali_murid = $_GET['Kode_wali'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_wali_murid = sprintf("SELECT * FROM wali_murid WHERE Kode_wali = %s", GetSQLValueString($colname_wali_murid, "char"));
$wali_murid = mysql_query($query_wali_murid, $koneksi) or die(mysql_error());
$row_wali_murid = mysql_fetch_assoc($wali_murid);
$totalRows_wali_murid = mysql_num_rows($wali_murid);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SecondCom : hasil belajar siswa masa kini</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="main">
    <div id="header">
	  <div id="banner">
	    <div id="welcome">
        <span>Anda Login Sebagai Administrator, <?php echo $nama;?></span>
	      <h1><span>Aplikasi Pelaporan</span> Hasil Belajar Siswa</h1>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <h1>You'll Never Walk Alone</h1>
	    </div><!--close welcome_slogan-->
	  </div><!--close banner-->
    </div><!--close header-->

	<div id="menubar">
     <ul id="MenuBar1" class="MenuBarHorizontal">
<li class="current"><a href="index.php">Home</a></li>
<li><a class="MenuBarHorizontal" href="#">Input</a>
    <ul>
        <li><a href="input_siswa.php">Siswa</a></li>
        <li><a href="input_guru.php">Guru</a></li>
        <li><a href="input_nilai.php">Nilai</a></li>
        <li><a href="input_keahlian.php">Kompetensi Keahlian</a></li>
        <li><a href="input_sk.php">Standar Kompetensi</a></li>
        <li><a href="input_bidstudi.php">Bidang Studi</a></li>
        <li><a href="input_wali.php">Wali Murid</a></li>
      </ul>   
    </li>
         <li><a class="MenuBarItemSubmenu" href="#">Lihat</a>
      <ul>
        <li><a href="lihat_siswa.php">Siswa</a></li>
        <li><a href="lihat_guru.php">Guru</a></li>
        <li><a href="lihat_nilai.php">Nilai</a></li>
        <li><a href="lihat_keahlian.php">Kompetensi Keahlian</a></li>
        <li><a href="lihat_sk.php">Standar Kompetensi</a></li>
        <li><a href="lihat_bidstudi.php">Bidang Studi</a></li>
        <li><a href="lihat_wali.php">Wali Murid</a></li>  
      </ul>
    </li>
         <li><a href="version.php">Version</a></li>
          <li><a href="help.php">Help</a></li>
           <li><a onclick="return confirm('Apakah Anda Yakin Ingin Keluar Dari Sistem?')" href="../login/logout.php">Logout</a></li>
</ul>
</div>
</div><!--close menubar-->	
    
	<div id="site_content">		

	  <div class="sidebar_container">       
		<div class="sidebar">
          <div class="sidebar_item">
            
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		<div class="sidebar">
          <div class="sidebar_item">
                  
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
		<div class="sidebar">
          <div class="sidebar_item">
                    
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->  
		<div class="sidebar">
          <div class="sidebar_item">
                  
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->  		
        <div class="sidebar">
          <div class="sidebar_item">
           
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
      </div><!--close sidebar_container-->	
	
	  <div id="content">
        <div class="content_item">
        <h1><div align="center">EDIT DATA WALI MURID</div></h1>
        <div align="center"><form action="<?php echo $editFormAction; ?>" method="post" id="form1" enctype="multipart/form-data" name="form1">
          <table border="23" align="center" cellpadding="5" cellspacing="5">
            <tr valign="baseline">
              <td align="right"><strong>Kode Wali :</strong></td>
              <td><?php echo $row_wali_murid['Kode_wali']; ?></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>NISN :</strong></td>
              <td><input type="text" name="NISN" value="<?php echo htmlentities($row_wali_murid['NISN'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Nama Ayah :</strong></td>
              <td><input type="text" name="Nama_ayah" value="<?php echo htmlentities($row_wali_murid['Nama_ayah'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Pekerjaan :</strong></td>
              <td><input type="text" name="Pekerjaan_ayah" value="<?php echo htmlentities($row_wali_murid['Pekerjaan_ayah'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Nama Ibu :</strong></td>
              <td><input type="text" name="Nama_ibu" value="<?php echo htmlentities($row_wali_murid['Nama_ibu'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Pekerjaan :</strong></td>
              <td><input type="text" name="Pekerjaan_ibu" value="<?php echo htmlentities($row_wali_murid['Pekerjaan_ibu'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Alamat :</strong></td>
              <td><input type="text" name="Alamat_wali" value="<?php echo htmlentities($row_wali_murid['Alamat_wali'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right"><strong>Telp :</strong></td>
              <td><input type="text" name="Telp_wali" value="<?php echo htmlentities($row_wali_murid['Telp_wali'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right">&nbsp;</td>
              <td><input type="submit" value="Update record" /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_update" value="form1" />
          <input type="hidden" name="Kode_wali" value="<?php echo $row_wali_murid['Kode_wali']; ?>" />
        </div>
        </form>
        <p align="center"><?php echo $pesan; ?></p>
        <p>&nbsp;</p>
<!--<div class="content_image">
		   
	      </div>
		  
		  <br style="clear:both"/>
		  
		  <div class="content_container">
		    
		  	<div class="button_small">
		    </div><!--close button_small-->
		  </div><!--close content_container-->
          <!--<div class="content_container">
		          
		  	<div class="button_small">-->
		    </div><!--close button_small-->		  
		  </div><!--close content_container-->			  
		</div><!--close content_item-->
      </div><!--close content-->   
</div><!--close site_content--> 
    
	<!--<div id="content_grey">
	  <div class="content_grey_container_box">
		
		<div class="readmore">
		</div><!--close readmore-->
	  <!--</div><!--close content_grey_container_box-->
      <!--<div class="content_grey_container_box">
       
	    <!--<div class="readmore">
		</div><!--close readmore-->
	  <!--</div><!--close content_grey_container_box-->
      <!--<div class="content_grey_container_boxl">
		
	    <!--<div class="readmore">
		</div><!--close readmore-->	  
	  </div><!--close content_grey_container_box1-->      
	  <br style="clear:both"/>
    </div><!--close content_grey-->   
 
</div><!--close main-->
  
  <div id="footer"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  Copyright © 2015 <a href="http://www.second.com">SecondCom. All Rights Reserved | </a> Alan Corporation.
  </div>  
  
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
  </script>
</body>
</html>

<?php
mysql_free_result($wali_murid);

}
?>
