$('#dg').datagrid({   
    url:'Home/Quality/Quality_data', 
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
method:"post",
pageList: [10,15,20,40,50,100,200],
    columns:[[
	{ field: 'id', checkbox: true },
	    {field:'cx',title:'车型',width:200},

	    {field:'creattime',title:'创建时间',width:160},		
        {field:'miaoshu',title:'问题描述',width:150},   
        {field:'laiyuan',title:'来源',width:200,align:'left'},
        {field:'file_big_img',title:'图片',width:200,align:'left'}, 
        {field:'yuanyin',title:'原因分析',width:200,align:'left'},
        {field:'zhenggai',title:'问题整改',width:200,align:'center'},
		{field:'pinglun',title:'评论',width:200,align:'center'},
		{field:'userid',title:'uesrid',width:200,align:'center',hidden:'true'}
       
    ]]
}); 
//
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
	$('#add').window('open');  // open a window 
	$('#add_form').form('load',{
		creattime:date,
		cx:'',
		miaoshu:'',
		yuanyin:'',
		zhenggai:''
	});


}
function reload(){
$('#dg').datagrid('reload');

}
function add(){

	$('#add_form').form('submit',{
		
		url:'__APP__/Home/Quality/add_quality',

		success:function(data){
			$("#dg").datagrid("reload");
			
			$.messager.alert('添加项目', data,'info');
			$('#add').dialog('close')
			
		}
	});
}
//删除		
function dele() {
	var row = $('#dg').datagrid("getSelected");
alert("{$_SESSION[ 'uid']}");
	if (row.userid == "{$_SESSION[ 'uid']}") {
		if (row) {
			$.messager.confirm('确认', '您确定要删除此项目吗?', function(r) {
				if (r) {
					$.post('__APP__/Home/Quality/del', {
						id: row.id
					}, function(data) {
						if (data) {
							$('#dg').datagrid('reload'); // reload the user data  
							

							
							$.messager.alert('删除项目', data,'info');
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

	} else {

		$.messager.alert("无法删除", "此服务记录非您创建，无法删除！", "info");
	}

}

function show_edit() {


		var row = $('#dg').datagrid("getSelected");

 
	 
    if (row) {
	
        $("#edit").dialog("open").dialog('setTitle', '&nbsp;&nbsp;编辑记录');
	
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
	
        $("#view").dialog("open").dialog('setTitle', '&nbsp;&nbsp;查看记录');
	
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