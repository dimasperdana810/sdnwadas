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
  <title>::: <?= $title ?> :::</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
  <h1> HASIL SELEKSI PENERIMA BEASISWA TAHUN <?= $_REQUEST[tahun] ?></h1>
  <script src="js/gen_validatorv31.js" language="javascript"></script>
  <?php
  $q = "select *,a.nilai as nil from hasil a inner join seleksi b on a.nis=b.nis inner join siswa c on a.nis=c.nis where tahun='" . $_REQUEST[tahun] . "' order  by nil desc";
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
        <th valign="middle"><span class="style5">NA</span></th>
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
        <td valign="top" align="right"><span class="style12"><?= ($row[nil]) ?></span></td>
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