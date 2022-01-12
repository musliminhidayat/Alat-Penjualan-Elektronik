<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open_multipart('barang/create');?>
<table>
    <tr><td>Id</td><td><?php echo form_input('id_barang');?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_barang');?></td></tr>
    <tr><td>HARGA</td><td><?php echo form_input('harga_barang');?></td></tr>
    <tr><td>STOK</td><td><?php echo form_input('stok_barang');?></td></tr>          
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('barang','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>