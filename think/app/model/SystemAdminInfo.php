<?php


namespace app\model;


use think\facade\Db;
use think\Model;

class SystemAdminInfo extends Model
{
    /**
     * 管理员登录认证
     * @param $system_admin_account string 管理员账号
     */
    public static function system_admin_login_auth(string $system_admin_account)
    {
        $system_admin   =   Db::name('system_admin_info')->where('system_admin_account',$system_admin_account)->find();
        return $system_admin;
    }
}