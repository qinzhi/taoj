<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function __construct(){
        parent::__construct();

        $banner = D('Banner')->find();
        $this->assign('banner',$banner);

        $category = D('Category')->order('sort')->select();
        $this->assign('category',$category);
    }

    public function index(){
        $page = (int)$_GET['page'];
        $page = $page ? $page : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total = M('Appeal')->count();
        $page_num = ceil( $total / $limit );
        $appeal = M('Appeal')->field('id,title,read_num,post_time')
                                ->limit($offset,$limit)
                                ->select();

        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->assign('page_num',$page_num);
        $this->assign('appeal',$appeal);
        $this->display();
    }

    public function content(){
        $id = $_GET['id'];

        $appeal = M('Appeal')->find($id);
        $this->assign('appeal',$appeal);

        $where['aid'] = $id;
        $reply = M('Appeal_reply')->where($where)->select();
        $this->assign('reply',$reply);

        $this->display();
    }

    public function reply(){
        $content = $_POST['content'];
        $id = (int)$_POST['id'];
        $data = array(
            'reply' => $content
            ,'aid' => $id
            ,'user' => '阿畅哥·烽火戏诸侯'
            ,'post_time' => time()
        );
        $result = M('Appeal_reply')->add($data);
        echo $result;
    }

    public function appeal(){
        if(!empty($_POST)){
            $file = $_FILES['file'];
            $file_name = $file['name'];
            $suffix = $this->get_extension($file_name);
            $upload = PROJECT_PATH . '/Public/Wechat/user_up/';
            $timeDir = date('Y-m-d') . '/';
            $upload .= $timeDir;
            if(!is_dir($upload)){
                mkdir($upload,0777);
            }
            $new_file_name = time() . '_' .rand(0,10000) . '.' .$suffix;
            $newfile = $upload . $new_file_name;
            if(move_uploaded_file($file['tmp_name'],$newfile)){
                $data = array(
                    'title' => $_POST['title']
                    ,'content' => $_POST['content']
                    ,'author' => '阿畅哥·烽火戏诸侯'
                    ,'cid' => $_POST['category']
                    ,'image_url' => $timeDir . $new_file_name
                    ,'post_time' => time()
                );
                $result = M('Appeal')->add($data);
                if($result){
                    //求助成功
                    header('Location: /index/category?id=' . $_POST['category']);
                    return;
                }
            }
        }
        $this->display();
    }

    public function category(){
        $id = (int)$_GET['id'];
        $params = '&id='.$id;
        $where['cid'] = $id;

        $keyword = $_GET['keyword'];
        if(!empty($keyword)){
            $params .= '&keyword='.$keyword;
            $where['title'] = array('like',"%$keyword%");
        }

        $page = (int)$_GET['page'];
        $page = $page ? $page : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total = M('Appeal')->where($where)->count();
        $page_num = ceil( $total / $limit );
        $appeal = M('Appeal')->field('id,title,read_num,post_time')
                                    ->where($where)->limit($offset,$limit)
                                        ->select();

        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->assign('page_num',$page_num);
        $this->assign('params',$params);
        $this->assign('appeal',$appeal);
        $this->display('list');
    }


    private function get_extension($file)
    {
        $info = pathinfo($file);
        return $info['extension'];
    }
}