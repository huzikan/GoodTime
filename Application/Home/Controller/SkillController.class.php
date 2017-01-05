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
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $skill_list = $articleModel->where("type = 1")->page($pageIndex)->limit(2)->order("create_time desc")->select();
        $skillCount = $articleModel->where("type = 1")->count();
        $skillList = array();
        if (!empty($skill_list)) {
            foreach ($skill_list as $item) {
                $skillList[] = array(
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
        $this->assign('skillList', $skillList);
        $this->assign('skillCount', $skillCount);
        $this->display('skillList');
    }

    /**
     * 文章详情页
     */
    public function skillDetail($id)
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
        $commentList = $commentModel->page(1)->limit(5)->order('create_time DESC')->select($condition);
        $rowCount = $commentModel->where($condition)->count();
        $comment_list = array();
        if (!empty($commentList)) {
            foreach ($commentList as $item) {
                $comment_list[] = array(
                    'commentId'  => $item['id'],
                    'headImg'    => '/public/images/message/head-default.jpg',
                    'userName'   => $item['comment_username'],
                    'userId'     => $item['comment_userid'],
                    'content'    => $item['note'],
                    'time'       => date('Y-m-d H:i:s', $item['create_time']),
                    'agreeCount' => $item['agree_count'],
                    'replyCount' => $item['reply_count']
                );
            }
        }
        $this->assign('commentList', $comment_list);
        $this->assign('rowCount', $rowCount);
        $this->assign('article', $articleData);
        $this->display('Common/detail');
    }

    /**
     * 添加评论
     */
    public function addComment()
    {
        $article_id = I("post.article_id/d");
        if ($article_id < 1) {
            $this->showMsg('无效的文件ID');
        }

        //评论内容
        $note = I("post.note/s");
        if (empty($note)) {
            $this->showMsg('评论内容不能为空');
        }

        $commentModel = M('article_comment');
        $commentData = array(
            'article_id'       => $article_id,
            'note'             => $note,
            'comment_userid'   => 0,
            'comment_username' => '访客',
            'create_time'      => time(),
            'create_date'      => date('Y-m-d'),
            'agree_count'      => 0,
            'reply_count'      => 0
        );
        $res = $commentModel->add($commentData);
        if ($res < 1) {
            $this->showMsg('评论失败');
        }
        $condition['article_id'] = $article_id;
        $count = $commentModel->where($condition)->count();
        //修改评论条数(全量更新)
        $articleModel = M('article');
        $res = $articleModel->where($condition)->setField("comment_count", $count);
        if ($res < 1) {
            $this->showMsg('统计评论失败');
        }

        $this->showMsg($count, 1);
    }

    /**
     * 点赞
     */
    public function addAgree()
    {
        $comment_id = I("post.comment_id/d");
        if ($comment_id < 1) {
            $this->showMsg('无效的评论ID');
        }

        $commentModel = M('article_comment');
        $commentData = $commentModel->find($comment_id);
        $agreeCount = ++$commentData['agree_count'];
        $res = $commentModel->where("id={$comment_id}")->setField('agree_count',$agreeCount);
        if ($res < 1) {
            $this->showMsg('点赞失败');
        }
        $this->showMsg($agreeCount, 1);
    }

    /**
     * 异步技术积累列表
     */
    public function getSkillList()
    {
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex > 0 ? $pageIndex : 1;
        //获取首页推荐内容
        $articleModel = M('article');
        $skill_list = $articleModel->where("type = 1")->page($pageIndex)->limit(2)->order("create_time desc")->select();
        $skillList = array();
        if (!empty($skill_list)) {
            foreach ($skill_list as $item) {
                $skillList[] = array(
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

        return $this->showMsg($skillList, 1);
    }
}