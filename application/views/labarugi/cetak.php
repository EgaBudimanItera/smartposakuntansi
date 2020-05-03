<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8" />
  <title>SIMPOS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  </head>
<body>

  <table class="table">
    <tr>
      <td class="col-md-3">Logo</td>
      <td class="col-md-9">
        <h2>Laba Rugi</h2>
        <h4>CV Prima Media<br>
          Periode : <?php if($bulan==''){echo "Periode Tahun Berjalan : ".$tahun;}else{echo "Periode : Bulan ".$bulan." Tahun ".$tahun;}?></h4>
      </td>
    </tr>
    
  </table>
    <hr>
 <table class="table ">
    <tbody>
      <tr>
        <td colspan="3">
          Pendapatan Jasa
        </td>
        <td><?=$penjualan->total?></td>
      </tr>
      <tr>
        <td colspan="4">
          Biaya Biaya
        </td>
      </tr>
      <?php
      $totalbiaya=0;
      foreach($biaya as $b){
      ?>
      <tr>
        <td>&nbsp</td>
        <td><?=$b->namaakun?></td>
        <td>(<?=$b->jumlah?>)</td>
        <td>&nbsp</td>
      </tr>
      <?php
      $totalbiaya+=$b->jumlah;
      }
      ?>
      <tr>
        <td colspan="3">Total</td>
        <td>(<?=$totalbiaya?>)</td>
      </tr>
      <tr>
        <td colspan="3">Laba Bersih</td>
        <td><?=$penjualan->total-$totalbiaya?></td>
      </tr>
    </tbody>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th class="hidden-phone"></th>
        <th class="hidden-phone"></th>
        <th class="hidden-phone"></th>
        <th class="hidden-phone"></th>
        <th class="hidden-phone"></th>
        <th class="hidden-phone"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="4">
          
        </td>
        <td colspan="2" style="float: right;">
          Bandar Lampung, <?=date("d-F-Y")?> <br><br><br><br>
          Kepala Keuangan <br>
          ()
        </td>
      </tr>
    </tbody>
      
    </table>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    window.print();
  });
</script>
</html>