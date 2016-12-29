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

    public function _initialize() {

    }
}