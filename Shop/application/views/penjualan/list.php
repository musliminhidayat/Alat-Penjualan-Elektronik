<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>ID_BARANG</th><th>NAMA</th><th>NOMOR</th><th>ALAMAT</th><th>JUMLAH</th><th>TOTAL</th><th>ID Pegawai</th></tr>
    <?php
    foreach ($datapenjualan as $penjualan){
        echo "<tr>
              <td>$penjualan->id_penjualan</td>
              <td>$penjualan->id_barang</td>
              <td>$penjualan->nama_pembeli</td>
              <td>$penjualan->nomor_pembeli</td>
              <td>$penjualan->alamat_pembeli</td>
              <td>$penjualan->jumlah_pesanan</td>
              <td>$penjualan->total_harga</td>
              <td>$penjualan->id_pegawai</td>
              <td>".anchor('penjualan/edit/'.$penjualan->id_penjualan,'Edit')."
                  ".anchor('penjualan/delete/'.$penjualan->id_penjualan,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/Alat-Penjualan-elektronik/shop/index.php/penjualan/create">+ Tambah data<a>