<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
		<title><?php echo (APP_NAME); ?></title>
		<!-- easyui CSS 文件 -->
<link rel=icon type="image/x-icon" href="/qis/Public/images/favivon.ico" >
<link rel="stylesheet" type="text/css" href="/qis/Public/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/qis/Public/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/qis/Public/easyui/demo/demo.css">
<link rel="stylesheet" type="text/css" href="/qis/Public/easyui/themes/icon_my.css">
<link href="/qis/Public/easyui/themes/icons/icon-all.css" type="text/css" rel="stylesheet">
<link href="/qis/Public/css/mystyle.css" rel="stylesheet" type="text/css" />
<!-- <link href="/qis/Public/lightbox/css/lightbox.css" rel="stylesheet" type="text/css" /> --> 				
</head>


<body class="easyui-layout">
<!--遮罩显示start-->
	<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#DDDDDB url('/qis/Public/images/bodybg.jpg');text-align:center;padding-top: 20%;">
	<h1>
		
		<img src="/qis/Public/images/logo.png" height="150px" alt="logo" /><br>
		<img src='/qis/Public/images/loading.gif'/><font color="#15428B">正在加载中···</font>
	</h1>
</div>
<!--遮罩显示end-->
	 
	 <script type="text/javascript" src="/qis/Public/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/qis/Public/easyui/jquery.easyui.min.js"></script>
<script src="/qis/Public/easyui/locale/easyui-lang-zh_CN.js" type="text/javascript"></script>
<script src="/qis/Public/js/myjs.js" type="text/javascript"></script>
<script src="/qis/Public/js/jquery.jqprint-0.3.js" type="text/javascript"></script>
<script src="/qis/Public/js/e-smart-zoom-jquery.min.js" type="text/javascript"></script>
<script src="/qis/Public/js/picview.js" type="text/javascript"></script>
<!-- <script src="/qis/Public/lightbox/js/lightbox.js" type="text/javascript"></script> -->
	 
    <div data-options="region:'north',title:'',split:true" class="north_title">

	<table style="width:100%;cellspacing:0px;cellpadding:0px;border:'0px';align:'center'">
		<tbody>
			<tr height="50">
				<td width="150" align="center">
					<img src="/qis/Public/images/logo.png" height="50px" alt="logo" />
				</td>
				<td valign="middle" align="center">
					<font style="font-size:18pt;font-family:华文隶书,黑体,宋体,华文琥珀,隶书;color:#0E2D5F;">特种车事业部<font>&nbsp;<b style="font-size:11pt;font-style:blod"><?php echo (APP_NAME); ?>&nbsp;<?php echo (APP_VERSION); ?></b>

       <br><b>『 <?php echo (APP_URL); ?>,&nbsp; <?php echo (APP_VERSION); ?> 』<b>

    </b></b></font></font>
				</td>
				<td width="200" valign="top" align="center">
					<table style="width:100%;cellspacing:0px;cellpadding:0px;border:'0px';align:'center'">
						<tbody>

							<!--通过session进行判断-->
							<?php if(!empty($_SESSION[C('USER_AUTH_KEY')])): ?><tr>
									<td style="color:#0E2D5F">
										【<?php echo ($_SESSION['zname']); ?>:<?php echo ($_SESSION[ 'uname']); ?>| IP:<?php echo ($_SERVER[ "REMOTE_ADDR"]); ?>】

									</td>
								</tr>
								<tr>
									<td>
										<a style="color:#0E2D5F" href='#' onclick='changePW_show()'>【 修改密码 】</a>
										<a style="color:#0E2D5F" href='#' onclick='loginout_show()'>【 退出系统 】</a>
									</td>
								</tr>
								<?php else: ?>
								<tr>
									<td>
										<a class='easyui-linkbutton' plain='true' iconCls='icon-standard-house-go' href='#' onclick='login_show()'><font style="color:#0E2D5F">登录系统</font></a>

									</td>
								</tr>
								<tr>

									<td>
										<a class='easyui-linkbutton' plain='true' iconCls='icon-standard-user-add' href='#' onclick='regedit_show()'><font style="color:#0E2D5F">注册账户</font></a>

									</td>

								</tr><?php endif; ?>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

