<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\menumodel;
use App\Models\pesananmodel;
use \App\Models\detailpesananmodel;
use CodeIgniter\HTTP\Request;

class pesanancontroller extends Controller{

    /**
     * Instance of the main Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->menu = new menumodel();
        $this->session = session();
        $this->pesanan = new pesananmodel();
        $this->detail = new detailpesananmodel();
    }

    public function index()
    {
        $data['data']=$this->menu->select('id,nama')->findAll();
        if(session('cart')!= null)
        {
            $data['menu']=array_values(session('cart'));
        }else{
            $data['menu'] = null;
        }
        return view("pesananlist",$data);
    }

    public function addCart()
    {
        $id= $this->request->getPost('menu_id');
        $jumlah =$this->request->getPost('jumlah');
        $men = $this->menu->find($id);
        if($men){
        }
        $isi = array(
            'menu_id' => $id,
            'nama' => $men['nama'],
            'harga'=> $men['harga'],
            'jumlah' => $jumlah
        );

        if($this->session->has('cart')){
            $index =$this->cek($id);
            $cart = array_values(session('cart'));
            if ($index== -1){
                array_push($cart,$isi);
            }else{
                $cart[$index]['jumlah'] +=$jumlah;
            }
            $this->session->set('cart',$cart);
        }else{
            $this->session->set('cart',array($isi));
        }
        return redirect('pesanan')->with('success','Data berhasil Di Tambahkan'. $men['nama']);
    }

    public function cek($id)
    {
        $cart = array_values(session('cart'));
        for($i = 0; $i < count($cart); $i++){
            if($cart[$i]['menu_id'] == $id){
                return $i;
            }
        }
        return -1;
    }
    public function hapuscart($id)
    {
        # code...
        $index = $this->cek($id);
        $cart= array_values(session('cart'));
        unset($cart[$index]);
        $this->session->set('cart',$cart);
        return redirect('pesanan')->with('success',"data berhasil dihapus");
    }
    public function simpan(){
        if(session('cart') !=null){
            $datatrans = array(
                'tgl'=>date('Y/m/d'),
                'id_user'=>1,
                'no_meja'=>$this->request->getPost('no_meja'),
                'nama_pemesan'=>$this->request->getPost('nama_pemesan'),
                'total_harga'=>'0',
            );
            $id = $this->pesanan->insert($datatrans);
            $cart = array_values(session('cart'));
            $tharga=0;
            foreach($cart as $val){
                $datadetail = array(
                    'id_transaksi'=>$id, 
                    'id_menu'=>$val['menu_id'],
                    'jumlah'=>$val['jumlah'],
                );
                $tharga+=$val['jumlah']*$val['harga'];
                $this->detail->insert($datadetail);
            } 
            {
            $dtharga=array(
                'total_harga'=>$tharga
            );  
                $this->pesanan->update($id,$dtharga);                                                  
                $this->session->remove('cart');
            return redirect('pesanan')->with('success','Data berhasil disimpan'); 
            }
        }
    }
}