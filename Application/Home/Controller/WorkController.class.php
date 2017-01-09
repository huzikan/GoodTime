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
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $work_list = $articleModel->where("type = 2")->page($pageIndex)->limit(10)->order("create_time desc")->select();
        $workCount = $articleModel->where("type = 2")->count();
        $workList = array();
        if (!empty($work_list)) {
            foreach ($work_list as $item) {
                $workList[] = array(
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
        $this->assign('workList', $workList);
        $this->assign('workCount', $workCount);
        $this->display('workList');
    }

    public function getWorkList() {
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $work_list = $articleModel->where("type = 2")->page($pageIndex)->limit(10)->order("create_time desc")->select();
        $workList = array();
        if (!empty($work_list)) {
            foreach ($work_list as $item) {
                $workList[] = array(
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

        return $this->showMsg($workList, 1);
    }
}
