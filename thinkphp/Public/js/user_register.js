function check_user(){
    var username=$('#username').val();
    var email=$('#email').val();
    var mobile=$('#mobile').val();
    var password=$('#password').val();
    var confirm_password=$('#confirm_password').val();
    var email_exg=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var mobile_exg=/[1][358][0-9]{9}/;
    var password_exg=/^\w{6,12}$/;
//验证用户名                                                         
    if($.trim(username)=="" || $.trim(username)==null){
        alert("用户名不能为空");
        $("#username").focus();
        return false;
    }
    if(username.length>15){
        alert("用户名过长");
        $("#username").focus();
        return false;
    }
    if(!user_exist()){
        return false;
    }
//验证邮箱                                                           
    if($.trim(email)=="" || $.trim(email)==null){
        alert("邮箱不能为空");
        $("#email").focus();
        return false;
    }
    if(!email_exg.test(email)){
        alert("邮箱格式不正确");
        $("#email").focus();
        return false;
    }
//验证电话                                                            
    if($.trim(mobile)=="" || $.trim(mobile)==null){
        alert("电话不能为空");
        $("#mobile").focus();
        return false;
    }
    if(!mobile_exg.test(mobile)){
        alert("电话格式不正确");
        $("#mobile").focus();
        return false;
    }
//验证密码                                                            
    if($.trim(password)=="" || $.trim(password)==null){
        alert("密码不能为空");
        $("#password").focus();
        return false;
    }
    if(!password_exg.test(password)){
        alert("密码格式不正确");
        $("#password").focus();
        return false;
    }    
//验证确认密码                                                        
    if($.trim(confirm_password)=="" || $.trim(confirm_password)==null){
        alert("确认密码不能为空");
        $("#confirm_password").focus();
        return false;
    }
    if($.trim(confirm_password)!== $.trim(password)){
        alert("确认密码不正确");
        $("#confirm_password").focus();
        return false;
    }   
}
//验证用户名是否已经存在                                                 
function user_exist(){
    flag=true;
username=$("#username").val();
$.ajax({url:'/home/index/checkuser',
    data:{'username':username},
    dataType:'Json',
    async:false,
    type:'post',
    success:function(data){
        if(data.status){
            alert('用户名已存在');
            flag=false;
        }
    }
    })
    return flag;
}




