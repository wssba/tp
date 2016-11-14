$(document).ready(function(){
    _this=$(this);
    //$(".number").keyup(function(){   input输入框 键盘弹起事件
    $(".update_goods").click(function(){   //更新按钮点击事件
        price=$(this).closest("tr").find("td[name=price]").attr("ref");
        number=$(this).closest("tr").find("input[name=quantity]").val();
        goods_id=$(this).closest("tr").find("input[name=quantity]").attr("ref");
        total=number*price;
        $(this).closest("tr").find("td[name=total]").html(total.toFixed(2));
        number_pre=/^([1-9]{1})([0-9]*)/;
        if(number_pre.test(number)===false){
            $(this).closest("tr").find("input[name=quantity]").attr('value',1);
            return false;
        }else{
            _this=$(this);
            $.post('/home/cart/update',{'number':number,'goods_id':goods_id},function(result){
                if(result.status===2){
                    var goodslist = result.data;
                    var zongjia=0;
                    $.each(goodslist,function(k,v){
                        zongjia+=Number(v.total);
                        
                    });
                    $("#abcd").html("￥"+zongjia);
                }
            },'json');
        }
    });
});