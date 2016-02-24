<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
 public function index(){
        $this->display();
    }
    //登录页
    public function login(){
        $this->display();
    }
    //登出
    public function logout(){
    	  if($_SESSION[C('USER_AUTH_KEY')]) {

           session('[destroy]');
          // $this->redirect("Home/Index/index");
           $this->success("已经退出登录",U("Index/index"));
          
        }else {
            $this->error('已经登出！');
        }
    
       
    }
    //验证登陆表单
    public function checkLogin(){
        $username=I('username','');
        $password=I('password','');
        //$verify_code=I('verify','');
        if($username==''||$password==''){
            $this->redirect("Login/login");
        }
		/*
        if(!$this->_verifyCheck($verify_code)){
            $this->error("验证码错误！！！");
        }
		 * */
		
        $user=M('user')->where(array('username'=>$username))->find();
        if(!$user||md5($password)!=$user['password']){
            $this->error("用户名或密码错误！！！");
        }
        if(!$user['status']){   //status为0时表示锁定
            $this->error("用户被锁定！！！");
        }else{
            $data['login_ip'] =  get_client_ip();
            $data['last_login_time']=date('y-m-d h:i:s',time());
            if(M("user")->where(array('id'=>$user['id']))->save($data)){
                M("user")->where(array('id'=>$user['id']))->setInc("login_num");
            }
            session(C('USER_AUTH_KEY'),$user['group_id']);
            switch ($user['group_id'])
            {
            	case 1:
            		$zuname="管理员";
            		
            		break;
            	case 2:
            		$zuname="录入者";
            		break;
            	case 3:
            		$zuname="浏览者";
            		break;
            	
            }
            session('zname',$zuname);
            session('uid',$user['id']);
            session('uname',$user['username']);
            session('group_id',$user['group_id']);
            $this->success("登录成功...",U("Index/index"));
        }
    }
    //验证码
    public function verify(){
        $config = array(    
            'fontSize'    =>    20,     // 验证码字体大小    
            'length'      =>    1,      // 验证码位数    
            'useNoise'    =>   false,  // 关闭验证码杂点
            'imageH'    =>  50,          // 验证码图片高度
            'imageW'    =>  200,          // 验证码图片宽度
        );
        $Verify =new \Think\Verify($config);
        $Verify->entry();
    }

	
}


?>