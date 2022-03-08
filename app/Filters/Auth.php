<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request,$argumenst = null)
    {
        //jika user belum login
        if(! session()->get('role')){
            //maka redirct ke halaman login
            return redirect('login');
        }
    }

    //-------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response,$argumenst= null)
    {
        //do something here
    }
}