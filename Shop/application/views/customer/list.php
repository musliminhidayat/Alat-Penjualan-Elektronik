<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>ALAMAT</th><th>NOMOR</th></tr>
    </tr>
    <?php
    foreach ($datacustomer as $customer){
        echo "<tr>
              <td>$customer->id_customer</td>
              <td>$customer->nama_customer</td>
              <td>$customer->alamat_customer</td>
              <td>$customer->nomor_telepon</td>
              <td>".anchor('customer/edit/'.$customer->id_customer,'Edit')."
                  ".anchor('customer/delete/'.$customer->id_customer,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/Alat-Penjualan-elektronik/shop/index.php/customer/create">+ Tambah data<a>