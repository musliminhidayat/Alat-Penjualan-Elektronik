<?php echo form_open_multipart('customer/create');?>
<table>
    <tr><td>ID</td><td><?php echo form_input('id_customer');?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_customer');?></td></tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat_customer');?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomor_telepon');?></td></tr>          
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('customer','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>