<?php

defined('BASEPATH') or exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;
class Apipenjualan extends REST_Controller
{
function __construct($config = 'rest')

{
    parent::__construct($config);
    $this->load->database();
    }
    
    function index_get()
    {
         $id = $this->get('id_penjualan');
         if ($id == '') {
             $penjualan = $this->db->get('tabel_penjualan')->result();
    } else {
        $this->db->where('id_penjualan', $id);
        $penjualan = $this->db->get('tabel_penjualan')->result();
    }
        $this->response($penjualan, 200);
    }
    
    function index_post()
    {
        $data = array(
            'id_penjualan' => $this->post('id_penjualan'),
            'id_barang' => $this->post('id_barang'),
            'nama_pembeli' => $this->post('nama_pembeli'),
            'nomor_pembeli' => $this->post('nomor_pembeli'),
            'alamat_pembeli' => $this->post('alamat_pembeli'),
            'jumlah_pesanan' => $this->post('jumlah_pesanan'),
            'total_harga' => $this->post('total_harga')
        );
    $insert = $this->db->insert('tabel_penjualan', $data);
    if ($insert) {
        $this->response($data, 200);
    } else {
         $this->response(array('status' => 'fail', 502));
    }
    }
    
    function index_put()
    {
        $id = $this->put('id_penjualan');
        $data = array(
            'id_penjualan' => $this->put('id_penjualan'),
            'id_barang' => $this->put('id_barang'),
            'nama_pembeli' => $this->put('nama_pembeli'),
            'nomor_pembeli' => $this->put('nomor_pembeli'),
            'alamat_pembeli' => $this->put('alamat_pembeli'),
            'jumlah_pesanan' => $this->put('jumlah_pesanan'),
            'total_harga' => $this->put('total_harga')
    );
    $this->db->where('id_penjualan', $id);
    $update = $this->db->update('tabel_penjualan', $data);
    if ($update) {
        $this->response($data, 200);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

function index_delete()
{
    $id = $this->delete('id_penjualan');
    $this->db->where('id_penjualan', $id);
    $delete = $this->db->delete('tabel_penjualan');
    if ($delete) {
        $this->response(array('status' => 'success'), 201);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

}