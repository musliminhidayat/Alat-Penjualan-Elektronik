<?php echo form_open('barang/edit');?>
<?php echo form_hidden('id',$databarang[0]->id);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$databarang[0]->id,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama',$databarang[0]->nama);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomor',$databarang[0]->nomor);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('barang','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>