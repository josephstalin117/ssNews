<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
        
    }

    public function hehe() {
        $User = M('admin');
        // 执行其他的数据操作
        $data = $User->select();
        dump($data);
    }

}
