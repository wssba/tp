$(document).ready(function(){
    _this=$(this);
    $(".remove").click(function(){   //更新按钮点击事件       
        number=$(this).closest("tr").find("input[name=quantity]").val();
        goods_id=$(this).closest("tr").find("input[name=quantity]").attr("ref");     
            _this=$(this);
            $.post('/home/cart/delete',{'number':number,'goods_id':goods_id},function(result){
                if(result.status===2){
                    _this.closest("tr").remove();
                    var goodslist = result.data;
                    var zongjia=0;
                    $.each(goodslist,function(k,v){
                        zongjia+=Number(v.total);             
                    });                    
                    $("#abcd").html("￥"+zongjia);
                }
            },'json');        
    });
});