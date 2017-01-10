<?php
namespace Home\Controller;

use Think\Controller;
use Util\simpleExcel;

class IndexController extends BaseController
{
    public function _initialize()
    {
        //设置顶部导航索引
        $this->_tplParam['nav']['index'] = 1;
        $this->assign('_tplParam', $this->_tplParam);
        $this->initRightSideData();
    }

    public function myhome()
    {
        $cookie_prefix = C('COOKIE_PREFIX');
        $userUnique = I("cookie.{$cookie_prefix}userunique/s");
        $userData = json_decode(authcode($userUnique, 'DECODE'), true);
        $this->assign('_user', $userData);
        $this->display();
    }

    /**
     * 大数据表导出
     */
    public function simpleExcel()
    {
        $headerMap = array(
            //文本字段
            "textField"    => array('name' => '文本字段', 'type' => 'text'),
            //日期字段
            "dateField"    => array('name' => '日期字段', 'type' => 'date'),
            //数字字段
            "numberField"  => array('name' => '数字字段', 'type' => 'number'),
            //浮点数字段
            "decimalField" => array('name' => '浮点数字段', 'type' => 'decimal'),
            //百分比字段
            "percentField" => array('name' => '百分比字段', 'type' => 'percent')
        );

        $simpleExcel = new simpleExcel();
        $simpleExcel->setFileName("测试列表_" . date('Y-m-d'));
        $simpleExcel->setXlsHeader($headerMap);

        //输出10000条测试数据
        for ($i = 0; $i < 50; $i++) {
            $payBackList = array();
            for ($j = 0; $j < 200; $j++) {
                $payBackItem = array(
                    //文本字段
                    "textField"    => '2016081720160817200',
                    //日期字段
                    "dateField"    => date('Y-m-d'),
                    //数字字段
                    "numberField"  => 10000,
                    //浮点数字段
                    "decimalField" => 10065.25,
                    //百分比字段
                    "percentField" => 0.258
                );
                $payBackList[] = $payBackItem;
            }

            $simpleExcel->setXlsColumn($payBackList);
        }

        $simpleExcel->exportXlsData();
    }

    /**
     * 首页
     */
    public function index()
    {
        //获取首页推荐内容
        $articleModel = M('article');
        $recommend_list = $articleModel->where("is_recommend = 1")->limit(7)->order("create_time desc")->select();
        $recommendList = array();
        if (!empty($recommend_list)) {
            foreach ($recommend_list as $item) {
                switch ($item['type']) {
                    //技术杂谈
                    case 1:
                        $detailUrl = '/Home/Skill/SkillDetail/id/' . $item['id'];
                        break;
                    //工作感悟
                    case 2:
                        $detailUrl = '/Home/Work/WorkDetail/id/' . $item['id'];
                        break;
                    //生活琐碎
                    case 3:
                        $detailUrl = '/Home//SkillDetail/id/' . $item['id'];
                        break;
                    //旅行趣事
                    case 4:
                        $detailUrl = '/Home/Skill/SkillDetail/id/' . $item['id'];
                        break;
                    default:
                        $detailUrl = '/Home/Skill/SkillDetail/id/' . $item['id'];
                        break;
                }
                $recommendList[] = array(
                    'articleId'    => $item['id'],
                    'title'        => $item['title'],
                    'desc'         => $item['desc'],
                    'type'         => $this->articleTypeMap[$item['type']],
                    'content'      => $item['content'],
                    'createDate'   => $item['create_date'],
                    'commentCount' => $item['comment_count'],
                    'visitedCount' => $item['visited_count'],
                    'imgCover'     => $item['img_cover'],
                    'detailUrl'    => $detailUrl
                );
            }
        }
        $this->assign('recommendList', $recommendList);
        $this->display('home');
    }
}
