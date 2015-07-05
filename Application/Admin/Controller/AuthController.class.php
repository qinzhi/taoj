<?php
namespace Admin\Controller;
use Think\Controller;

class AuthController extends AdminController {

    public function __construct(){
        parent::__construct();

        $this->assign('module',3);
        $this->auth = D('Auth');
    }

    public function index(){
        if(!empty($_POST)){
            $this->add($_POST);
        }
        $auth = $this->auth->select();
        $this->assign('method',1);
        $this->assign('auth',$auth);
        $this->display();
    }

    public function add(){
        if(!empty($_POST)){
            $data = array(
                'wx_name' => trim($_POST['wx_name'])
                ,'post_time' => time()
            );
            $this->auth->add($data);
        }
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $result = $this->auth->delete($id);
        if($result)
            $this->success('删除成功','/auth');
        else
            $this->success('删除成功','/auth');
    }
}