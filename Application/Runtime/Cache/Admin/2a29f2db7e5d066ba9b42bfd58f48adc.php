<?php if (!defined('THINK_PATH')) exit();?><style>
	.userform th{
		color: #0E2D5F;
		text-align: left;
		width:100px;
		padding:4px 0 4px 0;
	}
	.userform input{
		width:120px;" 
	}
</style>
<table id="dg_user"></table>
<div id="tool_user">
	<table>
		<tr>
			<td>
				<a href="#" class="easyui-linkbutton" id="bt_show_add_user" data-options="iconCls:'icon-standard-folder-page',plain:true">添加</a>
				<a href="#" class="easyui-linkbutton" id="bt_dele_user" data-options="iconCls:'icon-standard-page-white-delete',plain:true">删除</a>
				<a href="#" class="easyui-linkbutton" id="bt_show_edit_user" data-options="iconCls:'icon-standard-application-edit',plain:true">编辑</a>
			</td>
			<td>
				<div class="datagrid-btn-separator"></div>
			</td>
			<td>
				<a href="#" class="easyui-linkbutton" id="bt_view_user" data-options="iconCls:'icon-standard-application-view-gallery',plain:true">查看</a>
			</td>
			<td>
				<div class="datagrid-btn-separator"></div>
			</td>
			<td>
				<a href="#" class="easyui-linkbutton" id="bt_reload_user" data-options="iconCls:'icon-standard-arrow-refresh',plain:true">刷新</a>
			</td>
			<td>
			</td>
		</tr>
	</table>
</div>
<div id="view_user" class="easyui-dialog" style="width:259px;height:336px;padding:10px;overflow:hidden;" title="&nbsp;&nbsp;查看用户信息" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_view_user',closed:true,resizable:false,modal:true,closable:true">
	<form id="view_form_user" method="post">
		<table class="userform">
			<tr>
				<th>用户ID:</th>
				<td>				
					<input id="id" name="id" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>				
				<th>用户名:</th>
				<td>					
					<input id="username" name="username" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>				
				<th>用户组:</th>
				<td>					
					<input id="group_id" name="group_id" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>E-Mail:</th>
				<td>
					
					<input id="email" name="email" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>登录次数:</th>
				<td>				
					<input id="login_num" name="login_num" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>创建时间:</th>
				<td>				
					<input id="creattime" name="creattime" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>修改时间:</th>
				<td>					
					<input id="moditime" name="moditime" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>上次登录时间:</th>
				<td>					
					<input id="last_login_time" name="last_login_time" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>状态:</th>
				<td>					
					<input id="status" name="status" type="text" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<th>登录IP:</th>
				<td>					
					<input id="login_ip" name="login_ip" type="text" disabled="disabled"/>
				</td>
			</tr>

		</table>
	</form>
</div>
<div id="dlg_view_user">
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="javascript:$('#view_user').dialog('close')">确认</a>
</div>
<div id="edit1_user" class="easyui-dialog" style="width:456px;height:240px;padding:10px;overflow:hidden;" title="&nbsp;&nbsp;编辑角色" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_edit_user',closed:true,resizable:false,modal:true,closable:true">
	<form id="edit_form_user" method="post">
		<input type="hidden" id="id" name="id" type="text"/>
		<table class="userform">
			<tr>
				<th>用户名:</th>
				<td>				
					<input id="username" name="username" type="text"/>
				</td>
			</tr>
			<tr>
				<th>用户组:</th>
				<td>				
					<select id="group_id" class="easyui-combobox" name="group_id" data-options="editable:false,panelHeight:'auto'" style="width:120px;">
					<!--	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>-->
						<option value="1">管理员</option>
						<option value="2">录入者</option>
						<option value="3">浏览者</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>E-Mail:</th>
				<td>
					
					<input id="email" name="email" type="text"/>
				</td>
			</tr>
			<tr>
				<th>状态：</th>
				<td>					
					<select id="status" class="easyui-combobox" name="status" data-options="editable:false,panelHeight:'auto'" style="width:120px;">
						<option value="1">开启</option>
						<option value="0">关闭</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>密码：</th>
				<td>					
					<input type="text" id="password" name="password"/>&nbsp;&nbsp;（密码留空则表示不进行更改！）
				</td>
			</tr>
           <tr>
				<th>确认密码：</th>
				<td>					
					<input type="text"  id="repassword" name="repassword"/>&nbsp;&nbsp;（密码留空则表示不进行更改！）
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="dlg_edit_user">
	<a href="#" id="bt_edit_user" class="easyui-linkbutton" data-options="iconCls:'icon-ok'">确认</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#edit1_user').dialog('close')">取消</a>
