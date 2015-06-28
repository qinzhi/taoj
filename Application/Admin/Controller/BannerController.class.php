<?php
namespace Admin\Controller;
use Think\Controller;

class BannerController extends AdminController {

    public function __construct(){
        parent::__construct();

    }

    public function index(){
        $this->display();
    }
}