<?php

defined('BASEPATH') or exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';
require('application/libraries/REST_Controller.php');
//use Restserver\Libraries\REST_Controller;
class Apicustomer extends REST_Controller
{
function __construct($config = 'rest')

{
    parent::__construct($config);
    $this->load->database();
    }
    
    function index_get()
    {
         $id = $this->get('id_customer');
         if ($id == '') {
             $customer = $this->db->get('tabel_customer')->result();
        } else {
            $this->db->where('id_customer', $id);
            $customer = $this->db->get('tabel_customer')->result();
         }
        $this->response($customer, 200);
    }
   
    function index_post()
    {
        $data = array(
            'id_customer' => $this->post('id_customer'),
            'nama_customer' => $this->post('nama_customer'),
            'alamat_customer' => $this->post('alamat_customer'),
            'nomor_telepon' => $this->post('nomor_telepon')
    );
    $insert = $this->db->insert('tabel_customer', $data);
    if ($insert) {
        $this->response($data, 200);
    } else {
         $this->response(array('status' => 'fail', 502));
    }
    }
    
    function index_put()
    {
        $id = $this->put('id_customer');
        $data = array(
            'id_customer' => $this->put('id_customer'),
            'nama_customer' => $this->put('nama_customer'),
            'alamat_customer' => $this->put('alamat_customer'),
            'nomor_telepon' => $this->put('nomor_telepon')
    );
    $this->db->where('id_customer', $id);
    $update = $this->db->update('tabel_customer', $data);
    if ($update) {
        $this->response($data, 200);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

function index_delete()
{
    $id = $this->delete('id_customer');
    $this->db->where('id_customer', $id);
    $delete = $this->db->delete('tabel_customer');
    if ($delete) {
        $this->response(array('status' => 'success'), 201);
} else {
    $this->response(array('status' => 'fail', 502));
}
}

}