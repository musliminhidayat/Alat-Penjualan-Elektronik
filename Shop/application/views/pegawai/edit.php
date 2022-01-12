<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open('pegawai/edit');?>
<?php echo form_hidden('id_pegawai',$datapegawai[0]->id_pegawai);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$datapegawai[0]->id_pegawai,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_pegawai',$datapegawai[0]->nama_pegawai);?></td></tr>
    <tr><td>JABTAN</td><td><?php echo form_input('jabatan',$datapegawai[0]->jabatan);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('pegawai','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>