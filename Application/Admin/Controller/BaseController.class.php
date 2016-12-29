<?php
/**
 * 通用控制器，定义公共函数和公共变量
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Template\Driver\Mobile;

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

    public function __construct()
    {
        parent::__construct();
        $cookie_prefix = C('COOKIE_PREFIX');
        $userUnique = I("cookie.{$cookie_prefix}userunique/s");
        $userData = json_decode(authcode($userUnique, 'DECODE'), true);
        //权限验证
        $userModel = new Model("user");
        $user = $userModel->find(intval($userData['uid']));
        if ($userData['username'] == $user['username'] && $userData['password'] == $user['password']) {
            $this->_userid = $userData['uid'];
            $this->_username = $userData['username'];
            $_SESSION['user_id'] = $this->_userid;
            $_SESSION['username'] = $this->_username;
        }
    }

    /**
     * 同步分页程序
     *
     * @param  int      $pageIndex 当前页数
     * @param  int      $totalSize 数据总数
     * @param  int      $pageSize  分页大小
     *
     * @return string             分页样式
     */
    public function pageBar($pageIndex, $totalSize, $pageSize = 10)
    {
        //计算总页数
        $pageSize = $pageSize < 1 ? 10 : $pageSize;
        $totalPage = ceil($totalSize / $pageSize);
        if ($totalPage < 1) {
            return '';
        }
        $pageIndex = $pageIndex < 1 ? 1 : $pageIndex;
        $pageIndex = $pageIndex > $totalPage ? $totalPage : $pageIndex;
        $pageBar = '<div class="dataTables_paginate paging_simple_numbers pull-right"><ul class="pagination">';
         //上一页
        $previousUrl = $pageIndex == 1 ? 'javascript:;' : '?pageIndex=' . ($pageIndex - 1);
        $pageBar .= '<li class="paginate_button previous ' . ($pageIndex == 1 ? 'disabled' : '') .'" id="example1_previous">
                        <a href="' . $previousUrl . '" aria-controls="example1" data-dt-idx="0" tabindex="0">&lt;</a>
                    </li>';
        if ($totalPage >= 9) {
            $barArr = $this->_createBar($pageIndex, $totalPage);
            for ($i = 0; $i < count($barArr); $i++) {
                if ($barArr[$i] == $pageIndex) {
                    $pageBar .= '<li class="paginate_button active"><a href="javascript:;" aria-controls="example1" data-dt-idx="2" tabindex="0">'
                                . $barArr[$i] . '</a></li>';
                } else {
                    $itemUrl = $barArr[$i] == '...' ? 'javascript:;' : '?pageIndex=' . $barArr[$i];
                    $pageBar .= '<li class="paginate_button"><a href="' . $itemUrl . '" aria-controls="example1" data-dt-idx="2" tabindex="0">'
                                . $barArr[$i] . '</a></li>';
                }
            }
        } else {
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $pageIndex) {
                    $pageBar .= '<li class="paginate_button active"><a href="javascript:;" aria-controls="example1" data-dt-idx="2" tabindex="0">'
                                . $i . '</a></li>';
                } else {
                    $pageBar .= '<li class="paginate_button"><a href="' . '?pageIndex=' . $i . '" aria-controls="example1" data-dt-idx="2" tabindex="0">'
                                . $i . '</a></li>';
                }
            }
        }
        //下一页
        $nextUrl = $pageIndex == $totalPage ? 'javascript:;' : '?pageIndex=' . ($pageIndex + 1);
        $pageBar .= '<li class="paginate_button next ' . ($pageIndex == $totalPage ? 'disabled' : '') . '" id="example1_next">
                        <a href="' . $nextUrl . '" aria-controls="example1" data-dt-idx="7" tabindex="0">&gt;</a>
                    </li>';
        $pageBar .= '</ul></div>';

        return $pageBar;
    }

    /**
     * 分页隐藏策略
     *
     * @param  int      $pageIndex 当前页数
     * @param  int      $totalPage 总页数
     *
     * @return array               策略数组
     */
    private function _createBar($pageIndex, $totalPage)
    {
        //隐藏策略
        $pageIndex = intval($pageIndex);
        $totalPage = intval($totalPage);
        $leftBarArr = array();
        $rightBarArr = array();
        if ($pageIndex > 1) {
            //前置省略
            if ($pageIndex >= 5) {
                $leftBarArr = array(1, 2, '...', $pageIndex - 1);
                if ($pageIndex == $totalPage) {
                    $leftBarArr  =  array(1, 2, '...', $pageIndex - 2, $pageIndex - 1);
                }
            } else {
                for ($x = 1; $x < $pageIndex; $x++) {
                    $leftBarArr[] = $x;
                };
            }
        }
        //后置省略
        if ($pageIndex < $totalPage) {
            if ($totalPage - $pageIndex > 3) {
                $rightBarArr = array($pageIndex + 1, '...', $totalPage - 1, $totalPage);
                if ($pageIndex == 1) {
                    $rightBarArr = array($pageIndex + 1, $pageIndex + 2 , '...', $totalPage - 1, $totalPage);
                }
            } else {
                for ($x = $pageIndex + 1; $x <= $totalPage; $x++) {
                    $rightBarArr[] = $x;
                };
            }
        }

        //生成样式
        $leftBarArr[] = $pageIndex;

        return array_merge($leftBarArr, $rightBarArr);
    }

    /**
     * 用户是否登陆
     */
    protected  function isLogin() {
        if ($this->_userid < 1) {
            return false;
        }
        return true;
    }
}