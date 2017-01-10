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
        $this->initRightSideData();
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

    /**
     * 文章详情页
     */
    public function workDetail($id)
    {
        $article_id = I("get.id/d");
        if ($article_id < 1) {
            $this->showMsg('无效的文章ID');
        }
        $articleModel = M('article');
        $articleData = $articleModel->find($article_id);
        if (!empty($articleData)) {
            $articleData['create_time'] = date('Y-m-d H:i:s', $articleData['create_time']);
        }
        //访问数+1
        $visited_count = ++$articleData['visited_count'];
        $articleModel->where("id={$article_id}")->setField("visited_count", $visited_count);
        //获取文章评论
        $commentModel = M('article_comment');
        $condition['article_id'] = $article_id;
        //获取评论列表
        $commentList = $commentModel->where($condition)->page(1)->limit(5)->order('create_time DESC')->select();
        $rowCount = $commentModel->where($condition)->count();
        $comment_list = array();
        if (!empty($commentList)) {
            foreach ($commentList as $item) {
                $comment_list[] = array(
                    'commentId'  => $item['id'],
                    'headImg'    => $this->imgArr[$item['id'] % 6],
                    'userName'   => $item['comment_username'],
                    'userId'     => $item['comment_userid'],
                    'content'    => $item['note'],
                    'time'       => date('Y-m-d H:i:s', $item['create_time']),
                    'agreeCount' => $item['agree_count'],
                    'replyCount' => $item['reply_count']
                );
            }
        }

        //获取上一篇文章
        $prevArticle = $articleModel->where("id < {$article_id}")->field('id,title')->limit(1)->select();
        $this->assign('prevArticle', $prevArticle[0]);
        //获取下一篇文章
        $nextArticle = $articleModel->where("id > {$article_id}")->field('id,title')->limit(1)->select();
        $this->assign('nextArticle', $nextArticle[0]);
        $this->assign('commentList', $comment_list);
        $this->assign('rowCount', $rowCount);
        $this->assign('article', $articleData);
        $this->display('Common/detail');
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
