<?php
namespace app\controller;

use app\BaseController;

use think\App;
use think\facade\Cookie;

class IndexController extends BaseController
{
    private $system_admin;

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->system_admin =   Cookie::get('LeisureKa');
    }

    /**
     * 左侧菜单栏
     * @return \think\response\View
     */
    public function index()
    {
        return view('',['system_admin',$this->system_admin]);
    }

    /**
     * 欢迎首页
     * @return \think\response\View
     */
    public function welcome()
    {
        return view();
    }
}
