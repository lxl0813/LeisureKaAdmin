<?php /*a:1:{s:86:"D:\PhpWorkSite\phpstudy_pro\WWW\LeisureKaAdmin\think\view\auth\system_admin_login.html";i:1620709338;}*/ ?>
<!doctype html>
<html  class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>闲趣幽咖</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="<?php echo token(); ?>">
    <link rel="stylesheet" href="/static/css/font.css">
    <link rel="stylesheet" href="/static/css/login.css">
    <link rel="stylesheet" href="/static/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/js/xadmin.js"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">闲趣幽咖-后台管理系统</div>
    <div id="darkbannerwrap"></div>
    <form method="post" class="layui-form" >

        <input name="system_admin_account" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="system_admin_password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit" id="submit">
    </form>
</div>

<script>

    $(function  () {
        layui.use('form', function(){
            var form = layui.form;
            //监听提交
            form.on('submit(login)', function(data){
                var form_data   =   JSON.stringify(data.field);
                $.ajax({
                    type:"POST",
                    url:"<?php echo url('Auth/system_admin_login_auth'); ?>",
                    data:{
                        form_data:form_data,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:"json",
                    success:function(result){
                        if(result.code == 200){
                            layer.msg(result.message);
                            setTimeout(function () {
                                window.location.href = "<?php echo url('Index/index'); ?>"
                            },1000)
                        }else{
                            layer.msg(result.message);
                        }
                    }
                });
                return false;
            });
        });
    })
</script>

</body>
</html>