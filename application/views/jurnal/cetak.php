<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8" />
  <title>Smart Pos Akuntansi</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  </head>
<body>
  <table class="table">
    <tr>
      <!-- <td class="col-md-3">Logo</td> -->
      <td class="col-md-9">
        <h2>Laporan Jurnal</h2>
        <h4>CV Prima Media<br>
          Periode : <?=date("d-m-Y",strtotime($daritanggal))?> s/d <?=date("d-m-Y",strtotime($hinggatanggal))?></h4>
      </td>
    </tr>
    
  </table>
    <hr>
  <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="hidden-phone">No</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">Kode Transaksi</th>
                    <th class="hidden-phone">Nama Akun</th>
                    <th class="hidden-phone">Debet</th>
                    <th class="hidden-phone">Kredit</th>
                    <th class="hidden-phone">Keterangan</th>
                    
                  </tr>
                </thead>
                <tbody>
                   <?php
                  $no=1;
                  $debet=0;
                  $kredit=0;
                  foreach($jurnal as $l){
                    $debet=$debet+$l->jumlah;
                    if($l->status==2){
                      
                  ?>
                  <tr>
                      <td rowspan="2"><?=$no++?>.</td>
                      <td rowspan="2"><?=$l->tanggal?></td>
                      <td rowspan="2"><?=$l->kodetransaksi?></td>
                      <td><?=$kas->namaakun?></td>
                      <td><?=$l->jumlah?></td>
                      <td>0</td>
                      <td rowspan="2"><?=$l->keterangan?></td>
                    </tr>
                    <tr>
                      
                      
                      <td>&nbsp&nbsp&nbsp&nbsp<?=$l->namaakun?></td>
                      
                      <td>0</td>
                      <td><?=$l->jumlah?></td>
                    </tr>
                  <?php
                    }else if($l->status==1){
                     
                  ?>
                  <tr>
                      <td rowspan="2"><?=$no++?>.</td>
                      <td rowspan="2"><?=$l->tanggal?></td>
                      <td rowspan="2"><?=$l->kodetransaksi?></td>
                      <td><?=$l->namaakun?></td>
                      <td><?=$l->jumlah?></td>
                      <td>0</td>
                      <td rowspan="2"><?=$l->keterangan?></td>
                    </tr>
                    <tr>
                      
                      
                      <td>&nbsp&nbsp&nbsp&nbsp<?=$kas->namaakun?></td>
                      
                      <td>0</td>
                      <td><?=$l->jumlah?></td>
                    </tr>
                  <?php
                    }
                  
                  }
                  ?>
                  <tr>
                    <td colspan="4">Total</td>
                    <td><?=$debet?></td>
                    <td><?=$debet?></td>
                    <td></td>
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