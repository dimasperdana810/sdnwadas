<link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
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
  $q = "select * from seleksi where nis='" . $_REQUEST[nis] . "' and tahun='" . $_REQUEST[tahun] . "'";
  $r = $jp->sql($q);
  $o = $jp->fetch($r);
  $disabled = " readonly='true' ";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>::: <?= $title ?> :::</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script>
    function numbersonly(e) {
      var unicode = e.charCode ? e.charCode : e.keyCode
      if ((unicode != 8) && (unicode != 13) && (unicode != 37) && (unicode != 39) && (unicode != 9)) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 48 || unicode > 57) //if not a number
          return false //disable key press
      }
    }
    function ConfirmDel(nis, tahun) {
      if (confirm('Hapus..?')) {
        window.location = "proses.php?page=seleksi&action=delete&nis=" + nis + "&tahun=" + tahun;
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
  <h1> Data Seleksi Beasiswa</h1>
  <script src="js/gen_validatorv31.js" language="javascript"></script>
  <form action="proses.php?page=seleksi&action=input" method="post" enctype="multipart/form-data" name="Formsmk"
    id="Formsmk">
    <input name="id_edit" type="hidden" value="<?= $o[nis] ?>">
    <input name="id_edit1" type="hidden" value="<?= $o[tahun] ?>">
    <table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="163"><label>Siswa</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-8"><select name="nis" id="nis" class="form-control" <?= $disabled ?>>
                <option value="">---</option>
                <?php
                $r = $jp->sql("select * from siswa");
                while ($oKel = $jp->fetch($r)) {
                  $isSelKel = (($oKel[nis] == $o[nis]) ? "selected" : "");
                  ?>
                  <option value="<?= $oKel[nis] ?>" <?= $isSelKel ?>>
                    <?= $oKel[nis] ?>   <?= $oKel[nama] ?>
                  </option>
                <?php } ?>
              </select></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Tahun</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-4"><input name="tahun" type="text" id="tahun" value="<?= $o[tahun] ?>" size="20"
                maxlength="4" onKeyPress="return numbersonly(event);" class="form-control" <?= $disabled ?>></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Pendapatan Keluarga</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-6"><input name="pendapatan" type="text" id="pendapatan" value="<?= $o[pendapatan] ?>"
                size="20" maxlength="20" class="form-control" onKeyPress="return numbersonly(event);"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Jumlah Keluarga</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-4"><input name="keluarga" type="text" id="keluarga" value="<?= $o[keluarga] ?>" size="20"
                maxlength="20" onKeyPress="return numbersonly(event);" class="form-control"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Umur</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-4"><input name="umur" type="text" id="umur" value="<?= $o[umur] ?>" size="20"
                maxlength="20" class="form-control"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td width="163"><label>Nilai Rata-Rata</label> </td>
        <td width="9" align="center"><label>:</label></td>
        <td width="554">
          <div class="form-group has-feedback">
            <div class="col-sm-4"><input name="nilai" type="text" id="nilai" value="<?= $o[nilai] ?>" size="20"
                maxlength="20" class="form-control"></div>
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
              onclick="window.location='index.php?page=seleksi'">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </table>

  </form>

  <?php
  $q = "select * from seleksi a inner join siswa b on a.nis=b.nis ";
  $result = $jp->sql($q);
  ?>
  <table id="example1" class="table table-bordered table-striped" width="100%">
    <thead>
      <tr bgcolor="#2a5acb">
        <th align="center" valign="middle"><span class="style5">No.</span></th>
        <th valign="middle"><span class="style5">NIS</span></th>
        <th valign="middle"><span class="style5">Nama</span></th>
        <th valign="middle"><span class="style5">Pendapatan</span></th>
        <th valign="middle"><span class="style5">Jml Kel</span></th>
        <th valign="middle"><span class="style5">Pendapatan/Orang</span></th>
        <th valign="middle"><span class="style5">Umur</span></th>
        <th valign="middle"><span class="style5">Rata-Rata</span></th>
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
        <td valign="top" align="right"><span class="style12"><?= $jp->pt($row[pendapatan]) ?></span></td>
        <td valign="top" align="right"><span class="style12"><?= ($row[keluarga]) ?></span></td>
        <td valign="top" align="right"><span class="style12"><?= $jp->pt($row[pendapatanorang]) ?></span></td>
        <td valign="top" align="right"><span class="style12"><?= ($row[umur]) ?></span></td>
        <td valign="top" align="right"><span class="style12"><?= ($row[nilai]) ?></span></td>
        <td align="center" valign="top"><a
            href="index.php?page=seleksi&nis=<?= $row[nis] ?>&tahun=<?= $row[tahun] ?>"><img src="images/edit.png"
              width="32" height="32" border="0" title="Edit" /></a><a href="#"
            onclick="return ConfirmDel('<?= $row[nis] ?>','<?= $row[tahun] ?>')"> <img src="images/del.png" width="32"
              height="32" border="0" title="Hapus" /> </a></td>
      </tr>
    <?php } ?>
  </table>
  <script type="text/javascript">
    $('form').validate({
      rules: {
        nis: { required: true },
        tahun: { required: true },
        pendapatan: { required: true },
        keluarga: { required: true },
        umur: { required: true },
        nilai: { required: true },
      },
    });
  </script>
</body>

</html>