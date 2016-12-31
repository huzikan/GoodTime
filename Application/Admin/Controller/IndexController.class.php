<?php

namespace Admin\Controller;
use Think\Controller;

class IndexController extends BaseController
{

    private $articleModel;

    /**
     * 文章类型映射
     *
     * @var array
     */
    private $articleTypeMap = array(
        1 => '技术杂谈',
        2 => '工作感悟',
        3 => '生活琐碎',
        4 => '旅行趣事',
        5 => '其他'
    );

    public function __construct()
    {
        parent::__construct();
        if (!$this->isLogin()) {
            redirect("/admin/member/loginview");
        }
        $this->articleModel = M('article');
    }

    public function _initialize()
    {
        // //设置顶部导航索引
        // $this->_tplParam['nav']['index'] = 1;
        // $this->assign('_tplParam', $this->_tplParam);
    }

    public function index()
    {
        $pageIndex = I('get.pageIndex/d');
        $pageIndex = $pageIndex < 1 ? 1 : $pageIndex;
        //获取查询条件
        $condition = array();
        $article_id = I('get.article_id/d');
        if ($article_id > 0) {
            $condition['id'] = $article_id;
            $this->assign('article_id', $article_id);
        }
        $article_type = I('get.article_type/d');
        if ($article_type > 0) {
            $condition['type'] = $article_type;
            $this->assign('article_type', $article_type);
        }
        $ctime_begin = I('get.ctime_begin/s');
        if (!empty($ctime_begin)) {
            $condition['create_date'][]  = array('egt', $ctime_begin);
            $this->assign('ctime_begin', $ctime_begin);
        }
        $ctime_end = I('get.ctime_end/s');
        if (!empty($ctime_end)) {
            $condition['create_date'][]  = array('elt', $ctime_end);
            $this->assign('ctime_end', $ctime_end);
        }
        //获取文章列表
        $articleModel = M('article');
        $articleList = $articleModel->where($condition)->page($pageIndex)->limit(10)->select();
        $this->assign('articleList', $articleList);
        //获取分页
        $pageBar = $this->pageBar($pageIndex, count($articleList));
        $this->assign('pageBar', $pageBar);
        $this->assign('articleTypeMap', $this->articleTypeMap);
        $this->display();
    }

    /**
     * 文章视图页面
     */
    public function articleView()
    {
        $id = I('get.id');
        if ($id > 0) {
            $articleData = $this->articleModel->find($id);
            $this->assign('article', $articleData);
        }

        $this->assign('articleTypeMap', $this->articleTypeMap);
        $this->display('detail');
    }

    /**
     * 添加文章
     */
    public function addArticle()
    {
        $title = I('post.article_title');
        if (empty($title)) {
            $this->error('文章标题不能为空！');
        }

        $imgCover = I('post.img_cover');
        if (empty($imgCover)) {
            $this->error('封面图片不能为空！');
        }

        $type = I('post.article_type');
        if ($type < 1) {
            $this->error('文章类型不能为空！');
        }

        $descrption = I('post.article_desc');
        if (empty($descrption)) {
            $this->error('文章描述不能为空！');
        }

        $content = $_POST['article_content'];
        if (empty($content)) {
            $this->error('文章内容不能为空！');
        }

        $data = array(
            'img_cover'        => $imgCover,
            'title'            => $title,
            'desc'             => $descrption,
            'type'             => $type,
            'content'          => $content,
            'publish_userid'   => $this->_userid,
            'publish_username' => $this->_username,
            'create_time'      => time(),
            'create_date'      => date('Y-m-d'),
            'comment_count'    => 0,
            'visited_count'    => 0
        );

        $res = $this->articleModel->add($data);
        if ($res === false) {
           $this->error('添加文章失败');
        }

        redirect('index');
    }

    /**
     * 编辑文章
     */
    public function editArticle()
    {
        $id = I('post.id');
        if ($id < 1) {
           $this->error('无效的文章ID'); 
        }

        $title = I('post.article_title');
        if (empty($title)) {
            $this->error('文章标题不能为空！');
        }

        $imgCover = I('post.img_cover');
        if (empty($imgCover)) {
            $this->error('封面图片不能为空！');
        }

        $type = I('post.article_type');
        if ($type < 1) {
            $this->error('文章类型不能为空！');
        }

        $descrption = I('post.article_desc');
        if (empty($descrption)) {
            $this->error('文章描述不能为空！');
        }

        $content = $_POST['article_content'];
        if (empty($content)) {
            $this->error('文章内容不能为空！');
        }

        $updateData = array(
            'img_cover'        => $imgCover,
            'title'            => $title,
            'desc'             => $descrption,
            'type'             => $type,
            'content'          => $content,
        );

        //获取文章详情
        $res = $this->articleModel->where("id={$id}")->save($updateData);
        if ($res === false) {
           $this->error('编辑文章失败');
        }

        redirect('index');
    }

    /**
     * 文件上传操作
     */
    public function uploadFile()
    {
        //上传文件类型列表
        $upTypes = array(
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/pjpeg',
            'image/gif',
            'image/bmp',
            'image/x-png'
        );
        $_file = $_FILES['img_cover'];
        if (!in_array($_file['type'], $upTypes)) {
            $this->showMsg('只支持图片文件！');
        }
        $oldFile = APP_ROOT . $_POST['oldFileName'];
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
        $fileArr = explode('.', $_file['name']);
        $ext = strtolower(end($fileArr));
        $fileBasePath = '/public/images/';
        $fileName = $fileBasePath . 'cover/article_cover_' . uniqid() . '.' . $ext;
	if (!file_exists($_file['tmp_name'])) {
	    $this->showMsg('临时时文件不存在');
	}
	$res = move_uploaded_file($_file['tmp_name'], APP_ROOT . $fileName);
	$data = array('url' => $fileName,'res'=>$res);
        $this->showMsg($data, 1);
    }
}
