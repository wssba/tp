function addtocart(goods_id,member){
    if(member==0){
        window.location.href='/home/index/login';      
    }
    $.post('/home/cart/add',{'goods_id':goods_id},function(result){
        if(result.status==2){
            alert('添加成功');
            goodslist=result.data;  //产品列表
            num=0;
            total=0;
            html="";
            $.each(goodslist,function(k,v){   //foreach(arr as $k=>$v);
                num++;  //商品种类
                total+=Number(v.total);     
            });
            $("#goods_list").html(html);
            $("#goods_num").html(num+" item(s)");
            $(".goos_total").html("￥"+total);
    }
             },'json');
    
}
//hover(function(){},function(){})  第一个function是鼠标经过事件 第二个是鼠标离开
$(".topcart").hover(function(){   //鼠标经过
    $.post('/home/cart/ajaxcartlist',{},function(result){
    if(result.status){
       goodslist=result.data;
       num=0;
       total=0;
       html=result.data;
       $.each(goodslist,function(k,v){
           num++;
           total+=Number(v.total);
           html+="<tr>"+
                       "<td class=\"image\"><a href=\"product.html\">\n\
                       <img width=\"50\" height=\"50\" src='"+v.goods_url+"' alt='"+v.goods_name+"' title='"+v.goods_name+"' style=\"min-width:50px;\"</a></td>"+
                       "<td class=\"name\"><a href=\"product.html\">"+v.goods_name+"</a></td>"+
                       "<td class=\"quantity\">x&nbsp;"+v.number+"</td>"+
                       "<td class=\"total\">"+v.total+"</td>"+
                       "<td class=\"remove\"><i class=\"icon-remove\"></i></td>"+
                       "</tr>";
       });
       $("#goods_list").html(html);
       $("#goods_num").html(num+" item(s)");
       $(".goods_total").html("￥"+total);
       $(".textrighttotal").html("￥"+total);
    }
},'json');},function(){})

