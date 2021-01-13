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

if ((isset($_GET['NISN'])) && ($_GET['NISN'] != "")) {
  $deleteSQL = sprintf("DELETE FROM nilai WHERE NISN=%s",
                       GetSQLValueString($_GET['NISN'], "char"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($deleteSQL, $koneksi) or die(mysql_error());
}

$maxRows_nilai = 10;
$pageNum_nilai = 0;
if (isset($_GET['pageNum_nilai'])) {
  $pageNum_nilai = $_GET['pageNum_nilai'];
}
$startRow_nilai = $pageNum_nilai * $maxRows_nilai;

mysql_select_db($database_koneksi, $koneksi);
$query_nilai = "SELECT * FROM nilai";
$query_limit_nilai = sprintf("%s LIMIT %d, %d", $query_nilai, $startRow_nilai, $maxRows_nilai);
$nilai = mysql_query($query_limit_nilai, $koneksi) or die(mysql_error());
$row_nilai = mysql_fetch_assoc($nilai);

if (isset($_GET['totalRows_nilai'])) {
  $totalRows_nilai = $_GET['totalRows_nilai'];
} else {
  $all_nilai = mysql_query($query_nilai);
  $totalRows_nilai = mysql_num_rows($all_nilai);
}
$totalPages_nilai = ceil($totalRows_nilai/$maxRows_nilai)-1;

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
        <h1><div align="center">DATA NILAI</div></h1>
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
            <td width="300px" height="50"><strong>NISN</strong></td>
            <td width="300px" height="50"><strong>Kode Guru</strong></td>
            <td width="300px" height="50"><strong>Kode SK</strong></td>
            <td width="300px" height="50"><strong>Nilai Angka</strong></td>
            <td width="300px" height="50"><strong>Nilai Huruf</strong></td>
            <td colspan="2"><strong>Action</strong></td>
          </tr>
          <?php 
		  if ((isset($_POST['search2'])) && ($_POST['search'] != "")) {
					$search = $_POST['search'];
					$sql="SELECT * FROM nilai WHERE NISN='$search' OR Kode_guru='$search' OR kode_sk='$search' OR Nilai_angka='$search' OR Nilai_huruf='$search' ;";
					$eksekusi_sql = mysql_query($sql,$koneksi) or die(mysql_error());
					$cari = mysql_fetch_assoc($eksekusi_sql);
              
			  $no = 1;
		  do { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $cari['NISN']; ?></td>
              <td><?php echo $cari['Kode_guru']; ?></td>
              <td><?php echo $cari['Kode_sk']; ?></td>
              <td><?php echo $cari['Nilai_angka']; ?></td>
              <td><?php echo $cari['Nilai_huruf']; ?></td>
              <td><a href="edit_nilai.php?NISN=<?php echo $cari['NISN']; ?>">Edit</a></td>
              <td><a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="lihat_nilai.php?NISN=<?php echo $cari['NISN']; ?>">Delete</a></td>
            </tr>
            <?php 
			$no++;
			} while ($cari = mysql_fetch_assoc($eksekusi_sql)); 
			}else{
			  
			  $no = 1;
		  do { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row_nilai['NISN']; ?></td>
              <td><?php echo $row_nilai['Kode_guru']; ?></td>
              <td><?php echo $row_nilai['Kode_sk']; ?></td>
              <td><?php echo $row_nilai['Nilai_angka']; ?></td>
              <td><?php echo $row_nilai['Nilai_huruf']; ?></td>
               <td><a href="edit_nilai.php?NISN=<?php echo $row_nilai['NISN']; ?>">Edit</a></td>
              <td><a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="lihat_nilai.php?NISN=<?php echo $row_nilai['NISN']; ?>">Delete</a></td>
            </tr>
            <?php 
			$no++;
			} while ($row_nilai = mysql_fetch_assoc($nilai)); }?>
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
mysql_free_result($nilai);

}
?>
