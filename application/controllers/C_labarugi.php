<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_labarugi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index(){

		$data=array(
			'page'=>'labarugi/formsearch',
			'link'=>'labarugi',
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function viewlabarugi($pilihan){
		$bulan1=$this->input->post('bulan1', true);
		$tahun1=$this->input->post('tahun1', true);
		$tahun2=$this->input->post('tahun2', true);
		if($pilihan==1){
			$penjualan=$this->M_pos->kueri("SELECT sum(jumlah) as total from vw_jurnal where status=2 and month(tanggal)='$bulan1' and year(tanggal)='$tahun1'")->row();
			$biaya=$this->M_pos->kueri("SELECT *  from vw_jurnal where status=1 and month(tanggal)='$bulan1' and year(tanggal)='$tahun1'")->result();
			$bulan=$bulan1;
			$tahun=$tahun1;
		}else if($pilihan==2){
			$penjualan=$this->M_pos->kueri("SELECT sum(jumlah) as total from vw_jurnal where status=2 and year(tanggal)='$tahun2'")->row();
			$biaya=$this->M_pos->kueri("SELECT *  from vw_jurnal where status=1 and year(tanggal)='$tahun2'")->result();
			$bulan=0;
			$tahun=$tahun2;
		}
		$data=array(
			'page'=>'labarugi/viewlabarugi',
			'link'=>'labarugi',
			'penjualan'=>$penjualan,
			'biaya'=>$biaya,
			'pilihan'=>$pilihan,
			'bulan'=>$bulan,
			'tahun'=>$tahun,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($bulanasal,$tahun){
		$bulanar=array('0'=>'','1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
		if($bulanasal==0){
			$penjualan=$this->M_pos->kueri("SELECT sum(jumlah) as total from vw_jurnal where status=2 and year(tanggal)='$tahun'")->row();
			$biaya=$this->M_pos->kueri("SELECT *  from vw_jurnal where status=1 and year(tanggal)='$tahun'")->result();
			$bulan=$bulanar[$bulanasal];
			$tahun=$tahun;
		}else{
			$penjualan=$this->M_pos->kueri("SELECT sum(jumlah) as total from vw_jurnal where status=2 and month(tanggal)='$bulanasal' and year(tanggal)='$tahun'")->row();
			$biaya=$this->M_pos->kueri("SELECT *  from vw_jurnal where status=1 and month(tanggal)='$bulanasal' and year(tanggal)='$tahun'")->result();
			$bulan=$bulanar[$bulanasal];
			$tahun=$tahun;
		}
		$data=array(
			
			'penjualan'=>$penjualan,
			'biaya'=>$biaya,
			
			'bulan'=>$bulan,
			'tahun'=>$tahun,
		);
		
		$this->load->view('labarugi/cetak',$data);
	}
		

}
