<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class AppealModel extends CommonModel{

    function __construct(){
        parent::__construct();
    }

    function get_appeal($id){
        return $this->find($id);
    }

    function get_appeals($limit,$offset,$where){
        if(!empty($where)){
            $this->where($where);
        }
        return $this->limit($offset,$limit)->select();
    }

    function get_total($where){
        if(!empty($where)){
            $this->where($where);
        }
        return $this->count();
    }
}