
<!-- BEGIN PAGE -->
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
                    
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
          Data Beban
        </h3>
        <ul class="breadcrumb">
          <li>
              <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
          </li>
          <li><a href="#">Beban</a><span class="divider">&nbsp;</span></li>
          <li><a href="#">Tambah Data</a><span class="divider-last">&nbsp;</span></li>
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
                </div>
                <br>
                <form action="<?=base_url()?>c_beban/tambah_beban" role="form" method="post" class="form-horizontal">
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">ID Beban</label>
                    <div class="controls">
                       <input type="text" class="span6" id="idbeban" readonly="" value="<?=$idbeban?>" name="idbeban" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Tanggal</label>
                    <div class="controls">
                      <div class="input-append" id="ui_date_picker_trigger">
                        <input name="tanggal" type="text"  class="m-wrap medium" value="<?=date('m/d/Y')?>" required readonly/><span class="add-on"><i class="icon-calendar"></i></span>
                      </div>
                    </div>
                  </div> 

                 <div class="control-group">
                    <label class="control-label">Akun</label>
                    <div class="controls">
                       <select class="span6 chosen" data-placeholder="Pilih Akun" tabindex="1" required="" name="noakun">
                          <option value=""></option>
                          <!-- ambil nilai satuan dari tabel satuan -->
                          <?php
                            foreach($akun as $s){
                          ?>
                          <option value="<?=$s->noakun?>"><?=$s->namaakun?></option>
                          <?php    
                            }
                          ?>
                          
                       </select>
                    </div>
                  </div>
                  <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Jumlah Biaya</label>
                    <div class="controls">
                        <input type="number" class="span6" id="jumlah" value="0" required name="jumlah" />
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                   <div class="control-group primary">
                    <label class="control-label" for="inputWarning">Keterangan</label>
                    <div class="controls">
                       <textarea name="keterangan" class="span6"></textarea>
                       <span class="help-inline"></span>
                    </div>
                  </div> 
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Simpan Data</button>
                    <!-- <button type="reset" class="btn btn-warning"><i class="icon-remove"></i>Hapus Data</button> -->
                  </div>
                </form>
              </div>
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


  


