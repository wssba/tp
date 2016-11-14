<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>后台登录</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/Public/js/jquery.js" type="text/javascript"></script>
        <style>
            body{background: white;}
            #username{
                height:24px; width:110px; margin-right:22px; color:#fff; 
                background:url(http://localhost/phpcms/statics/images/admin_img/ipt_bg.jpg) repeat-x; 
                *line-height:24px; border:none; 
               color:#000; overflow:hidden;
            }
            #password{
                height:24px; width:110px; margin-right:22px; color:#fff; 
            background:url(http://localhost/phpcms/statics/images/admin_img/ipt_bg.jpg) repeat-x; *line-height:24px; border:none; 
            color:#000; overflow:hidden;
            }
            #code{
                height:24px; width:70px; margin-right:22px; color:#fff; 
            background:url(http://localhost/phpcms/statics/images/admin_img/ipt_bg.jpg) repeat-x; *line-height:24px; border:none; 
            color:#000; overflow:hidden;
            }
            .content{
                bottom:90px;_bottom:72px;color:#FFFFFF;font-size:12px;height:30px;left:50%;
margin-left:-280px;position:absolute;width:560px; overflow:visible;
            }
            .login{
                background:url(http://localhost/phpcms/statics/images/admin_img/login_bgaaa.jpg) no-repeat; 
                  width:602px; height:416px; overflow:hidden; position:absolute; left:50%; top:50%; margin-left:-301px; 
                  margin-top:-208px;
            }
            .lay label{
                width: 80px;display: block;float: left;
            }
            .lay input{
                border: 1px #cccccc solid;
                height: 10px;width: 120px;padding: 15px;
            }
            #verity_code{
                float: right;width: 130px;height:40px;margin-top: 225px;
            }
            #shuaxin{
                margin-left: 472px;;width: 130px;height:20px;margin-top: 265px;
                text-align: center;
            }
            .cr{
                font-size:12px;font-style:inherit;text-align:center;
                color:#ccc;width:100%; position:absolute; bottom:58px;
            }
        </style>
    </head>
    <body>
        <form class="loginform" method="post">
        <div class="login">
            <img src="/admin/admin/createimg" id="verity_code"/>
            <div id="shuaxin"><a href="javascript:void(0);" onclick="verity()" style="text-decoration: none">看不清换一张</a></div>
            <div class="content">
            <label>用户名：</label><input type="text" name="username" id="username"/>
            <label>密码：</label><input type="password" name="password" id="password"/>
            <label>验证码：</label><input type="text" name="code" id="code"/>
        </form>
            <input type="button" name="dl" id="dl" value="登录"/>
            </div>
            <div class="cr">河南省郑州市管城回族区经济开发区第八大街经北一路报国大厦&nbsp;&nbsp;&nbsp;智游PHP2期实战项目</div>
        </div>
        <script>
            function verity(){
            $("#verity_code").attr("src",'/admin/admin/createimg?random='+Math.random());         
            }
             $("#dl").click(function(){

             username=$("#username").val();
             password=$("#password").val();
             code=$("#code").val();
             if(username=="" || username==null){
                 alert("用户名不能为空");
                 $("#username").focus();
                 return false;
             }
             if(password=="" || password==null){
                 alert("密码不能为空");
                 $("#password").focus();
                 return false;
             }
             if(code=="" || code==null){
                 alert("验证码不能为空");
                 $("#code").focus();
                 return false;
             }
             $.post('/admin/admin/login1',$(".loginform").serialize(),function(data){  
        if(data.status=="成功"){
                 alert('登录成功，点击确定跳转到百度');
                 window.location.href="https://www.baidu.com/";
             }if(data.status=="密码不对"){
                 alert('密码不正确');
                 return false;
             }if(data.status=="用户名不存在"){
                 alert('用户名不存在');
                 return false;
             }if(data.status=="验证码不正确"){
                 alert('验证码不正确');
                 return false;
             }
         },'json'); 
             });
    
        </script>
    </body>
</html>