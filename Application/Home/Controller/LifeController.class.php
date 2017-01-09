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
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $life_list = $articleModel->where("type = 3")->page($pageIndex)->limit(10)->order("create_time desc")->select();
        $lifeCount = $articleModel->where("type = 3")->count();
        $lifeList = array();
        if (!empty($life_list)) {
            foreach ($life_list as $item) {
                $lifeList[] = array(
                    'articleId'    => $item['id'],
                    'title'        => $item['title'],
                    'desc'         => $item['desc'],
                    'type'         => $this->articleTypeMap[$item['type']],
                    'content'      => $item['content'],
                    'createDate'   => $item['create_date'],
                    'commentCount' => $item['comment_count'],
                    'visitedCount' => $item['visited_count'],
                    'imgCover'     => $item['img_cover']
                );
            }
        }
        $this->assign('lifeList', $lifeList);
        $this->assign('lifeCount', $lifeCount);
        $this->display('lifeList');
    }

    public function getLifeList() {
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $life_list = $articleModel->where("type = 3")->page($pageIndex)->limit(10)->order("create_time desc")->select();
        $lifeList = array();
        if (!empty($life_list)) {
            foreach ($life_list as $item) {
                $lifeList[] = array(
                    'articleId'    => $item['id'],
                    'title'        => $item['title'],
                    'desc'         => $item['desc'],
                    'type'         => $this->articleTypeMap[$item['type']],
                    'content'      => $item['content'],
                    'createDate'   => $item['create_date'],
                    'commentCount' => $item['comment_count'],
                    'visitedCount' => $item['visited_count'],
                    'imgCover'     => $item['img_cover']
                );
            }
        }
        return $this->showMsg($lifeList, 1);
    }
}