<?php


namespace app\validate;
use think\Validate;
/**
 * Class SystemAdminLoginAuthValidate
 * @package app\validate
 */
class SystemAdminLoginAuthValidate extends Validate
{
    /**
     * @var string[]
     */
    protected $rule =   [
        'system_admin_account'      => 'require|alphaDash|length:6,16',
        'system_admin_password'     => 'require|alphaDash|length:6,16',
    ];

    /**
     * @var string[]
     */
    protected $message  =   [
        'system_admin_account.require'  =>  '管理员账号必须！',
        'system_admin_account.chsDash'  =>  '账号格式错误，必须是字母、数字和下划线_及破折号-',
        'system_admin_account.length'   =>  '账号长度必须是6到16位！',
        'system_admin_password.require' =>  '密码必须！',
        'system_admin_password.chsDash' =>  '密码格式错误，必须是字母、数字和下划线_及破折号-',
        'system_admin_password.length'  =>  '密码长度必须是6到16位！'
    ];
}