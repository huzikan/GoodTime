<?php
/**
 * 通用控制器，定义公共函数和公共变量
 */

namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{
    /**
     * 用户登陆ID
     *
     * @var int
     */
    public $_userid;

    /**
     * 用户登陆名
     *
     * @var string
     */
    public $_username;

    /**
     * 公共模板变量参数
     *
     * @var array
     */
    public $_tplParam;

    /**
     * 文章类型映射
     *
     * @var array
     */
    protected $articleTypeMap = array(
        1 => '技术杂谈',
        2 => '工作感悟',
        3 => '生活琐碎',
        4 => '旅行趣事',
        5 => '其他'
    );

    //随机头像
    protected $imgArr = array(
        '/public/images/message/head-default.jpg',
        '/public/images/message/01.jpeg',
        '/public/images/message/02.jpg',
        '/public/images/message/03.jpg',
        '/public/images/message/04.jpg',
        '/public/images/message/05.jpg'
    );

    //随机昵称
    protected $nicknameArr = array(
        'sunshine',
        'awesome',
        '幸福终点站',
        '寂寞的折磨',
        '潜行者',
        '微醺的夕阳',
        '一帘幽梦',
        '发誓葬爱',
        '无言以对',
        '刺眼旳温柔',
        '一塌糊涂',
        '搁浅回忆',
        '醉酒思红颜',
        '沉默、继续',
        '不再单纯',
        '北边的天使',
        '空空空空、虚'
    );

    public function _initialize() {

    }
}