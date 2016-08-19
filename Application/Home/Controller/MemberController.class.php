<?php
namespace Home\Controller;
use Think\Controller;
use Common\Util\ValidCode;

class MemberController extends Controller {
    /**
     * 登陆视图页
     */
    public function loginView() {
        $this->display('login');
    }

    public function getValidCode() {
        $option = array(
            'width'  => 107,
            'height' => 40
        );
        $validCodeOb = new ValidCode($option);
        $validCodeOb->doimg();
        $_SESSION['validCode'] = strtolower($validCodeOb->getCode());
    }

    /**
     * 登陆提交
     */
    public function login() {
        $userName = I('post.username');
        $password = I('post.password');
        $verify_code = I('post.verify_code');
        if (empty($userName)) {
            $this->showMsg('请您输入用户名!');
        }
        if (empty($password)) {
            $this->showMsg('请您输入密码!');
        }
        if (empty($verify_code)) {
            $this->showMsg('请您输入验证码!');
        }
        if (strtolower($verify_code) != $_SESSION['validCode']) {
            $this->showMsg('您输入的验证码错误!');
        }
        //获取转译真实密码
        $pwd = $this->getPwd($password);
        //验证密码
        $tb_user = M('Member');
        $user = $tb_user->find();
        if ($userName == $user['username'] && $pwd == $user['password']) {
            $this->writeCookie($user);
            $this->showMsg('登陆成功', 1);
        }

        $this->showMsg('您输入的用户名或密码错误!');
    }

    /**
     * 退出
     */
    public function loginOut() {
        cookie('userunique', null);
        $this->redirect('loginView');
    }

    private function writeCookie($userData) {
        $userUnique = array(
            'uid' => $userData['uid'],
            'username' => $userData['username'],
        );
        $userUnique = json_encode($userUnique);
        $option = array(
            'expire'    => 86400, // cookie 保存时间
            'httponly'  => true, // httponly设置
        );

        cookie('userunique', authcode($userUnique, 'ENCODE'), $option);
    }

    /**
     * 获取转译密码
     */
    private function getPwd($password) {
        $plen = strlen($password);
        //获取验证秘钥顺序
        if ($plen % 2 > 0) {
            $salt = substr(C('PWD_SALT'), $plen - 1);
        } else {
            $salt = substr(C('PWD_SALT'), -$plen);
        }
        $pwd = md5($password . $salt);

        return $pwd;
    }
}