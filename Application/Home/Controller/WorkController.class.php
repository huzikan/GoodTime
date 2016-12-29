<?php

namespace Home\Controller;
use Think\Controller;

class WorkController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 3;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 技术积累列表
     */
    public function workList()
    {
        $this->display('skill/skillList');
    }

    /**
     * 文章详情页
     */
    public function workDetail($id)
    {
        $article_id = I("get.id/d");
        $articleModel = M('article');
        $articleData = $articleModel->find($article_id);
        $this->assign('article', $articleData);
        $this->display('common/detail');
    }
}