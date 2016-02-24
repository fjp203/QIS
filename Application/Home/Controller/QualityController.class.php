<?php
//功能：quality控制器
namespace Home\Controller;
use Think\Controller;
class QualityController extends Controller{
	public function show_Quality(){
	     $this->display();
	}
	/* 读取start */
	public function read(){
	    $pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
	    $rowsnum=isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	    $quality=M("quality");
	    /* 搜索条件 start*/
	    $qualitylist=array();
	     
	    $cx=isset($_POST['cx']) ? mysql_real_escape_string($_POST['cx']) : '';
	    $creattime=isset($_POST['creattime']) ? mysql_real_escape_string($_POST['creattime']) : '';
	    $miaoshu=isset($_POST['miaoshu']) ? mysql_real_escape_string($_POST['miaoshu']) : '';
	    $zrdw=isset($_POST['zrdw']) ? mysql_real_escape_string($_POST['zrdw']) : '';
	    $laiyuan=isset($_POST['laiyuan']) ? mysql_real_escape_string($_POST['laiyuan']) : '';
	    $yuanyin=isset($_POST['yuanyin']) ? mysql_real_escape_string($_POST['yuanyin']) : '';
	    $zhenggai=isset($_POST['zhenggai']) ? mysql_real_escape_string($_POST['zhenggai']) : '';
	    $pinlun=isset($_POST['pinlun']) ? mysql_real_escape_string($_POST['pinlun']) : '';
	    $map['cx'] = array('like',array('%'.$cx.'%'));
	    $map['creattime'] = array('like',array('%'.$creattime.'%'));
	    $map['miaoshu'] = array('like',array('%'.$miaoshu.'%'));
	    $map['zrdw'] = array('like',array('%'.$zrdw.'%'));
	    $map['laiyuan'] = array('like',array('%'.$laiyuan.'%'));
	    $map['yuanyin'] = array('like',array('%'.$yuanyin.'%'));
	    $map['zhenggai'] = array('like',array('%'.$zhenggai.'%'));
	    $map['pinglun'] = array('like',array('%'.$pinglun.'%'));
	    /* 搜索条件 end*/
	    $qualitylist=$quality->where($map)->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->order('id asc')->select();
	    $total=$quality->where($map)->count();
	    if ($total==0){
	        $json='{"total":'.$total.',"rows":[]}';
	        echo $json;
	    }else{
	        $json='{"total":'.$total.',"rows":'.json_encode($qualitylist).'}';//重要，easyui的标准数据格式，数据总数和数据内容在同一个json中
	        echo $json;
	    }
	
	}
	/* 读取end */
	/* 增加start */
	public function add_quality1(){
	    $quality = D("quality");
	    if(!empty($_POST)){
	        //判断附件是否有上传
	        //如果有则实例化Upload，把附件上传到服务器指定位置
	        //然后把附件的路径名获得到，存入$_POST
	        if(!empty($_FILES)){
	
	            $config = array(
	                'rootPath' => './public/',  //根目录
	                'savePath'  => 'upload/', //保存路径
	
	            );
	            	
	            //附件被上传到路径：根目录/保存目录路径/创建日期目录
	
	            $upload = new \Think\Upload($config);
	            	
	            //uploadOne会返回已经上传的附件信息
	            $z = $upload->uploadOne($_FILES['img']);
	
	            if(!$z){
	                $this->error($upload->getError()); //获得上传附件产生的错误信息
	                	
	            }else {
	                //拼装图片的路径名
	                $bigimg = $z['savepath'].$z['savename'];
	                $_POST['file_big_img'] = $bigimg;
	
	                //把已经上传好的图片制作缩略图Image.class.php
	                $image = new \Think\Image();
	                //open();打开图像资源，通过路径名找到图像
	                $srcimg = $upload->rootPath.$bigimg;
	                $image -> open($srcimg);
	                $image -> thumb(150,150);  //按照比例缩小
	                $smallimg = $z['savepath']."small_".$z['savename'];
	                $image -> save($upload->rootPath.$smallimg);
	                $_POST['file_small_img'] = $smallimg;
	            }
	        }
	
	        $quality -> create(); //收集post表单数据
	        $z = $quality -> add();
	        if($z){
	            //$this ->success('添加商品成功', U('Goods/showlist'));
	            $this->show("质量信息添加成功！！");
	           
	        } else {
	            //$this ->error('添加商品失败', U('Goods/showlist'));
	            $this->show("质量信息添加失败！！");
	        }
	    }else {
	    }
	
	}
	/* 增加end */
	public function add_quality(){
		$quality = D("quality");
		if(!empty($_POST)){
			//判断附件是否有上传
			//如果有则实例化Upload，把附件上传到服务器指定位置
			//然后把附件的路径名获得到，存入$_POST
			if(!empty($_FILES)){
	
				$config = array(
						'rootPath' => './public/',  //根目录
						'savePath'  => 'upload/', //保存路径
	
				);
	
				//附件被上传到路径：根目录/保存目录路径/创建日期目录
	
				$upload = new \Think\Upload($config);
	
				//uploadOne会返回已经上传的附件信息
				//$z = $upload->uploadOne($_FILES['img']);
				$z =$upload->upload();
	
				if(!$z){
					$this->error($upload->getError()); //获得上传附件产生的错误信息
	
				}else {
					//拼装图片的路径名
					/* for($i=0;$i++;$i<2){
						$bigimg[$i] = $z[$i]['savepath'].$z[$i]['savename'];
						$_POST['file_big_img$i'] = $bigimg[$i];
						//把已经上传好的图片制作缩略图Image.class.php
						
					} */
					$bigimgOK = $z[0]['savepath'].$z[0]['savename'];
					//$_POST['file_big_img']=$bigimgOK;
					
					$bigimgCW = $z[1]['savepath'].$z[1]['savename'];
					$_POST['file_big_img'] = $bigimgOK.'Fdivide'.$bigimgCW;
					
					//把已经上传好的图片制作缩略图Image.class.php
					$image = new \Think\Image();
	
				
					//open();打开图像资源，通过路径名找到图像
					$srcimgOK = $upload->rootPath.$bigimgOK;
					$image -> open($srcimgOK);
					$image -> thumb(150,150);  //按照比例缩小
					$smallimgOK = $z[0]['savepath']."small_".$z[0]['savename'];
					$image -> save($upload->rootPath.$smallimgOK);
					$_POST['file_small_img'][0] = $smallimgOK;
					
					//open();打开图像资源，通过路径名找到图像
					$srcimgCW = $upload->rootPath.$bigimgCW;
					$image -> open($srcimgCW);
					$image -> thumb(150,150);  //按照比例缩小
					$smallimgCW = $z[1]['savepath']."small_".$z[1]['savename'];
					$image -> save($upload->rootPath.$smallimgCW);
					$_POST['file_small_img'][1] = $smallimgCW;
				}
			}
	
			$quality -> create(); //收集post表单数据
			$z = $quality -> add();
			if($z){
				//$this ->success('添加商品成功', U('Goods/showlist'));
				$this->show("质量信息添加成功！！");
	
			} else {
				//$this ->error('添加商品失败', U('Goods/showlist'));
				$this->show("质量信息添加失败！！");
			}
		}else {
		}
	
	}
	/* 删除start */
	

