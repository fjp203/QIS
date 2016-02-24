<?php if (!defined('THINK_PATH')) exit();?><table id="dg_<?php echo ACTION_NAME?>"></table>
<!--工具栏 
<?php echo GROUP_NAME; ?>&m=<?php echo MODULE_NAME; ?>&a=<?php echo ACTION_NAME; ?>
-->

     <div id="tool_<?php echo ACTION_NAME?>">    
<table>
<tr>
<td>
	<a href="#" class="easyui-linkbutton" id="bt_show_add_<?php echo ACTION_NAME?>"   data-options="iconCls:'icon-standard-folder-page',plain:true">添加</a> 
    <a href="#" class="easyui-linkbutton" id="bt_dele_<?php echo ACTION_NAME?>"  data-options="iconCls:'icon-standard-page-white-delete',plain:true">删除</a> 	
    <a href="#" class="easyui-linkbutton" id="bt_show_edit_<?php echo ACTION_NAME?>" data-options="iconCls:'icon-standard-application-edit',plain:true">编辑</a> 		
 </td>
 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
				  

 <td>

	  <a href="#" class="easyui-linkbutton" id="bt_view_<?php echo ACTION_NAME?>"  data-options="iconCls:'icon-standard-arrow-refresh',plain:true">查看</a> 

   </td>
   	 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>

	  <a href="#" class="easyui-linkbutton" id="bt_reload_<?php echo ACTION_NAME?>"  data-options="iconCls:'icon-standard-arrow-refresh',plain:true">刷新</a> 

   </td>
   		 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>
     	<div style="float:right;">        
               <input  id='searchbox_<?php echo ACTION_NAME?>' class="easyui-searchbox" data-options="" style="width:400px;"></input>
			   </div>
			  
			      
			   <div id="mm_<?php echo ACTION_NAME?>" style="width:400px">
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


<div id="view_<?php echo ACTION_NAME?>" class="easyui-dialog" style="width:355px;height:207px;padding:10px;overflow:hidden;"     
        title="&nbsp;&nbsp;查看记录"  data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_view_<?php echo ACTION_NAME?>',closed:true,resizable:true,modal:true,closable:true">


	<form id="view_form_<?php echo ACTION_NAME?>" method="post">
		<table>
			<tr>
				<td>
					<label>角色名:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="title" name="title" type="text" style="width: 80px;"
						disabled="disabled" />
				</td>					
			</tr>
			<tr>
				<td>
					<label for="laiyuan">状&nbsp;&nbsp;&nbsp;&nbsp;态:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="status" name="status" type="text" style="width: 80px;"
						disabled="disabled" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">备&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="ps" name="ps" type="text" style="width: 260px;"
						disabled="disabled" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">权&nbsp;&nbsp;&nbsp;&nbsp;限:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="rules" name="rules" type="text" style="width: 80px;"
						disabled="disabled" />				
				</td>
			</tr>

		</table>
	</form>

</div> 
<div id="dlg_view_<?php echo ACTION_NAME?>">        
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="javascript:$('#view_<?php echo ACTION_NAME?>').dialog('close')">确认</a>    
</div>
<div id="edit_<?php echo ACTION_NAME?>" class="easyui-dialog" style="width:459px;height:228px;padding:10px;overflow:hidden;"     
        title="&nbsp;&nbsp;编辑角色"  data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_edit_<?php echo ACTION_NAME?>',closed:true,resizable:true,modal:true,closable:true">


	<form id="edit_form_<?php echo ACTION_NAME?>" method="post">
				<table>
			<tr>
				<td>
					<label>角色名:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="hidden" id="id" name="id" type="text" style="width: 80px;"/>
					<input id="title" name="title" type="text" style="width: 80px;"/>
				</td>					
			</tr>
			<tr>
				<td>
					<label for="laiyuan">状&nbsp;&nbsp;&nbsp;&nbsp;态:</label>
					  
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					
					<select id="status" class="easyui-combobox" name="status" data-options="editable:false,panelHeight:'auto'" style="width:80px;"> 
					    <option value="1">开启</option> 
					    <option value="0">关闭</option> 
					</select>  
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">备&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="ps" name="ps" type="text" style="width: 260px;"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">权&nbsp;&nbsp;&nbsp;&nbsp;限:</label>
				</td>
				<td>
					
				
						 &nbsp;&nbsp;&nbsp;&nbsp;<label>前台显示
						<select id="view" class="easyui-combobox" name="view"
							data-options="editable:false,panelHeight:'auto'" disabled="disabled"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
					</label>
	  &nbsp;&nbsp;&nbsp;&nbsp;<label>前台编辑
  <select id="edit" class="easyui-combobox" name="edit"
							data-options="editable:false,panelHeight:'auto'"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
    </label>
	&nbsp;&nbsp;&nbsp;&nbsp;<label>后台操作
	<select id="admin" class="easyui-combobox" name="admin"
							data-options="editable:false,panelHeight:'auto'"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
    </label>			
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">权限号:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="rules" name="rules" type="text" style="width: 100px;" disabled="disabled"/>
					&nbsp;&nbsp;(权限号选择全线后自动生成)
				</td>
			</tr>

		</table>
	</form>

