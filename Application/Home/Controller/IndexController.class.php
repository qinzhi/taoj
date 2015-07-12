<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public $username,$openid,$unionid;

    public function __construct(){
        parent::__construct();
        $this->init();
    }

    public function index(){
        //cookie('openid',NULL);
        $page = (int)$_GET['page'];
        $page = $page ? $page : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total = M('Appeal')->count();
        $page_num = ceil( $total / $limit );
        $appeal = M('Appeal')->field('id,title,read_num,post_time')->order('id desc')
                                ->limit($offset,$limit)
                                ->select();

        $expert = M('expert')->field('id,name,intro,organ,avator')->order('sort desc')->limit(4)->select();
        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->assign('page_num',$page_num);
        $this->assign('expert',$expert);
        $this->assign('appeal',$appeal);
        $this->display();
    }

    public function expert(){
        $id = (int)$_GET['id'];
        $expert = M('expert')->where("id=$id")->find();
        $this->assign('expert',$expert);fb($expert);
        $this->display();
    }

    public function content(){
        $id = (int)$_GET['id'];

        $appeal = M('Appeal')->find($id);
        $this->assign('appeal',$appeal);

        $where['aid'] = $id;
        $limit = 10;
        $reply = M('Appeal_reply t1')->join('Expert t2 ON t1.unionid = t2.wx_unionid' , 'left')
                    ->where($where)->order('t1.is_expert desc,t1.post_time desc')->limit($limit)->select();
        if(!empty($appeal)){
            $session_id = session('appeal_' . $appeal['id']);
            if(empty($session_id)){
                $where['id'] =  $appeal['id'];
                $result = M('Appeal')->where($where)->setInc('read_num');
                if($result) session('appeal_' . $appeal['id'] , $appeal['id']);
            }
        }

        $this->assign('reply',$reply);

        $this->display();
    }

    public function get_reply(){
        $limit = 10;
        $page = (int)$_POST['page'];
        $page = $page ? $page : 2;
        $offset = ($page - 1) * $limit;
        $aid = (int)$_POST['aid'];
        $where['aid'] = $aid;
        $reply = M('Appeal_reply')->where($where)->order('is_expert desc,post_time desc')->limit($limit)->select();
        if(!empty($reply)){
            $this->ajaxReturn($reply,'json');
        }
    }

    public function reply(){
        $content = $_POST['content'];
        $id = (int)$_POST['id'];
        $where = "user='{$this->username}' OR unionid='{$this->unionid}'";
        $expert = M('Expert')->where($where)->find();
        $is_expert = !empty($expert) ? 1 : 0;
        $data = array(
            'reply' => $content
            ,'aid' => $id
            ,'openid' => $this->openid
            ,'unionid' => $this->unionid
            ,'user' => $this->username
            ,'is_expert' => $is_expert
            ,'post_time' => time()
        );
        $result = M('Appeal_reply')->add($data);
        echo $result;
    }

    public function appeal(){
        if(!empty($_POST)){
            if(!empty($_FILES['file'])){
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
                move_uploaded_file($file['tmp_name'],$newfile);
            }
            $data = array(
                'title' => $_POST['title']
                ,'content' => $_POST['content']
                ,'openid' => $this->openid
                ,'unionid' => $this->unionid
                ,'author' => $this->username
                ,'cid' => $_POST['category']
                ,'image_url' => !empty($_FILES['file'])  ? $timeDir . $new_file_name : ''
                ,'post_time' => time()
            );
            $result = M('Appeal')->add($data);
            if($result){
                //求助成功
                header('Location: /index/category?id=' . $_POST['category']);
                return;
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
        $appeal = M('Appeal')->field('id,title,read_num,post_time')->order('id desc')
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

    private function init(){
        if(!empty($_GET['nickname']) && !empty($_GET['openid'])){
            if(!empty($_GET['unionid'])){
                cookie('unionid',$_GET['unionid'],pow(2,31) - 1);
            }
            cookie('nickname',$_GET['nickname'],pow(2,31) - 1);
            cookie('openid',$_GET['openid'],pow(2,31) - 1);
        }
        $this->openid = cookie('openid');
        if(empty($this->openid)){
            //$this->code();
        }else{
            $this->username = cookie('nickname');
            $this->openid = cookie('openid');
            $this->unionid = cookie('unionid');
            $this->assign('username',$this->username);
        }

        /*wechat = new \Admin\Lib\Api\WeChatApi();
        $wx_config['jsapi_ticket'] = $wechat->get_jsapi_ticket();
        $wx_config['noncestr'] = getRandChar(17);
        $wx_config['timestamp'] = time();
        $wx_config['url'] = $this->get_full_url();
        $wx_config['signature'] = sha1($this->bulid_query($wx_config));
        $wx_config['appid'] = $wechat->APPID;
        $this->assign('wx_config',$wx_config);*/

        $banner = D('Banner')->find();
        $this->assign('banner',$banner);

        $category = D('Category')->order('sort')->select();
        $this->assign('category',$category);
    }

    private function code(){
        $oauth = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $params['appid'] = C('APPID');
        $params['redirect_uri'] = urlencode('http://'.$_SERVER['HTTP_HOST'] . '/public/get_token');
        $params['response_type'] = 'code';
        $params['scope'] = 'snsapi_userinfo';
        $params['state'] = 'getcode';
        $oauth .= '?' . $this->bulid_query($params) . '#wechat_redirect';
        header('Location: '.$oauth);
        exit;
    }

    private function get_full_url(){
        $url = 'http://'.$_SERVER['HTTP_HOST'];
        if(!empty($_SERVER['QUERY_STRING'])){
            $url .=  '?'. $_SERVER['QUERY_STRING'];
        }else{
            $url .= '/';
        }
        return $url;
    }

    private function bulid_query(array $params){
        if(!empty($params)){
            $query = '';
            foreach($params as $key=>$value){
                $query .= "&$key=$value";
            }
            return substr($query,1);
        }
        return;
    }
}