	public function del(){
		$id=$_POST['id'];
		$quality = D("quality");
		
		$data=$quality->where('id='.$id)->select();
		$str=$data[0][file_big_img];
		$arr=explode("Fdivide",$str);
		if($arr[0]){
			$phtoOK=$arr[0];
			$phto_smallOK=substr($phtoOK,0,18)."small_".substr($phtoOK,18);
			if (!unlink("./public/".$phtoOK))
			{
				echo ("Error deleting $phtoOK");
			}
			if (!unlink("./public/".$phto_smallOK))
			{
				echo ("Error deleting $phto_smallOK");
			}
		}
		if($arr[1]){
			$phtoCW=$arr[1];
			$phto_smallCW=substr($phtoCW,0,18)."small_".substr($phtoCW,18);
			if (!unlink("./public/".$phtoCW))
			{
				echo ("Error deleting $phtoCW");
			}
			if (!unlink("./public/".$phto_smallCW))
			{
				echo ("Error deleting $phto_smallCW");
			}
		}

		$r=$quality->where('id='.$id)->delete();
		
		if($r){
			$this->show("质量信息删除成功！！");
		}
	}
	/* 删除end */
 public function edit(){
     
	    $qualitylist=array();
	    $id=$_POST['id'];
	    
	   if($id){
	       $map['id'] = $id;
	       /* 编辑条件 start*/
	       $data['cx']=isset($_POST['cx']) ? mysql_real_escape_string($_POST['cx']) : '';
	       $data['creattime']=isset($_POST['creattime']) ? mysql_real_escape_string($_POST['creattime']) : '';
	       $data['miaoshu']=isset($_POST['miaoshu']) ? mysql_real_escape_string($_POST['miaoshu']) : '';
	       $data['zrdw']=isset($_POST['zrdw']) ? mysql_real_escape_string($_POST['zrdw']) : '';
	       $data['laiyuan']=isset($_POST['laiyuan']) ? mysql_real_escape_string($_POST['laiyuan']) : '';
	       $data['yuanyin']=isset($_POST['yuanyin']) ? mysql_real_escape_string($_POST['yuanyin']) : '';
	       $data['zhenggai']=isset($_POST['zhenggai']) ? mysql_real_escape_string($_POST['zhenggai']) : '';  
	       /* 编辑条件 end*/
	       $quality = D("quality");
	       $result = $quality->where($map)->save($data);
	       if(false !== $result)
	           $this->show('更新成功！');
	       else
	           $this->show('更新失败！');       
	       }       
	   else
	   {
	       $this->show('选择编辑失败！');
	   }
 } 
	    