</div> 
<div id="dlg_edit_<?php echo ACTION_NAME?>">    
    <a href="#" id="bt_edit_<?php echo ACTION_NAME?>" class="easyui-linkbutton" data-options="iconCls:'icon-ok'">确认</a>    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#edit_<?php echo ACTION_NAME?>').dialog('close')">取消</a>    
</div>
<!--添加窗口 -->
<div id="add_<?php echo ACTION_NAME?>" class="easyui-dialog"
	style="width: 471px; height:231px; padding: 10px; overflow: hidden;"
	title="&nbsp;&nbsp;添加角色"
	data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_add_<?php echo ACTION_NAME?>',closed:true,resizable:true,modal:false,closable:true">


	<form id="add_form_<?php echo ACTION_NAME?>"  method="post" >
					<table>
			<tr>
				<td>
					<label>角色名:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="hidden" id="id" name="id" type="text" style="width: 80px;"/>
					<input id="title" name="title" type="text" style="width: 80px;"/>
				</td>					
			</tr>
			<tr>
				<td>
					<label for="laiyuan">状&nbsp;&nbsp;&nbsp;&nbsp;态:</label>
					  
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					
					<select id="status" class="easyui-combobox" name="status" data-options="editable:false,panelHeight:'auto'" style="width:80px;"> 
					    <option value="1">开启</option> 
					    <option value="0">关闭</option> 
					</select>  
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">备&nbsp;&nbsp;&nbsp;&nbsp;注:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="ps" name="ps" type="text" style="width: 260px;"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">权&nbsp;&nbsp;&nbsp;&nbsp;限:</label>
				</td>
				<td>
					
				
						 &nbsp;&nbsp;&nbsp;&nbsp;<label>前台显示
						<select id="view" class="easyui-combobox" name="view"
							data-options="editable:false,panelHeight:'auto'" disabled="disabled"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
					</label>
	  &nbsp;&nbsp;&nbsp;&nbsp;<label>前台编辑
  <select id="edit" class="easyui-combobox" name="edit"
							data-options="editable:false,panelHeight:'auto'"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
    </label>
	&nbsp;&nbsp;&nbsp;&nbsp;<label>后台操作
	<select id="admin" class="easyui-combobox" name="admin"
							data-options="editable:false,panelHeight:'auto'"
							style="width: 60px;">
							<option value="1">有</option>
							<option value="0">无</option>
						</select>
    </label>			
				</td>
			</tr>
			<tr>
				<td>
					<label for="laiyuan">权限号:</label>
				</td>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="rules" name="rules" type="text" style="width: 100px;" disabled="disabled"/>
					&nbsp;&nbsp;(权限号选择全线后自动生成)
				</td>
			</tr>

		</table>
	</form>

</div>

<div id="dlg_add_<?php echo ACTION_NAME?>">
	<a href="#" class="easyui-linkbutton" id="bt_add_<?php echo ACTION_NAME?>" data-options="iconCls:'icon-ok'">确认</a>
	<a href="#" class="easyui-linkbutton"
		data-options="iconCls:'icon-cancel'"
		onclick="javascript:$('#add_<?php echo ACTION_NAME?>').dialog('close')">取消</a>
</div>
     <!--工具栏 -->
<script type="text/javascript">
$('#dg_<?php echo ACTION_NAME?>').datagrid({   
	 url:'Admin/user/memberdata',
		toolbar:'#tool_<?php echo ACTION_NAME?>',
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
		    {field:'title',title:'角色名',width:100},        
	        {field:'view',title:'浏览权限',width:50,align:'left'},
	        {field:'edit',title:'编辑权限',width:50,align:'left'},
	        {field:'admin',title:'后台权限',width:50,align:'left'},
	        {field:'rules',title:'权限号',width:200,align:'left'},
	       {field:'status',title:'状态',width:50,align:'left'},
	        {field:'ps',title:'备注',width:150,align:'left'}
	       
	    ]]
	}); 
