<?php

defined('BASEPATH') or exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;
class Apibarang extends REST_Controller
{
function __construct($config = 'rest')

{
    parent::__construct($config);
    $this->load->database();
    }
    
    function index_get()
    {
         $id = $this->get('id_barang');
         if ($id == '') {
             $barang = $this->db->get('tabel_barang')->result();
        } else {
            $this->db->where('id_barang', $id);
            $barang = $this->db->get('tabel_barang')->result();
         }
        $this->response($barang, 200);
    }
    
    function index_post()
    {
        $data = array(
            'id_barang' => $this->post('id_barang'),
            'nama_barang' => $this->post('nama_barang'),
            'harga_barang' => $this->post('harga_barang'),
            'stok_barang' => $this->post('stok_barang')
    );
    $insert = $this->db->insert('tabel_barang', $data);
    if ($insert) {
        $this->response($data, 200);
    } else {
         $this->response(array('status' => 'fail', 502));
    }
    }
    
    function index_put()
    {
        $id = $this->put('id_barang');
        $data = array(
            'id_barang' => $this->put('id_barang'),
            'nama_barang' => $this->put('nama_barang'),
            'harga_barang' => $this->put('harga_barang'),
            'stok_barang' => $this->put('stok_barang')
    );
    $this->db->where('id_barang', $id);
    $update = $this->db->update('tabel_barang', $data);
    if ($update) {
        $this->response($data, 200);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

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

}