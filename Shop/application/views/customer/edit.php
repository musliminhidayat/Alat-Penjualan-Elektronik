<a href="<?php echo base_url() ?>index.php/pegawai">Pegawai</a>
    <a href="<?php echo base_url() ?>index.php/penjualan">Penjualan</a>
    <a href="<?php echo base_url() ?>index.php/barang">Barang</a>
    <a href="<?php echo base_url() ?>index.php/customer">Customer</a>
<?php echo form_open('customer/edit');?>
<?php echo form_hidden('id_customer',$datacustomer[0]->id_customer);
?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$datacustomer[0]->id_customer,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_customer',$datacustomer[0]->nama_customer);?></td></tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat_customer',$datacustomer[0]->alamat_customer);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomor_telepon',$datacustomer[0]->nomor_telepon);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('customer','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>