 public function pinglun(){
      
     if(session('?uname')){
         $uname=session('uname');
     }else 
     {
         $uname="浏览者";
     }
     $time=date("Y-m-d",time());
     $qualitylist=array();
     $id=$_POST['id'];
     $pinglun=isset($_POST['pinglun']) ? mysql_real_escape_string($_POST['pinglun']) : '';
     $ly=isset($_POST['pl_text']) ? mysql_real_escape_string($_POST['pl_text']) : '';
     if($id){
         $map['id'] = $id;
         /* 评论条件 start*/
       
             $data['pinglun']= $pinglun."<br/>".$uname."[".$time."]:".$ly;
       
         
         /* 评论条件 end*/
         $quality = D("quality");
         $result = $quality->where($map)->save($data);
         if(false !== $result)
             $this->show('评论成功！');
         else
             $this->show('评论失败！');
     }
     else
     {
         $this->show('选择评论失败！');
     }
 }    
 
 public function down(){	
 	$id = isset($_GET['id']) ? intval($_GET['id']) : null;
 	
 	//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
 	import("Org.Util.PHPExcel");
 	import("Org.Util.PHPExcel.Writer.Excel5");
 	import("Org.Util.PHPExcel.IOFactory.php");
 	// 创建一个处理对象实例
 	$objExcel = new \PHPExcel();
 	// 创建文件格式写入对象实例, uncomment
 	$objWriter = new \PHPExcel_Writer_Excel5($objExcel);
 	$objProps = $objExcel->getProperties();
 	$objProps->setCreator("特种车事业部质量科");
 	$objProps->setLastModifiedBy("特种车事业部质量科");
 	$objProps->setTitle("质量信息导出");
 	$objProps->setSubject("质量信息");
 	$objProps->setDescription("质量信息导出");
 	$objProps->setKeywords("质量信息");
 	$objProps->setCategory("质量信息");
 	//*************************************
 	//设置当前的sheet索引，用于后续的内容操作。
 	//一般只有在使用多个sheet的时候才需要显示调用。
 	//缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0
 	$objExcel->setActiveSheetIndex(0);
 	$objActSheet = $objExcel->getActiveSheet();
 	//设置当前活动sheet的名称
 	$date = date("Y-m-d",time());
 	$objActSheet->setTitle('特种车事业部车辆质量问题'.$date);
 	//设置宽度，这个值和EXCEL里的不同，不知道是什么单位，略小于EXCEL中的宽度
 	$objActSheet->getColumnDimension('A')->setWidth(3);
 	$objActSheet->getColumnDimension('B')->setWidth(13);
 	$objActSheet->getColumnDimension('C')->setWidth(20);
 	$objActSheet->getColumnDimension('D')->setWidth(13);
 	$objActSheet->getColumnDimension('E')->setWidth(15);
 	$objActSheet->getColumnDimension('F')->setWidth(10);
 	$objActSheet->getColumnDimension('G')->setWidth(15);

 	$objActSheet->getRowDimension('2')->setRowHeight(45);
 	$objActSheet->getRowDimension('3')->setRowHeight(45);
 	$objActSheet->getRowDimension('4')->setRowHeight(100);
 	$objActSheet->getRowDimension('5')->setRowHeight(18);
 	$objActSheet->getRowDimension('6')->setRowHeight(120);
 	$objActSheet->getRowDimension('7')->setRowHeight(110);
 	$objActSheet->getRowDimension('8')->setRowHeight(110);
 	$objActSheet->getRowDimension('9')->setRowHeight(110);
	$objActSheet->getRowDimension('10')->setRowHeight(25);
 	//设置单元格的值
 	$objActSheet->setCellValue('B2', '特种车事业部车辆质量问题');
	$objActSheet->setCellValue('B10', '特种车事业部质量信息管理系统'.date("Y-m-d",time()));
 	//合并单元格
 	$objActSheet->mergeCells('B2:G2');
	$objActSheet->mergeCells('B10:G10');
 	$objStyleA1 = $objActSheet->getStyle('B2');
 	$objStyleA1->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 	$objFontA1 = $objStyleA1->getFont();
 	$objFontA1->setName('宋体');
 	$objFontA1->setSize(18);
 	$objFontA1->setBold(true);

 	$objActSheet->setCellValue('B3', '车型 ');
 	$objActSheet->setCellValue('B4', '问题描述 ');
 	$objActSheet->setCellValue('B5', '问题照片 ');
 	$objActSheet->setCellValue('B7', '原因分析');
 	$objActSheet->setCellValue('B8', '整改情况');
 	$objActSheet->setCellValue('B9', '评论');
 	
 	$objActSheet->setCellValue('D3', '创建日期');
 	$objActSheet->setCellValue('F3', '责任单位');
 	$objActSheet->setCellValue('F4', '问题来源');
 	$objActSheet->setCellValue('C5', '正确照片');
 	$objActSheet->setCellValue('E5', '错误照片');
 	
 	$objActSheet->mergeCells('C4:E4');
 	$objActSheet->mergeCells('B5:B6');
 	$objActSheet->mergeCells('C5:D5');
 	$objActSheet->mergeCells('E5:G5');
 	$objActSheet->mergeCells('C6:D6');
 	$objActSheet->mergeCells('E6:G6');


 	$objActSheet->mergeCells('C7:G7');
 	$objActSheet->mergeCells('C8:G8');
 	$objActSheet->mergeCells('C9:G9');
 	
 	//设置对齐
 	$objActSheet->getStyle('G2')->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('H2')->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('A2:I2')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	//加粗
 	$objActSheet->getStyle('B3:B9')->getFont()->setBold(true);
 	$objActSheet->getStyle('C5:G5')->getFont()->setBold(true);
 	$objActSheet->getStyle('F3:F4')->getFont()->setBold(true);
 	$objActSheet->getStyle('D3')->getFont()->setBold(true);
	$objActSheet->getStyle('B10')->getFont()->setBold(true);
 	
 	
 	$objStyleA2 = $objActSheet->getStyle('C5:G5');
 	$objStyleA2->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 	
 	//从数据库取值循环输出

 	$quality = D("quality");
 	$data=$quality->where('id='.$id)->select();
 	
 	$str=$data[0][file_big_img];
 	$arr=explode("Fdivide",$str);
 	if($arr[0]){
 		
 		/*实例化excel图片处理类*/
 		$objDrawing = new \PHPExcel_Worksheet_Drawing();
 		/*设置图片路径 切记：只能是本地图片*/
 		$objDrawing->setPath("./public/".$arr[0]);
 		
 		
 		/*写入图片*/
 		//使用另一个表格图片对象添加图片
 		/*
 		 $img=new PHPExcel_Worksheet_MemoryDrawing();
 		$img->setImageResource($images->getImageResource());
 		$img->setMimeType($images->getMimeType());
 		$img->setName($images->getName());
 		$img->setDescription($images->getDescription());
 		*/
 		//使用本地图片
 		$image = new \Think\Image();
 		$image->open("./public/".$arr[0]);
 		
 		$width = $image->width(); // 返回图片的宽度
 		$height = $image->height(); // 返回图片的高度
 		$y=(1200-200/$width*$height)/2;

 		if($width>$height){
 			$objDrawing->setWidth(200);//写入图片宽度
 			
 
 			
 		}else{
 			$objDrawing->setHeight(150);//写入图片高度
 		}


        $objDrawing->setOffsetX(5);//写入图片在指定格中的X坐标值
 		$objDrawing->setOffsetY(5);//写入图片在指定格中的Y坐标值 
 
 		$objDrawing->setRotation(1);//设置旋转角度
 		$objDrawing->getShadow()->setVisible(true);//
 		$objDrawing->getShadow()->setDirection(50);//
 		$objDrawing->setCoordinates("C6");//设置图片所在表格位置
 		$objDrawing->setWorksheet($objExcel->getActiveSheet());//把图片写到当前的表格中
 	}
 	if($arr[1]){
 			
 		/*实例化excel图片处理类*/
 		$objDrawing = new \PHPExcel_Worksheet_Drawing();
 		/*设置图片路径 切记：只能是本地图片*/
 		$objDrawing->setPath("./public/".$arr[1]);
 			
 			
 		/*写入图片*/
 		//使用另一个表格图片对象添加图片
 		/*
 		 $img=new PHPExcel_Worksheet_MemoryDrawing();
 		$img->setImageResource($images->getImageResource());
 		$img->setMimeType($images->getMimeType());
 		$img->setName($images->getName());
 		$img->setDescription($images->getDescription());
 		*/
 		//使用本地图片
 			
 		
 		//使用本地图片
 		$image1 = new \Think\Image();
 		$image1->open("./public/".$arr[1]);
 		$width = $image1->width(); // 返回图片的宽度
 		$height = $image1->height(); // 返回图片的高度
 		if($width>$height){
 			$objDrawing->setWidth(260);//写入图片宽度
 			
 		}else{
 			$objDrawing->setHeight(150);//写入图片高度
 			
 		}
 		/* $objDrawing->setHeight(200);//写入图片高度
 		$objDrawing->setWidth(260);//写入图片宽度 */
 		$objDrawing->setOffsetX(5);//写入图片在指定格中的X坐标值
 		$objDrawing->setOffsetY(5);//写入图片在指定格中的Y坐标值
 		$objDrawing->setRotation(1);//设置旋转角度
 		$objDrawing->getShadow()->setVisible(true);//
 		$objDrawing->getShadow()->setDirection(50);//
 		$objDrawing->setCoordinates("E6");//设置图片所在表格位置
 		$objDrawing->setWorksheet($objExcel->getActiveSheet());//把图片写到当前的表格中
 	}
 
 	
 	$pl=str_replace("<br/>","\n",$data[0][pinglun]);
 
 		$objActSheet->setCellValue('C3', $data[0][cx]);
 		$objActSheet->setCellValue('E3', $data[0][creattime]);
 		$objActSheet->setCellValue('G3', $data[0][zrdw]);
 		$objActSheet->setCellValue('C4', $data[0][miaoshu]);
		$objActSheet->setCellValue('G4', $data[0][laiyuan]);
 	/* 	$objActSheet->setCellValue('C5', $data[0][file_big_img]); */
 		$objActSheet->setCellValue('C7', $data[0][yuanyin]);
 		$objActSheet->setCellValue('C8', $data[0][zhenggai]);
 		$objActSheet->setCellValue('C9', $pl);
 
 
 	
 		$objActSheet->getStyle('B3:G9')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	
 	
 	$styleArray = array(
 			'borders' => array(
 					'allborders' => array(
 							//'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
 							'style' => \PHPExcel_Style_Border::BORDER_THIN,//细边框
 							//'color' => array('argb' => 'FFFF0000'),
 					),
 			),
 	);
 	$objActSheet->getStyle('B3:G9')->applyFromArray($styleArray);//这里就是画出从单元格A5到
 	
 	
 	$outputFileName =iconv("utf-8", "gb2312","信息导出 ".$date.".xls");
	
 	
 	header("Pragma: public");
 	header('Expires:0');
 	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
 	header("Content-Type:application/force-download");
 	Header('content-Type:application/vnd.ms-excel;charset=utf-8');
 	header("Content-Type:application/octet-stream");
 	header("Content-Type:application/download");
 	header("Content-Disposition: attachment;filename=$outputFileName");
 	header("Content-Transfer-Encoding:binary");
 	
 	$objWriter->save('php://output');
 	
 	echo $page .$pagesize;
 	exit;
 	
 	
 }
 public function out(){

 	//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
 	import("Org.Util.PHPExcel");
 	import("Org.Util.PHPExcel.Writer.Excel5");
 	import("Org.Util.PHPExcel.IOFactory.php");
 	// 创建一个处理对象实例	
 	$objExcel = new \PHPExcel();
 	// 创建文件格式写入对象实例, uncomment
 	$objWriter = new \PHPExcel_Writer_Excel5($objExcel);
 	$objProps = $objExcel->getProperties();       
 	$objProps->setCreator("特种车事业部质量科");
 	$objProps->setLastModifiedBy("特种车事业部质量科");
 	$objProps->setTitle("质量信息导出");
 	$objProps->setSubject("质量信息");
 	$objProps->setDescription("质量信息导出");
 	$objProps->setKeywords("质量信息");
 	$objProps->setCategory("质量信息");
 	//*************************************
 	//设置当前的sheet索引，用于后续的内容操作。
 	//一般只有在使用多个sheet的时候才需要显示调用。
 	//缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0
 	$objExcel->setActiveSheetIndex(0);
 	$objActSheet = $objExcel->getActiveSheet();
 	//设置当前活动sheet的名称
 	$date = date("Y-m-d",time());
 	$objActSheet->setTitle('质量信息导出'.$date);
 	
 	//*************************************
 	//
 	//设置宽度，这个值和EXCEL里的不同，不知道是什么单位，略小于EXCEL中的宽度
 	$objActSheet->getColumnDimension('A')->setWidth(5);
 	$objActSheet->getColumnDimension('B')->setWidth(20);
 	$objActSheet->getColumnDimension('C')->setWidth(15);
 	$objActSheet->getColumnDimension('D')->setWidth(40);
 	$objActSheet->getColumnDimension('E')->setWidth(10);
 	$objActSheet->getColumnDimension('F')->setWidth(10);
 	$objActSheet->getColumnDimension('G')->setWidth(30);
 	$objActSheet->getColumnDimension('H')->setWidth(25);
 	$objActSheet->getColumnDimension('I')->setWidth(25);
/*  	$objActSheet->getRowDimension('2')->setRowHeight(33); */
 	//设置单元格的值
 	$objActSheet->setCellValue('A1', '质量信息列表');
 	//合并单元格
 	$objActSheet->mergeCells('A1:I1');
 	$objStyleA1 = $objActSheet->getStyle('A1');
 	$objStyleA1->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 	$objFontA1 = $objStyleA1->getFont();
 	$objFontA1->setName('宋体');
 	$objFontA1->setSize(18);
 	$objFontA1->setBold(true); 
 	$objActSheet->setCellValue('A2', '序号 ');
 	$objActSheet->setCellValue('B2', '车型 ');
 	$objActSheet->setCellValue('C2', '创建日期');
 	$objActSheet->setCellValue('D2', '问题描述 ');
 	$objActSheet->setCellValue('E2', '来源');
 	$objActSheet->setCellValue('F2', '责任单位');
 	$objActSheet->setCellValue('G2', '原因分析');
 	$objActSheet->setCellValue('H2', '问题整改');
 	$objActSheet->setCellValue('I2', '评论');
 	
 	 //设置对齐
 	$objActSheet->getStyle('G2')->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('H2')->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('A2:I2')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	//加粗
 	$objActSheet->getStyle('A2:I2')->getFont()->setBold(true); 
 	
 	//从数据库取值循环输出
 	$quality=M("quality");
 	
 	$page = isset($_GET['pageNumber']) ? intval($_GET['pageNumber']) : 1;
 	$pagesize = isset($_GET['pagesize']) ? intval($_GET['pagesize']) : 10;
 	
 	
 	
 	
 	$listdata=array();
 	$data=array();
 	
 	$data=$quality->limit(($page-1)*$pagesize.','.$pagesize)->order('id asc')->select();
 	$count=$quality->limit(($page-1)*$pagesize.','.$pagesize)->count();
 	for($i=0;$i<$count;$i++){
 		$n=$i+3;
 		$objActSheet->setCellValue('A'.$n,$i+1);
 		$objActSheet->setCellValue('B'.$n, $data[$i][cx]);
 		$objActSheet->setCellValue('C'.$n, $data[$i][creattime]);
 		$objActSheet->setCellValue('D'.$n, $data[$i][miaoshu]);
 		$objActSheet->setCellValue('E'.$n, $data[$i][laiyuan]);
 		$objActSheet->setCellValue('F'.$n, $data[$i][zrdw]);
 		$objActSheet->setCellValue('G'.$n, $data[$i][yuanyin]);
 		$objActSheet->setCellValue('H'.$n, $data[$i][zhenggai]);
 		$objActSheet->setCellValue('I'.$n, $data[$i][pinglun]);
 	}
 	 $n=$count+3;
 	
 	$objActSheet->getStyle('C3:C'.$n)->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('D3:D'.$n)->getAlignment()->setWrapText(true);
 	$objActSheet->getStyle('E3:E'.$n)->getAlignment()->setWrapText(true);
 	$objActSheet->setCellValue('A'.$n, '导出日期：'.date("Y-m-d H:i:s"));
 
 	$objActSheet->mergeCells('A'.$n.':I'.$n);
 	$objActSheet->getStyle('A'.$n)->getFont()->setBold(true);
 	$objActSheet->getStyle('A'.$n)->getFont()-> setSize(14);
 	$objActSheet->getStyle('A'.$n.':I'.$n)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 	$objActSheet->getStyle('A'.$n.':I'.$n)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	$objActSheet->getStyle('A1:I'.$n)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
 

 	 $styleArray = array(
 	 		'borders' => array(
 	 				'allborders' => array(
 	 						//'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
 	 						'style' => \PHPExcel_Style_Border::BORDER_THIN,//细边框
 	 						//'color' => array('argb' => 'FFFF0000'),
 	 				),
 	 		),
 	 );
 	$objActSheet->getStyle('A1:I'.$n)->applyFromArray($styleArray);//这里就是画出从单元格A5到 
 	

 
 $outputFileName =iconv("utf-8", "gb2312","质量信息导出  ".$date.".xls");
 	header("Pragma: public");
 	header('Expires:0');
 	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
 	header("Content-Type:application/force-download");
    Header('content-Type:application/vnd.ms-excel;charset=utf-8');
 	header("Content-Type:application/octet-stream");
 	header("Content-Type:application/download");
 	header("Content-Disposition: attachment;filename=$outputFileName");
 	header("Content-Transfer-Encoding:binary");

 	$objWriter->save('php://output');
 	
 	echo $page .$pagesize;
 	exit;
 }	
}
	


?>