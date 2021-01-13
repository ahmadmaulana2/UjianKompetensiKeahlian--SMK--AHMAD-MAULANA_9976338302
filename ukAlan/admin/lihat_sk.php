<?php
session_start();
	
if(isset($_SESSION['username'])){
	$nama = $_SESSION['username'];
?>

<?php require_once('../Connections/koneksi.php'); ?>
<?php
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

if ((isset($_GET['Kode_sk'])) && ($_GET['Kode_sk'] != "")) {
  $deleteSQL = sprintf("DELETE FROM standar_kompetensi WHERE Kode_sk=%s",
                       GetSQLValueString($_GET['Kode_sk'], "char"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($deleteSQL, $koneksi) or die(mysql_error());
}

$maxRows_sk = 10;
$pageNum_sk = 0;
if (isset($_GET['pageNum_sk'])) {
  $pageNum_sk = $_GET['pageNum_sk'];
}
$startRow_sk = $pageNum_sk * $maxRows_sk;

mysql_select_db($database_koneksi, $koneksi);
$query_sk = "SELECT * FROM standar_kompetensi";
$query_limit_sk = sprintf("%s LIMIT %d, %d", $query_sk, $startRow_sk, $maxRows_sk);
$sk = mysql_query($query_limit_sk, $koneksi) or die(mysql_error());
$row_sk = mysql_fetch_assoc($sk);

if (isset($_GET['totalRows_sk'])) {
  $totalRows_sk = $_GET['totalRows_sk'];
} else {
  $all_sk = mysql_query($query_sk);
  $totalRows_sk = mysql_num_rows($all_sk);
}
$totalPages_sk = ceil($totalRows_sk/$maxRows_sk)-1;

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
        <h1><div align="center">DATA STANDAR KOMPETENSI</div></h1>
        <div align="left">
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table width="200" border="0">
  <tr>
    <td width="47"><strong>Search</strong></td>
    <td width="10"><strong>:</strong></td>
    <td width="129">
      <label>
        <input type="text" name="search" id="search" />
      </label>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="search2" id="search2" value="Search" />
      </label>
    </td>
  </tr>
</table>
</form>
</div>
<p>&nbsp;</p>
        <div align="center"><table border="23" align="center" cellpadding="5" cellspacing="5">
          <tr>
            <td width="300px" height="50"><strong>NO</strong></td>
            <td width="300px" height="50"><strong>Kode SK</strong></td>
            <td width="300px" height="50"><strong>Kode KK</strong></td>
            <td width="300px" height="50"><strong>Nama SK</strong></td>
            <td width="300px" height="50"><strong>Kelas SK</strong></td>
            <td colspan="2"><strong>Action</strong></td>
          </tr>
          <?php 
		  if ((isset($_POST['search2'])) && ($_POST['search'] != "")) {
					$search = $_POST['search'];
					$sql="SELECT * FROM standar_kompetensi WHERE Kode_sk='$search' OR Kode_kk='$search' OR Nama_sk='$search' OR Kelas_sk='$search' ;";
					$eksekusi_sql = mysql_query($sql,$koneksi) or die(mysql_error());
					$cari = mysql_fetch_assoc($eksekusi_sql);
              
			  $no = 1;
		  do { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $cari['Kode_sk']; ?></td>
              <td><?php echo $cari['Kode_kk']; ?></td>
              <td><?php echo $cari['Nama_sk']; ?></td>
              <td><?php echo $cari['Kelas_sk']; ?></td>
              <td><a href="edit_sk.php?Kode_sk=<?php echo $cari['Kode_sk']; ?>">Edit</a></td>
              <td><a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="lihat_sk.php?Kode_sk=<?php echo $cari['Kode_sk']; ?>">Delete</a></td>
            </tr>
            <?php 
			$no++;
			} while ($cari = mysql_fetch_assoc($eksekusi_sql)); 
			}else{
			  
			  $no = 1;
		  do { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row_sk['Kode_sk']; ?></td>
              <td><?php echo $row_sk['Kode_kk']; ?></td>
              <td><?php echo $row_sk['Nama_sk']; ?></td>
              <td><?php echo $row_sk['Kelas_sk']; ?></td>
              <td><a href="edit_sk.php?Kode_sk=<?php echo $row_sk['Kode_sk']; ?>">Edit</a></td>
              <td><a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="lihat_sk.php?Kode_sk=<?php echo $row_sk['Kode_sk']; ?>">Delete</a></td>
            </tr>
            <?php 
			$no++;
			} while ($row_sk = mysql_fetch_assoc($sk)); }?>
            </div>
        </table>
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
  
  <div id="footer"><br /><br /><br /><br /><br /><br /><br /><br />
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
mysql_free_result($sk);

}
?>
