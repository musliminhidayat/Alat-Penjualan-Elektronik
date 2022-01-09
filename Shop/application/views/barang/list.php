<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>HARGA</th><th>STOK</th></tr>
    <?php
    foreach ($databarang as $barang){
        echo "<tr>
              <td>$barang->id_barang</td>
              <td>$barang->nama_barang</td>
              <td>$barang->harga_barang</td>
              <td>$barang->stok_barang</td>
              <td>".anchor('barang/edit/'.$barang->id_barang,'Edit')."
                  ".anchor('barang/delete/'.$barang->id_barang,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/Alat-Penjualan-elektronik/shop/index.php/barang/create">+ Tambah data<a>