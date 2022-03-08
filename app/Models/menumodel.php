<?php
namespace App\Models;

use CodeIgniter\Model;

class menumodel extends Model{
    protected $table ='tb_menu';
    //Uncomment below if you want add primary key
    protected $primarykey="id";
    protected $allowedFields=['nama','harga','jenis','stock'];
}