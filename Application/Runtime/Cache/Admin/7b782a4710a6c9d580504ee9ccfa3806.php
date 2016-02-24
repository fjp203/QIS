<?php if (!defined('THINK_PATH')) exit();?><table id="user"></table>
<!--工具栏 -->
     <div id="tool">    
<table>
<tr>
<td>
	<a href="#" class="easyui-linkbutton"  onclick='show_add()' data-options="iconCls:'icon-standard-folder-page',plain:true">添加</a> 
    <a href="#" class="easyui-linkbutton"  onclick='dele()' data-options="iconCls:'icon-standard-page-white-delete',plain:true">删除</a> 	
    <a href="#" class="easyui-linkbutton"  onclick='show_edit()' data-options="iconCls:'icon-standard-application-edit',plain:true">编辑</a> 		
    <a href="javascript:excel()"  class="easyui-linkbutton"   data-options="iconCls:'icon-standard-page-white-excel',plain:true">导出</a>
 </td>
 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
				  

 <td>

	  <a href="#" class="easyui-linkbutton"  onclick="view()" data-options="iconCls:'icon-standard-arrow-refresh',plain:true">查看</a> 

   </td>
   	 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>

	  <a href="#" class="easyui-linkbutton"  onclick="reload()" data-options="iconCls:'icon-standard-arrow-refresh',plain:true">刷新</a> 

   </td>
   		 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>
     	<div style="float:right;">        
               <input  id='searchbox' class="easyui-searchbox" data-options="" style="width:400px;"></input>
			   </div>
			  
			      
			   <div id="mm" style="width:400px">
			    <div data-options="name:'miaoshu',iconCls:'icon-standard-table-edit',selected:true">问题描述</div>
	<div data-options="name:'creattime',iconCls:'icon-standard-date-magnify'" >日期</div>
	<div data-options="name:'cx',iconCls:'icon-standard-table-multiple'" >车型</div>
   
	<div data-options="name:'laiyuan',iconCls:'icon-standard-tag-blue'" >来源</div>
	<div data-options="name:'yuanyin',iconCls:'icon-standard-sum'">原因分析</div>
	<div data-options="name:'zhenggai',iconCls:'icon-standard-table-edit'">问题整改</div>

</div>
	   </td>
</tr>
</table>
</div>
     <div id="add_user" class="easyui-dialog"
	style="width: 353px; height:305px; padding: 10px; overflow: hidden;"
	title="&nbsp;&nbsp;添加用户"
	data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-add',closed:true,resizable:true,modal:false,closable:true">


	<form id="add_form" action="/QIS/index.php/Home/Quality/add_quality" enctype="multipart/form-data" method="post" >
		<table width="100%" cellspacing="0" class="table_form">
			<tr>
				<th width="80">用户名</th>
				<td style="height: 40px" colspan="3">

						<input id="cx" name="cx" class="easyui-validatebox"
							style="width: 200px" />
			
				</td>


			</tr>




			<tr>
				<th width="80">用户组</th>


				<td>
						<select id="jiaose" class="easyui-combobox" name="laiyuan"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 80px;">
						<option value="0" select="true">较色1</option>
						<option value="1">较色2</option>
						<option value="2">较色3</option>


					</select>

				</td>


			</tr>
			<tr>
				<th width="80">E-Mail</th>
				<td>
					<input id="cx" name="cx" class="easyui-validatebox"
							style="width: 200px" />
				</td>
			</tr>

			<tr>
				<th width="80">状态</th>
				<td>
					<select id="status" class="easyui-combobox" name="laiyuan"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 80px;">
						<option value="1" select="true">开启</option>
						<option value="0">关闭</option>



					</select>
			</tr>
	

			
		</table>
	
	</form>
	

	
 

	


	<div class="result">
          <?php if(!empty($photos)): if(is_array($photos)): foreach($photos as $key=>$vo): echo ($key); ?>|<?php echo ($vo); endforeach; endif; endif; ?>
    </div>
	<br>


</div>

<div id="dlg-add">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"
		onclick="add()">确认</a>
	<a href="#" class="easyui-linkbutton"
		data-options="iconCls:'icon-cancel'"
		onclick="javascript:$('#add_user').dialog('close')">取消</a>
