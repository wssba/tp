<?php
namespace Admin\Controller;

class GoodsController extends CommonController {
//管理商品                                                                       
    function showlist(){
        //实现分页效果
        $goods=D('goods');
        //①获取总记录条数
        $total=$goods->count();
        $per=3;//每页显示数据条数
        //
        //②实例化分页类对象
        $page_obj=new \Tools\Page($total,$per);
        //$page_obj->page=empty(I("get.page",0))?1:I("get.page",0);
        //③自定义sql语句，获取每页信息 
        $sql="select * from tb_goods g left join (select * from tb_img group by goods_id) img on g.goods_id=img.goods_id ".$page_obj->limit;
        $data=$goods->query($sql);
        
        //④获取页码列表
        $pagelist = $page_obj->fpage();
        $this->assign("pagelist",$pagelist);
        $this->assign("data",$data);
        $this->display();
    }
        
//添加商品                                                                       
    function add(){
        if(empty($_POST)){
            //展示表单
            $this->display();
        }  else {
            //收集表单
            //var_dump($_POST);
            $data['goods_name']=I("post.goods_name");
            $data['oldprice']=  empty(I("post.oldprice"))?0:I("post.oldprice");
            $data['price']=empty(I("post.price"))?0:I("post.price");
            $data['content']=I("post.content");
            $imgs=$_POST['imgpath'];
            
            $goods=new \Admin\Model\GoodsModel();
            $goodsid=$goods->add($data);
            if($goodsid){
                if(!empty($imgs)){//判断是否上传图片
                    $img=new \Admin\Model\ImgModel();
                    foreach ($imgs as $v){
                        $r['goods_id']=$goodsid;
                        $r['imgurl']=$v;
                        $img->add($r);
                    }
                }
                //echo "<script>alert('添加成功');window.location.href='/admin/goods/add';</script>";
                $this->success("添加成功","/admin/goods/add");
                //$this->redirect("admin/goods/add");//没有提交提示语，直接进行跳转
            }  else {
                $this->error("添加失败","/admin/goods/add");
            }
        }
        
    }
    //上传文件                                                                  
    function imgupload(){
        $upload= new \Think\Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg','gif','png','jpeg');
        $upload->rootPath = './upload/';
        //在文件上传时 前面加./和不加都是项目根目录下  如果加/找的是磁盘下的根目录
        $upload->savePath = '';
        $info=$upload->upload();
        if(!$info){
            $data['status']=0;
            $data['msg']=$upload->getError();
        }  else {
            foreach ($info as $v ) {
                $data['status']=1;
                $data['path']=$v['savepath'].$v['savename'];
            }
        }
        echo json_encode($data);
        //move_uploaded_file($_FILES['goodsimg']['tmp_name'],$file.'/212.jpg');  
    }
//修改商品信息                                                                       
    function xiugai($goods_id){
        //根据$goods_id获得被修改的商品信息，并给模板展示
        $goods=D('Goods');
        if(empty($_POST)){
            $info=$goods->find($goods_id);
            $this->assign('info',$info);
            $this->display("update");
        }  else {
            $z=$goods->save($_POST);
            if($z){
                //$this->redirect([分组/控制器/方法]地址,参数,延迟时间,提示信息);
                $this->redirect('showlist',array(),2,'商品修改成功，2秒后自动跳转到商品列表界面');
            }  else {
                $this->redirect('xiugai',array('goods_id'=>$goods_id),2,'商品修改失败，2秒后自动跳转到商品修改界面');
            }
        }
    }
    //删除商品                                                                       
    function shanchu($goods_id){
        //根据$goods_id获得要修改的商品
        $goods=D('Goods');
            $z=$goods->delete($goods_id);
            if($z){
                //$this->redirect([分组/控制器/方法]地址,参数,延迟时间,提示信息);
                $this->redirect('showlist',array(),2,'商品删除成功，2秒后自动跳转到商品列表界面');
            }  else {
                $this->redirect('shanchu',array('goods_id'=>$goods_id),2,'商品删除失败，2秒后自动跳转到商品删除界面');
            }
        }   
}