</div>
<!--添加窗口 -->
<div id="add_user" class="easyui-dialog" style="width: 240px; height:246px; padding: 10px; overflow: hidden;" title="&nbsp;&nbsp;添加用户" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg_add_user',closed:true,resizable:false,modal:true,closable:true">
	<form id="add_form_user" method="post">
		<table class="userform">
			<tr>
				<th>用户名：</th>
				<td>
					<input id="username" name="username" type="text"/>
				</td>
			</tr>
			<tr>
				<th>用户组：</th>
				<td>
					<select id="group_id" class="easyui-combobox" name="group_id" data-options="editable:false,panelHeight:'auto'" style="width: 120px;">
						<option value="1">管理员</option>
						<option value="2">录入者</option>
						<option value="3">浏览者</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>E-Mail：</th>
				<td>

					<input id="email" name="email" type="text" />
				</td>
			</tr>

			<tr>
				<th>状态：</th>
				<td>
					<select id="status" class="easyui-combobox" name="status" data-options="editable:false,panelHeight:'auto'" style="width: 120px;">
						<option value="1">开启</option>
						<option value="0">关闭</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>密码：</th>
				<td>

					<input type="text" id="password" name="password"/>
				</td>
			</tr>
			<tr>
				<th>确认密码：</th>
				<td>
					<input type="text" id="repassword" name="repassword"/>
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="dlg_add_user">
	<a href="#" class="easyui-linkbutton" id="bt_add_user" data-options="iconCls:'icon-ok'">确认</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#add_user').dialog('close')">取消</a>
</div>
<script>$('#dg_user').datagrid({
	url: '/qis/index.php/Admin/user/userdata',
	toolbar: '#tool_user',
	pagination: true,
	fit: true,
	width: function() {
		return document.body.clientWidth * 0.9
	},
	nowrap: false,
	collapsible: true,
	fitColumns: true,
	autoRowHeight: true,
	striped: true, //交替行
	singleSelect: true, //只允许选择一行
	rownumbers: true,
	border: false,
	sortName: 'id',
	sortOrder: 'desc', //倒序排列
	remoteSort: false,
	pageSize: 50,
	pageList: [10, 15, 20, 40, 50, 100, 200],
	columns: [
		[{
				field: 'id',
				checkbox: true
			},

			{
				field: 'username',
				title: '用户名',
				width: 100
			}, {
				field: 'group_id',
				title: '用户组',
				width: 100,
				formatter: function(val, rec) {
					switch (val) {
						case '1':
							return "管理员";
							break;
						case '2':
							return "录入者";
							break;
						case '3':
							return "浏览者";
							break;
						default:
							return "浏览者";
					}
				}
			}, {
				field: 'email',
				title: 'E-Mail',
				width: 200,
				align: 'left'
			}, {
				field: 'login_num',
				title: '登录次数',
				width: 100,
				align: 'left'
			}, {
				field: 'creattime',
				title: '创建时间',
				width: 200,
				align: 'left'
			}, {
				field: 'last_login_time',
				title: '最后登录时间',
				width: 200,
				align: 'left'
			}, {
				field: 'login_ip',
				title: '最后登录ip',
				width: 200,
				align: 'left'
			}, {
				field: 'status',
				title: '状态',
				width: 50,
				align: 'left'
			}
		]
	]
});

Date.prototype.Format = function(fmt) { //author: meizz 
	var o = {
		"M+": this.getMonth() + 1, //月份 
		"d+": this.getDate(), //日 
		"h+": this.getHours(), //小时 
		"m+": this.getMinutes(), //分 
		"s+": this.getSeconds(), //秒 
		"q+": Math.floor((this.getMonth() + 3) / 3), //季度 
		"S": this.getMilliseconds() //毫秒 
	};
	if (/(y+)/.test(fmt))
		fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	for (var k in o)
		if (new RegExp("(" + k + ")").test(fmt))
			fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	return fmt;
}

//打开添加窗口

