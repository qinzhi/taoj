<?php
namespace Admin\Controller;
use Think\Controller;

class ExpertController extends AdminController {

    public function __construct(){
        parent::__construct();

        $this->assign('module',5);
        $this->expert = D('Expert');
    }

    public function index(){
        $expert = $this->expert
            ->order('sort desc')->select();
        $this->assign('method',1);
        $this->assign('expert',$expert);
        $this->display();
    }

    public function add(){
        if(!empty($_POST)){
            $data = array(
                'name' => trim($_POST['name'])
                ,'intro' => trim($_POST['intro'])
                ,'wx_name' => trim($_POST['wx_name'])
                ,'wx_unionid' => trim($_POST['wx_unionid'])
                ,'avator' => $_POST['avator']
                ,'organ' => trim($_POST['organ'])
                ,'sort' => trim($_POST['sort'])
                ,'detail' => $_POST['describe']
                ,'post_time' => time()
            );
            $result = $this->expert->add($data);
            if($result){
                $this->success('添加成功','/expert');
                return;
            }
        }
        $this->assign('method',2);
        $this->display();
    }

    public function edit(){
        $id = (int)$_GET['id'];
        if(!empty($_POST)){
            $data = array(
                'id' => $id,
                'name' => trim($_POST['name'])
                ,'intro' => trim($_POST['intro'])
                ,'wx_name' => trim($_POST['wx_name'])
                ,'wx_unionid' => trim($_POST['wx_unionid'])
                ,'avator' => $_POST['avator']
                ,'organ' => trim($_POST['organ'])
                ,'sort' => trim($_POST['sort'])
                ,'detail' => $_POST['describe']
            );
            $this->expert->save($data);
            $this->success('更新成功','/expert');
            return;
        }
        $expert = $this->expert->find($id);
        $this->assign('expert',$expert);
        $this->display();
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $result = $this->expert->delete($id);
        if($result)
            $this->success('删除成功','/expert');
        else
            $this->success('删除成功','/expert');
    }
}