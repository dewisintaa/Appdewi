<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\menumodel;
        
class menucontroller extends Controller{
    /**
     * Instance of the main Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $requests;

    function __construct()
    {
        $this->menu =new menumodel();
    }
    public function tampil()
    {
        $data['data'] =$this->menu->findAll();
        return view ('menulist',$data);
    }
    public function simpan()
    {
        #code...
        $data = array(
            'nama'=>$this->request->getpost('nama'),
            'harga'=>$this->request->getpost('harga'),
            'jenis'=>$this->request->getpost('jenis'),
            'stock'=>$this->request->getpost('stock'),
        );
        $this->menu->insert($data);
        return redirect('menu')->with('success','databerhasil disimpan');
    }
    public function delete($id)
    {
        #code...
        $this->menu->delete($id);
        return redirect('menu')->with('success','data berhasil dihapus');
    }
    public function edit($id)
    {
        #code...
        $data =array(
            'nama'=>$this->request->getpost('nama'),
            'harga'=>$this->request->getpost('harga'),
            'jenis'=>$this->request->getpost('jenis'),
            'stock'=>$this->request->getpost('stock'),
        );
        $this->menu->update($id,$data);
        return redirect('menu')->with('success','data berhasil diedit');
    }
}