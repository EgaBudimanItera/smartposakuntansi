<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_akun extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index(){
		$query="SELECT * FROM akun";
		$data=array(
			'page'=>'akun/dataakun',
			'link'=>'akun',
			'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'akun/formtambah',
			'link'=>'akun',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($noakun){
		$data=array(
			'page'=>'akun/formubah',
			'link'=>'akun',
			'akun' => $this->M_pos->ambil('noakun',$noakun,'akun')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_akun(){

		$noakun=$this->input->post('noakun',true);
		$data = array(
			'noakun' => $noakun,
			'namaakun' => $this->input->post('namaakun', true),
		);
		$simpan = $this->M_pos->simpan_data($data,'akun');
		if($simpan){
            $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
        );
            redirect(c_akun);
        }else{
            $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
        );
            redirect(c_akun/formtambah);
        }
		
	}

	public function ubah_akun($noakun){
		$data = array(
		'noakun' => $this->input->post('noakun', true),
		'namaakun' => $this->input->post('namaakun', true),
		);

		$ubah = $this->M_pos->update('noakun',$noakun,'akun',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
            $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
        );
            redirect(c_akun);
        }else{
             $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
        );
            redirect(c_akun/formubah/$noakun);
        }
	}

	public function hapus_akun($noakun){

		$hapus = $this->M_pos->hapus('noakun',$noakun,'akun');

		if($hapus){
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_akun);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_akun/dataakun);
            }

	}

	public function getakun($noakun){
		$data=$this->M_pos->ambil('noakun',$noakun,'akun')->row_array();
        echo json_encode($data);
	}

}
