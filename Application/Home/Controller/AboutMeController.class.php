<?php

namespace Home\Controller;

use Think\Controller;

class AboutMeController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 6;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 关于我
     */
    public function index()
    {
        $this->display('common/aboutMe'); 
    }
}
