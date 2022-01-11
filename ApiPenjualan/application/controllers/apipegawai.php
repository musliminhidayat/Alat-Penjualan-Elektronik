<?php

defined('BASEPATH') or exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;
class Apipegawai extends REST_Controller
{
function __construct($config = 'rest')

{
    parent::__construct($config);
    $this->load->database();
    }
    
    function index_get()
    {
         $id = $this->get('id_pegawai');
         if ($id == '') {
             $pegawai = $this->db->get('tabel_pegawai')->result();
    } else {
        $this->db->where('id_pegawai', $id);
        $pegawai = $this->db->get('tabel_pegawai')->result();
    }
        $this->response($pegawai, 200);
    }
    
    function index_post()
    {
        $data = array(
            'id_pegawai' => $this->post('id_pegawai'),
            'nama_pegawai' => $this->post('nama_pegawai'),
            'jabatan' => $this->post('jabatan')

        );
    $insert = $this->db->insert('tabel_pegawai', $data);
    if ($insert) {
        $this->response($data, 200);
    } else {
         $this->response(array('status' => 'fail', 502));
    }
    }
    
    function index_put()
    {
        $id = $this->put('id_pegawai');
        $data = array(
            'id_pegawai' => $this->put('id_pegawai'),
            'nama_pegawai' => $this->put('nama_pegawai'),
            'jabatan' => $this->put('jabatan')
    );
    $this->db->where('id_pegawai', $id);
    $update = $this->db->update('tabel_pegawai', $data);
    if ($update) {
        $this->response($data, 200);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

function index_delete()
{
    $id = $this->delete('id_pegawai');
    $this->db->where('id_pegawai', $id);
    $delete = $this->db->delete('tabel_pegawai');
    if ($delete) {
        $this->response(array('status' => 'success'), 201);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

}