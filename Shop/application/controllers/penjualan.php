<?php
Class penjualan extends CI_Controller{
    
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
                'id_penjualan' => $this->input->post('id_penjualan'),
                'id_barang' => $this->input->post('id_barang'),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'nomor_pembeli' => $this->input->post('nomor_pembeli'),
                'alamat_pembeli' => $this->input->post('alamat_pembeli'),
                'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
                'total_harga' => $this->input->post('total_harga')
            );

            $insert =  $this->curl->simple_post($this->API.'/apipenjualan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
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
                'id_penjualan' => $this->input->post('id_penjualan'),
                'id_barang' => $this->input->post('id_barang'),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'nomor_pembeli' => $this->input->post('nomor_pembeli'),
                'alamat_pembeli' => $this->input->post('alamat_pembeli'),
                'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
                'total_harga' => $this->input->post('total_harga')
            );
            $update =  $this->curl->simple_put($this->API.'/apipenjualan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('penjualan');
        }else{
            $params = array('id_penjualan'=>  $this->uri->segment(3));
            $data['datapenjualan'] = json_decode($this->curl->simple_get($this->API.'/apipenjualan',$params));
            $this->load->view('penjualan/edit',$data);
        }
    }
    

    function delete($id){
        if(empty($id)){
            redirect('penjualan');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/apipenjualan', array('id_penjualan'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
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