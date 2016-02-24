<?php
namespace Common\Controller;
use Think\Controller;
use Think\Auth;
class AuthController extends Controller{
	protected function _initialize(){
	   $sess_auth=session(C('USER_AUTH_KEY'));
	   if(!$sess_auth){
             $this->error('非法访问！正在跳转到登陆页！',U('Admin/Login/login'));      	   	
	   }
	   //如果超级管理员，不用验证
	   if($sess_auth['uid']==1){
	   	return true;
	   }
	   $auth=new Auth();
	   if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$sess_auth['uid'])){
	   	$this->error('没有权限',U('Admin/Login/login'));
	   }
	}
}
?>