<?php
Class Pegawai extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/Alat-Penjualan-Elektronik/Apipenjualan/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    function index(){
        $data['datapegawai'] = json_decode($this->curl->simple_get($this->API.'/apipegawai'));
        $this->load->view('pegawai/list',$data);
    }
    

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pegawai'       =>  $this->input->post('id_pegawai'),
                'nama_pegawai'      =>  $this->input->post('nama_pegawai'),
                'jabatan'=>  $this->input->post('jabatan'));

            $insert =  $this->curl->simple_post($this->API.'/apipegawai', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('pegawai');
        }else{
            $this->load->view('pegawai/create');
        }
    }
    

    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pegawai'       =>  $this->input->post('id_pegawai'),
                'nama_pegawai'      =>  $this->input->post('nama_pegawai'),
                'jabatan'=>  $this->input->post('jabatan'),);
            $update =  $this->curl->simple_put($this->API.'/apipegawai', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pegawai');
        }else{
            $params = array('id_pegawai'=>  $this->uri->segment(3));
            $data['datapegawai'] = json_decode($this->curl->simple_get($this->API.'/apipegawai',$params));
            $this->load->view('pegawai/edit',$data);
        }
    }
    

    function delete($id){
        if(empty($id)){
            redirect('pegawai');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/apipegawai', array('id_pegawai'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pegawai');
        }
    }
}