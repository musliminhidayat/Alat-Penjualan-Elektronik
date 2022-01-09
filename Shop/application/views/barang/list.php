<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>HARGA</th><th>STOK</th></tr>
    <?php
    foreach ($databarang as $barang){
        echo "<tr>
              <td>$kontak->id</td>
              <td>$kontak->nama</td>
              <td>$kontak->nomor</td>
              <td>".anchor('kontak/edit/'.$kontak->id,'Edit')."
                  ".anchor('kontak/delete/'.$kontak->id,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/rest_client/index.php/kontak/create">+ Tambah data<a>