<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jurnal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index(){

		$data=array(
			'page'=>'jurnal/formsearch',
			'link'=>'jurnal',
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function viewjurnal(){
		$daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
		$hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
		$data=array(
			'page'=>'jurnal/viewjurnal',
			'link'=>'jurnal',
			'daritanggal'=>date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d"),
			'hinggatanggal'=>date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d"),
			'kas'=>$this->M_pos->kueri("SELECT * from akun where noakun='1110'")->row(),
			'jurnal'=>$this->M_pos->kueri("SELECT * from vw_jurnal where tanggal between '$daritanggal' and '$hinggatanggal' order by tanggal asc")->result(),

		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($daritanggal,$hinggatanggal){
		$data=array(
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
			'kas'=>$this->M_pos->kueri("SELECT * from akun where noakun='1110'")->row(),
			'jurnal'=>$this->M_pos->kueri("SELECT * from vw_jurnal where tanggal between '$daritanggal' and '$hinggatanggal' order by tanggal asc")->result(),

		);
		$this->load->view('jurnal/cetak',$data);
	}
	public function getakun($noakun){
		$data=$this->M_pos->ambil('noakun',$noakun,'jurnal')->row_array();
        echo json_encode($data);
	}

}
