<?php
Class Kontak extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/Alat-Penjualan-Elektronik/Apibarang/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    function index(){
        $data['databarang'] = json_decode($this->curl->simple_get($this->API.'/apibarang'));
        $this->load->view('barang/list',$data);
    }
    

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_barang'       =>  $this->input->post('id_barang'),
                'nama_barang'      =>  $this->input->post('nama_barang'),
                'harga_barang'=>  $this->input->post('harga_barang'),
                'stok_barang'=>  $this->input->post('stok_barang'));

            $insert =  $this->curl->simple_post($this->API.'/barang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('barang');
        }else{
            $this->load->view('barang/create');
        }
    }
    

    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_barang'       =>  $this->input->post('id_barang'),
                'nama_barang'      =>  $this->input->post('nama_barang'),
                'harga_barang'=>  $this->input->post('harga_barang'),
                'stok_barang'=>  $this->input->post('stok_barang'));
            $update =  $this->curl->simple_put($this->API.'/barang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('barang');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['databarang'] = json_decode($this->curl->simple_get($this->API.'/barang',$params));
            $this->load->view('barang/edit',$data);
        }
    }
    

    function delete($id){
        if(empty($id)){
            redirect('barang');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/barang', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('barang');
        }
    }
}