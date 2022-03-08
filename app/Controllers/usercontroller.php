<?php
namespace App\controllers;

use CodeIgniter\Controller;
use App\Models\usermodel;
use CodeIgniter\HTTP\Request;
use Tests\Support\Entity\user;

class usercontroller extends controller
{ 
    /**
     * Instance of the main Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->user= new usermodel();
    }
    public function tampil()
    {
        
        #code...
        //$users = new Users();
        $data['duser'] = $this->user->findAll();
        return view('userlist',$data);
    }
    public function simpan()
    {
        #code...
        $data = array(
            'nama' =>$this->request->getPost('nama'),
            'password'=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'username'=> $this->request->getPost('username'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'jenis'=> $this->request->getPost('jenis')
        );
        $this->user->insert($data);
        return redirect('user')->with('success','data berhasil disimpan');
    }
    public function edit($id)
    {
        #code...
        // dd($this->request->getPost('password));
        $datac = array(
            'nama'=>$this->request->getPost('nama'),
            'password'=> password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'username'=> $this->request->getPost('username'),
            'role'=> $this->request->getPost('role')
        );
        $this->user->update($id, $datac);
        return redirect('user')->with('success','data berhasil disimpan');
    }
    public function tlogin()
    {
        return view('login');
    }
    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $this->user->where('username',$username)->first();
        if($data){
            $pass = $data['password'];
            $cek_pass = password_verify($password, $pass);
            if ($cek_pass) {
                $ses_data =[
                'id' =>$data['id'],
                'username' =>$data['username'],
                'role' =>$data['role'],
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');   
        }else{
            $session->setFlashdata('msg','password keliru ditemukan');
            return redirect('login');
        }
        }else{
            $session->setFlashdata('msg','username tidak ditemukan');
            return redirect('login');
        }
    }
    public function logout()
    {
        #code...
        $session =session();
        $session->destroy();
        return redirect('login');
    }
    public function show($id)
    {
        #code...
    }
    public function delete($id)
    {
        #code...
        $this->user->delete($id);
        return redirect('user')->with('success','Data berhasil dihapus');
    }
}