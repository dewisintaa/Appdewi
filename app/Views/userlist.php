<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
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
    <h3><strong>Data User</strong></h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#adduser">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>no</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($duser as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['password']?></td>
                <td><?=$row['role']?></td>
                <td>
                <a href="#" class= "btn btn-warning" data-toggle="modal" data-target="#editUser-<?=$row['id']?>" btn-sm btn-edit>Edit</a>
                <a href="<?= base_url ('usercontroller/delete/' .$row['id'])?>" onclick="return confirm('Yakin Mau Dihapus?')"class= "btn btn-danger btn-sm btn-delete">Hapus</a>
                </td>
            </tr>
       <!--Add product-->
<form action="users/edit/<?=$row['id']?>" method="post">
    <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama User" value="<?=$row['nama']?>"></input>
                </div>
                <dic class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?=$row['username']?>"placeholder="Username"></input>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="manager" <?= $row['role']=="manager"?"checked":""?>></input>
                        <label class="form-check-label" for="flexRadioDefault1">Manager</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="Kasir" <?= $row['role']=="kasir"?"checked":""?>></input>
                        <label class="form-check-label" for="flexRadioDefault2">Kasir</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="Admin" <?= $row['role']=="admin"?"checked":""?>></input>
                        <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                    </div>
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
<!--Add product-->
<form action="/UserController/simpan" method="post">
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama User"></input>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username"></input>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password"></input>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="Kasir"></input>
                        <label class="form-check-label" for="flexRadioDefault1">kasir</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager"></input>
                        <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="Admin"></input>
                        <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                    </div>
                </div>

                <div class="modal-footer">  
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?=$this->endSection()?>
