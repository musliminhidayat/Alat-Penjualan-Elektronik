<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open('penjualan/edit');?>
<?php echo form_hidden('id_penjualan',$datapenjualan[0]->id_penjualan);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$datapenjualan[0]->id_penjualan,"disabled");?></td></tr>
    <tr><td>ID_BARANG</td><td><?php echo form_input('id_barang',$datapenjualan[0]->id_barang);?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_pembeli',$datapenjualan[0]->nama_pembeli);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomor_pembeli',$datapenjualan[0]->nomor_pembeli);?></td></tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat_pembeli',$datapenjualan[0]->alamat_pembeli);?></td></tr>
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah_pesanan',$datapenjualan[0]->jumlah_pesanan);?></td></tr>
    <tr><td>TOTAL</td><td><?php echo form_input('total_harga',$datapenjualan[0]->total_harga);?></td></tr>
    <tr><td>ID Pegawai</td><td><?php echo form_input('id_pegawai',$datapenjualan[0]->id_pegawai);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('penjualan','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>