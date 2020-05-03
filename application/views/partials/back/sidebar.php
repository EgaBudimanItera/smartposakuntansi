<?php
  $hakakses=$this->session->userdata('userHakakses');
?>  
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			
			<!-- BEGIN SIDEBAR MENU -->
            <ul class="sidebar-menu">
                <li class="<?php if($link=='' ||$link=="dashboard"){echo'active';}?>">
                    <a href="<?=base_url()?>c_dashboard" class="">
                        <span class="icon-box"> <i class="icon-home"></i></span> Dashboard
                        
                    </a>
                </li>
                
                <!-- JIKA PENJUALAN-->
                <?php    
                if($hakakses=='Penjualan'){
                ?>
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                         <li class="<?php if($link=='satuan'){echo'active';}?>"><a href="<?=base_url()?>c_satuan">Satuan</a></li>
                        <li class="<?php if($link=='barang'){echo'active';}?>"><a href="<?=base_url()?>c_barang">Barang</a></li>
                        <li class="<?php if($link=='pelanggan'){echo'active';}?>"><a href="<?=base_url()?>c_pelanggan">Pelanggan</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"||$link=="orderpenjualan"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='orderpenjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_orderpenjualan">Order Penjualan</a></li>
                        <li class="<?php if($link=='penjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_penjualan">Penjualan</a></li>
                       
                       
                        
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                       
                        <li class="<?php if($link=="lappenjualan"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappenjualan">Penjualan</a></li>
                       
                       
                        
                       
                    </ul>
                </li>
                <!-- JIKA KEUANGAN-->
                <?php
                }else if($hakakses=='Keuangan'){
                ?>
                <li class="has-sub <?php if($link=="akun"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='akun'){echo'active';}?>"><a href="<?=base_url()?>c_akun">Akun</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='beban'){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='beban'){echo'active';}?>"><a href="<?=base_url()?>c_beban">Beban Usaha</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="jurnal"||$link=="labarugi"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                       
                       
                        <li class="<?php if($link=="jurnal"){echo'active';}?>"><a class="" href="<?=base_url()?>c_jurnal">Jurnal</a></li>
                        <li class="<?php if($link=="labarugi"){echo'active';}?>"><a class="" href="<?=base_url()?>c_labarugi">Laba Rugi</a></li>
                        
                        
                       
                    </ul>
                </li>
                <!-- JIKA PIMPINAN-->
                <?php
                }else if($hakakses=='Pimpinan'){
                ?>
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='users'){echo'active';}?>"><a href="<?=base_url()?>c_users">Users</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="labarugi"||$link=="jurnal"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="labarugi"){echo'active';}?>"><a class="" href="<?=base_url()?>c_labarugi">Laba Rugi</a></li>
                        
                        <li class="<?php if($link=="jurnal"){echo'active';}?>"><a class="" href="<?=base_url()?>c_jurnal">Jurnal</a></li>
                       
                        
                       
                    </ul>
                </li>

                
                <?php
                }
                ?>
                
                
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->