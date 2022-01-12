<?php
Class Customer extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/Alat-Penjualan-Elektronik/Apicustomer/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    function index(){
        $data['datacustomer'] = json_decode($this->curl->simple_get($this->API.'/apicustomer'));
        $this->load->view('customer/list',$data);
    }
    

    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_customer'       =>  $this->input->post('id_customer'),
                'nama_customer'      =>  $this->input->post('nama_customer'),
                'alamat_customer'=>  $this->input->post('alamat_customer'),
                'nomor_telepon'=>  $this->input->post('nomor_telepon'));

            $insert =  $this->curl->simple_post($this->API.'/apicustomer', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('customer');
        }else{
            $this->load->view('customer/create');
        }
    }
    

    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_customer'       =>  $this->input->post('id_customer'),
                'nama_customer'      =>  $this->input->post('nama_customer'),
                'alamat_customer'=>  $this->input->post('alamat_customer'),
                'nomor_telepon'=>  $this->input->post('nomor_telepon'));
            $update =  $this->curl->simple_put($this->API.'/apicustomer', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('customer');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datacustomer'] = json_decode($this->curl->simple_get($this->API.'/apicustomer',$params));
            $this->load->view('customer/edit',$data);
        }
    }
    

    function delete($id){
        if(empty($id)){
            redirect('customer');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/apicustomer', array('id_customer'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('customer');
        }
    }
}