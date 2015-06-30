<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function __construct(){
        parent::__construct();

        $banner = D('Banner')->find();
        $this->assign('banner',$banner);

        $category = D('Category')->order('sort desc')->select();
        $this->assign('category',$category);
    }

    public function index(){

        $this->display();
    }

    public function content(){
        $id = $_GET['id'];
        $this->display();
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
            move_uploaded_file($file['tmp_name'],$newfile);
            $data = array(
                'title' => $_POST['title']
                ,'content' => $_POST['content']
                ,'author' => '阿畅哥·烽火戏诸侯'
                ,'pid' => $_POST['category']
                ,'image_url' => $timeDir . $new_file_name
                ,'post_time' => time()
            );
            $result = M('Appeal')->add($data);
            if($result){
                //求助成功
            }
        }
        $this->display();
    }

    public function category(){
        $this->display('list');
    }


    private function get_extension($file)
    {
        $info = pathinfo($file);
        return $info['extension'];
    }
}