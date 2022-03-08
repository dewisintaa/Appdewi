<?php
namespace App\Models;

use CodeIgniter\Model;

class usermodel extends Model{
    protected $table ='tb_user';
    //Uncomment below if you want add primary key
    protected $primarykey='id';
    protected $allowedFields=['id_user','nama','username','password','role'];
}