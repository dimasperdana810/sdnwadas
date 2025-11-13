<?php
error_reporting(0);
session_start();
$hari = date("y");
include 'includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
include APP_ROOT."/includes/auth.inc.php";
include INCLUDES_DIR."/class.paging.php";
$jp = new jcore();
		
switch($_REQUEST[page]){
	
case "admin":
		switch($_REQUEST[action]){
		case "input":
		 $r = $jp->sql("select count(*) as j from admin WHERE username='".$_REQUEST['username']."' ");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $jumlah = strlen($kata);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Admin Sudah Dimasukan...');
			  $jp->gotox("index.php?page=admin");
			  }
				  
				  else if($jumlah>0){
				  
				  $q = "update admin set "
			." password=\"".$_POST[password]."\" WHERE username='".$kata."' ";
			//echo $q;
   		    $jp->sql($q);
			
			$jp->alert('Data Admin\nTelah Diubah...');
			$jp->gotox("index.php?page=admin");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into admin set "
			." username='".$_POST[username]."',password=\"".$_POST[password]."\" ";
						
   		    $jp->sql($q);
			$jp->alert('Data Admin\nTelah Tersimpan...');
			$jp->gotox("index.php?page=admin");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from admin where username=\"".$_REQUEST[username]."\"");
			$jp->alert('Data Admin\nTelah Terhapus...');
			$jp->gotox("index.php?page=admin");			
		break;
		default:
			$jp->gotox("index.php?page=admin");		
		break;
		}
	break;
	
	case "seleksi":
		
		switch($_REQUEST[action]){
				
		case "input":
								
		 $r = $jp->sql("select count(*) as j from seleksi WHERE nis='".$_POST['nis']."' and tahun='".$_POST['tahun']."'");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $kata1 = $_POST['id_edit1'];
		 $jumlah = strlen($kata);
		 $x = round($_POST[pendapatan]/$_POST[keluarga]);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Seleksi Sudah Dimasukan...');
			  $jp->gotox("index.php?page=seleksi");
			  }
				  
				  else if($jumlah>0){
				  
				  $q = "update seleksi set pendapatan='".$_POST[pendapatan]."',keluarga='".$_POST[keluarga]."',umur='".$_POST[umur]."',nilai='".$_POST[nilai]."',pendapatanorang='".$x."',username='".$_SESSION[username]."' where nis='".$kata."' and tahun='".$kata1."'";
			
			//echo $q;
   		    $jp->sql($q);
			
			$jp->alert('Data Seleksi\nTelah Diubah...');
			$jp->gotox("index.php?page=seleksi");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into seleksi set nis='".$_POST[nis]."', tahun='".$_POST[tahun]."',pendapatan='".$_POST[pendapatan]."',keluarga='".$_POST[keluarga]."',umur='".$_POST[umur]."',nilai='".$_POST[nilai]."',pendapatanorang='".$x."',username='".$_SESSION[username]."'  ";
			//echo $q;
			
   		    $jp->sql($q);
			$jp->alert('Data Seleksi\nTelah Tersimpan...');
			$jp->gotox("index.php?page=seleksi");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from seleksi where nis=\"".$_REQUEST[nis]."\" and  tahun=\"".$_REQUEST[tahun]."\"");
			$jp->alert('Data Seleksi\nTelah Terhapus...');
			$jp->gotox("index.php?page=seleksi");			
		break;
		default:
			$jp->gotox("index.php?page=seleksi");		
		break;
		}
	break;
	
	case "siswa":
		
		switch($_REQUEST[action]){
				
		case "input":
								
		 $r = $jp->sql("select count(*) as j from siswa WHERE nis='".$_POST['nis']."'");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $jumlah = strlen($kata);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Siswa Sudah Dimasukan...');
			  $jp->gotox("index.php?page=siswa");
			  }
				  
				  else if($jumlah>0){
				  
				  $q = "update siswa set nama='".$_POST[nama]."',alamat='".$_POST[alamat]."',telepon='".$_POST[telepon]."' where nis='".$kata."' ";
			
			//echo $q;
   		    $jp->sql($q);
			
			$jp->alert('Data Siswa\nTelah Diubah...');
			$jp->gotox("index.php?page=siswa");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into siswa set nis='".$_POST[nis]."',  nama='".$_POST[nama]."',alamat='".$_POST[alamat]."',telepon='".$_POST[telepon]."' ";
			//echo $q;
		
   		    $jp->sql($q);
			$jp->alert('Data Siswa\nTelah Tersimpan...');
			$jp->gotox("index.php?page=siswa");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from siswa where nis=\"".$_REQUEST[nis]."\"");
			$jp->alert('Data Siswa\nTelah Terhapus...');
			$jp->gotox("index.php?page=siswa");			
		break;
		default:
			$jp->gotox("index.php?page=siswa");		
		break;
		}
	break;
	
	
}
?>

 