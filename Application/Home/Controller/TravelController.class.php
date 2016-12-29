<?php

namespace Home\Controller;
use Think\Controller;

class TravelController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 5;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 技术积累列表
     */
    public function index()
    {   
        $this->display('index');
    }
}