</div> 
     <div id="edit_user" class="easyui-dialog" style="width:800px;height:554px;padding:10px;overflow:hidden;"     
        title="&nbsp;&nbsp;编辑记录"  data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-edit',closed:true,resizable:true,modal:true,closable:true">  
            

    <form id="edit_form"  method="post" >    
        <table  width="100%" cellspacing="0" class="table_form">
   <tr>
   <th width="80">基本信息</th>
    <td  style="height:40px" colspan="3">
	<label>车型：

<input id="cx" name="cx"  class="easyui-validatebox" style="width:200px" />
</label>
	<label for="name">创建日期:</label> 
	<input id="date" name="creattime" type="text" class="easyui-datebox" required="required"  data-options="editable:false"></input>
    



<label for="laiyuan">&nbsp;&nbsp;&nbsp;&nbsp;来源:</label> 
<select id="laiyuan" class="easyui-combobox" name="laiyuan"  data-options="editable:false,panelHeight:'auto'" style="width:80px;"> 
    <option value="0" select="true">零部件</option> 		
    <option value="1">工艺</option>
    <option value="2">装配</option>	
     

</select> 



	</td>
    

  </tr>
 
  
 

   <tr>
      <th width="80">问题描述</th>

    
	<td><input type="text" style="width:400px;" name="miaoshu" id="miaoshu" value="" class="measure-input  input-text" onblur="$.post('api.php?op=get_keywords&amp;number=3&amp;sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data &amp;&amp; $('#keywords').val()=='') $('#keywords').val(data); })" onkeyup="strlen_verify(this, 'title1_len', 80);"><input type="hidden" name="style_color" id="style_color" value="">
		<input type="hidden" name="style_font_weight" id="style_font_weight" value=""><input type="button" class="button" id="check_title_alt" value="检测重复" onclick="$.get('?m=content&amp;c=content&amp;a=public_check_title&amp;catid=8&amp;sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data=='1') {$('#check_title_alt').val('标题重复');$('#check_title_alt').css('background-color','#FFCC66');} else if(data=='0') {$('#check_title_alt').val('标题不重复');$('#check_title_alt').css('background-color','#F8FFE1')}})" style="width:73px;">
	 	<span id="title_colorpanel" style="position:absolute;" class="colorpanel"></span><br/>还可输入<b><span id="title1_len">80</span></b> 个字符  <div id="titleTip" class="onError" style="display: none;">标题不能为空</div></td>
	
	
	</tr> 
 <tr>
      <th width="80">原因分析</th>
      <td><textarea name="yuanyin" id="yuanyin" style="width:98%;height:46px;" onkeyup="strlen_verify(this, 'yuanyin1_len', 255)"></textarea><br/>还可输入<b><span id="yuanyin1_len">255</span></b> 个字符  </td>
    </tr>
   
   <tr>
      <th width="80">问题整改</th>
      <td><textarea name="zhenggai" id="zhenggai" style="width:98%;height:46px;" onkeyup="strlen_verify(this, 'zhenggai1_len', 255)"></textarea><br/>还可输入<b><span id="zhenggai1_len">255</span></b> 个字符  </td>
    </tr>
   <tr>
      <th width="80">组图</th>
      <td><input name="info[pictureurls]" type="hidden" value="1">
		<fieldset class="blue pad-10">
        <legend>图片列表</legend><center><div class="onShow" id="nameTip">您最多可以同时上传 <font color="red">50</font> 张</div></center><div id="pictureurls" class="picList"></div>
		</fieldset>
		<div class="bk10"></div>
		<div class="picBut cu"><a herf="javascript:void(0);" onclick="javascript:flashupload('pictureurls_images', '附件上传','pictureurls',change_images,'50,gif|jpg|jpeg|png|bmp,1','content','8','f75aeb337095553bfd3e0dbd66a49dd3')"> 选择图片 </a></div>  </td>
    </tr>
 
    
  <tr>
      <th width="80">评论</th>
      <td><textarea name="pinglun" id="qita"  style="width:98%;height:46px;" onkeyup="strlen_verify(this, 'pinglun1_len', 255)"></textarea><br/>还可输入<b><span id="pinglun1_len">255</span></b> 个字符  </td>
    </tr>

 
   
