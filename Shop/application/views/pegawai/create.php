<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open_multipart('pegawai/create');?>
<table>
    <tr><td>ID</td><td><?php echo form_input('id_pegawai');?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_pegawai');?></td></tr>
    <tr><td>JABATAN</td><td><?php echo form_input('jabatan');?></td></tr>    
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('pegawai','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>