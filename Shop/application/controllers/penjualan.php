<?php
Class Kontak extends CI_Controller{
    
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
        $data['datapenjualan'] = json_decode($this->curl->simple_get($this->API.'/apipenjualan'));
        $this->load->view('penjualan/list',$data);
    }
    

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_penjualan'       =>  $this->input->post('id_penjualan'),
                'nama_penjualan'      =>  $this->input->post('nama_penjualan'),
                'harga_penjualan'=>  $this->input->post('harga_penjualan'),
                'stok_penjualan'=>  $this->input->post('stok_penjualan'));

            $insert =  $this->curl->simple_post($this->API.'/penjualan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('penjualan');
        }else{
            $this->load->view('penjualan/create');
        }
    }
    

    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_penjualan'       =>  $this->input->post('id_penjualan'),
                'nama_penjualan'      =>  $this->input->post('nama_penjualan'),
                'harga_penjualan'=>  $this->input->post('harga_penjualan'),
                'stok_penjualan'=>  $this->input->post('stok_penjualan'));
            $update =  $this->curl->simple_put($this->API.'/penjualan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('penjualan');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datapenjualan'] = json_decode($this->curl->simple_get($this->API.'/penjualan',$params));
            $this->load->view('penjualan/edit',$data);
        }
    }
    

    function delete($id){
        if(empty($id)){
            redirect('penjualan');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/penjualan', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('penjualan');
        }
    }
}