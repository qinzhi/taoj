<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function get_token(){
        if($_GET['code'] != ''){
            $code = $_GET['code'];
            $oauth = 'https://api.weixin.qq.com/sns/oauth2/access_token';
            $params['appid'] = C('APPID');
            $params['secret'] = C('APPSECRET');
            $params['code'] = $code;
            $params['grant_type'] = 'authorization_code';

            $result = http($oauth,$params);
            if(!empty($result)){
                $result = json_decode($result);

                $userinfo_url = 'https://api.weixin.qq.com/sns/userinfo';
                unset($params);
                $params['access_token'] = $result->access_token;
                $params['openid'] = $result->openid;
                $params['lang'] = 'zh_CN';
                $userinfo = http($userinfo_url,$params);
                $userinfo = json_decode($userinfo);
                $unionid = empty($userinfo->unionid) ? $userinfo->unionid : '';

                $data = array(
                    'openid' => $result->openid
                    ,'unionid' => $userinfo->unionid
                    ,'nickname' => $userinfo->nickname
                    ,'sex' => $userinfo->sex
                    ,'province' => $userinfo->province
                    ,'city' => $userinfo->city
                    ,'headimgurl' => $userinfo->headimgurl
                );
                $where = "openid='{$result->openid}' OR unionid={$userinfo->unionid}";
                $user = M('User')->where($where)->find();
                if(!empty($user)){
                    M('User')->save($data);
                }

                header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '?nickname=' . $userinfo->nickname . '&openid=' . $result->openid . '&unionid=' . $unionid);
            }
        }
    }
}