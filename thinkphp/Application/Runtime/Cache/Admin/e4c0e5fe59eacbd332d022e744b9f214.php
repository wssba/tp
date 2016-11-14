<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/Public/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <style>
        .table_a{border-collapse:collapse;border-color:black;}
        </style>
        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理>>>修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/admin/goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/admin/goods/xiugai/goods_id/25" method="post" enctype="multipart/form-data">
<!--                隐藏域                           -->                               
                <input type="hidden" name="goods_id" value="<?php echo ($info["goods_id"]); ?>" />
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" value="<?php echo ($info["goods_name"]); ?>" /></td>
                </tr>
                <tr>
                    <td>原价</td>                   
                        <td><input type="text" name="oldprice" value="<?php echo ($info["oldprice"]); ?>" /></td>                    
                </tr>
                <tr>
                    <td>现价</td>
                    <td><input type="text" name="price" value="<?php echo ($info["price"]); ?>" /></td>
                </tr>
                
                <tr>
                    <td>内容</td>
                    <td>
                        <textarea name="content"><?php echo ($info["content"]); ?></textarea>
                    </td>
                </tr>
            </table>
                <input type="submit" value="修改"> 
            </form>
        </div>
    </body>
</html>