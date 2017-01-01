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
        if ($articleId < 1) {
            $this->showMsg('无效的文章ID');
        }
        //获取页面索引
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex < 1 ? 1 : $pageIndex;
        $commentModel = M('article_comment');
        $condition['article_id'] = $articleId;
        //获取评论列表
        $commentList = $commentModel->page($pageIndex)->limit(5)->order($orderBy)->select($condition);
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
}