<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function announcement(){

    	$pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
	    $rowsnum=isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	    /* 搜索条件 start*/
	    $qualitylist=array();  

	    $qualitylist[0]['id']=1;
	    $qualitylist[0]['mc']='欢迎';
	    $qualitylist[0]['text']='欢迎使用质量信息管理系统！！！';
	    
	    $info=M("quality");
	    $qualitylist[1]['id']=2;
	    $qualitylist[1]['mc']='质量信息总数量';
	    $qualitylist[1]['text']=$info->count();
	    
	    $user=M("user");
	    $qualitylist[2]['id']=3;
	    $qualitylist[2]['mc']='系统用户数';
	    $qualitylist[2]['text']=$user->count();
	    
	    $total=count($qualitylist);
	    if ($total==0){
	        $json='{"total":'.$total.',"rows":[]}';
	        echo $json;
	    }else{
	        $json='{"total":'.$total.',"rows":'.json_encode($qualitylist).'}';//重要，easyui的标准数据格式，数据总数和数据内容在同一个json中
	        echo $json;
	    }	
    }
	
		public function regedit(){
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
				$this->show("注册成功，请等待管理员审核...");
				// 验证通过 可以进行其他数据操作
			}
				
			
		}else{
			$this->group=M("auth_group")->field("id,title")->select();
			$this->display();
		}
	
	}
	
}