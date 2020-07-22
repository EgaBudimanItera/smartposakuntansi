
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Laporan Jurnal
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
                  <a href="<?=base_url()?>c_jurnal/cetak/<?=$daritanggal?>/<?=$hinggatanggal?>" target="_blank" class="btn btn-warning"><i class="icon-print"></i> Cetak</a>
                </div>
              </div>
             
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


  


