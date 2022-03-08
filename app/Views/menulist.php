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
    <h3><strong>Data Menu</strong></h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addmenu">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stock</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stock']?></td>
                <td><a href="" class= "btn btn-info btn-sm btn-edit"data-toggle="modal" data-target="#editmenu-<?=$row['id']?>">Edit</a>
                <a href="<?= base_url('menuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Mau Dihapus?')" class="btn btn-danger btn-sm btn-hapus">Hapus</a></td>
            </tr>

<!--Modal Edit Menu-->
                <form action="<?=base_url('menu/edit/'.$row['id'])?>"method="post">
            <div class="modal fade" id="editmenu-<?=$row['id']?>" tabindex="-1" arial-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                        <buttton type="button" class="close" data-dismiss="modal" arial-label="close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                </div>
                    <from action="<?=base_url('menu')?>" method="post">
                <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Menu" value="<?=$row['nama']?>">
                </div>
                <div class="modal-body">
                
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="harga" value="<?=$row['harga']?>">
                </div>
                <div class="modal-body">

                <div class="form-group">
                    <label>Jenis</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" value="makanan" <?=$row['jenis']=="makanan"?"checked":""?>>
                    <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="minuman" value="minuman" <?=$row['jenis']=="minuman"?"checked":""?>>
                  <label class="form-check-label" for="flexRadioDefault1">Minuman</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="camilan" value="camilan" <?=$row['jenis']=="camilan"?"checked":""?>>
                    <label class="form-check-label" for="flexRadioDefault1">Camilan</label>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stock" placeholder="Stok Menu">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="image" class="form-control" name="gambar" placholder="Gambar Menu">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
            <?php
            $no++;
            endforeach?>
            </tbody>
            </table>
            </div>
<!--End Modal Edit Menu-->
<form action="/menucontroller/simpan" method="post">
    <div class="modal fade" id="addmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" arial-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModelLabel">Add menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('menu')?>" method="post">
                <div class="modal-body">
                    
                    <div class="modal-body">
                        <div class="from-group">
                            <label>Nama</label>
                            <input type="text" class="from-control" name="nama" placeholder="nama"></input>
                        </div>
                        <div class="from-group">
                            <label>Harga</label>
                            <input type="text" class="from-control" name="harga" placeholder="harga"></input>
                        </div>
                        <div class="from-group">
                            <label>Jenis</label>
                            <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" value="makanan">
                    <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="minuman" value="minuman" >
                  <label class="form-check-label" for="flexRadioDefault1">Minuman</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="camilan" value="camilan" >
                    <label class="form-check-label" for="flexRadioDefault1">Camilan</label>
                </div>
                        
                        <div class="from-group">
                            <label>Stock</label>
                            <input type="text" class="from-conrol" name="stock" placeholder="stock"></input>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
<?=$this->endSection() ?>  