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
    //Menampilkan data kontak
    function index_get()
    {
         $id = $this->get('id_transaksi');
         if ($id == '') {
             $transaksi = $this->db->get('tabel_transaksi')->result();
    } else {
        $this->db->where('id_transaksi', $id);
        $transaksi = $this->db->get('tabel_transaksi')->result();
    }
        $this->response($barang, 200);
    }
    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id_transaksi' => $this->post('id_transaksi'),
            'id_barang' => $this->post('id_barang'),
            'nama_pembeli' => $this->post('nama_pembeli'),
            'nomor_pembeli' => $this->post('nomor_pembeli'),
            'alamat_pembeli' => $this->post('alamat_pembeli').
            'jumlah_pesanan' => $this->post('jumlah_pesanan').
            'total_harga' => $this->post('total_harga'),
            'tanggal_pesanan' => $this->post('tanggal_pesanan')
    );
    $insert = $this->db->insert('tabel_transaksi', $data);
    if ($insert) {
        $this->response($data, 200);
    } else {
         $this->response(array('status' => 'fail', 502));
    }
    }
    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        $id = $this->put('id_barang');
        $data = array(
            'id_barang' => $this->put('id_barang'),
            'nama_barang' => $this->put('nama_barang'),
            'harga_barang' => $this->put('harga_barang'),
            'stok_barang' => $this->post('stok_barang')
    );
    $this->db->where('id_barang', $id);
    $update = $this->db->update('tabel_barang', $data);
    if ($update) {
        $this->response($data, 200);
} else {
    $this->response(array('status' => 'fail', 502));
}
}
//Menghapus salah satu data kontak
function index_delete()
{
    $id = $this->delete('id_barang');
    $this->db->where('id_barang', $id);
    $delete = $this->db->delete('tabel_barang');
    if ($delete) {
        $this->response(array('status' => 'success'), 201);
} else {
    $this->response(array('status' => 'fail', 502));
}
}
//Masukan function selanjutnya disini
}