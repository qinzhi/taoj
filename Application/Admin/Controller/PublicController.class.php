<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 9:43
 */

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->admin = D('Admin');
    }

    public function index(){
        $this->display('login');
    }

    public function login(){
        $this->display();
    }

    public function verify(){
        $username = trim($_POST['username']);fb($username);
        $password = md5(trim($_POST['password']) . C('SALT_STR'));
        $admin = $this->admin->where(array('user'=>$username))->find();
        if(!empty($admin)){
            if($password == $admin['psd']){
                $time = time();
                $admin['logintime'] = $time;
                $this->admin->save($admin);
                session('user',$username);
                session('login_time',$time);
                $this->success('登陆成功','/banner');
            }
        }
        //$this->error('账户或密码不正确');
    }

    public function logout(){
        session(null);
        $this->display('login');
    }
}