<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<style>
    .hello{
        font-size: 25px;color: red;
        margin-left:200px;
        padding: 30px;
        border-left: 2px solid #00a0e9;
    }
</style>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .mainer{overflow: hidden; background-color:#9CCAF9}
            header{width:100%; height: 60px; border-bottom: 1px solid #cecece; margin-top:20px;}
            .header-info{text-align: right; font-family: "微软雅黑"; font-size: 14px;}
        </style>
    </head>
    <body>
        <div class="mainer">
            <header>
                <div class="logo"></div>
                <div class="header-info">
                    <label>当前登录人：<span style="color: red;"><?php echo $_SESSION['username'];?></span></label>
                    <span><a href="/admin/admin/logout"><button>退出</button></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                
            </header>

        </div>
    </body>
</html> 

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .sliber-left{
                float: left;
                width:200px;
                height:350px;
                margin:auto 0;
                padding:30px;
            }
            .sliber-left ul{
                list-style: none;
            }
            .sliber-left ul li{
                height:20px;
                margin:50px 0px;
            }
            .sliber-right{
                margin:20px;
                float: left;
            }


        </style>
    </head>
    <body>          
            <div class="sliber-left">
                <nav>
                    <div class="nav-block">
                        <ul class="nav-ul">
                             <li><a href="/admin/goods/showlist"><button>管理商品</button></a></li>
                            <li><a href="/admin/goods/add"><button>添加商品</button></a></li>
                           
                        </ul>
                    </div>
                </nav>
           </div>
    </body>
</html> 

<div class="hello">
    <p>你好 <?php echo $_SESSION['username'];?>!</p>
    <p>欢迎来到test_shop商城后台商品管理页面，</p>
    <p>请点击左侧相关按钮，执行相应的商品的管理和添加操作。</p>
</div>