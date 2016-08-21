<?php
namespace Home\Controller;
use Think\Controller;
use Util\simpleExcel;

class IndexController extends Controller {
    public function index(){
        $cookie_prefix = C('COOKIE_PREFIX');
        $userUnique = I("cookie.{$cookie_prefix}userunique/s");
        $userData = json_decode(authcode($userUnique, 'DECODE'), true);
        $this->assign('_user', $userData);
        $this->display();
    }

    /**
     * excel表导出设置
     */
    public function simpleExcel() {
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
}