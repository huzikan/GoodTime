<?php

namespace Home\Controller;
use Think\Controller;

class LifeController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 4;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 技术积累列表
     */
    public function lifeList()
    {
        $this->display('skill/skillList');
    }

    /**
     * 文章详情页
     */
    public function lifeDetail($id)
    {
        $article_id = I("get.id/d");
        $articleModel = M('article');
        $articleData = $articleModel->find($article_id);
        $this->assign('article', $articleData);
        $this->display('common/detail');
    }
}