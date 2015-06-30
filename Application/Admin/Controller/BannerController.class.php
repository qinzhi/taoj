<?php
namespace Admin\Controller;
use Think\Controller;

class BannerController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->banner = D('Banner');
    }

    public function index(){
        $banner = $this->banner
                            ->order('sort desc')->select();
        $this->assign('banner',$banner);
        $this->display();
    }

    public function add(){
        if(!empty($_POST)){
            $data = array(
                'name' => $_POST['name']
                ,'intro' => $_POST['intro']
                ,'image' => $_POST['image']
                ,'sort' => $_POST['sort']
                ,'url' => $_POST['url']
                ,'post_time' => time()
            );
            $result = $this->banner->add($data);
            if($result){
                $this->success('添加成功','/banner');
                return;
            }
        }
        $this->display();
    }

    public function edit(){
        $id = (int)$_GET['id'];
        if(!empty($_POST)){
            $data = array(
                'id' => $id,
                'name' => $_POST['name']
                ,'intro' => $_POST['intro']
                ,'image' => $_POST['image']
                ,'sort' => $_POST['sort']
                ,'url' => $_POST['url']
            );
            $this->banner->save($data);
            $this->success('更新成功','/banner');
            return;
        }
        $banner = $this->banner->find($id);
        $this->assign('banner',$banner);
        $this->display();
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $result = $this->banner->delete($id);
        if($result)
            $this->success('删除成功','/banner');
        else
            $this->success('删除成功','/banner');
    }
}