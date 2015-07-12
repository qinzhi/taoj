<?php
namespace Admin\Controller;
use Think\Controller;

class AppealController extends AdminController {

    public function __construct(){
        parent::__construct();

        $this->assign('module',4);
        $this->appeal = D('Appeal');
        $this->appeal_reply = D('Appeal_reply');
    }

    public function index(){

        $categories = D('Category')->order('sort')->get_all();
        $tree = new \Admin\Lib\Org\Util\Tree($categories);
        $categories = $tree->leaf();

        $cid = (int)$_GET['cid'];
        $where = array();
        $params = '';
        if($cid != ''){
            $where['cid'] = $cid;
            $params = '&cid=' . $cid;
        }
        $page = (int)$_GET['page'];
        $page = !empty($page) ? $page : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $total = $this->appeal->get_total($where);
        $page_num = ceil( $total / $limit );

        $appeal = $this->appeal->get_appeals($limit,$offset,$where);

        foreach($appeal as $key=>$value){
            foreach($categories as $category){
                if($value['cid'] == $category['id']){
                    $appeal[$key]['c_name'] = $category['name'];
                }
            }
        }
        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->assign('page_num',$page_num);
        $this->assign('appeal',$appeal);
        $this->assign('categories',$categories);
        $this->display();
    }

    public function reply(){
        $id = (int)$_GET['id'];
        $appeal = $this->appeal->get_appeal($id);

        $reply = $this->appeal_reply->where('aid=' . $id)->select();

        $this->assign('reply',$reply);
        $this->assign('appeal',$appeal);
        $this->display();
    }

    public function delete(){
        $id = (int)$_GET['id'];
        $this->appeal->delete($id);
        $result = $this->appeal_reply->where('aid=' . $id)->delete();
        if($result)
            $this->success('删除成功','/appeal');
        else
            $this->success('删除成功','/appeal');
    }
}