</table>   
    </form>  

</div> 
<div id="dlg-edit">    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="edit()">确认</a>    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#edit').dialog('close')">取消</a>    
</div> 
     
<div id="view" class="easyui-dialog" style="width:724px;height:772px;padding:10px;overflow:hidden;"     
        title="&nbsp;&nbsp;查看记录"  data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-view',closed:true,resizable:true,modal:true,closable:true">  
            

    <form id="view_form"  method="post" >    
        <table >
  <tr>
   
    <td  style="height:40px" colspan="3">
	
	<label>车型：

<input id="cx" name="cx"   style="width:200px;"  disabled="disabled"/>
</label>
	<label for="name">创建日期:</label> 

<input id="cx" name="creattime" type="text"   style="width:200px;" disabled="disabled"/>



<label for="laiyuan">&nbsp;&nbsp;&nbsp;&nbsp;来源:</label> 
<input id="cx" name="laiyuan" type="text"   style="width:80px;" disabled="disabled"/>




	</td>
    

  </tr>
  
 <tr>

    <td  >

<label>问题描述：
        <textarea name="miaoshu" id="miaoshu" cols="15" rows="1" style="height:40px" disabled="disabled"></textarea>
        </label>

</td> 

	 
   </tr>
   
   </tr>
    <tr>

    <td  >

<label>原因分析：
        <textarea name="yuanyin" id="yuanyin" cols="15" rows="1" style="height:40px" disabled="disabled" ></textarea>
        </label>

</td> 

	 
   </tr>
   
   </tr>
       <tr>

    <td  >

<label>问题整改：
        <textarea name="zhenggai" id="zhenggai" cols="15" rows="1" style="height:40px"  disabled="disabled"></textarea>
        </label>

</td> 

	 
   </tr>
   
   </tr>
  
   <tr>
   
 
    


 
           <tr>
    <td colspan="6">
<label>评论：


        <textarea name="pinglun" id="qita"  rows="5" style="height:50px" disabled="disabled"></textarea>
        </label>


	</td>
</tr>
 
   
</table>   
    </form>  

</div> 
<div id="dlg-view">    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="down()">下载</a>    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#view').dialog('close')">取消</a>    
</div>

<script type="text/javascript">
$('#user').datagrid({   
 url:'Admin/user/index',
	toolbar:'#tool',
pagination:true,
	fit:true,
	width: function () { return document.body.clientWidth * 0.9 },
	nowrap: false,
collapsible: true,
fitColumns:true,
autoRowHeight:true,
striped:true,//交替行
singleSelect:true,//只允许选择一行
rownumbers: true,
border:false,
sortName:'id',
sortOrder: 'desc',//倒序排列
remoteSort: false,
pageSize: 50,
pageList: [10,15,20,40,50,100,200],
    columns:[[
	{ field: 'id', checkbox: true },
	{field:'uid',title:'ID号',width:50},	
	    {field:'username',title:'用户名',width:100},    	
        {field:'group_id',title:'用户组',width:100},
        {field:'email',title:'E-Mail',width:200,align:'left'},
        {field:'login_num',title:'登录次数',width:100,align:'left'},
        {field:'creattime',title:'创建时间',width:200,align:'left'},
        {field:'last_login_time',title:'最后登录时间',width:200,align:'left'}, 
        {field:'login_ip',title:'最后登录ip',width:200,align:'left'},
        {field:'status',title:'状态',width:50,align:'left'}
       
    ]]
}); 
$('#searchbox').searchbox({  
    searcher : function(value,name){
	 $('#dg').datagrid('load',{
         name:value		
    });
	
switch (name)
{
case 'cx':
 $('#dg').datagrid('load',{
         cx:value
    });
  break;
 case 'miaoshu': 
 $('#dg').datagrid('load',{
         miaoshu:value
    });
  break;
   case 'laiyuan': 
 $('#dg').datagrid('load',{
         laiyuan:value
    });
  break;
     case 'yuanyin': 
 $('#dg').datagrid('load',{
         yuanyin:value
    });
  break;
       case 'zhenggai': 
 $('#dg').datagrid('load',{
         zhenggai:value
    });
  break;


}
	},  
    menu:'#mm',  
    prompt:'请输入搜索内容'  
});	
//对Date的扩展，将 Date 转化为指定格式的String 
//月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
//年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
//例子： 
//(new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
//(new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
Date.prototype.Format = function(fmt) 
{ //author: meizz 
var o = { 
 "M+" : this.getMonth()+1,                 //月份 
 "d+" : this.getDate(),                    //日 
 "h+" : this.getHours(),                   //小时 
 "m+" : this.getMinutes(),                 //分 
 "s+" : this.getSeconds(),                 //秒 
 "q+" : Math.floor((this.getMonth()+3)/3), //季度 
 "S"  : this.getMilliseconds()             //毫秒 
}; 
if(/(y+)/.test(fmt)) 
 fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
for(var k in o) 
 if(new RegExp("("+ k +")").test(fmt)) 
fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length))); 
return fmt; 
}
//今天、昨天 白班 夜班
//打开添加窗口

