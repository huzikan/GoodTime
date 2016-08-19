<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$cookie_prefix = C('COOKIE_PREFIX');
		$userUnique = I("cookie.{$cookie_prefix}userunique/s");
		$userData = json_decode(authcode($userUnique, 'DECODE'), true);
		$this->assign('_user', $userData);
		$this->display();
    }
}