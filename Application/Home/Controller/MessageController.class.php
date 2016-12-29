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

        $dataList = array(
            0 => array(
                'headImg'    => '/public/images/message/head-default.jpg',
                'userName'   => '苦海无涯',
                'userId'     => 10086,
                'content'    => '一辈子也就是几十年的时间吧，如果不能把自己无限的精力投入到有限的青春中，追寻自己的梦，那么活着和喘气又有什么区别呢？所以特别感谢博主，能在我人生最迷茫的时期，看到博主那些让我备受鼓舞和启发的文章。让我能自信的去追寻自己的梦。',
                'time'       => '2016-09-17 11:12:26',
                'agreeCount' => 20,
                'replyCount' => 5
            ),
            1 => array(
                'headImg'    => '/public/images/message/head-default.jpg',
                'userName'   => '孤独的星辰',
                'userId'     => 10087,
                'content'    => '几次拿起早就尘封了多年的网站设计类书本，但是迫于生活无奈又放下。',
                'time'       => '2016-09-17 11:12:26',
                'agreeCount' => 30,
                'replyCount' => 2
            ),
            2 => array(
                'headImg'    => '/public/images/message/head-default.jpg',
                'userName'   => '深白、',
                'userId'     => 10088,
                'content'    => '让我能自信的去追寻自己的梦。',
                'time'       => '2016-09-17 11:12:26',
                'agreeCount' => 125,
                'replyCount' => 36
            ),
        );
    
        $list = array();
        for ($i = 0; $i < 5; $i++) {
            $index = mt_rand(0, 2);
            $list[] = $dataList[$index];
        }

        $data = array(
            'success' => true,
            'code'    => 0,
            'data'    => $list
        );
    
        $this->ajaxReturn($data);
    }
}