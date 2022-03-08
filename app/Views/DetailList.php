<?=$this->extend('layouts/admin')?>
<?=$this->section('content')?>
<?php
    if(session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?=session()->getFlashdata('success')?>
    <button type="button" class="close" data-dismiss="alert" aria-label="close">Close</button>
</div>
<?php
    }
?>

<div class="container">
    <h3>Laporan</h3>
    <button type="button" class="btn btn-success mb-2 " data-toggle="modal" data-target="#adduser">Tambah Data</button>

    <table class="table table-bordered">
        <thead>
            <th>Id</th>
            <th>Id User</th>
            <th>tgl</th>
            <th>total harga</th>
            <th>no meja</th>
            <th>nama pemesan</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($detailpesanan as $row):
            ?>
            <td><?=$no?></td>
            <td><?=$row['id_user']?></td>
            <td><?=$row['tgl']?></td>
            <td><?=$row['total_harga']?></td>
            <td><?=$row['no_meja']?></td>
            <td><?=$row['nama_pemesan']?></td>
            <td>
                <a href="" class="btn btn-info btn-sm btn-edit">Edit</a>
                <a href="<?= base_url('menuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Mau Dihapus?')" class="btn btn-danger btn-sm btn-hapus">Hapus</a></td>
            </td>
            </tr>
            <?php
            $no++;
            endforeach?>
            </tbody>
            </table>
            </div>

<?=$this->endSection()?>