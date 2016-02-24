<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
class UserController extends AuthController{
	//Auth认证管理
	public function index(){
		//获取用户信息
		$user=D("user")->relation(true)->field("password",true)->select();
		//relation(true)关联，field("password",true)字段排除，获取除password外其他数据
		$this->user=$user;
		//获取用户组信息
		$group=M("auth_group")->select();
		$obj=M("auth_rule");
		foreach($group as $k=>$v){
			$map['id'] = array('in',$group[$k]['rules']);
			$group[$k]['group']=$obj->where($map)->select();
		}
		$this->group=$group;
		//获取rule规则
		$this->rule=M("auth_rule")->select();
		//$ip = new \Org\Net\IpLocation("UTFWry.dat");
		//$location=$ip->getlocation();
		//p($location);die;
		//p($group);die;
	  //  var_dump($this->user);
	    echo json_encode($this->user);
		//$this->display();
	}
	//添加后台用户及表单处理
	public function adduser(){
		if(IS_POST){
			$data=array(
					'username'=>I('username','','trim'),
					'group_id'=>I('group_id','','trim'),
					'email'=>I('email','','trim'),
					'password'=>I('password','','md5'),
					'repassword'=>I('repassword','','md5'),
					'status'=>I('status',0,'intval'),
					
					'creattime'=>date('y-m-d h:i:s',$_SERVER['REQUEST_TIME']),
					'login_num'=>0
			);
// 			if(!isset($_POST['group_id'])){
//  //				$this->error("请选择用户组...");
//                 $this->show("请选择用户组...");
              
// 			}
// 			if($data['password']!=md5($_POST['repassword'])){
// 				$this->error("两次密码不一致...");
// // 				$this->show("两次密码不一致...");						
// 			}
// 			if(!isset($_POST['password'])){
// 				$this->error("密码不能为空...");
// 				// 				$this->show("两次密码不一致...");
// 			}
// 			if(M("user")->where(array('username'=>$data['username']))->find()){
// 			$this->error("用户名已存在...");
// // 					$this->show("用户名已存在...");
				
// 			}
		/* 	if($lastInsertId=M("user")->add($data)){
				foreach($_POST['group_id'] as $k=>$v){
					$arr=array(
							'uid'=>$lastInsertId,
							'group_id'=>$_POST['group_id'][$k]
					);
					M("auth_group_access")->add($arr);
				}
				M("auth_group_access")->add($arr);
 //					$this->success("添加成功...");
			$this->show("添加成功...");
			}else{
 				$this->error("添加失败...");
//				$this->show("添加失败...");
			
			} */
			
			$rules = array(
			   array('username','require','用户名必须！'),
			   array('username','','帐号名称已经存在！',0,'unique',1), 
          	   array('username','3,12','用户名不符合要求(3到12个字符之间)。',0,'length'),
           	   array('group_id','require','用户组必须！'),
			   array('email','email','邮箱格式不正确'),
			   array('group_id',array(1,2,3),'值的范围不正确！',0,'in'), 
			   array('repassword','password','确认密码不正确',0,'confirm'), 
	/* 		   array('password','/^[a-z]\w{6,30}$/i','密码不符合要求！'), */
          );	

			
			
			$User = D("User"); // 实例化User对象
			if (!$User->validate($rules)->create($data)){

				// 如果创建失败 表示验证没有通过 输出错误提示信息
			
				exit($User->getError());
			}else{
				$result = $User->add(); // 写入数据到数据库
				if($result){
					// 如果主键是自动增长型 成功后返回值就是最新插入的值
					$insertId = $result;
				}
				$this->show("添加成功...");
				// 验证通过 可以进行其他数据操作
			}
				
			
		}else{
			$this->group=M("auth_group")->field("id,title")->select();
			$this->display();
		}
	
	}
	
	
	//添加后台用户及表单处理
	public function user(){
		$user=M("auth_group");
		$list=$user->select();
		$this->assign('list',$list);
		$this->display();
	}
	//添加后台用户组及表单处理
	public function group(){
		if(IS_POST){
			$data=array(
					'title'=>I('title','','trim'),
					'status'=>I('status',0,'intval'),
					'ps'=>I('ps','','trim'),
					'rules'=>I('rules','','trim'),
					'view'=>I('view',1,'intval'),
					'edit'=>I('edit',0,'intval'),
					'admin'=>I('admin',0,'intval')
			);
			if(M("auth_group")->where(array('title'=>$data['title']))->find()){
				
				$this->ajaxReturn("用户组名称已存在...");
			}
			if(M("auth_group")->add($data)){
				$this->ajaxReturn("添加成功...");
			}else{
				$this->ajaxReturn("添加失败...");
			}
		}else{
			$this->display();
		}
	}
	//添加后台权限及表单处理
	public function auth(){
		if(IS_POST){
			$data=array(
					'name'=>I('name','','trim'),
					'title'=>I('title','','trim'),
					'condition'=>I('condition','','trim'),
					'status'=>I('status',0,'intval'),
					'type'=>I('type',0,'intval'),
			);
			if(M("auth_rule")->add($data)){
// 				$this->success("添加成功...",U("Auth/index"));
				$this->ajaxReturn("添加成功...");
			}else{
// 				$this->error("添加失败...");
				$this->ajaxReturn("添加失败...");
			}
		}else{
			$this->display();
		}
	}
	//注册rule规则
	public function register(){
		$class_name=get_class();
		return register($class_name);
	}
	//删除用户组
	public function deleteGroup(){
		if(IS_POST){
			if(!isset($_POST['id'])){
				return false;
			}
			$id=$_POST['id'];
// 			$id=I("id",0,"intval");
			if(!$id){
				return false;
			}
			if(M("auth_group")->where(array("id"=>$id))->delete()){
				M("auth_group_access")->where(array("group_id"=>$id))->delete();
				$this->ajaxReturn("删除成功...");
// 				$this->success("删除成功...",U("Auth/index"));
			}else{
				$this->ajaxReturn("删除失败...");
// 				$this->error("删除失败...");
			}
		}
	}
	//修改用户组
	public function modifyGroup(){
		if(IS_GET){
			if(!isset($_GET['id'])){
				return false;
			}
			$id=I("id",0,"intval");
			if(!$id){
				return false;
			}
			$group=M("auth_group")->where(array("id"=>$id))->find();
			$rule=M("auth_rule")->select();
			foreach($rule as $k=>$v){
				if(in_array($rule[$k]['id'],explode(',',$group['rules']))){
					$rule[$k]['is_checked']=1;
				}else{
					$rule[$k]['is_checked']=0;
				}
			}
			$this->rule=$rule;
			$this->group=$group;
			$this->id=$id;
			//p($rule);die;
			$this->display();
		}elseif(IS_POST){
		
			
			$data=array(
					'title'=>I("title","","trim"),
 					'rules'=>implode(",",$_POST['rule']),
					'status'=>I("status","","trim")
			);

			if(M("auth_group")->where(array("id"=>I('id')))->save($data)){
				$this->ajaxReturn("修改成功...");
			}else{
				$this->ajaxReturn("修改失败...");
			}
		}
	}
	//删除RULE
	public function deleteRule(){
		if(IS_POST){
			if(!isset($_POST['id'])){
				return false;
			}
// 			$id=I("id",0,"intval");
			$id=$_POST['id'];
// 			if(!$id){
// 				return false;
// 			}
			if(M("auth_rule")->where(array("id"=>$id))->delete()){
				$this->ajaxReturn("删除成功...");
// 				$this->success("删除成功...",U("Auth/index"));
			}else{
// 				$this->error("删除失败...");
				$this->ajaxReturn("删除失败...");
			}
		}
	}
	//修改RULE
	public function modifyRule(){
		if(IS_POST){
			if(!isset($_POST['id'])){
				return false;
			}
			$id=I("id",0,"intval");
			unset($_POST['id']);
			if(!$id){
				return false;
			}
			if(M("auth_rule")->where(array("id"=>$id))->save($_POST)){
				$this->ajaxReturn("修改成功...");
				//$this->success("修改成功...");
			}else{
				//$this->error("修改失败...");
				$this->ajaxReturn("修改失败...");
			}
		}
	}
	//删除用户
	public function deleteUser(){
		if(IS_POST){
			if(!isset($_POST['id'])){
				return false;
			}
			$id=I("id",0,"intval");
			if(!$id){
				return false;
			}
			if(M("user")->where(array("id"=>$id))->delete()){
// 				M("auth_group_access")->where(array("uid"=>$id))->delete();
// 				$this->success("删除成功...",U("Auth/index"));
				$this->show("删除成功...");
			}else{
// 				$this->error("删除失败...");
				$this->show("删除失败...");
			}
		}
	}
	//修改用户
	public function modifyUser(){
		if(IS_POST){
		
			 $id=I("id",0,"intval");
			if(!$id){
			
 				return false;
			}
			$data['username']=I("username","","trim");
			$data['email']=I("email","","trim");
 			$data['status']=I("status",0,"intval");
			$data['group_id']=I("group_id",0,"intval");
			$tmp=0;
			if(isset($_POST['role_id'])){
				M("auth_group_access")->where(array("uid"=>$id))->delete();
				foreach ($_POST['role_id'] as $key => $value) {
					if(M("auth_group_access")->add(array("uid"=>$id,"group_id"=>$_POST['role_id'][$key]))){
						$tmp=1;
					}
				}
			}
			if(trim($_POST['password'])){
				if(md5($_POST['password'])!=md5($_POST['repassword'])){
// 					$this->error("两次密码输入不一致...");
					$this->show("两次密码输入不一致...");
				}else{
					$data['password']=I("password","","md5");
				}
			}
			if(M("user")->where(array("id"=>$id))->save($data)){
// 				$this->success("修改成功...",U("Auth/index"));
				$this->show("修改成功...");
			}else{
				if($tmp){
// 					$this->success("修改成功...",U("Auth/index"));
					$this->show("修改成功...");
				}else{
// 					$this->error("修改失败...");
					$this->show("修改失败...");
				}
			} 
		}elseif(IS_GET){
			if(!isset($_GET['id'])){
				return false;
			}
			$id=I("id",0,"intval");
			if(!$id){
				return false;
			}
			$this->user=M("user")->where(array('id'=>$id))->field("password",true)->find();
			$user_group=M("auth_group_access")->where(array("uid"=>$id))->select();
			$group=M("auth_group")->select();
			foreach($user_group as $key => $value){
				$user_group[$key]['group_name']=M("auth_group")->where(array("id"=>$user_group[$key]['group_id']))->getField("title");
			}
			$this->user_group=$user_group;
			$this->group=$group;
			$this->display();
		}
}



public function userdata(){
	$User = M("User"); // 实例化User对象
	// 查找status值为1name值为think的用户数据
	$data = $User->select();
	foreach($data as $t){
		if($t['status']==1){
			$t['status'] = '开启';
		}else{
			$t['status'] = '关闭';
		}
		$items[] = $t;
	}
	
	echo json_encode($items);


}
public function memberdata(){
	$Group = M("auth_group"); // 实例化User对象
	// 查找status值为1name值为think的用户数据
	$data = $Group->select();
	foreach($data as $t){
		if($t['status']==1){
			$t['status'] = '开启';
		}else{
			$t['status'] = '关闭';
		}
		$items[] = $t;
	}
	
	echo json_encode($items);


}
public function rightdata(){
	$Right = M("auth_rule"); // 实例化User对象
	// 查找status值为1name值为think的用户数据
	$data = $Right->select();
	
	foreach($data as $t){
		if($t['status']==1){
			$t['status'] = '开启';
		}else{
			$t['status'] = '关闭';
		}
		$items[] = $t;
	}
	
	echo json_encode($items);


}
}

?>