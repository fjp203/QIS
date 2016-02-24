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