<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->assign('module',2);
        $this->category = D('Category');
    }

    public function index(){
        $categories = $this->category->order('sort')->get_all();
        $tree = new \Admin\Lib\Org\Util\Tree($categories);
        $categories = $tree->leaf();
        $this->assign('categories',$categories);
        $this->assign('method',1);
        $this->display();
    }

    public function add(){
        if(!empty($_POST)){
            $level = $this->category->get_level($_POST['p_id']);
            if($level <=3 && $level > 0){
                $data = array(
                    'name' => $_POST['name'],
                    'intro' => $_POST['intro'],
                    'sort' => $_POST['sort'],
                    'pid' => $_POST['p_id'],
                    'level' => $level,
                    'post_time' => time()
                );
                $this->category->add($data);
                $this->success('添加成功', '/category');
                return;
            }else{
                $this->success('添加失败，最大分类不能超过三级', '/category');
            }
        }
        $categories = $this->category->format_tree($this->category->get_all());
        $root = array(array('id'=>-1,'pId'=>0,'name'=>'根节点'));
        $categories = array_merge($root,$categories);
        $this->assign('categories',$categories);
        $this->assign('method',2);
        $this->display();
    }

    public function edit(){
        $id = (int)$_GET['id'];
        if(!empty($_POST)){
            $level = $this->category->get_level($_POST['p_id']);
            if($level <=3 && $level > 0){
                $data = array(
                    'id' => $id,
                    'name' => $_POST['name'],
                    'intro' => $_POST['intro'],
                    'sort' => $_POST['sort'],
                    'pid' => $_POST['p_id'],
                    'level' => $level
                );
                $this->category->save($data);
                $this->success('更新成功', '/category');
                return;
            }else{
                $this->success('更新失败，最大分类不能超过三级', '/category/edit?id=' . $id);
            }
        }
        $p_name = '根节点';
        $categories = $this->category->format_tree($this->category->get_all());
        $root = array(array('id'=>-1,'pId'=>0,'name'=> $p_name));
        $categories = array_merge($root,$categories);fb($categories);
        $category = $this->category->find($id);

        foreach($categories as $value){
            if($value['id'] == $category['pid']){
                $p_name = $value['name'];
            }
        }
        $this->assign('categories',$categories);
        $this->assign('category',$category);
        $this->assign('p_name',$p_name);
        $this->display();
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $result = $this->category->delete($id);
        if($result){
            $this->success('删除成功', '/category');
        }else{
            $this->error('删除失败', '/category');
        }
    }
}