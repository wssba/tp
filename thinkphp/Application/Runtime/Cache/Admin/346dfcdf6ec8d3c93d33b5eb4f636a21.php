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

        <script src="/Public/ueditor/ueditor.config.js" type="text/javascript"></script>
        <script src="/Public/ueditor/ueditor.all.min.js" type="text/javascript"></script>
        <script src="/Public/ueditor/lang/zh-cn/zh-cn.js" type="text/javascript"></script>
        <script src="/Public/js/jquery.js" type="text/javascript"></script>
        <script src="/Public/ajaxfileupload.js" type="text/javascript"></script>

<html>
    <head>
        <title>添加商品</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="main">
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

            <div class="sliber-right"> 
                <form method="post" onsubmit="return checkgoods()">
                    <table style="width:100%;">
                        <tr><td>商品名称：<input type="text" name="goods_name" id="goods_name"></td></tr>
                        <tr><td>商品原价：<input type="text" name="oldprice" id="oldprice"></td></tr>
                        <tr><td>商品现价：<input type="text" name="price" id="price"></td></tr>
                        <tr><td>
                                <div class="uploadfile">
                                    <input type="file" name="goodsimg" id="goodsimg"/>
                                <a href="javascript:void(0)" onclick="imgupload()">上传</a>
                                </div>
                                <script>
                                    function imgupload(){
                                        $.ajaxFileUpload({
                                            url:'/admin/goods/imgupload',
                                            secureuri:false,
                                            fileElementId:'goodsimg',  //对应file标签元素的id属性
                                            dataType:'json',
                                            success:function(data,status){
                                                if(!data.status){
                                                    alert(data.msg);
                                                    return false;
                                                }else{
                                                    var imgpath='/upload/'+data.path;
                                                    var html="<img src='"+imgpath+"' width=100 height=100 />\n\
                                                    <input type='hidden' value='"+imgpath+"' name='imgpath[]' />";
                                                    $(".uploadfile").before(html);//把HTML代码追加到元素前面
                                                }
                                            },
                                            error:function(data,status){
                                                
                                            }
                                        });
                                        return false;
                                    }
                                    function checkgoods(){
                                        goods_name=$("#goods_name").val();
                                        if($.trim(goods_name)==''|| $.trim(goods_name)==null){
                                            alert("商品名称不能为空");
                                            return false;
                                        }
                                        if(goods_name.length>15){
                                            alert("商品名称过长");
                                            return false;
                                        }
                                        price_reg=/^\d{1,8}|^\d{1,8}\.\d{2}/;
                                        oldprice=$("#oldprice").val();
                                        if(!price_reg.test(oldprice)){
                                            alert("格式不正确");
                                            return false;
                                        }
                                    }
                                </script>
                                </td></tr>
                        <tr><td>商品描述：</td></tr>
                        <tr><td><textarea name="content" id="editor" style="height:300px;width:800px;"></textarea>
                                <script type="text/javascript">
                                    var ue = UE.getEditor('editor');
                                </script> 
                        </td></tr>
                        <tr><td><input type="submit" value="提交"/></td></tr>
                    </table>
                </form>   
            </div>

        </div>
    </body>
</html>