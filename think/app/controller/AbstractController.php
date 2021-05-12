<?php


namespace app\controller;


use app\Request;

class AbstractController extends RbacController
{
    /**
     * 摘要列表
     */
    public function abstract_list(Request $request)
    {
        return view();
    }

    /**
     * 摘要添加
     */
    public function abstract_add(Request $request)
    {

    }

    /**
     * 摘要修改
     */
    public function abstract_update(Request $request)
    {

    }

    /**
     * 摘要删除
     */
    public function abstract_delete(Request $request)
    {

    }
}