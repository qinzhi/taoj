<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller {

    public function __construct(){
        parent::__construct();
        $user = session('user');
        if(empty($user)){
            $this->error('登陆失效，请重新登陆','/public/login');
        }
    }
}