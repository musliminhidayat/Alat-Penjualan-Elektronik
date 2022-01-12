<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>JABATAN</th>></tr>
    <?php
    foreach ($datapegawai as $pegawai){
        echo "<tr>
              <td>$pegawai->id_pegawai</td>
              <td>$pegawai->nama_pegawai</td>
              <td>$pegawai->jabatan</td>
              <td>".anchor('pegawai/edit/'.$pegawai->id_pegawai,'Edit')."
                  ".anchor('pegawai/delete/'.$pegawai->id_pegawai,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/Alat-Penjualan-elektronik/shop/index.php/pegawai/create">+ Tambah data<a>