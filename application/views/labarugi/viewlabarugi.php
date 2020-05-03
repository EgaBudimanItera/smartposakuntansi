
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Jurnal
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Pencarian Data</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Lihat Data</a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div id="page" class="dashboard"> 
        
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget">
              <div class="widget-title">
                  <h4><i class="icon-reorder"></i>Data</h4>
                  <span class="tools">
                      <a href="javascript:;" class="icon-chevron-down"></a>
                      <a href="javascript:;" class="icon-remove"></a>
                  </span>
              </div>
              <div class="widget-body">
               <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
                <div>
                  <button type="button" class="btn btn-primary" onclick="self.history.back()">
                    <i class="icon-arrow-left"></i> Kembali
                  </button>
                  <a href="<?=base_url()?>c_labarugi/cetak/<?=$bulan?>/<?=$tahun?>" target="_blank" class="btn btn-warning"><i class="icon-print"></i> Cetak</a>
                </div>
              </div>
             
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
            </div>
            <!-- END EXAMPLE TABLE widget-->
          </div>
        </div>               
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->


  


