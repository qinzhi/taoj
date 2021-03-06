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
        $user = session('user');
        if(!empty($user)){
            header('Location: /banner');
        }
        $this->display('login');
    }

    public function login(){
        $user = session('user');
        if(!empty($user)){
            header('Location: /banner');
        }
        $this->display();
    }

    public function verify(){
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']) . C('SALT_STR'));
        $admin = $this->admin->where(array('user'=>$username))->find();fb($admin);
        if(!empty($admin)){fb($password);
            if($password == $admin['password']){
                $time = time();
                $admin['last_login_time'] = $time;
                $this->admin->save($admin);
                session('user',$username);
                session('last_login_time',$time);
                $this->success('登陆成功','/banner');
                return;
            }
        }
        $this->success('用户名或密码错误，登陆失败','/login');
        //$this->error('账户或密码不正确');
    }

    public function logout(){
        session(null);
        $this->display('login');
    }
}