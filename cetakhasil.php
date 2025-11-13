<link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
   
   
    <!-- page script -->
<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
  	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>::: <?=$title?> :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

 <script src="js/jquery.validate.min.js"></script>
<style type="text/css">
<!--
.style5 {color: #FFF; font-size: 12px; }
.style6 {font-size: 14px; color:#4d92a2;}
.style10 {font-size: 12px}
.style12 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; }
-->
</style>
</head>
<body>
<h1> Cetak Seleksi Beasiswa</h1>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="hitung.php" method="post" enctype="multipart/form-data" name="Formsmk" id="Formsmk" >
<table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
  
  <tr>
    <td width="163"><label>Tahun</label> </td>
    <td width="9" align="center"><label>:</label></td>
	<td width="554"> <div class="form-group has-feedback"><div class="col-sm-3"><select name="tahun" id="tahun" class="form-control" >
      <option value="">---</option>
      <?php
		$r = $jp->sql("select tahun from seleksi group by tahun");
		while ($oKel = $jp->fetch($r)){
		$isSelKel = (($oKel[tahun]==$o[tahun])?"selected":"");
		?>
      <option value="<?=$oKel[tahun]?>" <?=$isSelKel?>>
        <?=$oKel[tahun]?>
        </option>
      <?php } ?>
    </select></div></div></td>
    </tr>
      
    
    
    
        
    <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Lihat" onClick="return doSubmit()">        
      <input type="reset" name="Submit2" class="btn btn-success"  value="Batal" onclick="window.location='index.php?page=cetakhasil'"></div></td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
</table>

</form>


<script type="text/javascript">  
  $('form').validate({
        rules: {
 		  tahun:{required:true},
	 
          },
         
    });
</script>
	

</body>
</html>