$('#bt_show_add_user').click(
	function() {
		var myDate = new Date();
		var date;
		date = new Date(new Date()).Format("yyyy-MM-dd");
		$('#add_user').window('open'); // open a window 
		$('#add_form_user').form('load', {
			group_id: '1',
			username: '',
			email: '',
			status: '1',
			password: '',
			repassword: ''
		});

		/* 				$('#add_form_user').form('clear'); */
	}
)

$('#bt_show_edit_user').click(
		function() {
			var row = $('#dg_user').datagrid("getSelected");
		
		
			 if (row) {
					var group_id = '';
				switch (row.group_id) {
					case '1':
						group_id = '管理员';
						break;
					case '2':
						group_id = '录入者';
						break;
					case '3':
						group_id = '浏览者';
						break;
					default:
						group_id = '浏览者';
						break;
				}
				row.group_id = group_id; 

				$("#edit1_user").dialog("open").dialog('setTitle', '&nbsp;&nbsp;编辑用户');
				//alert(row.username);
				//$("#edit_form_user").form("clear");
				//$("#edit_form_user").form("load", row);
		var password="";	
				
$("#edit_form_user").form("load", {
	username:row.username,

	email:row.email,

	password:password,
	repassword:password	
});
$('#group_id').combogrid('setValue', row.group_id);
$('#status').combogrid('setValue', row.status);
			} else {
				$.messager.alert("请选择要编辑的行", "请选择要编辑的行！", "info");
			}

		}
	)
	//刷新
$('#bt_reload_user').click(
		function() {
			$('#dg_user').datagrid('reload');
		}
	)
	//添加	
$('#bt_add_user').click(


	function() {

		$('#add_form_user').form('submit', {

			url: '/qis/index.php/Admin/User/adduser',

			success: function(data) {
				$("#dg_user").datagrid("reload");
				$.messager.alert('添加用户', data, 'info');
				$('#add_user').dialog('close')

			}
		});

	}
)

//删除

$('#bt_dele_user').click(
	function() {

		var row = $('#dg_user').datagrid("getSelected");


		if (row) {
			$.messager.confirm('确认', '您确定要删除此角色吗?', function(r) {
				if (r) {
					$.post('/qis/index.php/Admin/User/deleteUser', {
						id: row.id
					}, function(data) {
						if (data) {
							$('#dg_user').datagrid('reload'); // reload the user data  
							$.messager.alert('删除用户', data, 'info');
						} else {
							$.messager.show({ // show error message  
								title: '错误',
								msg: result.errorMsg

							});

						}
					}, 'text');
				}
			});
		} else {
			$.messager.alert("请选择", "请选择要删除的项目！", "info");
		}



	}
)

//查看角色
$('#bt_view_user').click(
	function() {

		var row = $('#dg_user').datagrid("getSelected");



		if (row) {
			/* 来源格式化  start*/
			var group_id = '';
			switch (row.group_id) {
				case '1':
					group_id = '管理员';
					break;
				case '2':
					group_id = '录入者';
					break;
				case '3':
					group_id = '浏览者';
					break;
				default:
					group_id = '浏览者';
					break;

			}



			row.group_id = group_id;

			$("#view_user").dialog("open").dialog('setTitle', '&nbsp;&nbsp;查看用户信息');

			$("#view_form_user").form("load", row);

		} else {
			$.messager.alert("请选择要查看的记录", "请选择要查看的记录！", "info");
		}


	}
)

//编辑
$('#bt_edit_user').click(
	function() {
		var row = $("#dg_user").datagrid("getSelected");
		$('#edit_form_user').form('submit', {

			url: '/qis/index.php/Admin/User/modifyUser',

			success: function(data) {
				$("#dg_user").datagrid("reload");
				$.messager.alert('编辑项目', data, 'info');
				$('#edit1_user').dialog('close')
			}
		});
	}
)



function page() {
	return $('#dg_user').datagrid('options').pageNumber;
}

function pagesize() {
	return $('#dg_user').datagrid('options').pagesize;
}

function excel() {
	var page = $('#dg_user').datagrid('options').pageNumber;
	var pagesize = $('#dg_user').datagrid('options').pageSize;
	window.location.href = 'index.php?m=quality&c=index&a=export&page=' + page + '&pagesize=' + pagesize;
}</script>