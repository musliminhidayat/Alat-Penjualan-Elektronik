<?php echo form_open('barang/edit');?>
<?php echo form_hidden('id_barang',$databarang[0]->id);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$databarang[0]->id,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_barang',$databarang[0]->nama);?></td></tr>
    <tr><td>HARGA</td><td><?php echo form_input('harga_barang',$databarang[0]->harga);?></td></tr>
    <tr><td>STOK</td><td><?php echo form_input('stok_barang',$databarang[0]->stok);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('barang','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>