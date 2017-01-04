<?php
/**
 * 留言板
 */
namespace Home\Controller;
use Think\Controller;

class MessageController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 7;
        $this->assign('_tplParam', $this->_tplParam);
    }

    /**
     * 留言列表
     */
    public function messageHome()
    {
        //获取留言列表
        $commentModel = M('article_comment');
        $condition['article_id'] = 0;
        //获取评论列表
        $commentList = $commentModel->where($condition)->page(1)->limit(5)->order('create_time DESC')->select();
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
        $this->display('index');
    }

    /**
     * 留言列表
     */
    public function getMessageList()
    {   
        //排序方式
        $sortValue = I('get.sortValue/d');
        $orderBy = '';
        switch ($sortValue) {
            case 1:
                $orderBy = "create_time desc";
                break;
            case 2:
                $orderBy = "create_time asc";
                break;
            case 3:
                $orderBy = "agree_count desc";
                break;
            default:
                $orderBy = "create_time desc";
                break;
        }
        $articleId = I('get.articleId/d');
        $messageFlag = I('get.messageFlag/d');
        if ($articleId < 1 && $messageFlag < 1) {
            $this->showMsg('无效的文章ID');
        }
        //获取页面索引
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex < 1 ? 1 : $pageIndex;
        $commentModel = M('article_comment');
        //是否为留言板(articleId为零)
        $condition['article_id'] = $messageFlag > 0 ? 0 : $articleId;
        //获取评论列表
        $commentList = $commentModel->where($condition)->page($pageIndex)->limit(5)->order($orderBy)->select();
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

        $this->showMsg($comment_list, 1);
    }

    /**
     * 添加留言
     */
    public function addMessage()
    {
        //评论内容
        $note = I("post.note/s");
        if (empty($note)) {
            $this->showMsg('留言内容不能为空');
        }

        $commentModel = M('article_comment');
        $commentData = array(
            'article_id'       => 0,
            'note'             => $note,
            'comment_userid'   => 0,
            'comment_username' => '访客',
            'create_time'      => time(),
            'create_date'      => date('Y-m-d'),
            'agree_count'      => 0,
            'reply_count'      => 0
        );
        $res = $commentModel->add($commentData);
        $count = $commentModel->where('article_id=0')->count();
        if ($res < 1) {
            $this->showMsg('留言失败');
        }
        $this->showMsg($count, 1);
    }
}