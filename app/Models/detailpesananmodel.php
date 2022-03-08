<?php
namespace App\Models;

use CodeIgniter\Model;

class detailpesananmodel extends Model{
    protected $table  ='tb_detail_pesanan';
    //Uncomment below if you want add primary key
    protected $primarykey='id';
    protected $allowedFields=['id_user','tgl','total_harga','no_meja','nama_pemesan'];
}