</div>
<script type="text/javascript">
	function loginout_show(){    
	$('#loginout').window('open');  // open a window   
}
//退出登录实现
function loginout(){
	$('#loginoutForm').form('submit',{
			url:'/qis/index.php/Admin/Login/logout',
			success:function(data){
					$('#loginout').dialog('close');
				$.messager.alert('已经退出', data, 'info');
				window.location.reload();
  				
			
			}
		});
	}
//修改密码
function changePW_show(){    
	$('#changePW').window('open');  // open a window   
}
	//更改密码
function changePW(){

	$('#changePWForm').form('submit',{
			
			url:'/qis/index.php/Admin/Login/logout',
			success:function(data){
				
				//$.messager.alert('已经退出', data, 'info');
				window.location.href = "index.php";
			
			}
		});
	}
//
function login_show(){    
	$('#login').window('open');  // open a window   
}
function login(){
$('#loginForm').form('submit',{
		url:'/qis/index.php/Admin/Login/checkLogin',
		success:function(data){
		
			
			$.messager.alert('登录', data, 'info');
			$('#login').dialog('close');
			
			//window.location.href = "index.php";
		  //(window).unbind("beforeunload");
		  window.location.reload(); 
		
		}
	});
	
	}
function regedit_show(){    

	$('#regedit').window('open');  // open a window   
}
</script>
 
    	<div data-options="region:'west',title:'※ 欢迎您使用本系统 ※',split:true"
		style="width: 170px;">
		<div id="aa" class="easyui-accordion"
			data-options="fit:true,border:false ">
			<?php if($_SESSION[C('USER_AUTH_KEY')]==1): ?><div title="用户管理" data-options="iconCls:'panel-icon icon-gyy'"
				style="overflow: auto; padding: 10px;">
	<ul id="navigation_user" class="easyui-tree">  
    <li id='user_null' data-options="iconCls:'icon-standard-user'">  
        <span>用户管理</span>  
        <ul>  
            <li id='user_manage' data-options="iconCls:'icon-standard-user-edit'">    
                <span>用户管理</span>  
            </li>  
     
    
        </ul>  
    </li>  

</ul>
			</div><?php endif; ?>

			<div title="质量文件" data-options="iconCls:'icon-standard-folder-magnify',selected:true" style="overflow: auto; padding: 10px;">
				<!--通过json生成列表，js文件在myjs.js里 -->
			

 	<ul id="navigation_search" class="easyui-tree">  
    <li id='search_null' data-options="iconCls:'icon-standard-folder-table'">  
        <span>质量信息列表</span>  
        <ul>  
        
            <li id='search_info' data-options="iconCls:'icon-standard-table-multiple'">    
                <span>质量信息</span>  
            </li>  
    
        </ul>  
    </li>  
 
</ul>
			</div>
			
		</div>
	</div>
<script type="text/javascript">
//质量信息列表
$('#navigation_search').tree({
	onClick: function(node){
		//alert(node.id);  // alert node text property when clicked
		//
       if(node.id!="search_null" ){
		  if ($('#tab').tabs('exists', node.text)){
		        $('#tab').tabs('select', node.text);    
		    } else {
		var  urll='';
    	switch(node.id)
    	{
    	case 'search_info':
    		urll='Home/Quality/show_Quality';//质量信息
    	  break;
    	case '2':
    		urll='Home/Data/result2';
    	  break;
    	}
$('#tab').tabs('add',{ 
    title:node.text, 
    iconCls:node.iconCls,  
    fit:true,
    href:urll,
    closable:true  
}); 
	}
       }
		
	}
});
//用户管理
$('#navigation_user').tree({
	onClick: function(node){
		//alert(node.id);  // alert node text property when clicked
		//
       if(node.id!="user_null"  && node.id!="right_null"){
		  if ($('#tab').tabs('exists', node.text)){
		        $('#tab').tabs('select', node.text);    
		    } else {
		var  urll='';
    	switch(node.id)
    	{
    	case 'user_manage':
    		urll='/qis/index.php/Admin/User/user';//
    	  break;
    	case 'user_member':
    		urll='/qis/index.php/Admin/User/group';//
    	  break;
    	 case 'right_manage':
    		urll='/qis/index.php/Admin/User/right';//
    	  break;
    	}
$('#tab').tabs('add',{ 
    title:node.text, 
    iconCls:node.iconCls,  
    fit:true,
    href:urll,
    closable:true  
}); 
	}
       }
		
	}
});
</script>
	
	
 
         <div data-options="region:'center',title:''"  style="padding: 0px; background: #eee;">
	    <div id="tab" class="easyui-tabs" data-options="fit:true,border:false">
			<div title='主页' style="padding: 10px" data-options="iconCls:'icon-standard-house'">
	               <table width="90%" border="0" cellspacing="10">
  <tr>
    <td align="left" valign="top">
	<div id="p1" class="easyui-panel" title="系统信息"    
        style="width:400px;padding:0px;background:#fafafa;"  
        data-options="iconCls:'icon-standard-application-home',closable:false,   
                collapsible:true,minimizable:false,maximizable:false">  
			
				<div class="demo-info">
		<div class="demo-tip icon-tip"></div>
		<div><b>欢迎使用<?php echo (C("SYSNAME")); ?></b></div><br/>
		
		 <div class='smwd'>版本：<?php echo (APP_VERSION); ?></div>		 
         <div class='smwd'>功能：<?php echo (C("FUNCTION")); ?></div>
     
	</div>	
				
 

 
