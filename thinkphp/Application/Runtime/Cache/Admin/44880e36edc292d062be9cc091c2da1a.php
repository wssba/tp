<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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

<html>
    <style>
        .list{
            margin-left:200px;
            border-left: 3px solid #00a0e9;
        }
    </style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>管理商品</title>  
<div class="aa">
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

            <div class="list" width="100%">    
              
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link href="/Public/css/mine.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
            .table_a{border-collapse:collapse;border-color:black;}
            th,tr,td{text-align: center}
            .bb{
                width: 100%;
            }
        </style>
        <div class='bb' style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="2"  width="1200px" >
                <tbody><tr style="font-weight: bold;">
                        <th>商品ID</th>
                        <th>商品名称</th>
                        <th>原价</th>
                        <th>现价</th>
                        <th>图片</th>
                        <th>内容</th>
                        <th colspan="2">操作</th>
                    </tr>
                    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr id="product1">
                        <td name="goods_id"><?php echo ($vo["goods_id"]); ?></td>
                        <td name="goods_name"><?php echo ($vo["goods_name"]); ?></td>
                        <td name="oldprice"><?php echo ($vo["oldprice"]); ?></td>
                        <td name="price"><?php echo ($vo["price"]); ?></td>
                        <td name="img"><img src="<?php echo ($vo["imgurl"]); ?>" height="60" width="60"></td>
                        <td name="content"><?php echo ($vo["content"]); ?></td>
<!--                        制作修改按钮并传递参数(要修改商品的goods_id)-->
                        <td><a href="/admin/goods/xiugai/goods_id/<?php echo ($vo["goods_id"]); ?>">修改</a></td>
                        <td><a href="/admin/goods/shanchu/goods_id/<?php echo ($vo["goods_id"]); ?>">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="20" style="text-align: center;">
                       <?php echo ($pagelist); ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</body>
</html>

        </div>
</div>
</html>