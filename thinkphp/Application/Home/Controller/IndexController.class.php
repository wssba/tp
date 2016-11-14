<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller { 


//注册                                                                         
    public function register(){
         if(!empty($_POST)){
         $data['username']=I("post.username"); //I函数  $_POST['username']
         $data['password']=md5(I("post.password"));
         $data['email']=I("post.email");
         $data['address']=I("post.address");
         $data['mobile']=I("post.mobile");
         if(empty($data['username'])){
             echo"<script>alert('用户名不能为空');</script>";
             exit;
         }
         if(!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$data['email'])){
             echo"<script>alert('邮箱格式不正确');</script>";
             exit;
         }
         $user=new \Home\Model\UserModel();
         $id=$user->addData($data);
         if($id){
             echo "<script>alert('数据添加成功');</script>";
             $this->display('login');
         }else{
             echo "<script>alert('数据添加失败');</script>";
             exit;
         }         
    }  else {
         $this->display('register');
    }
  }
  //用户名检测                                                                          
      function checkuser(){
      $username=I("post.username");
      $user=new \Home\Model\UserModel();
      $data=$user->where("username='".$username."'")->find();
         if($data){
          $result['status']=1;

      }  else {
          $result['status']=0;   
      }
      echo json_encode($result);//  显示格式 status:1  status:0
  }
  
  //登录                                                                         
            function login(){
        if(!empty($_POST)){
            $username=I("post.username");
            $password=I("post.password");
            $user=new \Home\Model\UserModel();
            
            $data=$user->where("username='".$username."'")->find();
            if($data){
                if(md5($password)==$data['password']){
                    $result['status']="成功";
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['uid']=$data['userid'];
                }else{
                    $result['status']="密码不对"; 
                 }
            }else{
                $result['status']="用户名不存在";
            }
            echo json_encode($result);
        }else{
        $this->display();
        }
    }
//首页                                                                           
    function index(){        
                $this->display();
            }
//商品列表                                                                        
    function goodslist(){    
        $pagesize=2;   //每页显示的数据
        $page=intval(isset($_GET['page'])?$_GET['page']:1);//当前页  I("get.page",0);  intval()强制类型转换成整形
        $type=isset($_GET['type'])?$_GET['type']:"";
        $start=($page-1)*$pagesize;   //起始下标
        $goods=M('goods');                //相当于new\Home\Modle\GoodsModel();
//        $num=$goods->Count();             //商品总个数
//        var_dump($num);
//        $pagecount=ceil($num/$pagesize);  //总页数   ceil();向上取整        
        $sql1="select count(*) as count from tb_goods g left join (select * from tb_img group by goods_id)"
                . " img on g.goods_id =img.goods_id where content like '%$type%'";
        $num1=$goods->query($sql1);
        $num=$num1[0]['count'];  //同类商品总个数
        $pagecount=ceil($num/$pagesize);  //展示同类商品所用的总页数
        $sql="select * from tb_goods g left join (select * from tb_img group by goods_id)"
               . " img on g.goods_id =img.goods_id where content like '%$type%' limit $start,$pagesize";
        //每页的起始商品和个数 limit(0,4)  0:起始数据  4：数据个数
        $goodslist=$goods->query($sql);  //每页显示的指定商品
        
//        var_dump($goodslist);
        $this->assign("goodslist",$goodslist);
        $this->assign('page',$page);
        $this->assign('type',$type);
        $this->assign("pagecount",$pagecount);      
        $this->display('category');
    }
              
//商品详情
    function detail(){
        $id=intval(I("get.id",8));  
//I("get.id",8)相当于如果不存在$_GET['id']则返回8;当成goods表中的唯一  intval强制转换为整形       
        $sql="select * from tb_goods where goods_id=".$id;
        $goods=M();
        $goodsinfo=$goods->query($sql);
        var_dump($goodsinfo);
        echo'<br>';
        
        $sql="select * from tb_img where goods_id=".$id;
        $imgs=$goods->query($sql);
        var_dump($imgs);
        $this->assign("info",$goodsinfo[0]);
        $this->assign("imgs",$imgs);
        //var_dump($goodsinfo);
        
        $this->display();
    } 


}