</div>
	<br/>
	<div id="p2" class="easyui-panel" title="使用说明"    
        style="width:400px;padding:0px;background:#fafafa;"  
        data-options="iconCls:'icon-standard-application-home',closable:false,   
                collapsible:true,minimizable:false,maximizable:false">

				<div class="demo-info">
		<div class="demo-tip icon-tip"></div>
		<div><b>使用本站前请认真阅读以下说明</b></div><br/>
			 <li class='smwd'>使用本系统，请注意遵守公司保密规定；</li>
			 <li class='smwd'>请不要使用本系统发布与质量无关的信心；</li>
		 <li class='smwd'>普通用户无需登录，即可浏览、查询；</li>
		 
<li class='smwd'>质量信息录入者登录，即可发布质量信息；</li>
<li class='smwd'>管理员用户可对整站进行管理；</li>
<li class='smwd'>质量信息录入者注册后需管理员审核通过才能登录，审核结果会发送到注册用户的Email中；</li>
	</div>
 

 	
</div>
	
	
	</td>
       <td rowspan="2" align="left" valign="top"><div id="gPg" class="easyui-panel" title="系统公告"    
        style="width:520px;padding:0px;background:#fafafa;overflow:hidden;;"  
        data-options="iconCls:'icon-standard-world-link',closable:false,      
                   collapsible:true,minimizable:false,maximizable:false">
         <!--显示公告-->
  
           <table  id="announcement" border="0"></table>
         </div>
         	<br/>
        <div id="gPg" class="easyui-panel" title="使用建议"    
        style="width:520px;padding:0px;background:#fafafa;overflow:hidden;;"  
        data-options="iconCls:'icon-standard-application-view-gallery',closable:false,      
                   collapsible:true,minimizable:false,maximizable:false">
            		<div class="demo-info">
		<div class="demo-tip icon-tip"></div>       
                   
         <!--显示公告-->
         强烈建议使用
     	
			<a href="/qis/Public/downloads/360se7.1.1.800.exe" target="_blank"><img src="/qis/Public/images/360brow.png"  class="linkicon" />&nbsp;360浏览器</a> 
		或者
			
			<a href="/qis/Public/downloads/ChromeStandalone_v44.0.2403.157_Setup.1440142013.exe" target="_blank"><img src="/qis/Public/images/chrome.png" class="linkicon" />&nbsp;Chorme</a> 系列浏览器浏览本网站系统。</p>
	
         </div>
            </div>
       </div></td>
  </tr>
  <tr>
    <td align="left" valign="top">
    	<div id="p4" class="easyui-panel" title="友情链接"    
        style="width:400px;padding:0px;background:#fafafa;"  
        data-options="iconCls:'icon-standard-world-link',closable:false,      
                   collapsible:true,minimizable:false,maximizable:false">
				   
				  		<div class="demo-info">
	
     <table width="90%" border="0" cellspacing="10">
        <tr>
          <td valign="middle" width="188"><a href="http://172.16.2.250/hrm" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/group.png" class="linkicon"/>&nbsp;人力资源网</a></td>
          <td valign="middle" width="188"><a href="http://172.16.2.8/" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/email-open.png" class="linkicon" />&nbsp;陕汽邮箱</a></td>
        </tr>
        <tr>
          <td><a href="http://172.16.2.250:8080/HRM/share/Share?action=shareList" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/table-gear.png" class="linkicon"/>&nbsp;MES生产制造实行系统</a></td>
          <td><a href="http://plm.sxqc.com/Windchill/" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/note-edit.png" class="linkicon" />&nbsp;PLM</a></td>
        </tr>
        <tr>
          <td><a href="http://192.168.37.73/tzcgyw/" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/report-magnify.png" class="linkicon"/>&nbsp;特种车事业部工艺网</a></td>
          <td><a href="http://192.168.37.73/fwcn/" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/heart.png" class="linkicon" />&nbsp;特种车事业部服务承诺网</a></td>
        </tr>
        <tr>
          <td><a href="http://192.168.37.73/syb/" target="_blank"><img src="/qis/Public/easyui/themes/icons/icon-standard/16x16/feed.png" class="linkicon" />&nbsp;特种车事业部信息管理平台</a></td>
          <td>&nbsp;</td>
        </tr>
      </table>
	</div>	 
 
    </div></td>

  </tr>
  
