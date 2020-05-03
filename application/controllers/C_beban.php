<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_beban extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index(){
		$query="SELECT * FROM beban,akun where beban.noakun=akun.noakun";
		$data=array(
			'page'=>'beban/databeban',
			'link'=>'beban',
			'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'beban/formtambah',
			'link'=>'beban',
			'akun'=>$this->M_pos->kueri("SELECT * FROM akun where beban='1'")->result(),
			'idbeban'=>$this->M_pos->id_beban(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_beban(){
		$data = array(
			'tanggal' => date_format(date_create($this->input->post('tanggal',true)),"Y-m-d"),
			'idbeban'=>$this->input->post('idbeban', true),
			'noakun' => $this->input->post('noakun', true),
			'jumlah' => $this->input->post('jumlah', true),
			'keterangan' => $this->input->post('keterangan', true),
		);
		$simpan = $this->M_pos->simpan_data($data,'beban');
		if($simpan){
            $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
        );
            redirect(c_beban);
        }else{
            $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
        );
            redirect(c_beban/formtambah);
        }
		
	}


	public function hapus_beban($idbeban){

		$hapus = $this->M_pos->hapus('idbeban',$idbeban,'beban');

		if($hapus){
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_beban);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_beban/databeban);
            }

	}

	public function getakun($noakun){
		$data=$this->M_pos->ambil('noakun',$noakun,'beban')->row_array();
        echo json_encode($data);
	}

}
