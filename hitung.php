<?php
error_reporting(0);
session_start();
include 'includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();
$jp->sql("delete from hasil");
$jp->sql("delete from temp");
$jp->sql("delete from temp1");

$bobotc1 = 0.51;
$bobotc2 = 0.26;
$bobotc3 = 0.13;
$bobotc4 = 0.06;
$bobotc5 = 0.04;

$data=$jp->fetch($jp->sql("SELECT SUM(pendapatanorang) as jumpendapatanorang, SUM(pendapatan) as jumpendapatan, SUM(keluarga) as jumkeluarga, SUM(umur) as jumumur,SUM(nilai) as jumnilai from seleksi where tahun='".$_POST['tahun']."'"));

$jp->sql("INSERT INTO temp(nis,nilai,nilai1) SELECT nis, (pendapatanorang*$bobotc1/$data[jumpendapatanorang]) + (pendapatan*$bobotc2/$data[jumpendapatan]), 1/((pendapatanorang*$bobotc1/$data[jumpendapatanorang]) + (pendapatan*$bobotc2/$data[jumpendapatan]))  from seleksi where tahun='".$_POST['tahun']."'");

$totmin = $jp->fetch($jp->sql("SELECT SUM(nilai1) as tot,SUM(nilai) as tot1 from temp"));

$jp->sql("update temp set nilai2=".$totmin[tot1]."/(nilai*".$totmin[tot].")");


$jp->sql("INSERT INTO temp1 SELECT nis,(keluarga*$bobotc3/$data[jumkeluarga])+(umur*$bobotc4/$data[jumumur])+(nilai*$bobotc5/$data[jumnilai])  from seleksi where tahun='".$_POST['tahun']."'");

$jp->sql("INSERT INTO hasil SELECT a.nis,a.nilai+b.nilai2 from temp1 a inner join temp b on a.nis=b.nis");
$data1=$jp->fetch($jp->sql("SELECT MAX(nilai) as max FROM hasil"));

$jp->sql("update hasil set nilai = nilai/".$data1[max]."");

$jp->gotox("index.php?page=hasil&tahun=".$_POST[tahun]."");
?>
