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

    public function _initialize() {

    }
}