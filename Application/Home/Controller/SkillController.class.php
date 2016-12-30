<?php

namespace Home\Controller;
use Think\Controller;

class SkillController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 2;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 技术积累列表
     */
    public function skillList()
    {   
        $this->display('skillList');
    }

    /**
     * 文章详情页
     */
    public function skillDetail($id)
    {
        $article_id = I("get.id/d");
        $articleModel = M('article');
        $articleData = $articleModel->find($article_id);
        $this->assign('article', $articleData);
        $this->display('Common/detail');
    }
}