$('#searchbox_<?php echo ACTION_NAME?>').searchbox({  
    searcher : function(value,name){
	 $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
         name:value		
    });
	 
	 switch (name)
	 {
	 case 'cx':
	  $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
	          cx:value
	     });
	   break;
	  case 'miaoshu': 
	  $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
	          miaoshu:value
	     });
	   break;
	    case 'laiyuan': 
	  $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
	          laiyuan:value
	     });
	   break;
	      case 'yuanyin': 
	  $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
	          yuanyin:value
	     });
	   break;
	        case 'zhenggai': 
	  $('#dg_<?php echo ACTION_NAME?>').datagrid('load',{
	          zhenggai:value
	     });
	   break;


	 }
	 	},  
	     menu:'#mm_<?php echo ACTION_NAME?>',  
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

	$('#bt_show_add_<?php echo ACTION_NAME?>').click(
		function(){
			
			var myDate = new Date();
			var date;


			date=new Date(new Date()).Format("yyyy-MM-dd");
			$('#add_<?php echo ACTION_NAME?>').window('open');  // open a window 
			$('#add_form_<?php echo ACTION_NAME?>').form('load',{
				creattime:date,
				cx:'',
				miaoshu:'',
				yuanyin:'',
				zhenggai:''
			});
			
			
			}	
		)

	$('#bt_show_edit_<?php echo ACTION_NAME?>').click(
		function(){
			
			var row = $('#dg_<?php echo ACTION_NAME?>').datagrid("getSelected");

			 
			 
		    if (row) {
			
		        $("#edit_<?php echo ACTION_NAME?>").dialog("open").dialog('setTitle', '编辑权限');
			
		        $("#edit_form_<?php echo ACTION_NAME?>").form("load", row);
		        
		    }
		    else
		    {
		   	 $.messager.alert("请选择要编辑的行", "请选择要编辑的行！","info");
		        }

			}	
		)
//刷新
$('#bt_reload_<?php echo ACTION_NAME?>').click(
		function(){
			$('#dg_<?php echo ACTION_NAME?>').datagrid('reload');
			}	
		)
	//添加	
	$('#bt_add_<?php echo ACTION_NAME?>').click(
		function(){
	
			$('#add_form_<?php echo ACTION_NAME?>').form('submit',{
				
				url:'/qis/index.php/Admin/User/group',

				success:function(data){
					$("#dg_<?php echo ACTION_NAME?>").datagrid("reload");
					
					$.messager.alert('添加项目', data,'info');
					$('#add_<?php echo ACTION_NAME?>').dialog('close')
					
				}
			});
			
			}	
		)	

//删除

	$('#bt_dele_<?php echo ACTION_NAME?>').click(
		function(){
	
			 var row = $('#dg_<?php echo ACTION_NAME?>').datagrid("getSelected");

	
			   if (row) {
			        $.messager.confirm('确认', '您确定要删除此角色吗?', function (r) {
			            if (r) {
			                $.post('/qis/index.php/Admin/User/deleteGroup', { id: row.id  }, function (data) {
			                    if (data) {
			                        $('#dg_<?php echo ACTION_NAME?>').datagrid('reload');    // reload the user data  
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
		)

//查看角色
$('#bt_view_<?php echo ACTION_NAME?>').click(
		function(){
			
			var row = $('#dg_<?php echo ACTION_NAME?>').datagrid("getSelected");

		    if (row) {
			
		        $("#view_<?php echo ACTION_NAME?>").dialog("open").dialog('setTitle', '查看角色');
			
		        $("#view_form_<?php echo ACTION_NAME?>").form("load", row);
		        
		    }
		    else
		    {
		   	 $.messager.alert("请选择要查看的记录", "请选择要查看的记录！","info");
		        }
			
			
			}	
		)
		
//编辑
	$('#bt_edit_<?php echo ACTION_NAME?>').click(
		function(){			
           var row = $("#dg_<?php echo ACTION_NAME?>").datagrid("getSelected");						
			$('#edit_form_<?php echo ACTION_NAME?>').form('submit',{
			
				url:'/qis/index.php/Admin/User/modifyGroup',
				
				success:function(data){
					$("#dg_<?php echo ACTION_NAME?>").datagrid("reload");
					$.messager.alert('编辑项目', data,'info');
					$('#edit_<?php echo ACTION_NAME?>').dialog('close')					
				}
			});	
			}	
		)
	
	

function page(){
return $('#dg_<?php echo ACTION_NAME?>').datagrid('options').pageNumber;
}
function pagesize(){
return $('#dg_<?php echo ACTION_NAME?>').datagrid('options').pagesize;
}
function excel(){
var page=$('#dg_<?php echo ACTION_NAME?>').datagrid('options').pageNumber;
var pagesize=$('#dg_<?php echo ACTION_NAME?>').datagrid('options').pageSize;
 window.location.href='index.php?m=quality&c=index&a=export&page='+page+'&pagesize='+pagesize;
}	
</script>