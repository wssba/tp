<?php
namespace Home\Controller;
session_start();
class CartController extends \Think\Controller{
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION['username'])){
            $this->redirect('/home/index/login');
            
        }
    }
        function  add(){
        $goods_id=I("post.goods_id",0,'intval');
        if($goods_id<1){
            $result['status']=1;
            $result['msg']="商品不存在";
            echo json_encode($result);exit;
        }
        $sql="select * from tb_goods g left join "
                ." (select * from tb_img group by goods_id) img on g.goods_id=img.goods_id"
                . " where g.goods_id=".$goods_id;
        $model=M();
        $goodsinfo=$model->query($sql);
        if($goodsinfo){
            $cart=M('Cart');
            $cartinfo=$cart->where("user_id=".$_SESSION['uid']." and goods_id=".$goods_id)->find();
            //select * from tb_cart where uer_id=$SESSION['uid'] and goods_id=$goods_id;
            
            if($cartinfo){  //更新购物车
                $update['number']=$cartinfo['number']+1;
                $update['total']=$cartinfo['goods_price']*$update['number'];
                $r=$cart->where("user_id=".$_SESSION['uid']." and goods_id=".$goods_id)->save($update);
                //update tb_cart set num=num+1 where user_id=1 and goods_id=1;            
            if($r){
                $result['status']=2;
                $result['msg']="添加成功";
                $result['data']=  $this->getcartlist();//根据当前人进行购物车查询
                
            }else{
                $result['status']=3;
                $result['msg']="添加失败";
            }
            echo json_encode($result);exit;
        }
                else {
                    $data['goods_name']=$goodsinfo[0]['goods_name'];
                    $data['goods_url']=$goodsinfo[0]['imgurl'];
                    $data['goods_id']=$goods_id;
                    $data['goods_price']=$goodsinfo[0]['price'];
                    $data['user_id']=$_SESSION['uid'];
                    $data['number']=1;
                    $data['total']=$data['goods_price']*$data['number'];
                    $r1=$cart->add($data);
            
            if($r1){
                $result['status']=2;
                $result['msg']="添加成功";
                $result['data']=  $this->getcartlist();
                //echo json_encode($result);exit;
            }  else {
                $result['status']=3;
                $result['msg']="添加失败";
            }
          echo  json_encode($result);exit;
        } 
        
            } else {
            $result['status']=1;
            $result['msg']="商品不存在";
            echo json_encode($result);exit;
        }
}
    function getcartlist(){
        $cart=M("Cart");
        $cartlist=$cart->where("user_id=".$_SESSION['uid'])->select();
        //select * from tb_cart where user_id=1;
        return $cartlist;  
    }
    function ajaxcartlist(){
        $a=isset($_SESSION['username'])?1:0;
        if($a==0){
            $data['status']=3;
        }
        $cartlist=  $this->getcartlist();
        if($cartlist){
            $data['data']=$cartlist;
            $data['status']=1;           
        }  else {
            $data['status']=0;
        }
        echo json_encode($data);
    }
    function viewcart(){
        $cartlist= $this->getcartlist();
        $this->assign("cartlist",$cartlist);
        $cart=M("Cart");    
        $sql="select sum(total) from tb_cart where user_id=".$_SESSION['uid'];
        $total=$cart->query($sql);
        $this->assign("total",$total[0]['sum(total)']);
        $this->display();
    }
    function update(){
        session_start();
        $goods_id=$_POST['goods_id'];  
        $update['number']=$_POST["number"]; 
        $cart=M('cart');
        $cartinfo=$cart->query("select * from tb_cart where user_id=".$_SESSION['uid']." and goods_id=".$goods_id);
        $update['total'] = $cartinfo[0]['goods_price'] * $update['number'];
        
        $sql="update tb_cart set number=" .$update['number']." where user_id=".$_SESSION['uid']." and goods_id=".$goods_id;
        $info=$cart->execute($sql);
       
        $sql1="update tb_cart set total=" .$update['total']." where user_id=".$_SESSION['uid']." and goods_id=".$goods_id;
        $info1=$cart->execute($sql1);
        if($info && $info1){
            $result['status']=2; 
            $result['msg']="更新成功"; 
            $sql2="select * from tb_cart where user_id=".$_SESSION['uid'];
            $result['data']=$cart->query($sql2);
        }  else {
            $result['status']=3;
            $result['msg']="更新失败";
        }  
        echo json_encode($result);
        exit;
    }
    function delete(){
        session_start();
        $goods_id=$_POST['goods_id'];  
        $update['number']=$_POST["number"]; 
        $cart=M('cart');
        $sql="delete from tb_cart where goods_id=".$goods_id." and user_id=".$_SESSION['uid'];
        $info=$cart->execute($sql);
        if($info){
            $result['status']=2; 
            $result['msg']="删除成功"; 
            $sql2="select * from tb_cart where user_id=".$_SESSION['uid'];
            $result['data']=$cart->query($sql2);
        } else {
            $result['status']=3;
            $result['msg']="删除失败";
        }  
        echo json_encode($result);
        exit;
    }
}