</table>
 <script type="text/javascript" charset="utf-8">
$('#announcement').datagrid({   
    url: '/qis/index.php/Home/Index/announcement',
    height: 345,	
		nowrap: false,
		autoRowHeight: false,
		striped: true,
		collapsible: true,
		fitColumns: true,
		pagination: true,
		autoRowHeight: true,
		pageSize: 10,
		pageList: [10, 20, 50],
		striped: true, //交替行
		singleSelect: true, //只允许选择一行
		rownumbers: true,
		sortName: 'creattime', //根据某个字段给easyUI排序
		sortOrder: 'asc',
		remoteSort: false,
		idField: 'creattime',
    columns:[[   
        {field:'mc',title:'名称',width:100,align:'right'},
        {field:'text',title:'内容',width:300}
    ]]   
});       
       </script> 		
			</div>
		</div>
	 
	</div>   
    <div data-options="region:'south',title:'关于…',split:true,collapsed:true,iconCls:'icon-standard-information'" style="height: 100px;">
	<div>
		<p class="Attribute">@ 2015-2080版权所有：特种车事业部 工艺科
			<a href="#" onclick="fjp203()">
				<img src="/qis/Public/images/fjp203.png" class="fjpicon" alt="fjp203" />

			</a>

		</p>

		<p class="Attribute">建议使用
			
			<a href="/qis/Public/downloads/360se7.1.1.800.exe" target="_blank">360浏览器</a> /
			<a href="/qis/Public/downloads/IE10-Win7 x86.exe" target="_blank"> IE浏览器（版本9/10/11）</a> /
			
			<a href="/qis/Public/downloads/ChromeStandalone_v44.0.2403.157_Setup.1440142013.exe" target="_blank">Chorme</a> 系列浏览器。</p>
	</div>

</div>

<!--作者介绍窗口-->
<div id="fjp_info" class="easyui-dialog" style="width:220px;height:280px;padding:2px 10px;" title="&nbsp;&nbsp;作者介绍" data-options="iconCls:'icon-standard-house-go',buttons:'#dlg-buttons',closed:true,resizable:true,modal:false,closable:true">

	<table border="0">
		<tr>
			<td colspan="2" style="text-align:center;padding: 20px 10px 10px 10px;">
				<img src="/qis/Public/images/me.jpg" class="account-avator-bg" />
			</td>
		</tr>
		<tr>
			<td width="53">姓名</td>
			<td width="137">范建鹏</td>
		</tr>
		<tr>
			<td>科室</td>
			<td>工艺科</td>
		</tr>
		<tr>
			<td>电话</td>
			<td>83388352</td>
		</tr>
	</table>

</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="javascript:$('#fjp_info').dialog('close')">确定</a>
</div>
<script type="text/javascript">
	function fjp203() {
		$("#fjp_info").dialog("open").dialog('setTitle', '&nbsp;&nbsp;作者介绍');
	}
</script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--登录窗口-->
<style>
	.regedituser{
		color: #0E2D5F;
	}
</style>

