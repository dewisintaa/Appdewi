<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\pesananmodel;

class pesanancontroller extends Controller{
    /**
     * Instance of the main Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $requests;

    function __construct()
    {
        $this->laporan = new pesananmodel();
    }
    public function index()
    {
        $data['data']=$this->laporan->findAll();
        return view ('laporan',$data);
    }
    public function delete($id)
    {
        #code...
        $this->detailpesanan->delete($id);
        return redirect('laporan')->with('success','data berhasil dihapus');
    }
}