function showupload(){
	$('#showupload').window('open');  // open a window 	
}

function show_add(){
	var myDate = new Date();
	var date;


	date=new Date(new Date()).Format("yyyy-MM-dd");
	$('#add_user').window('open');  // open a window 
	$('#add_form').form('load',{
		creattime:date,
		cx:'',
		miaoshu:'',
		yuanyin:'',
		zhenggai:''
	});


}
function reload(){
$('#dg').datagrid('load', {   
    banci: '' 
});

}
function add(){

	$('#add_form').form('submit',{
		
		url:'/QIS/index.php/Home/Quality/add_quality',

		success:function(data){
			$("#dg").datagrid("reload");
			
			$.messager.alert('添加项目', data,'info');
			$('#add').dialog('close')
			
		}
	});
}
//删除		
function dele(){
 var row = $('#dg').datagrid("getSelected");

 if(row.userid=={<?php echo $_userid;?>}){
   if (row) {
        $.messager.confirm('确认', '您确定要删除此项目吗?', function (r) {
            if (r) {
                $.post('index.php?m=quality&c=index&a=dele', { id: row.id ,userid: row.userid }, function (data) {
                    if (data) {
                        $('#dg').datagrid('reload');    // reload the user data  
                    } else {
                        $.messager.show();
                     
                    }
                }, 'text');
            }
        });
    }
	  else
	    {
	   	 $.messager.alert("请选择", "请选择要删除的项目！","info");
	        }
 
  }
else
{

$.messager.alert("无法删除", "此服务记录非您创建，无法删除！","info");
}
}
function show_edit(){


 var row = $('#dg').datagrid("getSelected");

 
	 
    if (row) {
	
        $("#edit").dialog("open").dialog('setTitle', '编辑项目');
	
        $("#edit_form").form("load", row);
        
    }
    else
    {
   	 $.messager.alert("请选择要编辑的行", "请选择要编辑的行！","info");
        }
	
   
  

	
	}
	//查看项目，范建鹏2015年1月19日
	function view(){


 var row = $('#dg').datagrid("getSelected");

    if (row) {
	
        $("#view").dialog("open").dialog('setTitle', '查看记录');
	
        $("#view_form").form("load", row);
        
    }
    else
    {
   	 $.messager.alert("请选择要查看的记录", "请选择要查看的记录！","info");
        }
	
   
 

	
	}	
function edit(){
            var row = $("#dg").datagrid("getSelected");
			
			
			$('#edit_form').form('submit',{
				
				url:'index.php?m=quality&c=index&a=edit&id=' + row.id,
						
					
	
				success:function(data){
					$("#dg").datagrid("reload");
					$.messager.alert('编辑项目', data,'info');
					$('#edit').dialog('close')
					
				}
			});
		}
function page(){
return $('#dg').datagrid('options').pageNumber;
}
function pagesize(){
return $('#dg').datagrid('options').pagesize;
}
function excel(){
var page=$('#dg').datagrid('options').pageNumber;
var pagesize=$('#dg').datagrid('options').pageSize;
 window.location.href='index.php?m=quality&c=index&a=export&page='+page+'&pagesize='+pagesize;
}
</script>