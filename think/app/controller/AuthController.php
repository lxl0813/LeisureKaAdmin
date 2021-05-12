<?php


namespace app\controller;


use app\BaseController;
use app\model\SystemAdminInfo;
use app\Request;
use app\ResponseApi;
use app\validate\SystemAdminLoginAuthValidate;
use think\exception\ValidateException;
use think\facade\Cookie;
use think\facade\Session;


class AuthController
{
    use ResponseApi;
    /**
     * 后台系统管理员登录页面
     */
    public function system_admin_login()
    {
        return view();
    }


    /**
     *管理员登录认证
     */
    public function system_admin_login_auth(Request $request)
    {
        $auth_data  =   json_decode($request->post('form_data'),true);
        if (false === $request->checkToken('__token__')) return $this->ResponseCreate('Token令牌过期！请刷新页面再尝试！');
        try {
            validate(SystemAdminLoginAuthValidate::class)->batch(true)->check($auth_data);
        }catch (ValidateException $exception){
            return $this->ResponseCreate($exception->getMessage(),[],500);
        }
        $system_admin   =   SystemAdminInfo::system_admin_login_auth($auth_data['system_admin_account']);
        if (!isset($system_admin)) return $this->ResponseCreate('管理员账号不存在！',[],500);
        if ($system_admin['system_admin_status']!=1) return $this->ResponseCreate('管理员账号异常！请联系超级管理员！',[],500);
        if (!password_verify($auth_data['system_admin_password'],$system_admin['system_admin_password'])) return $this->ResponseCreate('管理员密码错误！',[],'500');
        $cookie =   [
            'system_admin_id'       =>  $system_admin['id'],
            'system_admin_account'  =>  $system_admin['system_admin_account']
        ];
        Cookie::set('LeisureKa',json_encode($auth_data));

        return $this->ResponseCreate('登录成功！欢迎回家！',[],200);
    }


    /**
     * 管理员退出
     */
    public function system_admin_login_out()
    {
        if (Cookie::has('LeisureKa')) Cookie::delete('LeisureKa');
        Session::delete('LeisureKa');
        return $this->ResponseCreate('成功退出',[],200);
    }
}