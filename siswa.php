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
<?php

if ($_REQUEST[nis] != '') {
  $q = "select * from siswa where nis='" . $_REQUEST[nis] . "'";
  $r = $jp->sql($q);
  $o = $jp->fetch($r);
  $disabled = " readonly='true' ";
  $kode = $o[nis];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>::: <?= $title ?> :::</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script>
    //==============================SCRIPT TAMBAHAN UNTUK FILTER KEYBOARD======================================================
    function numbersonly(e) {
      var unicode = e.charCode ? e.charCode : e.keyCode
      if ((unicode != 8) && (unicode != 13) && (unicode != 37) && (unicode != 39) && (unicode != 9)) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 48 || unicode > 57) //if not a number
          return false //disable key press
      }
    }
    //===========================================================================================
    function ConfirmDel(nis) {
      if (confirm('Hapus..?')) {
        window.location = "proses.php?page=siswa&action=delete&nis=" + nis;
      }
    }
  </script>
  <script src="js/jquery.validate.min.js"></script>
  <style type="text/css">
    <!--
    .style5 {
      color: #FFF;
      font-size: 12px;
    }

    .style6 {
      font-size: 14px;
      color: #4d92a2;
    }

    .style10 {
      font-size: 12px
    }

    .style12 {
      font-family: Georgia, "Times New Roman", Times, serif;
      font-size: 12px;
    }
    -->
  </style>
</head>

<body>
  <h1> Data Siswa</h1>
  <script src="js/gen_validatorv31.js" language="javascript"></script>
  <form action="proses.php?page=siswa&action=input" method="post" enctype="multipart/form-data" name="Formsmk"
    id="Formsmk">
    <input name="id_edit" type="hidden" value="<?= $o[nis] ?>">
    <table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="163"><label>NIS</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-3"><input name="nis" type="text" id="nis" value="<?= $o[nis] ?>" size="5" maxlength="3"
                class="form-control" <?= $disabled ?>></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Nama</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-5"><input name="nama" type="text" id="nama" value="<?= $o[nama] ?>" size="20"
                maxlength="30" class="form-control"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Alamat</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-8"><input name="alamat" type="text" id="alamat" value="<?= $o[alamat] ?>" size="20"
                maxlength="50" class="form-control"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Telepon</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-5"><input name="telepon" type="text" id="telepon" value="<?= $o[telepon] ?>" size="20"
                maxlength="15" class="form-control"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td colspan="2">
          <div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan"
              onClick="return doSubmit()">
            <input type="reset" name="Submit2" class="btn btn-success" value="Batal"
              onclick="window.location='index.php?page=siswa'">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </table>
  </form>

  <?php
  $q = "select * from siswa ";
  $result = $jp->sql($q);
  ?>
  <table id="example1" class="table table-bordered table-striped" width="100%">
    <thead>
      <tr bgcolor="#2a5acb">
        <th align="center" valign="middle"><span class="style5">No.</span></th>
        <th valign="middle"><span class="style5">NIS</span></th>
        <th valign="middle"><span class="style5">Nama</span></th>
        <th valign="middle"><span class="style5">Alamat</span></th>
        <th valign="middle"><span class="style5">Telepon</span></th>
        <th> <span class="style5">Proses</span> </th>
      </tr>
    </thead>
    <?php $n = 0;
    while ($row = $jp->fetch($result)) {
      $n++;
      ?>
      <tr>
        <td align="center" valign="top"><span class="style12"><?= $n ?>.</span></td>
        <td valign="top" align="center"><span class="style12"><b> <?= $row[nis] ?></b></span></td>
        <td valign="top" align="justify"><span class="style12"><?= $row[nama] ?></span></td>
        <td valign="top" align="justify"><span class="style12"><?= ($row[alamat]) ?></span></td>
        <td valign="top" align="center"><span class="style12"><?= ($row[telepon]) ?></span></td>
        <td align="center" valign="top"><a href="index.php?page=siswa&nis=<?= $row[nis] ?>"><img src="images/edit.png"
              width="32" height="32" border="0" title="Edit" /></a><a href="#"
            onclick="return ConfirmDel('<?= $row[nis] ?>')"> <img src="images/del.png" width="32" height="32" border="0"
              title="Hapus" /> </a></td>
      </tr>
    <?php } ?>
  </table>
  <script type="text/javascript">
    $('form').validate({
      rules: {
        nama: { required: true },
        alamat: { required: true },
        telepon: { required: true },
        nis: { required: true },
      },
    });
  </script>
</body>

</html>