<div id="login" class="easyui-dialog" style="width:346px;height:220px;padding:2px 10px;" title="&nbsp;&nbsp;登录" data-options="iconCls:'icon-standard-house-go',buttons:'#dlg-buttons',closed:true,resizable:false,modal:false,closable:true">

	<table>
		<tr>
			<td>
				<img title="HustMesWeb" border="0" width="150" alt="http://fjpfly.vipsinaapp.com/" src="/qis/Public/images/logo.png">

			</td>
			<td style="background-image: url(/qis/Public/images/big_seperator.png);background-repeat: no-repeat;width: 8px;height: 138px;background-position: center center;"></td>
			<td>
				<form id="loginForm" method="post">
					<table>
						<tr height="30px">
							<td style="color:#B083E4">用户名:</td>
							<td>
								<input type="text" name="username" class="easyui-validatebox validatebox-text" data-options="required:true" value="" style="width:100px;" />
							</td>
						</tr>

						<tr height="30px">
							<td style="color:#B083E4">密码:</td>
							<td>
								<input type="password" class="easyui-validatebox validatebox-text" data-options="required:true" value="" name="password" style="width:100px;" />
							</td>
						</tr>

					</table>
				</form>

			</td>
		</tr>
	</table>

</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="login()">登录</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#login').dialog('close')">取消</a>
</div>

<!--退出窗口-->
<div id="loginout" class="easyui-dialog" style="width:340px;height:120px;padding:10px 10px;" title="退出" data-options="iconCls:'icon-login',buttons:'#dlgout-buttons',closed:true,resizable:true,modal:true,closable:false">
	<form id="loginoutForm" method="post">
	</form>
	确认要退出吗？

</div>
<div id="dlgout-buttons">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="loginout()">确认</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#loginout').dialog('close')">取消</a>
</div>

<!--更改密码窗口-->
<div id="changePW" class="easyui-dialog" style="width:340px;height:220px;padding:30px 30px;" title="修改密码" data-options="iconCls:'icon-standard-lock-edit',buttons:'#dlg-buttons',closed:true,resizable:true,modal:true,closable:false">

	<form id="changePWForm" method="post">
		<table>
			<tr>
				<td>原密码:</td>
				<td>
					<input type="password" class="easyui-validatebox validatebox-text" data-options="required:true" value="" name="ypassword" style="width:200px;" />
				</td>
			</tr>

			<tr>
				<td>新密码:</td>
				<td>
					<input type="password" class="easyui-validatebox validatebox-text" data-options="required:true" value="" name="xpassword" style="width:200px;" />
				</td>
			</tr>

		</table>
	</form>
</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="changePW()">确认</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#changePW').dialog('close')">取消</a>
</div>

<!--注册用户 -->
<div id="regedit" class="easyui-dialog"
	style="width: 400px; height:220px; padding: 20px 0px 0px 100px; overflow: hidden;"
	title="&nbsp;&nbsp;注册用户"
	data-options="iconCls:'icon-standard-user-add',buttons:'#dlg_regedit',closed:true,resizable:true,modal:true,closable:true">


	<form id="regedit_form"  method="post" >
		<table class="regedituser">
			<tr>
				<td style="width:80px;">
					<label  for="laiyuan">用户名:</label>
				</td>
				<td>
					<input id="username" name="username" type="text"   style="width: 120px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">用户组:</label>
				</td>
				<td>

					<select id="group_id" class="easyui-combobox" name="group_id"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 120px;">


						<option value="2">录入者</option>
                        <option value="3">浏览者</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">E-Mail:</label>
				</td>
				<td>


					<input id="email" name="email" type="text" style="width: 120px;" />
				</td>
			</tr>



	<!--		<tr>
				<td>
					<label for="laiyuan">状态:</label>
				</td>
				<td>


					<select id="status" class="easyui-combobox" name="status"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 120px;">
						<option value="1">开启</option>
						<option value="0">关闭</option>
					</select>

				</td>
			</tr>-->
			<tr>
				<td>
					<input type="hidden" name="status" id="status" value= "0">
					<label for="laiyuan">密码:</label>
				</td>
				<td>

					<input type="password" id="password" name="password" type="text"
						style="width: 120px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">确认密码:</label>
				</td>
				<td>

					<input type="password" id="repassword" name="repassword"
						type="text" style="width: 120px;" />
				</td>
			</tr>

		</table>
	</form>


</div>

<div id="dlg_regedit">
	<a href="#" class="easyui-linkbutton" id="bt_regedit" data-options="iconCls:'icon-ok'">确认</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#regedit').dialog('close')">取消</a>
</div>
<script>
		$('#bt_regedit').click(
				function(){
			$('#regedit_form').form('submit',{
					
					url:'/qis/index.php/Home/Index/regedit',

					success:function(data){					
						$.messager.alert('注册用户', data,'info');
						$('#regedit').dialog('close')
						
					}
				});
	})
			
		

</script> 

</body>
</html>