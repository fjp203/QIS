$('#navigation').tree({
	onClick: function(node){
		//alert(node.id);  // alert node text property when clicked
		//
       if(node.id!="1" ){
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
/*遮罩显示*/
function closes(){
	$("#Loading").fadeOut("normal",function(){
		$(this).remove();
	});
}
var pc;
$.parser.onComplete = function(){
	if(pc) clearTimeout(pc);
	pc = setTimeout(closes, 1000);
}