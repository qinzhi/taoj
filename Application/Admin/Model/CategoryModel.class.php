<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class CategoryModel extends CommonModel{

    function __construct(){
        parent::__construct();
    }

    public function get_level($id){
        if(empty($id)){
            return 1;
        }else{
            $category = $this->get_category($id);
            if(!empty($category) && $category['level'] <= 2){
                return $category['level']++;
            }else{
                return 0;
            }
        }
    }

    public function get_category($id){
        return $this->where("id=$id")->find();
    }

    //根据分类ID获取分类列表
    public function get_categories($ids){
        return $this->where(array('id'=>array('in',$ids)))->select();
    }

    public function get_all(){
        return $this->order('sort')->select();
    }

    public function format_tree($categories){
        $tree = array();
        foreach($categories as $category){
            $chkDisabled = $category['level'] == 3 ? true : false;
            $tree[] = array(
                'id' => $category['id'],
                'pId' => $category['pid'],
                'name' => $category['name'],
                'level' => $category['level'],
                'chkDisabled' => $chkDisabled,
                'open' => true,
            );
        }
        return $tree;
    }
}