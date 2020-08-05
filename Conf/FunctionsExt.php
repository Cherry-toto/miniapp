<?php

// +----------------------------------------------------------------------
// | FrPHP { a friendly PHP Framework } 
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://frphp.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2018/03
// +----------------------------------------------------------------------



/***************************************
 * 项目扩展函数-为开发者/站长自行定义使用 *
***************************************/



function viewuser(){
	$file = APP_PATH.'ips.txt';
	$ips = GetIP()."\n";
	if(!file_exists($file)){
		$r = file_put_contents($file,'');
		if(!$r){
			exit('根目录无法创建文件，请手动创建ips.txt');
		}
		
	}
	$data = file_get_contents($file);
	if(strpos($data,$ips)===false){
		$data.=$ips;
		$rr = file_put_contents($file,$data);
		if(!$rr){
			exit('根目录ips.txt无法写入，请赋予0777权限！');
		}
	}
	//计算访问人数
	$n = substr_count($data,"\n");
	return $n;
	
	
}