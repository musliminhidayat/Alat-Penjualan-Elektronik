<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open_multipart('penjualan/create');?>
<table>
    <tr><td>Id</td><td><?php echo form_input('id_penjualan');?></td></tr>
    <tr><td>Id_BARANG</td><td><?php echo form_input('id_barang');?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_pembeli');?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomor_pembeli');?></td></tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat_pembeli');?></td></tr>
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah_pesanan');?></td></tr>
    <tr><td>TOTAL</td><td><?php echo form_input('total_harga');?></td></tr>     
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('penjualan','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>